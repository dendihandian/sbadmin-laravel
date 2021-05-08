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
            'users.browse' => 'User Browse',
            'users.create' => 'User Create ',
            'users.edit' => 'User Edit',
            'users.delete' => 'User Delete',

            // Roles Management
            'roles.browse' => 'Role Browse',
            'roles.create' => 'Role Create ',
            'roles.edit' => 'Role Edit',
            'roles.delete' => 'Role Delete',

            // Posts
            'posts.browse' => 'Post Browse',
            'posts.create' => 'Post Create ',
            'posts.edit' => 'Post Edit',
            'posts.delete' => 'Post Delete',

            // Pages
            'pages.browse' => 'Page Browse',
            'pages.create' => 'Page Create ',
            'pages.edit' => 'Page Edit',
            'pages.delete' => 'Page Delete',
        ];
    }
}
