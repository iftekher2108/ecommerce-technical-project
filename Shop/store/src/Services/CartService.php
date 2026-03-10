<?php

namespace Shop\Store\Services;

use Illuminate\Support\Facades\Auth;
use Shop\Store\Models\Cart;

class CartService
{
    public $redirect = 'profile.cart';

    public function addToCart($productId)
    {
        $userId = Auth::id();
        $cart = Cart::where('user_id', $userId)
            ->where('product_id', $productId)
            ->first();
        if ($cart) {
            $cart->increment('quantity');
        } else {
            Cart::create([
                'user_id' => $userId,
                'product_id' => $productId,
                'quantity' => 1
            ]);
        }
    }

    public function userCart()
    {
        $carts = Cart::with('product')
            ->where('user_id', Auth::id())
            ->get();
        return $carts;
    }

    public function updateCart($request, $id)
    {
        $cart = Cart::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $cart->update([
            'quantity' => $request->quantity
        ]);
    }

    public function removeCart($id)
    {
        $cart = Cart::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();
        $cart->delete();
    }
}
