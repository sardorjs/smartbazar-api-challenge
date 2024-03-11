<?php

namespace App\Http\Controllers\Admin;

use App\Http\DTO\Admin\Merchant\StoreMerchantDTO;
use App\Http\Requests\StoreMerchantRequest;
use App\Http\Requests\UpdateMerchantRequest;
use App\Http\UseCases\Admin\Merchant\CreateMerchantUseCase;
use App\Http\UseCases\Admin\Merchant\StoreMerchantUseCase;
use App\Models\Merchant;
use App\Utils\ParserUtility\Exceptions\ParseException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MerchantController extends BaseController
{
    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $merchants = Merchant::query();

        if ($request->has('name')) {
            $query_value = $request->query('name');
            $merchants = $merchants->where('name', 'LIKE', "%$query_value%");
        }

        $count = $merchants->count();

        $merchants = $merchants->orderByDesc('id')->paginate(self::PAGE_NUMBER);
        return view('admin.merchant.index', compact('merchants', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     * @param CreateMerchantUseCase $createMerchantUseCase
     * @return View
     */
    public function create(
        CreateMerchantUseCase $createMerchantUseCase,
    ): View
    {
        return $createMerchantUseCase->execute();
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreMerchantRequest $request
     * @param StoreMerchantUseCase $storeCityUseCase
     * @return RedirectResponse
     * @throws ParseException
     */
    public function store(
        StoreMerchantRequest $request,
        StoreMerchantUseCase $storeCityUseCase,
    ): RedirectResponse
    {
        $status = $request->boolean('status');
        return $storeCityUseCase->execute(StoreMerchantDTO::fromArray($request->validated()), $status);
    }

    /**
     * Display the specified resource.
     */
    public function show(Merchant $merchant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Merchant $merchant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMerchantRequest $request, Merchant $merchant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Merchant $merchant)
    {
        //
    }
}
