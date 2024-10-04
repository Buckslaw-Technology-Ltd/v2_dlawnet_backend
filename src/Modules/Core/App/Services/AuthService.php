<?php

namespace Modules\Core\App\Services;

use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Modules\User\App\Interfaces\BioRepositoryInterface;
use Modules\User\App\Interfaces\UserRepositoryInterface;
use Modules\User\Database\Enums\TokenTypeEnum;
use Modules\User\Database\Enums\UserStatusEnum;

class AuthService
{
    const TOKEN_EXPIRATION_HOURS = 24;
    protected $userInterface;
    protected $bioInterface;

    public function __construct(UserRepositoryInterface $userInterface, BioRepositoryInterface $bioRepository)
    {
        $this->userInterface = $userInterface;
        $this->bioInterface = $bioRepository;
    }

    public function register($data): bool|Exception
    {
        try {
            DB::beginTransaction();
            $user = $this->userInterface->create($data);
            $this->bioInterface->create([...$data, 'user_id' => $user->id]);
            DB::commit();
            $this->userInterface->assignRole($user, 'user');
            // $this->createActivation($user);
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            //reportException($e);
            return $e;
        }
    }

    /**
     * @throws Exception
     */
    public function login($emailOrUsername, $password, $remember_me = false): mixed
    {
        try {
            // Attempt to find the user by email or username
            $user = $this->userInterface->findTheFirstOne('email', $emailOrUsername, ['roles']) ??
                $this->userInterface->findTheFirstOne('username', $emailOrUsername, ['roles']);

            // Check if user is found and password is correct
            if (!$user || !Hash::check($password, $user->password)) {
                throw new \Exception("Invalid login details");
            }
            //TODO: Check if the user has verified their email
            /* if (!$this->checkActivation($user)) {
                 throw new \Exception("Please verify your email");
             }*/
            //Log last_login
            $user->last_login();
            // Create and return the authentication token
            return $this->createAuthToken($user);

        } catch (\Exception $exception) {
            //TODO: Log the exception and return a generic error message
            //reportException($exception);
            throw $exception;
        }
    }

    /**
     * Check if the user is logged in
     * @return mixed
     */
    public function check()
    {
        $check = auth('sanctum')->check();
        if ($check) {
            return true;
        }
        return false;
    }

    /**
     * @param $user
     * @return bool
     * Check if user account has been verified
     */


    public function createAuthToken($user)
    {
        return $user->createToken('api-token')->plainTextToken;
    }

    /**
     * @param $user
     * @return bool
     * Check if user account has been verified
     */
    public function checkActivation($user): bool
    {
        $completed = $user->email_verified_at;
        if ($completed === null) {
            $this->createActivation($user);
            return false;
        }
        return true;
    }

    public function createActivation($user, $type = TokenTypeEnum::EMAIL_VERIFICATION): void
    {

        $code = $this->generateCode();
        DB::table("operation_tokens")->insert([
            'user_id' => $user->id,
            'token' => $code,
            'type' => $type,
        ]);
        if ($type !== TokenTypeEnum::EMAIL_VERIFICATION) {
            //TODO: event(new PasswordResetEvent($user->email, $code));
        } else {
            //TODO:  event(new InitiateAccountRegisterEvent($user->email, $code, $user->first_name, $user->last_name));
        }
    }

    public function generateCode(): string
    {
        return mt_rand(100000, 999999);
    }

    public function getCurrentUser()
    {
        $check = auth('sanctum')->check();
        if ($check) {
            return auth('sanctum')->user();
        }
        return null;
    }

    /**
     * Log the user out of the application.
     * @return bool
     */
    public function logout($user): void
    {
        $user->currentAccessToken()->delete();
    }

    /**
     * Activate the given used id
     * @param int $userId
     * @param string $code
     * @return mixed
     */
    public function activate($type, $code): bool
    {
        try {
            // Find the token and related user information
            $codeModel = DB::table("operation_tokens")
                ->where('token', $code)
                ->where('completed', false)
                ->where('type', $type)
                ->first(['user_id', 'created_at']);

            if ($codeModel) {
                // Check if the token has expired
                if (Carbon::parse($codeModel->created_at)->lt($this->expires())) {
                    // Token is valid and not expired, proceed with activation
                    DB::transaction(function () use ($codeModel) {
                        // Update the operation token as completed
                        DB::table("operation_tokens")
                            ->where('user_id', $codeModel->user_id)
                            ->update([
                                'completed' => true,
                                'updated_at' => Carbon::now()
                            ]);

                        // Update the user status
                        $this->userInterface->update($codeModel->user_id, [
                            'email_verified_at' => Carbon::now(),
                            'status' => UserStatusEnum::APPROVED
                        ]);
                    });
                    // Find the user's email to trigger the AccountActivatedEvent
                    $user = $this->userInterface->find('id', $codeModel->user_id, ['email']);
                    if ($user) {
                        //TODO:  event(new AccountActivatedEvent($user[0]['email']));
                    }
                    return true;
                } else {
                    // Token has expired, create a new activation token for the user
                    $userData = $this->userInterface->find('id', $codeModel->user_id);
                    if ($userData) {
                        $this->createActivation($userData);
                    }
                    throw new Exception('Token Expired');
                }
            } else {
                // Token not found or already completed
                throw new Exception('Invalid Token');
            }
        } catch (\Exception $exception) {
            // Log and rethrow system exceptions
            //TODO: reportException($exception);
            return false;
        }
    }

    function expires(): Carbon
    {
        return Carbon::now()->addHours(self::TOKEN_EXPIRATION_HOURS);
    }

    public function removeExpired(): bool
    {
        $expires = $this->expires();

        DB::table("operation_tokens")
            ->where('completed', false)
            ->where('created_at', '>', $expires)
            ->delete();
        return true;
    }

    public function createPasswordReset($email)
    {
        $user = $this->userInterface->findTheFirstOne('email', $email, []);
        $this->createActivation($user, TokenTypeEnum::PASSWORD_RESET);
    }

    /**
     * @throws Exception
     */
    public function completeResetPassword($data)
    {
        // dd($data);
        $user = $this->userInterface->findTheFirstOne('email', $data['email']);
        if (Hash::check($data['password'], $user->password)) {
            throw new Exception("Please enter another password");
        }

        $code_model = DB::table("operation_tokens")->where('token', $data['code'])
            ->where('completed', false)
            ->where('created_at', '>', $this->expires());
        if (!$code_model) {
            throw new Exception("Please check your login details");
        }

        // dd($data['password']);
        DB::transaction(function () use ($data) {
            DB::table("operation_tokens")->where('token', $data['code'])->update([
                'completed' => true,
                'type' => TokenTypeEnum::EMAIL_VERIFICATION,
                'created_at' => Carbon::now()
            ]);
            $userData = $this->userInterface->findTheFirstOne('email', $data['email'], []);
            $this->userInterface->update($userData->id, [
                'password' => Hash::make($data['password']),
            ]);
        });

        if (!$code_model) {
            $userData = $this->userInterface->findTheFirstOne('email', $data['email'], []);
            $userArrayData = [
                'id' => $userData['id'],
                'first_name' => $userData['first_name'],
                'last_name' => $userData['last_name'],
                'email' => $userData['email']
            ];
            $this->createActivation(json_encode($userArrayData), TokenTypeEnum::EMAIL_VERIFICATION);

            return false;
        }

        return false;
    }

    public function logOutFromAllDevices($user)
    {
        return $user->tokens()->delete();
    }

    /**
     * @throws Exception
     */
    public function suspendUser($user_id)
    {
        return $this->userInterface->suspendUser($user_id);
    }
}
