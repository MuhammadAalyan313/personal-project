<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'username' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123456'),
                'role_id' => 2,
            ],
            [
                'username' => 'User',
                'email' => 'user@gmail.com',
                'password' => Hash::make('123456'),
                'role_id' => 1,
            ],
            [
                'username' => 'Staff',
                'email' => 'staff@gmail.com',
                'password' => Hash::make('123456'),
                'role_id' => 3,
            ],
        ];

        foreach ($users as $user) {
            \App\Models\User::create($user);
        }
    }

}
