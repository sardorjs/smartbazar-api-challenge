<?php

namespace App\Http\UseCases\Admin\City;

use Illuminate\Contracts\View\View;

class CreateCityUseCase
{
    /**
     * @return View
     */
    public function execute(): View
    {
        return view('admin.city.create');
    }
}
