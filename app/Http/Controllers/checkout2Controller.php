<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\AddToCart; // Ensure this model exists in the specified namespace

class checkout2Controller extends Controller
{
    function index()
    {
        $userId = session('user_id'); // session we created during login
        $cartItems = AddToCart::with('product')->where('user_id', $userId)->get();
        return view('app/checkout2', compact('cartItems'));
        // return view('app/checkout1');
    }
}
