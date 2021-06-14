<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // hierachy of permissions and roles
        $this->call([
            PermissionsTableSeeder::class, // user & student acces
            RolesTableSeeder::class, // roles
            PermissionRoleTableSeeder::class, // assign permissions
            UsersTableSeeder::class, // seed users
            RoleUserTableSeeder::class, // assign roles
        ]);
    }
}
