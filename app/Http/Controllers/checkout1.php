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

        // ✅ Mark step 1 as completed (if visiting the page is enough)
        session(['checkout.step1_completed' => true]);
        

        return view('app/checkout1', compact('cartItems'));
    }
}
