<?php

namespace App\Models;

use Database\Factories\LineFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\Line
 *
 * @property int $id
 * @property int $poem_id
 * @property string $text
 * @property bool $end_of_stanza
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Poem $poem
 * @method static LineFactory factory(...$parameters)
 * @method static Builder|Line newModelQuery()
 * @method static Builder|Line newQuery()
 * @method static Builder|Line query()
 * @method static Builder|Line whereCreatedAt($value)
 * @method static Builder|Line whereEndOfStanza($value)
 * @method static Builder|Line whereId($value)
 * @method static Builder|Line wherePoemId($value)
 * @method static Builder|Line whereText($value)
 * @method static Builder|Line whereUpdatedAt($value)
 * @mixin Eloquent
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
