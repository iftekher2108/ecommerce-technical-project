<?php

namespace Shop\Store\Services;

use Illuminate\Support\Facades\Auth;
use Shop\Store\Models\Cart;

class CartService
{
    public $redirect = 'profile.cart';

    public function addToCart($request)
    {
        $userId = Auth::id();
        $cart = Cart::where('user_id', $userId)
            ->where('product_id', $request->product_id)
            ->first();
        if ($cart) {
            $qty = $request->quantity ?? 1;
            $cart->increment('quantity', $qty);
        } else {
            Cart::create([
                'user_id' => $userId,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity ?? 1
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

    public function updateCart($request)
    {
        $cart = Cart::where('product_id', $request->product_id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $cart->update([
            'quantity' => $request->quantity
        ]);
    }

    public function removeCart($request)
    {
        $cart = Cart::where('product_id', $request->product_id)
            ->where('user_id', Auth::id())
            ->firstOrFail();
        $cart->delete();
    }
}
