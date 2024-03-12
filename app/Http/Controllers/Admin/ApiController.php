<?php

namespace App\Http\Controllers\Admin;

use App\Http\Tasks\Admin\Rayon\GetRayonsByCityIdInArrayTask;

class ApiController extends BaseController
{
    public function __construct(
        private readonly GetRayonsByCityIdInArrayTask $getRayonsByCityIdInArrayTask,
    ){}

    /**
     * роут для возврата районов по city id
     * @param int $city_id
     * @return array
     */
    public function getRayonsByCityId(int $city_id): array
    {
        return $this->getRayonsByCityIdInArrayTask->run($city_id);
    }
}
