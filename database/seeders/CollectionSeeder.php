<?php

namespace Database\Seeders;

use App\Models\Collection;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Seeder;

class CollectionSeeder extends Seeder
{
    use TruncateTable;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->truncate('collections');

        Collection::factory()
            ->count(10)
            ->create();
    }
}
