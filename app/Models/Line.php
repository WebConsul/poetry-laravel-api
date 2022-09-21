<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Line extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'lines';

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
