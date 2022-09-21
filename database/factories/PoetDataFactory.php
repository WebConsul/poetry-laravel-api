<?php

namespace Database\Factories;

use App\Models\Poet;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PoetData>
 */
class PoetDataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'language' => $this->faker->languageCode(),
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'description' => $this->faker->text(100),
            'poet_id' => Poet::factory(),
        ];
    }
}
