<?php

use App\Http\Controllers\Admin\ApiController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RayonController;
use App\Http\Controllers\Admin\MerchantController;
use App\Http\Controllers\Admin\ShopController;
use App\Http\Controllers\Front\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::name('front.')->group(function (){
    Route::get('/', [HomeController::class, 'index'])->name('index');
});

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function (){
    Route::get('/', function (){
        return view('admin.index');
    })->name('index');

    Route::resource('city', CityController::class);
    Route::resource('rayon', RayonController::class);
    Route::resource('merchant', MerchantController::class);
    Route::resource('shop', ShopController::class);

    Route::get('get-rayons-by-city-id/{city_id}', [ApiController::class, 'getRayonsByCityId'])->name('getRayonsByCityId');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
