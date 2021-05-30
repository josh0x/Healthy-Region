<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;


class PermissionRoleTableSeeder extends Seeder
{
    public function run()
    {
        $admin_permissions = Permission::all();
        Role::findOrFail(1)->permissions()->sync($admin_permissions->pluck('id'));
        $user_permissions = $admin_permissions->filter(function ($permission) {
            return substr($permission->title, 0, 5) != 'user_';
        });
        Role::findOrFail(2)->permissions()->sync($user_permissions);
    }
}

    // public function run()
    //     {
            // Admin: user access
    //         Role::find(1)->permissions()->([1,2]);

    //         Role::find(2)->permissions()->([1]);
    //     }
