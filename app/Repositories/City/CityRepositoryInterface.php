<?php

namespace App\Repositories\City;

use App\Models\City;
use Illuminate\Database\Eloquent\Collection;

interface CityRepositoryInterface
{
    public function getById(int $id): ?City;

    public function save(City $city): City;

    public function getAllOrderedByIdDesc(): Collection;
}
