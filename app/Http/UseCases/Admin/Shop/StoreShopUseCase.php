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
     * @return RedirectResponse
     */
    public function execute(StoreShopDTO $storeShopDTO): RedirectResponse
    {
        $shop = new Shop();
        $shop->city_id = $storeShopDTO->getCityId();
        $shop->name = $storeShopDTO->getName();
        $this->shopRepository->save($shop);

        return redirect()->route('admin.shop.index')->with('success', __('The Shop was successfully created!'));
    }
}
