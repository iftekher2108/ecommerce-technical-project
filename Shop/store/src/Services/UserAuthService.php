<?php

namespace Shop\Store\Services;

use Illuminate\Support\Facades\Auth;
use Shop\Admin\Classes\Helper;
use Shop\User\Models\User;

class UserAuthService
{

    public function __construct(protected UserProfileService $userProfileService) {}
    public function loginStore($request)
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember_me') ? true : false;

        if (Auth::guard('web')->attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended(route($this->userProfileService->redirect))->with('status', 'welcome back!');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function registerStore($request)
    {
        $picture = null;
        if ($request->picture) {
            $picture = Helper::fileUpload('user', 'user', $request->picture);
        }

        if ($request->password !== $request->confirm_password) {
            return back()->withErrors([
                'password' => 'Password not match to Confirm Password!',
            ]);
        }

        $user = User::create([
            'picture' => $picture,
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        $credentials = [
            'email' => $user->email,
            'password' => $user->password
        ];

        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route($this->userProfileService->redirect))->with('status', 'welcome back!');
        }
        return back();
        
    }
}
