<?php

namespace Modules\Core\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class StartupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Model::unguard();

        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        Permission::findOrCreate('edit user');
        Permission::findOrCreate('create user');
        Permission::findOrCreate('view user');

        Role::findOrCreate('admin');
        Role::findOrCreate('user');
        Role::findOrCreate('panel-of-expert');
        Role::findOrCreate('school');

        Model::reguard();
    }
}
