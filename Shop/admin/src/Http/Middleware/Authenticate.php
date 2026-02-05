<?php

namespace Shop\Admin\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\Authenticate as Middleware;


class Authenticate extends Middleware
{
    /**
     * Handle an incoming request.
     */
    protected function redirectTo(Request $request)
    {
          // যদি request JSON না হয় (API না হয়)
        if (! $request->expectsJson()) {
            // যদি admin guard দিয়ে authenticated না হয়
            if (!Auth::guard('admin')->check() ) {
                return route('auth.login'); // <-- তোমার login route
            }
            // যদি সাধারণ user guard (web) চেক ফেল করে
            if (! Auth::check()) {
                return url('/'); // Normal user login route
            }
        }
    }
}