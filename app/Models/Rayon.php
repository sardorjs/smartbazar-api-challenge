<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $city_id
 * @property string $name
 * @property-read City $city
 * @method Builder|Rayon query()
 */

class Rayon extends Model
{
    use HasFactory;

    protected $casts = [
        'city_id' => 'integer',
        'name' => 'string',
    ];

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
}
