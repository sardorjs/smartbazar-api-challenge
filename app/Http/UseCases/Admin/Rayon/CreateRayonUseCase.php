<?php

namespace App\Http\UseCases\Admin\Rayon;

use App\Repositories\City\CityRepositoryInterface;
use Illuminate\Contracts\View\View;

class CreateRayonUseCase
{
    public function __construct(
        private readonly CityRepositoryInterface $cityRepository,
    ) { }

    /**
     * @return View
     */
    public function execute(): View
    {
        $cities = $this->cityRepository->getAllOrderedByIdDesc();

        return view('admin.rayon.create', compact('cities'));
    }
}
