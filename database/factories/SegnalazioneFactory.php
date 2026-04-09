<?php

namespace Database\Factories;

use Override;
use Illuminate\Support\Facades\Date;
use App\Enums\TipoSegnalazione;
use App\Models\Santo;
use App\Models\Segnalazione;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Segnalazione>
 */
class SegnalazioneFactory extends Factory
{
    #[Override]
    protected $model = Segnalazione::class;

    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first(),
            'santo_id' => Santo::inRandomOrder()->first(),
            'tipo_segnalazione' => fake()->randomElement(TipoSegnalazione::cases()),
            'testo_segnalazione' => $this->faker->realText(),
            'evasa' => fake()->boolean(20),
            'updated_at' => Date::now(),
            'created_at' => Date::now(),
        ];
    }
}
