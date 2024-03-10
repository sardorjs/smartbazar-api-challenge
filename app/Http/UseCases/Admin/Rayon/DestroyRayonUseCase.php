<?php

namespace App\Http\UseCases\Admin\Rayon;

use App\Models\Rayon;
use Illuminate\Http\RedirectResponse;

class DestroyRayonUseCase
{
    /**
     * @param Rayon $rayon
     * @return RedirectResponse
     */
    public function execute(Rayon $rayon): RedirectResponse
    {
        $rayon->delete();
        return redirect()->route('admin.rayon.index')->with('success', __('The Rayon was successfully deleted!'));
    }
}
