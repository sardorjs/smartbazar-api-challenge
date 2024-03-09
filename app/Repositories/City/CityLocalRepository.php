<?php

namespace App\Repositories\City;

use App\Models\City;

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
}
