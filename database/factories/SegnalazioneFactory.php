<?php

namespace Database\Factories;

use App\Models\Santo;
use App\Models\Segnalazione;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class SegnalazioneFactory extends Factory
{
    protected $model = Segnalazione::class;

    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first(),
            'santo_id' => Santo::inRandomOrder()->first(),
            'tipo_segnalazione' => $this->faker->word(),
            'testo_segnalazione' => $this->faker->realText(),
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now(),
        ];
    }
}
