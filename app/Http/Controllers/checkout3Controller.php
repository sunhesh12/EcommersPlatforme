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

    // In checkout3Controller.php (after successful OTP entry)
public function verifyOtp(Request $request)
{
    if (Session::get('payment_otp') == $request->otp) {
        session(['checkout.step3_completed' => true]);
        session(['checkout.step4_completed' => true]);
        Session::forget('payment_otp');
        return redirect()->route('user.checkout4')->with('success', 'Payment confirmed.');
    }

    return back()->with('error', 'Invalid OTP.');
}
}
