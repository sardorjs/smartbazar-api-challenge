<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreShopRequest;
use App\Http\Requests\UpdateShopRequest;
use App\Http\UseCases\Admin\Shop\CreateShopUseCase;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ShopController extends BaseController
{
    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $shops = Shop::query();

        if ($request->has('name')) {
            $query_value = $request->query('name');
            $shops = $shops->where('name', 'LIKE', "%$query_value%");
        }

        $count = $shops->count();

        $shops = $shops->orderByDesc('id')->paginate(self::PAGE_NUMBER);
        return view('admin.shop.index', compact('shops', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     * @param CreateShopUseCase $createShopUseCase
     * @return View
     */
    public function create(
        CreateShopUseCase $createShopUseCase,
    ): View
    {
        return $createShopUseCase->execute();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreShopRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Shop $shop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shop $shop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateShopRequest $request, Shop $shop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shop $shop)
    {
        //
    }
}
