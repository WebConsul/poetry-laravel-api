<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Collection extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'collections';

    /**
     * @var array
     */
    protected $fillable = [
        'title',
        'publisher',
        'location',
        'date',
    ];

    /**
     * @return BelongsToMany
     */
    public function poets(): BelongsToMany
    {
        return $this->belongsToMany(
            Poet::class,
            'collections_has_poets',
            'collection_id',
            'poet_id'
        );
    }

    /**
     * @return BelongsToMany
     */
    public function poems(): BelongsToMany
    {
        return $this->belongsToMany(
            Poem::class,
            'collections_has_poems',
            'collection_id',
            'poem_id'
        );
    }
}
