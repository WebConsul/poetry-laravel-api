<?php

namespace App\Actions\Poet;

use App\Models\Poet;

class GetPoetAction
{
    public function execute(string $slug): Poet
    {
        return Poet::whereSlug($slug)
            ->with([
                'poetData',
                'poems',
                'collections'
            ])
            ->firstOrFail();
    }
}
