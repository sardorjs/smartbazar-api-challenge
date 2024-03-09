<?php

namespace App\Http\UseCases\Admin\City;

use App\Http\DTO\Admin\City\StoreCityDTO;
use App\Models\City;
use App\Repositories\City\CityRepositoryInterface;
use Illuminate\Http\RedirectResponse;

class StoreCityUseCase
{
    public function __construct(
        private readonly CityRepositoryInterface $cityRepository,
    ) {}

    /**
     * @param StoreCityDTO $storeCityDTO
     * @return RedirectResponse
     */
    public function execute(StoreCityDTO $storeCityDTO): RedirectResponse
    {
        $city = new City();
        $city->name = $storeCityDTO->getName();
        $this->cityRepository->save($city);

        return redirect()->route('admin.city.index')->with('success', __('The City was successfully created!'));
    }
}
