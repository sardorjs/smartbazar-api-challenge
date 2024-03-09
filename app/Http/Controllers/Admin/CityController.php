<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreCityRequest;
use App\Http\Requests\UpdateCityRequest;
use App\Http\UseCases\Admin\City\CreateCityUseCase;
use App\Http\UseCases\Admin\City\StoreCityUseCase;
use App\Models\City;
use Illuminate\Contracts\View\View;
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

        $cities = $cities->paginate(self::PAGE_NUMBER);
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
     */
    public function store(
        StoreCityRequest $request,
        StoreCityUseCase $storeCityUseCase,
    ):
    {
        return $storeCityUseCase->execute();
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
     */
    public function edit(City $city)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCityRequest $request, City $city)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        //
    }
}
