<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Database\Factories\PoemFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Poem
 *
 * @property int $id
 * @property int $poet_id
 * @property int|null $translation_of
 * @property string|null $language
 * @property string|null $title
 * @property string|null $created
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|Collection[] $collections
 * @property-read int|null $collections_count
 * @property-read \Illuminate\Database\Eloquent\Collection|Line[] $lines
 * @property-read int|null $lines_count
 * @property-read Poet $poet
 * @property-read Poem|null $source
 * @property-read \Illuminate\Database\Eloquent\Collection|Poem[] $translations
 * @property-read int|null $translations_count
 * @method static PoemFactory factory(...$parameters)
 * @method static Builder|Poem newModelQuery()
 * @method static Builder|Poem newQuery()
 * @method static Builder|Poem query()
 * @method static Builder|Poem whereCreated($value)
 * @method static Builder|Poem whereCreatedAt($value)
 * @method static Builder|Poem whereId($value)
 * @method static Builder|Poem whereLanguage($value)
 * @method static Builder|Poem wherePoetId($value)
 * @method static Builder|Poem whereTitle($value)
 * @method static Builder|Poem whereTranslationOf($value)
 * @method static Builder|Poem whereUpdatedAt($value)
 * @mixin Eloquent
 * @property string|null $slug
 * @method static Builder|Poem findSimilarSlugs(string $attribute, array $config, string $slug)
 * @method static Builder|Poem whereSlug($value)
 * @method static Builder|Poem withUniqueSlugConstraints(\Illuminate\Database\Eloquent\Model $model, string $attribute, array $config, string $slug)
 */
class Poem extends Model
{
    use HasFactory,
        Sluggable;

    /**
     * @var array
     */
    protected $fillable = [
        'language',
        'title',
        'created',
        'translation_of',
        'poet_id',
        'slug'
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

    /**
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
