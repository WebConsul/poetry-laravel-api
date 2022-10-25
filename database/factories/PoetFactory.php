<?php

namespace Database\Factories;

use App\Models\Poet;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Poet>
 */
class PoetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'birth_date' => $this->faker->dateTimeBetween('-100 years', '-80 years'),
            'death_date' => $this->faker->dateTimeBetween('-20 years'),
            'portrait_url' => $this->faker->imageUrl(300, 200),
        ];
    }
}
