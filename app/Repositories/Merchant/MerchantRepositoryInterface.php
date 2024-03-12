<?php

namespace App\Repositories\Merchant;

use App\Models\Merchant;
use Illuminate\Database\Eloquent\Collection;

interface MerchantRepositoryInterface
{
    public function getById(int $id): ?Merchant;

    public function save(Merchant $merchant): Merchant;
    public function getAllOrderedByIdDesc(): Collection;
}
