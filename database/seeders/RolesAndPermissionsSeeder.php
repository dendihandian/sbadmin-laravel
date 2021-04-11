<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // permissions creation
        foreach (self::permissions() as $permissionName => $permissionDisplayName) {
            Permission::firstOrCreate([
                'name' => $permissionName,
            ])->update([
                'display_name' => $permissionDisplayName,
            ]);
        }

        $role_permissions = self::role_permissions();

        // roles creation (along with their permissions)
        foreach (self::roles() as $roleName => $roleValue) {
            $role = Role::firstOrCreate([
                'name' => $roleName,
            ]);
            $role->update([
                'display_name' => $roleValue['display_name'],
                'description' => $roleValue['description'],
            ]);

            // attaching permissions to the role
            $role->syncPermissions($role_permissions[$roleName]);
        }

    }

    public static function role_permissions()
    {
        return [
            'administrator' => array_keys(self::permissions()),
        ];
    }

    public static function roles()
    {
        return [
            'administrator' => [
                'display_name' => 'Administrator',
                'description' => 'The role with full authorities',
            ],
        ];
    }

    public static function permissions()
    {
        return [
            // Users Management
            'users.browse' => 'Browse User',
            'users.create' => 'Create User',
            'users.edit' => 'Edit User',
            'users.delete' => 'Delete User',

            // Roles Management
            'roles.browse' => 'Browse Role',
            'roles.create' => 'Create Role',
            'roles.edit' => 'Edit Role',
            'roles.delete' => 'Delete Role',
        ];
    }
}
