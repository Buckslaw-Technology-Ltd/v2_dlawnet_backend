<?php

namespace Modules\Core\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Exception;
use Modules\Core\App\Http\Requests\Auth\ActivateAccountRequest;
use Modules\Core\App\Http\Requests\Auth\CompletePasswordResetRequest;
use Modules\Core\App\Http\Requests\Auth\LoginRequest;
use Modules\Core\App\Http\Requests\Auth\PasswordResetRequest;
use Modules\Core\App\Http\Requests\Auth\RegisterRequest;
use Modules\Core\App\Services\AuthService;
use Modules\Core\App\Traits\ResponseTrait;
use Modules\User\Database\Enums\TokenTypeEnum;

class AuthController extends Controller
{
    use ResponseTrait;

    private AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function register(RegisterRequest $request): \Illuminate\Http\JsonResponse
    {
        $auth = $this->authService->register($request->all());
        if ($auth !== true) {
            return $this->handleException($auth);
        }
        return $this->resourceCreated('Registration Successful. Please check your email for verification code');
    }

    public function login(LoginRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $user = $this->authService->login($request->emailOrUsername, $request->password);
            return $this->successResponse('Login Successful', $user);
        } catch (Exception $ex) {
            return $this->errorResponse($ex->getMessage());
        }
    }

    public function logout(): \Illuminate\Http\JsonResponse
    {
        $user = $this->authService->getCurrentUser();
        if ($user) {
            $this->authService->logout($user);
            return $this->successResponse('Logout Successful');
        }
        return $this->errorResponse("No Logged in Session");
    }

    public function logOutFromAllDevices(): \Illuminate\Http\JsonResponse
    {
        $user = $this->authService->getCurrentUser();

        if ($user) {
            $this->authService->logOutFromAllDevices($user);
            return $this->successResponse('Logout from all Device Successful');
        }
        return $this->errorResponse("No Device with Logged in Session");
    }

    public function verify(ActivateAccountRequest $request)
    {
        $code = $request->code;
        $type = TokenTypeEnum::EMAIL_VERIFICATION;
        $verify = $this->authService->activate($type, $code);
        if ($verify) {
            return $this->successResponse('Account Verification Successful');
        }
        return $this->errorResponse(
            '', "Unable to verify email. Either your account is already verified or an incorrect verification code was used. Please check your email for confirmation."
        );
    }

    /**
     * @throws Exception
     */
    public function suspendAccount($user_id): \Illuminate\Http\JsonResponse
    {

        $user = $this->authService->suspendUser($user_id);
        if (!$user) {
            return $this->errorResponse("No account found or Account has already been suspended");
        }
        return $this->successResponse('Account has been suspended');
    }
 
    public function createPasswordReset(PasswordResetRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $this->authService->createPasswordReset($request->validated());
            return $this->resourceCreated('Password Reset request. Please check your email to reset your password');
        } catch (Exception $ex) {
            return $this->errorResponse($ex->getMessage(), "Something went wrong", 401);
        }
    }

    public function completeResetPassword(CompletePasswordResetRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $this->authService->completeResetPassword($request->validated());
            return $this->resourceCreated('Password reset successful');
        } catch (Exception $ex) {
            return $this->errorResponse($ex->getMessage(), "Something went wrong", 401);
        }
    }

    public function me()
    {
        try {
            $user = $this->authService->getCurrentUser();
            if ($user === null) {
                return $this->errorResponse("No account found");
            }
            return $this->successResponse('My data', $user);
        } catch (Exception $ex) {
            return $this->errorResponse($ex->getMessage(), "Something went wrong", 401);
        }
    }
}
