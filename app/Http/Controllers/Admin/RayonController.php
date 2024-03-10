<?php

namespace App\Http\Controllers\Admin;

use App\Http\DTO\Admin\Rayon\StoreRayonDTO;
use App\Http\DTO\Admin\Rayon\UpdateRayonDTO;
use App\Http\Requests\StoreRayonRequest;
use App\Http\Requests\UpdateRayonRequest;
use App\Http\UseCases\Admin\Rayon\CreateRayonUseCase;
use App\Http\UseCases\Admin\Rayon\EditRayonUseCase;
use App\Http\UseCases\Admin\Rayon\StoreRayonUseCase;
use App\Http\UseCases\Admin\Rayon\UpdateRayonUseCase;
use App\Models\Rayon;
use App\Utils\ParserUtility\Exceptions\ParseException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RayonController extends BaseController
{
   /**
     * Display a listing of the resource.
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $rayons = Rayon::query();

        if ($request->has('name')) {
            $query_value = $request->query('name');
            $rayons = $rayons->where('name', 'LIKE', "%$query_value%");
        }

        $count = $rayons->count();

        $rayons = $rayons->orderByDesc('id')->paginate(self::PAGE_NUMBER);
        return view('admin.rayon.index', compact('rayons', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     * @param CreateRayonUseCase $createRayonUseCase
     * @return View
     */
    public function create(
        CreateRayonUseCase $createRayonUseCase,
    ): View
    {
        return $createRayonUseCase->execute();
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreRayonRequest $request
     * @param StoreRayonUseCase $storeRayonUseCase
     * @return RedirectResponse
     * @throws ParseException
     */
    public function store(
        StoreRayonRequest $request,
        StoreRayonUseCase $storeRayonUseCase,
    ): RedirectResponse
    {
        return $storeRayonUseCase->execute(StoreRayonDTO::fromArray($request->validated()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Rayon $rayon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param Rayon $rayon
     * @param EditRayonUseCase $editRayonUseCase
     * @return View
     */
    public function edit(
        Rayon $rayon,
        EditRayonUseCase $editRayonUseCase,
    ): View
    {
        return $editRayonUseCase->execute($rayon);
    }

    /**
     * Update the specified resource in storage.
     * @param Rayon $rayon
     * @param UpdateRayonRequest $request
     * @param UpdateRayonUseCase $updateRayonUseCase
     * @return RedirectResponse
     * @throws ParseException
     */
    public function update(
        Rayon $rayon,
        UpdateRayonRequest $request,
        UpdateRayonUseCase $updateRayonUseCase,
    ): RedirectResponse
    {
        return $updateRayonUseCase->execute($rayon, UpdateRayonDTO::fromArray($request->validated()));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rayon $rayon)
    {
        //
    }
}
