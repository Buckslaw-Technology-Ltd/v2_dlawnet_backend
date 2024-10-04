<?php

namespace Modules\User\App\Interfaces;

interface UserRepositoryInterface
{
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
