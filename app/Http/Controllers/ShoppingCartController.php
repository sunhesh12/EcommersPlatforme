<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddToCart; 

class ShoppingCartController extends Controller
{
    public function index()
    {
        $userId = session('user_id'); // session we created during login
        $cartItems = AddToCart::with('product')->where('user_id', $userId)->get();
        return view('app.ShoppingCart', compact('cartItems'));
    }

    // Update quantity
    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'quantity' => 'required|integer|min:1'
        ]);

        $cartItem = AddToCart::find($request->id);
        if ($cartItem) {
            $cartItem->quantity = $request->quantity;
            $cartItem->save();
        }

        return redirect()->route('cart')->with('success', 'Cart updated successfully!');
    }

    // Remove item
    public function remove(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
        ]);

        AddToCart::destroy($request->id);

        return redirect()->route('user.cart')->with('success', 'Item removed successfully!');
    }

    public function clearCart()
    {
        $userId = session('user_id'); // Assuming you store logged-in user id in session

        if (!$userId) {
            return redirect()->back()->with('error', 'User not logged in.');
        }

        AddToCart::where('user_id', $userId)->delete();

        return redirect()->back()->with('success', 'Cart cleared successfully.');
    }
}
