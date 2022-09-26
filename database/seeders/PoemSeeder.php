<?php

namespace Database\Seeders;

use App\Models\Collection;
use App\Models\Poem;
use Database\Factories\Helpers\FactoryHelper;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Seeder;

class PoemSeeder extends Seeder
{
    use TruncateTable;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->truncate('poems');

        $poems = Poem::factory()
            ->count(50)
            ->hasLines(20)
            ->create();

        $poems->each(function (Poem $poem) {
            $poem->collections()->sync([FactoryHelper::getRandomModelId(Collection::class)]);
        });

        $poemWithTranslation = Poem::factory([
            'translation_of' => FactoryHelper::getRandomModelId(Poem::class),
        ])
            ->create();
    }
}
