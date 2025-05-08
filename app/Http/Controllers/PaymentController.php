<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\UserPayment; // Ensure this model exists in the specified namespace
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Models\AddToCart; // Ensure this model exists in the specified namespace

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
        $userId = session('user_id'); // session we created during login
        $cartItems = AddToCart::with('product')->where('user_id', $userId)->get();
        return view('app/checkout3', compact('cartItems'));
    }

    // public function verifyOtp(Request $request)
    // {
        
    //     $request->validate(['otp' => 'required|digits:4']);
    
    //     if (Session::get('payment_otp') == $request->otp) {
    //         Session::forget('payment_otp');
    //         return view('app.checkout4')->with('success', 'Payment confirmed.');
    //     }
    
    //     return back()->with('error', 'Invalid OTP. Please try again.');
    //     // return view('app.checkout4')->with('success', 'Payment confirmed.');
    // }

    public function verifyOtp(Request $request)
{
    // Validate input
    $request->validate([
        'otp' => 'required|digits:4|numeric',
    ], [
        'otp.required' => 'OTP is required.',
        'otp.digits'   => 'OTP must be exactly 4 digits.',
        'otp.numeric'  => 'OTP must be a number.',
    ]);

    // Explicit null check (in case field is present but empty or malformed)
    if (is_null($request->otp)) {
        return back()->with('error', 'OTP cannot be null. Please try again.');
    }

    // Check if OTP session exists
    if (!Session::has('payment_otp')) {
        return back()->with('error', 'OTP session has expired. Please try again.');
    }

    // Check if OTP matches
    if (Session::get('payment_otp') == $request->otp) {
        Session::forget('payment_otp');
        return view('app.checkout4')->with('success', 'Payment confirmed.');
    }

    // Invalid OTP
    return back()->with('error', 'Invalid OTP. Please try again.');
}

    
}
