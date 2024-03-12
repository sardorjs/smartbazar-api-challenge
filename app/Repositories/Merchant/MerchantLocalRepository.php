<?php

namespace App\Repositories\Merchant;

use App\Models\Merchant;
use Illuminate\Database\Eloquent\Collection;

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
    public function getAllOrderedByIdDesc(): Collection
    {
        return Merchant::query()->orderByDesc('id')->get();
    }
}
