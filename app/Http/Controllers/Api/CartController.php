<?php


namespace App\Http\Controllers\Api;

use App\Http\Requests\CartRequest;
use App\Services\CartService;
use Illuminate\Http\Request;

class CartController
{
    public function update(CartRequest $request, CartService $cart) {
        $data = $request->validated();
        if ($data['action'] == 'delete') {
            $updated = $cart->removeFromCart($data['product_id']);
        } else {
            $updated = $cart->addToCart($data['product_id']);
        }

        return response()->json([
            'success' => $updated,
            'message' => $updated ? 'Carrito actualizado' : 'No hubo cambios en el carrito'
        ]);
    }
}
