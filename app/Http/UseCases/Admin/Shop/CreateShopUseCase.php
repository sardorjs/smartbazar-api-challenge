<?php

namespace App\Http\UseCases\Admin\Shop;

use App\Models\City;
use Illuminate\Contracts\View\View;

class CreateShopUseCase
{
    /**
     * @return View
     */
    public function execute(): View
    {
        $cities = City::query()->orderByDesc('id')->get();
        return view('admin.shop.create', compact('cities'));
    }
}
