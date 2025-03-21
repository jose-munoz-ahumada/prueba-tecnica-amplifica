<?php

namespace App\Http\Controllers\Pages;

use App\Contracts\ShippingApiInterface;
use App\Facades\Products;
use App\Http\Controllers\Controller;
use App\Http\Resources\CartResource;
use App\Services\CartService;
use Illuminate\Http\Resources\Json\JsonResource;

class CartPageController extends Controller
{
    public function __construct(protected CartService $cart, protected ShippingApiInterface $shipping)
    {
    }

    public function __invoke()
    {
        $cart = $this->cart->getCart();
        return view('pages.cart', [
            'cart' => $cart
        ]);
    }
}
