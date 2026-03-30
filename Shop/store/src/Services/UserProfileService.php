<?php

namespace Shop\Store\Services;

use Illuminate\Support\Facades\Auth;
use Shop\User\Models\UserAddress;

class UserProfileService
{
    public $redirect = 'user.profile';

    public function userProfile() {}

    public function logout($request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home.login')->with('status', 'logout Successfully');
    }




    public function createAddress($request)
    {
        if($request->is_default == 1) {
            UserAddress::where('user_id', Auth::id())->where('type',$request->type)->update([
                'is_default' => 0
            ]);
        }

        UserAddress::create([
            'user_id' => Auth::id(),
            'type' => $request->type,
            'full_name' => $request->full_name,
            'phone' => $request->phone,
            'address_line1' => $request->address_line1,
            'address_line2' => $request->address_line2,
            'city' => $request->city,
            'state' => $request->state,
            'postal_code' => $request->postal_code,
            'country' => $request->country,
            'is_default' => $request->has('is_default'),
        ]);
    }

    public function updateAddress($request, $id)
    {


        UserAddress::create([
            'user_id' => Auth::id(),
            'type' => $request->type,
            'full_name' => $request->full_name,
            'phone' => $request->phone,
            'address_line1' => $request->address_line1,
            'address_line2' => $request->address_line2,
            'city' => $request->city,
            'state' => $request->state,
            'postal_code' => $request->postal_code,
            'country' => $request->country,
            'is_default' => $request->has('is_default'),
        ]);
    }
}
