<?php

namespace App\Http\UseCases\Admin\Rayon;

use App\Http\DTO\Admin\Rayon\UpdateRayonDTO;
use App\Models\Rayon;
use App\Repositories\Rayon\RayonRepositoryInterface;
use Illuminate\Http\RedirectResponse;

class UpdateRayonUseCase
{
    public function __construct(
        private readonly RayonRepositoryInterface $rayonRepository,
    ) {}

    /**
     * @param Rayon $rayon
     * @param UpdateRayonDTO $updateRayonDTO
     * @return RedirectResponse
     */
    public function execute(Rayon $rayon, UpdateRayonDTO $updateRayonDTO): RedirectResponse
    {
        $rayon->name = $updateRayonDTO->getName();
        $this->rayonRepository->save($rayon);

        return redirect()->route('admin.rayon.index')->with('success', __('The Rayon was successfully updated!'));
    }
}
