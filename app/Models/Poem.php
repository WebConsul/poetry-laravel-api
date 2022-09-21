<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Poem extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'poems';

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
     * @return BelongsTo
     */
    public function poet(): BelongsTo
    {
        return $this->belongsTo(Poet::class);
    }

    /**
     * @return HasOne
     */
    public function line(): HasOne
    {
        return $this->hasOne(Line::class);
    }
}
