<?php

namespace Shop\Store\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Shop\Store\Models\WishList;

class WishListController extends Controller
{
    public function addToWishlist($productId)
    {
        WishList::firstOrCreate([
            'user_id' => Auth::id(),
            'product_id' => $productId
        ]);

        return back()->with('success', 'Added to wishlist');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(WishList $wishList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WishList $wishList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WishList $wishList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WishList $wishList)
    {
        //
    }
}
