<?php

namespace Database\Seeders;

use App\Models\Fonte;
use App\Models\Santo;
use App\Models\Segnalazione;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;

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

        $user = User::factory()->create([
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

        Auth::setUser($user);

        Segnalazione::factory(100)->create();
    }
}
