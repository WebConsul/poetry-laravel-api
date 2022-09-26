<?php

namespace Database\Seeders;

use App\Models\Collection;
use App\Models\Poet;
use Database\Factories\Helpers\FactoryHelper;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Seeder;

class PoetSeeder extends Seeder
{
    use TruncateTable;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->truncate('poets');

        $poets = Poet::factory()
            ->count(20)
            ->hasPoetData(3)
            ->create();

        $poets->each(function (Poet $poet) {
            $poet->collections()->sync([FactoryHelper::getRandomModelId(Collection::class)]);
        });
    }
}
