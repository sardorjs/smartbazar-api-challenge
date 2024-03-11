<?php

namespace App\Http\UseCases\Admin\Shop;

use App\Models\Shop;
use Illuminate\Http\RedirectResponse;

class DestroyShopUseCase
{
    /**
     * @param Shop $shop
     * @return RedirectResponse
     */
    public function execute(Shop $shop): RedirectResponse
    {
        $shop->delete();
        return redirect()->route('admin.shop.index')->with('success', __('The Shop was successfully deleted!'));
    }
}
