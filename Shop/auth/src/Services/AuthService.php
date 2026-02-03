<?php

namespace Shop\Auth\Services;

use Illuminate\Support\Facades\Auth;


class AuthService {

    public function login($request) {
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember_me') ? true : false;

        if (Auth::guard('admin')->attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'))->with('status', 'welcome back!');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

}