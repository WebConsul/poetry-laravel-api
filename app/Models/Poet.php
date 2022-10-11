<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Database\Factories\PoetFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Poet
 *
 * @property int $id
 * @property string|null $birth_date
 * @property string|null $death_date
 * @property string|null $portrait_url
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|Collection[] $collections
 * @property-read int|null $collections_count
 * @property-read \Illuminate\Database\Eloquent\Collection|Poem[] $poems
 * @property-read int|null $poems_count
 * @property-read \Illuminate\Database\Eloquent\Collection|PoetData[] $poetData
 * @property-read int|null $poet_data_count
 * @method static PoetFactory factory(...$parameters)
 * @method static Builder|Poet newModelQuery()
 * @method static Builder|Poet newQuery()
 * @method static Builder|Poet query()
 * @method static Builder|Poet whereBirthDate($value)
 * @method static Builder|Poet whereCreatedAt($value)
 * @method static Builder|Poet whereDeathDate($value)
 * @method static Builder|Poet whereId($value)
 * @method static Builder|Poet wherePortraitUrl($value)
 * @method static Builder|Poet whereUpdatedAt($value)
 * @mixin Eloquent
 *
 * @property string|null $slug
 *
 * @method static Builder|Poet findSimilarSlugs(string $attribute, array $config, string $slug)
 * @method static Builder|Poet whereSlug($value)
 * @method static Builder|Poet withUniqueSlugConstraints(\Illuminate\Database\Eloquent\Model $model, string $attribute, array $config, string $slug)
 */
class Poet extends Model
{
    use HasFactory,
        Sluggable;

    /**
     * @var array
     */
    protected $fillable = [
        'birth_date',
        'death_date',
        'portrait_url',
        'slug',
    ];

    /**
     * @return BelongsToMany
     */
    public function collections(): BelongsToMany
    {
        return $this->belongsToMany(
            Collection::class,
            'collections_has_poets',
            'poet_id',
            'collection_id'
        );
    }

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

    /**
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => '',
            ],
        ];
    }
}
