<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

/**
 * @property string $name
 * @property bool $status
 * @property Carbon $registered_at
 * @property-read Collection<Shop>|Shop[] $shops
 * @method static Builder|Merchant query()
 */

class Merchant extends Model
{
    use HasFactory;

    protected $casts = [
        'name' => 'string',
        'status' => 'boolean',
        'registered_at' => 'datetime',
    ];

    public function shops(): HasMany
    {
        return $this->hasMany(Shop::class);
    }
}
