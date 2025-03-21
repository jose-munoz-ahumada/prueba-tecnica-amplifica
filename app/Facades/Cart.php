<?php

namespace App\Facades;

use App\Models\Product;
use App\Services\CartService;
use Illuminate\Support\Facades\Facade;

/**
 * @method static get()
 * @method static add(Product $product, $quantity)
 */
class Cart extends Facade
{
    protected static function getFacadeAccessor()
    {
        return CartService::class;
    }
}
