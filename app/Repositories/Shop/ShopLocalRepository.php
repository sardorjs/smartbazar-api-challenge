<?php

namespace App\Repositories\Shop;

use App\Models\Shop;

class ShopLocalRepository implements ShopRepositoryInterface
{

    public function getById(int $id): ?Shop
    {
        return Shop::query()->where('id', '=', $id)->first();
    }

    public function save(Shop $shop): Shop
    {
        $shop->save();
        return $shop;
    }
}
