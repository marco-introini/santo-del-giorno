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
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'nome' => $this->faker->word(),
            'data' => Carbon::now(),
            'note' => $this->faker->word(),
        ];
    }
}
