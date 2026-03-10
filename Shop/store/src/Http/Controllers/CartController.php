<?php

namespace Shop\Store\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Shop\Store\Services\CartService;

class CartController extends Controller
{
    public function __construct(protected CartService $cartService) {}
    public function addToCart($productId)
    {
        $this->cartService->addToCart($productId);
        return back()->with('success', 'Product added to cart');
    }

    public function userCart()
    {
        $data = $this->cartService->userCart();
        return view('store::user.cart', ['carts' => $data]);
    }

    public function updateCart(Request $request, $id)
    {
        $request->validate([
            'product_id' => 'required|integer',
            'quantity' => 'required|integer|min:1',
        ]);
        $this->cartService->updateCart($request, $id);
        return redirect()->back()->with('success', 'Cart updated');
    }

    public function removeFromCart(Request $request, $id)
    {
        $request->validate([
            'product_id' => 'required|integer',
        ]);
        $this->cartService->removeCart($id);
        return redirect()->back()->with('success', 'Removed from cart');
    }
    
}
