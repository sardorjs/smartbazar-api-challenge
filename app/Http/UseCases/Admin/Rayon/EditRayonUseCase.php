<?php

namespace App\Http\UseCases\Admin\Rayon;

use App\Models\Rayon;
use Illuminate\Contracts\View\View;

class EditRayonUseCase
{
    /**
     * @param Rayon $rayon
     * @return View
     */
    public function execute(Rayon $rayon): View
    {
        return view('admin.rayon.edit', compact('rayon'));
    }
}
