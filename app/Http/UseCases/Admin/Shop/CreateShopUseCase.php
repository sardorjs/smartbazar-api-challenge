<?php

namespace App\Http\UseCases\Admin\Shop;

use App\Models\City;
use App\Models\Merchant;
use App\Models\Rayon;
use App\Repositories\City\CityRepositoryInterface;
use App\Repositories\Merchant\MerchantRepositoryInterface;
use App\Repositories\Rayon\RayonRepositoryInterface;
use Illuminate\Contracts\View\View;

class CreateShopUseCase
{
    public function __construct(
        private readonly CityRepositoryInterface $cityRepository,
        private readonly RayonRepositoryInterface $rayonRepository,
        private readonly MerchantRepositoryInterface $merchantRepository,
    ){}

    /**
     * @return View
     */
    public function execute(): View
    {
        $cities = $this->cityRepository->getAllOrderedByIdDesc();
        $rayons = $this->rayonRepository->getAllOrderedByIdDesc();
        $merchants = $this->merchantRepository->getAllOrderedByIdDesc();

        return view('admin.shop.create', compact('cities', 'rayons', 'merchants'));
    }
}
