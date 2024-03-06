<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property integer $city_id
 * @property integer $rayon_id
 * @property integer $merchant_id
 * @property string $name
 * @property string $latitude
 * @property string $longitude
 * @property string $address
 * @property string $schedule
 * @property string $phone
 * @property string $status
 * @property Carbon $registered_at
 * @property-read City $city
 * @property-read Rayon $rayon
 * @property-read Merchant $merchant
 * @method static Builder|Shop query()
 */

class Shop extends Model
{
    use HasFactory;

    protected $casts = [
        'city_id' => 'integer',
        'rayon_id' => 'integer',
        'merchant_id' => 'integer',
        'name' => 'string',
        'latitude' => 'string',
        'longitude' => 'string',
        'address' => 'string',
        'schedule' => 'string',
        'phone' => 'string',
        'status' => 'boolean',
        'registered_at' => 'datetime',
    ];

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function rayon(): BelongsTo
    {
        return $this->belongsTo(Rayon::class);
    }

    public function merchant(): BelongsTo
    {
        return $this->belongsTo(Merchant::query());
    }
}
