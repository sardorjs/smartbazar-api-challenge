<?php

namespace App\Repositories\City;

use App\Models\City;
use Illuminate\Database\Eloquent\Collection;

class CityLocalRepository implements CityRepositoryInterface
{

    public function getById(int $id): ?City
    {
        return City::query()->where('id', '=', $id)->first();
    }

    public function save(City $city): City
    {
        $city->save();
        return $city;
    }

    public function getAllOrderedByIdDesc(): Collection
    {
        return City::query()->orderByDesc('id')->get();
    }
}
