<?php

namespace App\Http\Controllers\Admin;

use App\Models\Rayon;
use Illuminate\Http\Request;

class ApiController extends BaseController
{
    /**
     * роут для возврата районов по city id
     * @param int $city_id
     * @return array
     */
    public function getRayonByCityId(int $city_id): array
    {
        return Rayon::query()->where('city_id', '=', $city_id)->get()->toArray();
    }
}
