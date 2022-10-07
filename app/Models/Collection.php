<?php

namespace App\Models;

use Database\Factories\CollectionFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Collection
 *
 * @property int $id
 * @property string $title
 * @property string $publisher
 * @property string $location
 * @property string $date
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|Poem[] $poems
 * @property-read int|null $poems_count
 * @property-read \Illuminate\Database\Eloquent\Collection|Poet[] $poets
 * @property-read int|null $poets_count
 * @method static CollectionFactory factory(...$parameters)
 * @method static Builder|Collection newModelQuery()
 * @method static Builder|Collection newQuery()
 * @method static Builder|Collection query()
 * @method static Builder|Collection whereCreatedAt($value)
 * @method static Builder|Collection whereDate($value)
 * @method static Builder|Collection whereId($value)
 * @method static Builder|Collection whereLocation($value)
 * @method static Builder|Collection wherePublisher($value)
 * @method static Builder|Collection whereTitle($value)
 * @method static Builder|Collection whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Collection extends Model
{
    use HasFactory;

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
