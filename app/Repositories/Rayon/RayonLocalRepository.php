<?php

namespace App\Repositories\Rayon;

use App\Models\Rayon;
use Illuminate\Database\Eloquent\Collection;

class RayonLocalRepository implements RayonRepositoryInterface
{
    public function getById(int $id): ?Rayon
    {
        return Rayon::query()->where('id', '=', $id)->first();
    }

    public function save(Rayon $rayon): Rayon
    {
        $rayon->save();
        return $rayon;
    }

    public function getByCityId(int $city_id): Collection
    {
        return Rayon::query()->where('city_id', '=', $city_id)->orderByDesc('id')->get();
    }

    public function getAllOrderedByIdDesc(): Collection
    {
        return Rayon::query()->orderByDesc('id')->get();
    }
}
