<?php

namespace Database\Factories;

use App\Models\Poet;
use Database\Factories\Helpers\FactoryHelper;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends Factory<Poem>
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
    public function definition(): array
    {
        $poetId = FactoryHelper::getRandomModelId(Poet::class);

        return [
            'language' => $this->faker->languageCode(),
            'title' => $this->faker->boolean(50) ? null : $this->faker->sentence(3),
            'created' => $this->faker->date(Arr::random($this->dateFormats)),
            'translation_of' => null,
            'poet_id' => $poetId,
        ];
    }
}
