<?php

namespace App\Repositories\Shop;

use App\Models\Shop;

interface ShopRepositoryInterface
{
    public function getById(int $id): ?Shop;

    public function save(Shop $shop): Shop;
}
