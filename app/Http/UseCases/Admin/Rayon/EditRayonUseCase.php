<?php

namespace App\Http\UseCases\Admin\Rayon;

use App\Models\City;
use App\Models\Rayon;
use Illuminate\View\View;

class EditRayonUseCase
{
    /**
     * @param Rayon $rayon
     * @return View
     */
    public function execute(Rayon $rayon): View
    {
        $cities = City::query()->orderByDesc('id')->get();
        return view('admin.rayon.edit', compact('rayon', 'cities'));
    }
}
