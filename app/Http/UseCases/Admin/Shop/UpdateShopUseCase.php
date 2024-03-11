<?php

namespace App\Http\UseCases\Admin\Shop;

use App\Http\DTO\Admin\Shop\UpdateShopDTO;
use App\Models\Shop;
use App\Repositories\Shop\ShopRepositoryInterface;
use Illuminate\Http\RedirectResponse;

class UpdateShopUseCase
{
    public function __construct(
        private readonly ShopRepositoryInterface $shopRepository,
    ) {}

    /**
     * @param Shop $shop
     * @param UpdateShopDTO $updateShopDTO
     * @param bool $status
     * @return RedirectResponse
     */
    public function execute(Shop $shop, UpdateShopDTO $updateShopDTO, bool $status): RedirectResponse
    {
        $shop->city_id = $updateShopDTO->getCityId();
        $shop->rayon_id = $updateShopDTO->getRayonId();
        $shop->merchant_id = $updateShopDTO->getMerchantId();
        $shop->name = $updateShopDTO->getName();
        $shop->latitude = $updateShopDTO->getLatitude();
        $shop->longitude = $updateShopDTO->getLongitude();
        $shop->address = $updateShopDTO->getAddress();
        $shop->schedule = $updateShopDTO->getSchedule();
        $shop->phone = $updateShopDTO->getPhone();
        $shop->status = $status;
        $this->shopRepository->save($shop);

        return redirect()->route('admin.shop.index')->with('success', __('The Shop was successfully updated!'));
    }
}
