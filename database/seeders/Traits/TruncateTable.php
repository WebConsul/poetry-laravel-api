<?php

namespace Database\Seeders\Traits;

use Illuminate\Support\Facades\DB;

trait TruncateTable
{
    /**
     * @param  string  $table
     * @return void
     */
    protected function truncate(string $table)
    {
        DB::table($table)->truncate();
    }
}
