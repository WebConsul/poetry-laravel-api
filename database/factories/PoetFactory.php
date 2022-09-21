<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Poet>
 */
class PoetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'birth_date' => $this->faker->dateTimeBetween('-100 years', '-80 years'),
            'death_date' => $this->faker->dateTimeBetween('-20 years'),
            'portrait_url' => $this->faker->imageUrl(300, 200),
        ];
    }
}
