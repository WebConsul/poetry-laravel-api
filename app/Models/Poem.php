<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Poem extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = [
        'language',
        'title',
        'created',
        'translation_of',
        'poet_id',
    ];

    /**
     * @return BelongsToMany
     */
    public function collections(): BelongsToMany
    {
        return $this->belongsToMany(
            Collection::class,
            'collections_has_poems',
            'poem_id',
            'collection_id'
        );
    }

    /**
     * @return BelongsTo
     */
    public function poet(): BelongsTo
    {
        return $this->belongsTo(Poet::class);
    }

    /**
     * @return HasMany
     */
    public function lines(): HasMany
    {
        return $this->hasMany(Line::class);
    }

    /**
     * @return HasMany
     */
    public function translations(): HasMany
    {
        return $this->hasMany(Poem::class, 'translation_of');
    }

    /**
     * @return BelongsTo
     */
    public function source(): BelongsTo
    {
        return $this->belongsTo(Poem::class, 'translation_of');
    }
}
