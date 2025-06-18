<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Models\UserPayment;
use App\Models\AddToCart;

class PaymentController extends Controller
{
    /**
     * Save payment data and send OTP
     */
    public function store(Request $request)
    {
        // Optional: Save card if checkbox is ticked
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

        // Generate OTP
        $otp = rand(1000, 9999);
        Session::put('payment_otp', $otp);
        Session::put('otp_attempts', 0); // reset attempts

        // Send OTP to email
        Mail::raw("Your payment OTP is: $otp", function ($message) {
            $message->to(Auth::user()->email)
                    ->subject('Payment OTP Verification');
        });

        return redirect()->route('verify.payment.otp')->with('success', 'OTP sent to your email.');
    }

    /**
     * Show OTP verification form
     */
    public function showOtpForm()
    {
        $userId = session('user_id');
        $cartItems = AddToCart::with('product')->where('user_id', $userId)->get();

        return view('app.checkout3', compact('cartItems'));
    }

    /**
     * Verify OTP submitted by user
     */
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|digits:4|numeric',
        ], [
            'otp.required' => 'OTP is required.',
            'otp.digits'   => 'OTP must be exactly 4 digits.',
            'otp.numeric'  => 'OTP must be a number.',
        ]);

        // Null check
        if (is_null($request->otp)) {
            return back()->with('error', 'OTP cannot be null. Please try again.');
        }

        // OTP expired
        if (!Session::has('payment_otp')) {
            return back()->with('error', 'OTP session has expired. Please request a new one.');
        }

        // Track OTP attempts
        if (!Session::has('otp_attempts')) {
            Session::put('otp_attempts', 0);
        }

        if (Session::get('otp_attempts') >= 5) {
            return back()->with('error', 'Too many failed attempts. Please request a new OTP.');
        }

        // Match OTP
        if (Session::get('payment_otp') == $request->otp) {
            Session::forget('payment_otp');
            Session::forget('otp_attempts');

            // ✅ Mark step 4 as completed
            session(['checkout.step4_completed' => true]);

            // Optional: clear all step data after successful order
            // session()->forget('checkout');

            return view('app.checkout4')->with('success', 'Payment confirmed.');
        }

        // Wrong OTP, increment attempts
        Session::increment('otp_attempts');
        return back()->with('error', 'Invalid OTP. Please try again.');
    }
}
