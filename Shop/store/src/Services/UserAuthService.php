<?php

namespace Shop\Store\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Shop\Admin\Classes\Helper;
use Shop\Store\Mail\VerifyEmailCodeMail;
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

        $user = User::where('email', $request->email)->first();

        $code = rand(100000, 999999);
        if ($user) {
            $user->update([
                'email_verification_code' => $code,
                'email_verification_expires_at' => Carbon::now()->addMinutes(5)
            ]);
        } else {
          $user = User::create([
                'picture' => $picture,
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'email_verification_code' => $code,
                'email_verification_expires_at' => Carbon::now()->addMinutes(5)
            ]);  
        }



        Mail::to($user->email)->send(new VerifyEmailCodeMail($code));
        session(['verify_email' => $user->email]);
        return redirect()->route('user.email.verify');

        // $credentials = [
        //     'email' => $user->email,
        //     'password' => $user->password
        // ];

        // if (Auth::guard('web')->attempt($credentials)) {
        //     $request->session()->regenerate();
        //     return redirect()->intended(route($this->userProfileService->redirect))->with('status', 'welcome back!');
        // }
    }


    public function emailVerifySubmit($request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors([
                'email' => 'User not found!'
            ]);
        }

        if ($user->email_verification_code != $request->code) {
            return back()->withErrors([
                'code' => 'Invalid verification code!'
            ]);
        }

        // Expiry check
        if (now()->gt($user->email_verification_expires_at)) {

            // New code generate
            $newCode = rand(100000, 999999);

            $user->update([
                'email_verification_code' => $newCode,
                'email_verification_expires_at' => now()->addMinutes(5)
            ]);

            Mail::to($user->email)->send(new VerifyEmailCodeMail($newCode));

            return back()->withErrors([
                'code' => 'Code expired! A new verification code has been sent to your email.'
            ]);
        }

        // Success: Verify email
        $user->update([
            'email_verified_at' => now(),
            'email_verification_code' => null,
            'email_verification_expires_at' => null
        ]);

        // Optional: Auto login after verification
        Auth::login($user);
        Session::forget('verify_email');
        return redirect()->route('user.profile')
            ->with('success', 'Email verified successfully!');
    }


    public function emailResend($request) {

    }



}
