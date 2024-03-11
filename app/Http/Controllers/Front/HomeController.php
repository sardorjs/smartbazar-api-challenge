<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Admin\BaseController;
use App\Http\UseCases\Front\Home\IndexUseCase;
use Illuminate\Http\Request;

class HomeController extends BaseController
{

    public function index(
        Request $request,
        IndexUseCase $indexUseCase,
    )
    {
        return $indexUseCase->execute($request);
    }
}
