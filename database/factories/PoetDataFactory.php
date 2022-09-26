<?php

namespace Database\Factories;

use App\Models\Poet;
use App\Models\PoetData;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<PoetData>
 */
class PoetDataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'language' => $this->faker->randomElement(['de', 'en', 'es', 'fr', 'it', 'pt', 'ru']),
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'description' => $this->faker->text(100),
            'poet_id' => Poet::factory(),
        ];
    }
}
