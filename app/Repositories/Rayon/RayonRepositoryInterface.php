<?php

namespace App\Repositories\Rayon;

use App\Models\Rayon;
use Illuminate\Database\Eloquent\Collection;

interface RayonRepositoryInterface
{
    public function getById(int $id): ?Rayon;

    public function save(Rayon $rayon): Rayon;

    public function getByCityId(int $city_id): Collection;
    public function getAllOrderedByIdDesc(): Collection;
}
