<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;


/**
 * @property string $name,
 * @property-read Collection<Rayon>|Rayon[] $rayons
 * @method static Builder|City query(),
 */
class City extends Model
{
    use HasFactory;

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
    ];

    public function rayons(): HasMany
    {
        return $this->hasMany(Rayon::class);
    }
}
