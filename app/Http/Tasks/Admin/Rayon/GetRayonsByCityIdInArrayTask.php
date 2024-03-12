<?php

namespace App\Http\Tasks\Admin\Rayon;

use App\Repositories\Rayon\RayonRepositoryInterface;

class GetRayonsByCityIdInArrayTask
{
    public function __construct(
        private readonly RayonRepositoryInterface $rayonRepository,
    ){}

    public function run(int $city_id): array
    {
        return $this->rayonRepository->getByCityId($city_id)->toArray();

    }
}
