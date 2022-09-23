<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin IdeHelperLine
 */
class Line extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = [
        'text',
        'poem_id',
    ];

    /**
     * @return BelongsTo
     */
    public function poem(): BelongsTo
    {
        return $this->belongsTo(Poem::class);
    }
}
