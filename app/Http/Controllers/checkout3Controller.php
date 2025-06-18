<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class checkout3Controller extends Controller
{
    public function index()
    {
        // ✅ Mark step 3 as completed (if viewing the page is enough)
        session(['checkout.step3_completed' => true]);

        return view('app/checkout3'); // fixed view name
    }

    public function resendOtp()
    {
        $otp = rand(1000, 9999);
        Session::put('payment_otp', $otp);

        // ✅ Send OTP to authenticated user's email
        Mail::raw("Your new OTP is: $otp", function ($message) {
            $message->to(Auth::user()->email)
                    ->subject('Resent OTP Verification');
        });

        return back()->with('success', 'A new OTP has been sent to your email.');
    }
}
