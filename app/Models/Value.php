<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Value
 *
 * @property int $id
 * @property int $category_id
 * @property \Illuminate\Support\Carbon $date
 * @property int $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Category|null $category
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Value newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Value newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Value query()
 * @method static \Illuminate\Database\Eloquent\Builder|Value whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Value whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Value whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Value whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Value whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Value whereValue($value)
 * @mixin \Eloquent
 */
class Value extends Model
{
    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */
    protected $table = 'values';

    protected $guarded = ['id'];

    protected $dates = [
        'date',
        'created_at',
        'updated_at',
    ];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS & MUTATORS
    |--------------------------------------------------------------------------
    */
}
