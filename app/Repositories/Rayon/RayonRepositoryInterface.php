<?php

namespace App\Repositories\Rayon;

use App\Models\Rayon;

interface RayonRepositoryInterface
{
    public function getById(int $id): ?Rayon;

    public function save(Rayon $rayon): Rayon;
}
