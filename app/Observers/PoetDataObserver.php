<?php

namespace App\Observers;

use App\Models\Poet;
use App\Models\PoetData;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PoetDataObserver
{
    /**
     * @param  PoetData  $poetData
     * @return void
     */
    public function created(PoetData $poetData): void
    {
        $fullName = $poetData->first_name.' '.$poetData->last_name;
        $slug = SlugService::createSlug(Poet::class, 'slug', $fullName);

        if (! $poetData->poet->slug) {
            $poetData->poet()->update([
                'slug' => $slug,
            ]);
        }
    }
}
