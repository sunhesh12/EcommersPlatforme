<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\UserPayment; // Ensure this model exists in the specified namespace
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    public function store(Request $request)
    {
        if ($request->has('save_card')) {
            $request->validate([
                'card_number' => 'required',
                'expiry_date' => 'required',
                'cvv' => 'required',
            ]);

            UserPayment::create([
                'euser_id'    => Auth::user()->id,
                'card_number' => Crypt::encryptString($request->card_number),
                'expiry_date' => Crypt::encryptString($request->expiry_date),
                'cvv'         => Crypt::encryptString($request->cvv),
            ]);
        }

        //     return back()->with('success', 'Payment processed.');
        // }
        // Generate 4-digit OTP
        $otp = rand(1000, 9999);

        // Store in session (you can use DB too)
        Session::put('payment_otp', $otp);

        // Send OTP to user email
        Mail::raw("Your payment OTP is: $otp", function ($message) {
            $message->to('hsdbandaranayake@gmail.com')
                ->subject('Payment OTP Verification');
        });

        return redirect()->route('verify.payment.otp')->with('success', 'OTP sent to your email.');
    }

    public function showOtpForm()
    {
        return view('app.checkout3');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate(['otp' => 'required|digits:4']);
    
        if (Session::get('payment_otp') == $request->otp) {
            Session::forget('payment_otp');
            return back()->with('success', 'Payment confirmed.');
        }
    
        return back()->with('error', 'Invalid OTP. Please try again.');
    }
    
}
