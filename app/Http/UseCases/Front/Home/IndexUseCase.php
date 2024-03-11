<?php

namespace App\Http\UseCases\Front\Home;

use App\Enums\ApplicationEnum;
use App\Models\Shop;
use Illuminate\Http\Request;

class IndexUseCase
{
    public function __construct()
    {
    }

    public function execute(Request $request)
    {
        $shops = Shop::query();

        $count = $shops->count();

        if ($request->has('latitude') || $request->has('longitude')) {
            $latitude = $request->query('latitude');
            $longitude = $request->query('longitude');

            $shops = $shops->selectRaw("*,
                (6371 * acos(cos(radians(?)) * cos(radians(latitude)) *
                cos(radians(longitude) - radians(?)) + sin(radians(?)) *
                sin(radians(latitude)))) AS distance",
                [$latitude, $longitude, $latitude])
                ->orderBy('distance', 'ASC');
        }

        $shops = $shops->paginate(ApplicationEnum::PAGINATION_NUMBER->value)->withQueryString();

        return view('front.index', compact('shops', 'count'));
    }
}
