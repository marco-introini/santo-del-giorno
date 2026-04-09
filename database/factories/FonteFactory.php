<?php

namespace Database\Factories;

use Override;
use Illuminate\Support\Facades\Date;
use App\Models\Fonte;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Fonte>
 */
class FonteFactory extends Factory
{
    #[Override]
    protected $model = Fonte::class;

    public function definition(): array
    {
        return [
            'nome' => fake()->words(3, true),
            'url' => fake()->url(),
            'note' => fake()->paragraph(),
            'created_at' => Date::now(),
            'updated_at' => Date::now(),
        ];
    }
}
