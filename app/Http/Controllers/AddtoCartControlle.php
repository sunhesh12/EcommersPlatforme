<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddToCart;
use Illuminate\Support\Facades\Auth;

class AddtoCartControlle extends Controller
{
    public function add(Request $request)
    {
        $userId = session('user_id'); // Get the user ID from session

        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);
    
        if (!$userId) {
            return redirect('/loginn')->with('error', 'Please log in to add items to cart.');
        }
    
        AddToCart::create([
            'user_id' => $userId,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity ?? 1,
        ]);
    
        return redirect()->back()->with('success', 'Product added to cart!');
    }
    
}
