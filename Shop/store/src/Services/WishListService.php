<?php

namespace Shop\Store\Services;

use Illuminate\Support\Facades\Auth;
use Shop\Store\Models\WishList;

class WishListService
{
    public $redirect = 'profile.wishlist';

    public function addToWishList($productId)
    {
        WishList::firstOrCreate([
            'user_id' => Auth::id(),
            'product_id' => $productId
        ]);
    }

    public function userWishList()
    {
        $wishLists = WishList::with('product')
            ->where('user_id', Auth::id())
            ->get();
        return $wishLists;
    }

    public function removeWishList($productId)
    {
        $wishList = WishList::where('user_id', Auth::id())
            ->where('product_id', $productId)
            ->firstOrFail();
        $wishList->delete();
    }
}
