<?php
namespace App\Services;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Jenssegers\Agent\Agent;
use Spatie\Permission\Models\Role;
use Throwable;

class RoleService
{
    /**
     * Assign special role for users
     *
     * @param \App\Models\User $user;
     */
    public function assignSpecialRole(object $user, string $roleName)
    {
        try {
            $role = $this->getRole($roleName);
            $user->assignRole($role);

        } catch (Throwable $e) {
            report($e);
            return false;
        }
    }

    /**
     * Get Role for attachment
     *
     * @param  string  $name
     * @return \App\Models\Role
     */
    public function getRole(string $roleName)
    {
        return Role::where('name', $roleName)->first();
    }
}
