<?php


namespace App\Http\Controllers\Api;

use App\Contracts\ShippingApiInterface;
use App\Http\Requests\CartRequest;
use App\Http\Requests\ShippingRatesRequest;
use App\Services\CartService;
use Illuminate\Http\Request;

class ShippingController
{
    public function __construct(protected ShippingApiInterface $shipping) {}

    public function getRegions() {
        return $this->shipping->getRegions();
    }

    public function getRates(CartService $cart, ShippingRatesRequest $request) {
        $data = $request->validated();
        $rates = $this->shipping->getRates($cart->getCart(true), $data['comuna']);
        return response()->json([
            'html' => view('partials.rates', compact('rates'))->render()
        ]);
    }
}
