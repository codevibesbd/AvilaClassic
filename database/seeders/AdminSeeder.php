<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@avilaclassic.com'],
            [
                'name' => 'Executive Director',
                'password' => Hash::make('password123'),
                'role' => 'super_admin',
                'title' => 'Managing Director & Sourcing Desk Head',
                'is_active' => true,
            ]
        );
    }
}

