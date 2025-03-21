<?php

use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\ShippingController;
use App\Http\Controllers\Pages\CartPageController;
use App\Http\Controllers\Pages\HomeController;
use App\Http\Controllers\Pages\ProductPageController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');
//Route::get('/product/{slug}', ProductPageController::class)->name('product.show'); // TODO: mostrar pagina individual
Route::get('/cart', CartPageController::class)->name('cart');

Route::prefix('api')->group(function () {
    Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
    Route::prefix('shipping')->group(function () {
        Route::get('/getRegions', [ShippingController::class, 'getRegions'])->name('shipping.regions');
        Route::post('/getRates', [ShippingController::class, 'getRates'])->name('shipping.rates');
    });
});
