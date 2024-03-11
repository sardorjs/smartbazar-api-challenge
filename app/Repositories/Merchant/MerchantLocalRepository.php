<?php

namespace App\Repositories\Merchant;

use App\Models\Merchant;

class MerchantLocalRepository implements MerchantRepositoryInterface
{

    public function getById(int $id): ?Merchant
    {
        return Merchant::query()->where('id', '=', $id)->first();
    }

    public function save(Merchant $merchant): Merchant
    {
        $merchant->save();
        return $merchant;
    }
}
