<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class checkout3Controller extends Controller
{
    function index()
    {
        return view('app/checkout4');
    }

    public function resendOtp()
{
    $otp = rand(1000, 9999);
    Session::put('payment_otp', $otp);

    // Send new OTP by email
    Mail::raw("Your new OTP is: $otp", function ($message) {
        $message->to(Auth::user()->email)
                ->subject('Resent OTP Verification');
    });

    return back()->with('success', 'A new OTP has been sent to your email.');
}

}
