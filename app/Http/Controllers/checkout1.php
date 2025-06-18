<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddToCart;

class checkout1 extends Controller
{
    public function index()
    {
        $userId = session('user_id');
        $cartItems = AddToCart::with('product')->where('user_id', $userId)->get();
        return view('app/checkout1', compact('cartItems'));
    }

    public function submitStep1(Request $request)
    {
        // Process form...
        session(['checkout.step1_completed' => true]);
        return redirect()->route('user.checkout2');
    }
}
