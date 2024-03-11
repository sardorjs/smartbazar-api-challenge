<?php

namespace App\Http\UseCases\Admin\Merchant;

use App\Http\DTO\Admin\Merchant\StoreMerchantDTO;
use App\Models\Merchant;
use App\Repositories\Merchant\MerchantRepositoryInterface;
use Illuminate\Http\RedirectResponse;

class StoreMerchantUseCase
{
    public function __construct(
        private readonly MerchantRepositoryInterface $merchantRepository,
    ) {}

    /**
     * @param StoreMerchantDTO $storeMerchantDTO
     * @param bool $status
     * @return RedirectResponse
     */
    public function execute(StoreMerchantDTO $storeMerchantDTO, bool $status): RedirectResponse
    {
        $merchant = new Merchant();
        $merchant->name = $storeMerchantDTO->getName();
        $merchant->status = $status;
        $merchant->registered_at = now();
        $this->merchantRepository->save($merchant);

        return redirect()->route('admin.merchant.index')->with('success', __('The Merchant was successfully created!'));
    }
}
