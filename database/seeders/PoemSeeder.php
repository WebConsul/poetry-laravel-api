<?php

namespace Database\Seeders;

use App\Models\Collection;
use App\Models\Poem;
use Database\Factories\Helpers\FactoryHelper;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PoemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $poems = Poem::factory()
            ->count(50)
            ->hasLine(20)
            ->create();

        $poems->each(function (Poem $poem) {
            $poem->collections()->sync([FactoryHelper::getRandomModelId(Collection::class)]);
        });

        $poemWithTranslation = Poem::factory([
            'translation_of' => FactoryHelper::getRandomModelId(Poem::class)
        ])
            ->create();
    }
}
