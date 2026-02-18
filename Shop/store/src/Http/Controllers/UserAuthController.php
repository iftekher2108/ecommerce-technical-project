<?php

namespace Shop\Store\Http\Controllers;

use Illuminate\Http\Request;
use Shop\Store\Services\UserAuthService;

class UserAuthController
{
    public function __construct(protected UserAuthService $userAuthService) {}
    public function login()
    {
        return view('store::auth.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function loginStore(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);
        // dd($request->all());
        $data = $this->userAuthService->loginStore($request);
        return $data;
    }



    public function register()
    {
        return view('store::auth.register');
    }


    public function registerStore(Request $request)
    {
        $request->validate([
            'picture' => 'nullable|image|max:2048',
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'confirm_password' => 'required|min:8'
        ]);
        $data = $this->userAuthService->registerStore($request);
        return $data;
    }
}
