<?php

namespace Shop\Store\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Shop\Store\Services\UserProfileService;

class UserProfileController
{
    public function __construct(protected UserProfileService $userProfileService) {}
    public function userProfile()
    {
        return view('store::user.profile');
    }


    public function logout(Request $request)
    {
        $data = $this->userProfileService->logout($request);
        return $data;
    }

    /**
     * Show user profile edit page
     */
    public function editProfile()
    {
        return view('store::user.edit-profile');
    }

    /**
     * Update user profile
     */
    public function updateProfile(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
        ]);

        Auth::user()->update($validated);
        return redirect()->route('user.profile')->with('success', 'Profile updated successfully');
    }

    /**
     * Show user wishlist
     */
    public function userWishlist()
    {
        return view('store::user.wishlist');
    }

    /**
     * Add to wishlist
     */
    public function addToWishlist(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|integer',
        ]);

        // Add to wishlist logic
        return redirect()->back()->with('success', 'Added to wishlist');
    }

    /**
     * Remove from wishlist
     */
    public function removeFromWishlist(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|integer',
        ]);

        // Remove from wishlist logic
        return redirect()->back()->with('success', 'Removed from wishlist');
    }


    /**
     * Show checkout page
     */
    public function userCheckout()
    {
        return view('store::user.checkout');
    }

    /**
     * Process checkout
     */
    public function processCheckout(Request $request)
    {
        $validated = $request->validate([
            'address_id' => 'required|integer',
            'payment_method' => 'required|string',
        ]);

        // Process checkout logic
        return redirect()->route('profile.orders')->with('success', 'Order placed successfully');
    }

    /**
     * Show user orders
     */
    public function userOrders()
    {
        return view('store::user.orders');
    }

    /**
     * View specific order
     */
    public function viewOrder($id)
    {
        return view('store::user.order-details', ['order_id' => $id]);
    }

    /**
     * Show user saved addresses
     */
    public function userAddresses()
    {
        return view('store::user.addresses');
    }

    /**
     * Add new address
     */
    public function addAddress(Request $request)
    {
        $validated = $request->validate([
            'address' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'zip_code' => 'required|string',
            'country' => 'required|string',
        ]);

        // Add address logic
        return redirect()->back()->with('success', 'Address added successfully');
    }

    /**
     * Update address
     */
    public function updateAddress(Request $request)
    {
        $validated = $request->validate([
            'address_id' => 'required|integer',
            'address' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'zip_code' => 'required|string',
            'country' => 'required|string',
        ]);

        // Update address logic
        return redirect()->back()->with('success', 'Address updated successfully');
    }

    /**
     * Delete address
     */
    public function deleteAddress(Request $request)
    {
        $validated = $request->validate([
            'address_id' => 'required|integer',
        ]);

        // Delete address logic
        return redirect()->back()->with('success', 'Address deleted successfully');
    }

    /**
     * Show account settings
     */
    public function userSettings()
    {
        return view('store::user.settings');
    }

    /**
     * Update password
     */
    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'current_password' => 'required|current_password',
            'password' => 'required|string|min:8|confirmed',
        ]);

        Auth::user()->update([
            'password' => bcrypt($validated['password']),
        ]);

        return redirect()->back()->with('success', 'Password updated successfully');
    }
}
