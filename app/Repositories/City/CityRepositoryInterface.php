<?php

namespace App\Repositories\City;

use App\Models\City;

interface CityRepositoryInterface
{
    public function getById(int $id): ?City;

    public function save(City $city): City;
}
