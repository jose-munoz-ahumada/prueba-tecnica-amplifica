<?php

namespace App\Services;

use App\Contracts\CartContract;
use App\Models\Cart;
use App\Models\CartProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartService implements CartContract
{
    public function getCart($with_products = true)
    {
        $cartId = Session::get('cart_id');

        if (!$cartId) {
            $cart = $this->createCart();
            Session::put('cart_id', $cart->id);
        } else {
            $cart = Cart::find($cartId);
        }

        if ($with_products && $cart) {
            $cart->load('products');
        }

        return $cart;
    }

    public function createCart()
    {
        $cart = Cart::create([
            'user_id' => Auth::id(),
        ]);

        Session::put('cart_id', $cart->id);
        return $cart;
    }

    public function addToCart($productId, $quantity = 1)
    {
        $cart = $this->getCart();

        $cartProduct = CartProduct::where('cart_id', $cart->id)
            ->where('product_id', $productId)
            ->first();

        if ($cartProduct) {
            $cartProduct->increment('quantity', $quantity);
            return true;
        } else {
            return CartProduct::create([
                'cart_id' => $cart->id,
                'product_id' => $productId,
                'quantity' => $quantity,
            ]);
        }
    }

    public function removeFromCart($productId)
    {
        $cart = $this->getCart();

        return CartProduct::where('cart_id', $cart->id)
            ->where('product_id', $productId)
            ->delete();
    }

    public function clearCart()
    {
        $cart = $this->getCart();
        return CartProduct::where('cart_id', $cart->id)->delete();
    }

    public function migrateCartToUser()
    {
        if (Auth::check()) {
            $cart = $this->getCart();
            $cart->update(['user_id' => Auth::id()]);
        }
    }

}
