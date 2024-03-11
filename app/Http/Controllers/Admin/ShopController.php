<?php

namespace App\Http\Controllers\Admin;

use App\Http\DTO\Admin\Shop\StoreShopDTO;
use App\Http\DTO\Admin\Shop\UpdateShopDTO;
use App\Http\Requests\StoreShopRequest;
use App\Http\Requests\UpdateShopRequest;
use App\Http\UseCases\Admin\Shop\CreateShopUseCase;
use App\Http\UseCases\Admin\Shop\EditShopUseCase;
use App\Http\UseCases\Admin\Shop\StoreShopUseCase;
use App\Http\UseCases\Admin\Shop\UpdateShopUseCase;
use App\Models\Shop;
use App\Utils\ParserUtility\Exceptions\ParseException;
use Illuminate\Http\RedirectResponse;
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
     * @param StoreShopRequest $request
     * @param StoreShopUseCase $storeRayonUseCase
     * @return RedirectResponse
     * @throws ParseException
     */
    public function store(
        StoreShopRequest $request,
        StoreShopUseCase $storeRayonUseCase,
    ): RedirectResponse
    {
        $status = $request->boolean('status');
        return $storeRayonUseCase->execute(StoreShopDTO::fromArray($request->validated()), status: $status);
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
     * @param Shop $shop
     * @param EditShopUseCase $editShopUseCase
     * @return View
     */
    public function edit(
        Shop $shop,
        EditShopUseCase $editShopUseCase,
    ): View
    {
        return $editShopUseCase->execute($shop);
    }

    /**
     * Update the specified resource in storage.
     * @param Shop $shop
     * @param UpdateShopRequest $request
     * @param UpdateShopUseCase $updateShopUseCase
     * @return RedirectResponse
     * @throws ParseException
     */
    public function update(
        Shop $shop,
        UpdateShopRequest $request,
        UpdateShopUseCase $updateShopUseCase,
    ): RedirectResponse
    {
        $status = $request->boolean('status');
        return $updateShopUseCase->execute($shop, UpdateShopDTO::fromArray($request->validated()), $status);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shop $shop)
    {
        //
    }
}
