<?php

namespace App\Models;

use Database\Factories\PoetDataFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\PoetData
 *
 * @property int $id
 * @property int $poet_id
 * @property string $language
 * @property string|null $first_name
 * @property string $last_name
 * @property string|null $description
 * @property-read Poet $poet
 * @method static PoetDataFactory factory(...$parameters)
 * @method static Builder|PoetData newModelQuery()
 * @method static Builder|PoetData newQuery()
 * @method static Builder|PoetData query()
 * @method static Builder|PoetData whereDescription($value)
 * @method static Builder|PoetData whereFirstName($value)
 * @method static Builder|PoetData whereId($value)
 * @method static Builder|PoetData whereLanguage($value)
 * @method static Builder|PoetData whereLastName($value)
 * @method static Builder|PoetData wherePoetId($value)
 * @mixin Eloquent
 */
class PoetData extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'poets_data';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = [
        'language',
        'first_name',
        'last_name',
        'description',
        'poet_id',
    ];

    /**
     * @return BelongsTo
     */
    public function poet(): BelongsTo
    {
        return $this->belongsTo(Poet::class);
    }
}
