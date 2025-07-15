<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Super Admin',
            'username' => 'superadmin',
            'email' => 'superadmin@example.com',
            'role' => 'superadmin',
            'status' => 'active',
            'password' => bcrypt('0987654321'), // Password: 0987654321
            'email_verified_at' => now(),
            'created_by' => 0,
            'updated_by' => 0,
        ]);
    }
}
