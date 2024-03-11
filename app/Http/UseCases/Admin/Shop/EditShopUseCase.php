<?php

namespace App\Http\UseCases\Admin\Shop;

use App\Models\City;
use App\Models\Shop;
use Illuminate\View\View;

class EditShopUseCase
{
    /**
     * @param Shop $shop
     * @return View
     */
    public function execute(Shop $shop): View
    {
        $cities = City::query()->orderByDesc('id')->get();
        return view('admin.shop.edit', compact('shop', 'cities'));
    }
}
