<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Manager User',
            'email' => 'manager@example.com',
            'password' => Hash::make('manager123'),
            'role' => 'manager',
        ]);

        User::create([
            'name' => 'Agent User',
            'email' => 'agent@example.com',
            'password' => Hash::make('agent123'),
            'role' => 'agent',
        ]);
    }
}

// This seeder creates three users with different roles: admin, manager, and agent.
// Each user has a unique email and a hashed password.
// You can run this seeder using the command:
// php artisan db:seed --class=UserSeeder