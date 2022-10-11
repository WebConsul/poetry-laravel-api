<?php

namespace App\Observers;

use App\Models\Line;
use App\Models\Poem;
use Cviebrock\EloquentSluggable\Services\SlugService;

class LineObserver
{
    /**
     * @param  Line  $line
     * @return void
     */
    public function created(Line $line): void
    {
        $slug = SlugService::createSlug(Poem::class, 'slug', $line->text);

        if (! $line->poem->slug) {
            $line->poem()->update([
                'slug' => $slug,
            ]);
        }
    }
}
