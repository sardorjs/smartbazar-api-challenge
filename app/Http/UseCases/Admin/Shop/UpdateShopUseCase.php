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
     * @return RedirectResponse
     */
    public function execute(Shop $shop, UpdateShopDTO $updateShopDTO): RedirectResponse
    {
        $shop->city_id = $updateShopDTO->getCityId();
        $shop->name = $updateShopDTO->getName();
        $this->shopRepository->save($shop);

        return redirect()->route('admin.shop.index')->with('success', __('The Shop was successfully updated!'));
    }
}
