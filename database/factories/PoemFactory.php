<?php

namespace Database\Factories;

use App\Models\Poet;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Poem>
 */
class PoemFactory extends Factory
{
    private array $dateFormats = [
        'Y M',
        'd M Y',
        'Y M d',
        'M Y',
        'Y',
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'language' => $this->faker->languageCode(),
            'title' => $this->faker->title(),
            'created' => $this->faker->date(Arr::random($this->dateFormats)),
            'translation_of' => $this->faker->randomDigit(),
            'poet_id' => Poet::factory(),
        ];
    }
}
