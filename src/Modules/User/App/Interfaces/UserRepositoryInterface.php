<?php

namespace Modules\User\App\Interfaces;

use Modules\User\App\Models\User;

interface UserRepositoryInterface
{

    /**
     * @return \Illuminate\Contracts\Auth\Authenticatable|User|null
     */
    public function currentUser(): User|\Illuminate\Contracts\Auth\Authenticatable|null;

    /**
     * Assign role to user
     */
    public function assignRole($user, $role);

    /**
     * Suspend User
     * @throws \Exception
     */
    public function suspendUser($id): bool;
}
