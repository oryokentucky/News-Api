<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin User
        User::create([
            'user_fullname' => 'Admin User',
            'email' => 'admin@gmail.com',
            'user_mobile' => '0123456789',
            'password' => Hash::make('123456'),
        ]);

        // Normal User
        User::create([
            'user_fullname' => 'Normal User',
            'email' => 'user@gmail.com',
            'user_mobile' => '0198765432',
            'password' => Hash::make('123456'),
        ]);
    }
}
