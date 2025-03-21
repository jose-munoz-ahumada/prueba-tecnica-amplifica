<?php

namespace App\Facades;

use App\Services\Cart\CartService;
use App\Services\ProductService;
use Illuminate\Support\Facades\Facade;

class Products extends Facade
{
    protected static function getFacadeAccessor()
    {
        return ProductService::class;
    }
}
