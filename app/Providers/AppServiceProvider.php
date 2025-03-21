<?php

namespace App\Providers;

use App\Contracts\CartContract;
use App\Contracts\ProductContract;
use App\Contracts\ShippingApiInterface;
use App\Services\Amplifica\AmplificaService;
use App\Services\CartService;
use App\Services\ProductService;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->bind(CartContract::class, CartService::class);
        $this->app->bind(ProductContract::class, ProductService::class);
        $this->app->bind(ShippingApiInterface::class, AmplificaService::class);
    }
}
