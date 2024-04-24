<?php

namespace Database\Seeders;

use App\Models\Santo;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'is_admin' => true,
        ]);

        User::factory()->create([
            'name' => 'My default User',
            'email' => 'user@example.com',
            'email_verified_at' => now(),
            'is_admin' => false,
        ]);

        User::factory(10)->create();

        Santo::factory(200)->create();
    }
}
