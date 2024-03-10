<?php

namespace App\Http\UseCases\Admin\Rayon;

use App\Models\City;
use Illuminate\Contracts\View\View;

class CreateRayonUseCase
{
    /**
     * @return View
     */
    public function execute(): View
    {
        $cities = City::query()->orderByDesc('id')->get();
        return view('admin.rayon.create', compact('cities'));
    }
}
