<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class TestUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Admin User
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@saifacademy.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        // Create Teacher User
        User::create([
            'name' => 'Teacher User',
            'email' => 'teacher@saifacademy.com',
            'password' => Hash::make('password123'),
            'role' => 'teacher',
            'email_verified_at' => now(),
        ]);

        // Create Student User
        User::create([
            'name' => 'Student User',
            'email' => 'student@saifacademy.com',
            'password' => Hash::make('password123'),
            'role' => 'student',
            'email_verified_at' => now(),
        ]);
    }
}
