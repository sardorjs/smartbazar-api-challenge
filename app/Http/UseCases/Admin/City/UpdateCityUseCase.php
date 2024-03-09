<?php

namespace App\Http\UseCases\Admin\City;

use App\Http\DTO\Admin\City\UpdateCityDTO;
use App\Models\City;
use App\Repositories\City\CityRepositoryInterface;
use Illuminate\Http\RedirectResponse;

class UpdateCityUseCase
{
    public function __construct(
        private readonly CityRepositoryInterface $cityRepository,
    ) {}

    /**
     * @param City $city
     * @param UpdateCityDTO $updateCityDTO
     * @return RedirectResponse
     */
    public function execute(City $city, UpdateCityDTO $updateCityDTO): RedirectResponse
    {
        $city->name = $updateCityDTO->getName();
        $this->cityRepository->save($city);

        return redirect()->route('admin.city.index')->with('success', __('The City was successfully updated!'));
    }
}
