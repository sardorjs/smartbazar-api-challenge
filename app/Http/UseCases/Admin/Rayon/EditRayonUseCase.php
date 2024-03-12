<?php

namespace App\Http\UseCases\Admin\Rayon;

use App\Models\City;
use App\Models\Rayon;
use App\Repositories\City\CityRepositoryInterface;
use Illuminate\View\View;

class EditRayonUseCase
{
    public function __construct(
        private readonly CityRepositoryInterface $cityRepository,
    ) { }

    /**
     * @param Rayon $rayon
     * @return View
     */
    public function execute(Rayon $rayon): View
    {
        $cities = $this->cityRepository->getAllOrderedByIdDesc();

        return view('admin.rayon.edit', compact('rayon', 'cities'));
    }
}
