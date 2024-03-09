<?php

namespace App\Http\UseCases\Admin\Rayon;

use Illuminate\Contracts\View\View;

class CreateRayonUseCase
{
    /**
     * @return View
     */
    public function execute(): View
    {
        return view('admin.rayon.create');
    }
}
