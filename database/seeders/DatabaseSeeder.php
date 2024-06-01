<?php

namespace Database\Seeders;

use App\Models\Fonte;
use App\Models\Santo;
use App\Models\Segnalazione;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\SegnalazioneFactory;
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
            'password' => 'password',
            'email_verified_at' => now(),
            'is_admin' => false,
        ]);

        User::factory(10)->create();

        $fonti = Fonte::factory(10)->create();
        Santo::factory(200)
            ->recycle($fonti)
            ->create();

        Segnalazione::factory(10)->create();
    }
}
