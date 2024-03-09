<?php

namespace App\Repositories\Rayon;

use App\Models\Rayon;

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
}
