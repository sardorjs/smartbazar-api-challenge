<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreRayonRequest;
use App\Http\Requests\UpdateRayonRequest;
use App\Http\UseCases\Admin\Rayon\CreateRayonUseCase;
use App\Models\Rayon;
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
     */
    public function store(StoreRayonRequest $request)
    {
        //
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
     */
    public function edit(Rayon $rayon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRayonRequest $request, Rayon $rayon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rayon $rayon)
    {
        //
    }
}
