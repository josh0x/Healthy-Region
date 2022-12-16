<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder // seed users: admin id#1 & student id#2
{
    public function run()
    {
        $users = [
            [
                'id'             => 11,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
            ],
            [
                'id'             => 22,
                'name'           => 'student',
                'email'          => 'student@student.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
