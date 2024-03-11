<?php

namespace App\Http\UseCases\Admin\Shop;

use App\Http\DTO\Admin\Shop\StoreShopDTO;
use App\Models\Shop;
use App\Repositories\Shop\ShopRepositoryInterface;
use Illuminate\Http\RedirectResponse;

class StoreShopUseCase
{
    public function __construct(
        private readonly ShopRepositoryInterface $shopRepository,
    ) {}

    /**
     * @param StoreShopDTO $storeShopDTO
     * @param bool $status
     * @return RedirectResponse
     */
    public function execute(StoreShopDTO $storeShopDTO, bool $status): RedirectResponse
    {
        $shop = new Shop();
        $shop->city_id = $storeShopDTO->getCityId();
        $shop->rayon_id = $storeShopDTO->getRayonId();
        $shop->merchant_id = $storeShopDTO->getMerchantId();
        $shop->name = $storeShopDTO->getName();
        $shop->latitude = $storeShopDTO->getLatitude();
        $shop->longitude = $storeShopDTO->getLongitude();
        $shop->address = $storeShopDTO->getAddress();
        $shop->schedule = $storeShopDTO->getSchedule();
        $shop->phone = $storeShopDTO->getPhone();
        $shop->status = $status;
        $shop->registered_at = now();
        $this->shopRepository->save($shop);

        return redirect()->route('admin.shop.index')->with('success', __('The Shop was successfully created!'));
    }
}
