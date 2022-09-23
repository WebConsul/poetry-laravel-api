<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin IdeHelperPoet
 */
class Poet extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = [
        'birth_date',
        'death_date',
        'portrait_url',
    ];

    /**
     * @return HasMany
     */
    public function poems(): HasMany
    {
        return $this->hasMany(Poem::class);
    }

    /**
     * @return HasMany
     */
    public function poetData(): HasMany
    {
        return $this->hasMany(PoetData::class);
    }
}
