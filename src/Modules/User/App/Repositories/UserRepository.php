<?php

namespace Modules\User\App\Repositories;

use Modules\Core\App\Repositories\CoreRepository;
use Modules\User\App\Interfaces\UserRepositoryInterface;
use Modules\User\App\Models\User;
use Modules\User\Database\Enums\UserStatusEnum;

class UserRepository extends CoreRepository implements UserRepositoryInterface
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }


    /**
     * @return \Illuminate\Contracts\Auth\Authenticatable|User|null
     */
    public function currentUser(): User|\Illuminate\Contracts\Auth\Authenticatable|null
    {
        return auth()->user();
    }

    /**
     * Assign role to user
     */
    public function assignRole($user, $role)
    {
        return $user->assignRole($role);
    }

    /**
     * Suspend User
     * @throws \Exception
     */
    public function suspendUser($id): bool
    {
        $user = $this->findTheFirstOne('id', $id);

        if ($user->status === UserStatusEnum::SUSPENDED) {
            return false;
        } else {
            $this->update($id, [
                'status' => UserStatusEnum::SUSPENDED
            ]);
            return true;
        }
    }

}
