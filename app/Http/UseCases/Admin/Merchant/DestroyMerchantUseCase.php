<?php

namespace App\Http\UseCases\Admin\Merchant;

use App\Models\Merchant;
use Illuminate\Http\RedirectResponse;

class DestroyMerchantUseCase
{
    /**
     * @param Merchant $merchant
     * @return RedirectResponse
     */
    public function execute(Merchant $merchant): RedirectResponse
    {
        $merchant->delete();
        return redirect()->route('admin.merchant.index')->with('success', __('The Merchant was successfully deleted!'));
    }
}
