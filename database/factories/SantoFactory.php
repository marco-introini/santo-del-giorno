<?php

namespace Database\Factories;

use App\Models\Santo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class SantoFactory extends Factory
{
    protected $model = Santo::class;

    public function definition(): array
    {
        return [
            'nome' => $this->faker->name(),
            'data' => fake()->date('Y-m-d'),
            'note' => $this->faker->sentences(2,true),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
