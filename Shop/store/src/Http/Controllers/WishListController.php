<?php

namespace Shop\Store\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Shop\Store\Services\WishListService;

class WishListController extends Controller
{
    public function __construct(protected WishListService $wishListService) {}
    public function addToWishlist(Request $request)
    {
        $productId = $request->product_id;
        $this->wishListService->addToWishList($productId);
        return back()->with('success', 'Added to wishlist');
    }

    public function userWishList()
    {
        $wishlists = $this->wishListService->userWishList();
        return view('store::user.wishlist', ['wishlists' => $wishlists]);
    }

    public function removeWishList(Request $request)
    {
        $productId = $request->product_id;
        $this->wishListService->removeWishList($productId);
        return back()->with('success', 'Removed from wishlist');
    }
}
