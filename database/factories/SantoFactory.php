<?php

namespace Database\Factories;

use Override;
use Illuminate\Support\Facades\Date;
use App\Models\Fonte;
use App\Models\Santo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Santo>
 */
class SantoFactory extends Factory
{
    #[Override]
    protected $model = Santo::class;

    public function definition(): array
    {
        return [
            'nome' => fake()->name(),
            'giorno' => fake()->numberBetween(1, 31),
            'mese' => fake()->numberBetween(1, 12),
            'note' => fake()->sentences(2, true),
            'onomastico' => fake()->boolean(10),
            'onomastico_secondario' => fake()->boolean(30),
            'fonte_id' => Fonte::factory(),
            'created_at' => Date::now(),
            'updated_at' => Date::now(),
        ];
    }

    public function onomastico(bool $primario): static
    {
        return $this->state(fn (array $attributes) => [
            'onomastico' => $primario,
            'onomastico_secondario' => ! $primario,
        ]);
    }
}
