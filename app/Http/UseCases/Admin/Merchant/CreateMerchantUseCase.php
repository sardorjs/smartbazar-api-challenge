<?php

namespace App\Http\UseCases\Admin\Merchant;

use Illuminate\Contracts\View\View;

class CreateMerchantUseCase
{
    /**
     * @return View
     */
    public function execute(): View
    {
        return view('admin.merchant.create');
    }
}
