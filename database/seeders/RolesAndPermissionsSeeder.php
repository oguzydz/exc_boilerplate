<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Create the initial roles and permissions.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();


        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'user']);

        $role2 = Role::create(['name' => 'admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create admin user
        $admin = User::create([
            'email' => 'admin@exxefy.com',
            'name' => 'Admin',
            'password' => Hash::make('123/*exxee123/*'),
        ]);

        $user = User::create([
            'email' => 'user@exxefy.com',
            'name' => 'Exxe User',
            'password' => Hash::make('exxee123/*'),
        ]);

        $user->assignRole($role1);
        $admin->assignRole($role2);
    }
}
