<?php

namespace App\Http\UseCases\Admin\Rayon;

use App\Http\DTO\Admin\Rayon\StoreRayonDTO;
use App\Models\Rayon;
use App\Repositories\Rayon\RayonRepositoryInterface;
use Illuminate\Http\RedirectResponse;

class StoreRayonUseCase
{
    public function __construct(
        private readonly RayonRepositoryInterface $rayonRepository,
    ) {}

    /**
     * @param StoreRayonDTO $storeRayonDTO
     * @return RedirectResponse
     */
    public function execute(StoreRayonDTO $storeRayonDTO): RedirectResponse
    {
        $rayon = new Rayon();
        $rayon->city_id = $storeRayonDTO->getCityId();
        $rayon->name = $storeRayonDTO->getName();
        $this->rayonRepository->save($rayon);

        return redirect()->route('admin.rayon.index')->with('success', __('The Rayon was successfully created!'));
    }
}
