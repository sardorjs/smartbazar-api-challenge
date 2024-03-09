<?php

namespace App\Http\Controllers\Admin;

use App\Http\DTO\Admin\City\StoreCityDTO;
use App\Http\DTO\Admin\City\UpdateCityDTO;
use App\Http\Requests\StoreCityRequest;
use App\Http\Requests\UpdateCityRequest;
use App\Http\UseCases\Admin\City\CreateCityUseCase;
use App\Http\UseCases\Admin\City\EditCityUseCase;
use App\Http\UseCases\Admin\City\StoreCityUseCase;
use App\Http\UseCases\Admin\City\UpdateCityUseCase;
use App\Models\City;
use App\Utils\ParserUtility\Exceptions\ParseException;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CityController extends BaseController
{
    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $cities = City::query();

        if ($request->has('name')) {
            $query_value = $request->query('name');
            $cities = $cities->where('name', 'LIKE', "%$query_value%");
        }

        $count = $cities->count();

        $cities = $cities->orderByDesc('id')->paginate(self::PAGE_NUMBER);
        return view('admin.city.index', compact('cities', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     * @param CreateCityUseCase $createCityUseCase
     * @return View
     */
    public function create(
        CreateCityUseCase $createCityUseCase,
    ): View
    {
        return $createCityUseCase->execute();
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreCityRequest $request
     * @param StoreCityUseCase $storeCityUseCase
     * @return RedirectResponse
     * @throws ParseException
     */
    public function store(
        StoreCityRequest $request,
        StoreCityUseCase $storeCityUseCase,
    ): RedirectResponse
    {
        return $storeCityUseCase->execute(StoreCityDTO::fromArray($request->validated()));
    }

    /**
     * Display the specified resource.
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param City $city
     * @param EditCityUseCase $editCityUseCase
     * @return View
     */
    public function edit(
        City $city,
        EditCityUseCase $editCityUseCase,
    ): View
    {
        return $editCityUseCase->execute($city);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        UpdateCityRequest $request,
        City $city,
        UpdateCityUseCase $updateCityUseCase,
    ) {
        return $updateCityUseCase->execute($city, UpdateCityDTO::fromArray($request->validated()));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        //
    }
}
