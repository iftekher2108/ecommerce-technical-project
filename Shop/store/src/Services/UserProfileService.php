<?php

namespace Shop\Store\Services;

use Illuminate\Support\Facades\Auth;

class UserProfileService {
    public $redirect = 'user.profile';

    public function userProfile() {

    }

    public function logout($request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home.login')->with('status', 'logout Successfully');
    }

}
