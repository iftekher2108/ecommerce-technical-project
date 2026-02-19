<?php

namespace Shop\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Shop\Auth\Services\AuthService;

class AuthController extends Controller
{

    public function __construct(protected AuthService $authService) {}
    /**
     * Display a listing of the resource.
     */
    public function login_form()
    {
        return view("auth::login");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'min:8'],
        ]);
        $data = $this->authService->login($request);
        return $data;
    }


    public function logout(Request $request)
    {
        Auth::guard("admin")->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.login')->with('status', 'logout Successfully');
    }
}
