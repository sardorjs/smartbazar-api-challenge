<?php

namespace App\Http\UseCases\Admin\Merchant;

use App\Http\DTO\Admin\Merchant\UpdateMerchantDTO;
use App\Models\Merchant;
use App\Repositories\Merchant\MerchantRepositoryInterface;
use Illuminate\Http\RedirectResponse;

class UpdateMerchantUseCase
{
    public function __construct(
        private readonly MerchantRepositoryInterface $merchantRepository,
    ) {}

    /**
     * @param Merchant $merchant
     * @param UpdateMerchantDTO $updateMerchantDTO
     * @return RedirectResponse
     */
    public function execute(Merchant $merchant, UpdateMerchantDTO $updateMerchantDTO): RedirectResponse
    {
        $merchant->name = $updateMerchantDTO->getName();
        $this->merchantRepository->save($merchant);

        return redirect()->route('admin.merchant.index')->with('success', __('The Merchant was successfully updated!'));
    }
}
