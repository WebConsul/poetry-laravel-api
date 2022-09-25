<?php

namespace Database\Seeders;

use App\Models\Collection;
use App\Models\Poet;
use Database\Factories\Helpers\FactoryHelper;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PoetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $poets = Poet::factory()
            ->count(20)
            ->hasPoetData(3)
            ->create();

        $poets->each(function (Poet $poet) {
            $poet->collections()->sync([FactoryHelper::getRandomModelId(Collection::class)]);
        });
    }
}
