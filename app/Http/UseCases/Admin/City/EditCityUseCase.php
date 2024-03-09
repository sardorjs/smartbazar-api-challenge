<?php

namespace App\Http\UseCases\Admin\City;

use App\Models\City;
use Illuminate\Contracts\View\View;

class EditCityUseCase
{
    /**
     * @param City $city
     * @return View
     */
    public function execute(City $city): View
    {
        return view('admin.city.edit', compact('city'));
    }
}
