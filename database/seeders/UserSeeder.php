<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Admin User
        User::create([
            'name' => 'Admin',
            'email' => 'admin@demo.com',
            'password' => Hash::make('password'),
            'isAdmin' => true,
            'email_verified_at' => now(),
        ]);

      /*   // Create Regular User
        User::create([
            'name' => 'User',
            'email' => 'customer@demo.com',
            'password' => Hash::make('password'),
            'isAdmin' => false,
            'email_verified_at' => now(),
        ]); */

        // Create multiple customers

        $customerName = [
            'Customer', 'Jane Smith', 'Michael Johnson', 'Emily Williams',
            'David Brown', 'Sarah Davis', 'James Miller', 'Linda Wilson',
            'Robert Moore', 'Patricia Taylor', 'William Anderson', 'Jennifer Thomas',
            'Richard Jackson', 'Mary White', 'Christopher Harris'
        ];

        foreach($customerName as $name) {
            User::create([
                'name' => $name,
                'email' => strtolower(str_replace(' ', '.', $name)) . '@demo.com',
                'password' => Hash::make('password'),
                'isAdmin' => false,
                'email_verified_at' => now(),
            ]);
        }
    }
}