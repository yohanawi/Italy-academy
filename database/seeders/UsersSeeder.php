<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Generator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Generator $faker)
    {
        // Create Admin User
        $adminUser = User::create([
            'name'              => 'Admin User',
            'email'             => 'admin@admin.com',
            'password'          => Hash::make('admin123'),
            'role'              => 'admin',
            'email_verified_at' => now(),
        ]);

        // Create Developer User
        $developerUser = User::create([
            'name'              => 'Developer User',
            'email'             => 'developer@developer.com',
            'password'          => Hash::make('developer123'),
            'role'              => 'developer',
            'email_verified_at' => now(),
        ]);
    }
}
