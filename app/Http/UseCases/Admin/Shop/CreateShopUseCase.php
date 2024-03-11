<?php

namespace App\Http\UseCases\Admin\Shop;

use App\Models\City;
use App\Models\Merchant;
use App\Models\Rayon;
use Illuminate\Contracts\View\View;

class CreateShopUseCase
{
    /**
     * @return View
     */
    public function execute(): View
    {
        $cities = City::query()->orderByDesc('id')->get();
        $rayons = Rayon::query()->orderByDesc('id')->get();
        $merchants = Merchant::query()->orderByDesc('id')->get();

        return view('admin.shop.create', compact('cities', 'rayons', 'merchants'));
    }
}
