<?php

namespace Database\Factories;

use App\Models\Fonte;
use App\Models\Santo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class SantoFactory extends Factory
{
    protected $model = Santo::class;

    public function definition(): array
    {
        return [
            'nome' => fake()->name(),
            'giorno' => fake()->numberBetween(1, 31),
            'mese' => fake()->numberBetween(1, 12),
            'note' => fake()->sentences(2,true),
            'onomastico' => fake()->boolean(10),
            'onomastico_secondario' => fake()->boolean(30),
            'fonte_id' => Fonte::factory(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }

    public function onomastico(bool $primario): static
    {
        return $this->state(fn (array $attributes) => [
            'onomastico' => $primario,
            'onomastico_secondario' => !$primario,
        ]);
    }
}
