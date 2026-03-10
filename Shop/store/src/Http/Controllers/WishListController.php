<?php

namespace Shop\Store\Http\Controllers;

use App\Http\Controllers\Controller;
use Shop\Store\Services\WishListService;

class WishListController extends Controller
{
    public function __construct(protected WishListService $wishListService) {}
    public function addToWishlist($productId)
    {
        $this->wishListService->addToWishList($productId);
        return back()->with('success', 'Added to wishlist');
    }

    public function userWishList()
    {
        $wishLists = $this->wishListService->userWishList();
        return view('store::user.wishlist', ['wishLists' => $wishLists]);
    }

    public function removeWishList($productId)
    {
        $this->wishListService->removeWishList($productId);
        return back()->with('success', 'Removed from wishlist');
    }
}
