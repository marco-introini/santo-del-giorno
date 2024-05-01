<?php

namespace Database\Factories;

use App\Models\Fonte;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class FonteFactory extends Factory
{
    protected $model = Fonte::class;

    public function definition(): array
    {
        return [
            'nome' => $this->faker->words(3,true),
            'url' => $this->faker->url(),
            'note' => $this->faker->paragraph(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
