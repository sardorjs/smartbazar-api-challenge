<?php

namespace App\Repositories\Merchant;

use App\Models\Merchant;

interface MerchantRepositoryInterface
{
    public function getById(int $id): ?Merchant;

    public function save(Merchant $merchant): Merchant;
}
