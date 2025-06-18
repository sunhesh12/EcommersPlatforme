<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddToCart;

class checkout2Controller extends Controller
{
    public function index()
    {
        $userId = session('user_id'); // your custom user session
        $cartItems = AddToCart::with('product')->where('user_id', $userId)->get();
        return view('app/checkout2', compact('cartItems'));
    }

    // In checkout2Controller.php
public function submitStep2(Request $request)
{
    // Process form...
    session(['checkout.step2_completed' => true]);
    return redirect()->route('user.checkout3');
}
}
