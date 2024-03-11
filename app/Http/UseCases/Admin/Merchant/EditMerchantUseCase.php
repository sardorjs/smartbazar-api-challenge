<?php

namespace App\Http\UseCases\Admin\Merchant;

use App\Models\Merchant;
use Illuminate\View\View;

class EditMerchantUseCase
{
    /**
     * @param Merchant $merchant
     * @return View
     */
    public function execute(Merchant $merchant): View
    {
        return view('admin.merchant.edit', compact('merchant'));
    }
}
