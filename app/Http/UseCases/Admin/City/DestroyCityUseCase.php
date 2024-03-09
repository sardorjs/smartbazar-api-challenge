<?php

namespace App\Http\UseCases\Admin\City;

use App\Models\City;
use Illuminate\Http\RedirectResponse;

class DestroyCityUseCase
{
    /**
     * @param City $city
     * @return RedirectResponse
     */
    public function execute(City $city): RedirectResponse
    {
        $city->delete();
        return redirect()->route('admin.city.index')->with('success', __('The City was successfully deleted!'));
    }
}
