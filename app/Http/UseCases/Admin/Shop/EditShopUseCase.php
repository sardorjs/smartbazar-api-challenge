<?php

namespace App\Http\UseCases\Admin\Shop;

use App\Models\City;
use App\Models\Merchant;
use App\Models\Rayon;
use App\Models\Shop;
use App\Repositories\City\CityRepositoryInterface;
use App\Repositories\Merchant\MerchantRepositoryInterface;
use App\Repositories\Rayon\RayonRepositoryInterface;
use Illuminate\View\View;

class EditShopUseCase
{
    public function __construct(
        private readonly CityRepositoryInterface $cityRepository,
        private readonly RayonRepositoryInterface $rayonRepository,
        private readonly MerchantRepositoryInterface $merchantRepository,
    ){}

    /**
     * @param Shop $shop
     * @return View
     */
    public function execute(Shop $shop): View
    {
        $cities = $this->cityRepository->getAllOrderedByIdDesc();
        $rayons = $this->rayonRepository->getByCityId($shop->city_id);
        $merchants = $this->merchantRepository->getAllOrderedByIdDesc();

        return view('admin.shop.edit', compact('shop', 'cities', 'rayons', 'merchants'));
    }
}
