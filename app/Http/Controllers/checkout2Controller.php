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

        // ✅ Set step 1 as completed (if you want to auto-complete it from here)
        if (!session('checkout.step1_completed')) {
            session(['checkout.step1_completed' => true]);
        }

        // ✅ Set step 2 as completed now
        session(['checkout.step2_completed' => true]);
        

        return view('app/checkout2', compact('cartItems'));
    }
}
