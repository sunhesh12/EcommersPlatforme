<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    // Show cart items
    // public function index()
    // {
    //     $cart = session()->get('cart', []);
    //     $products = [];

    //     // Fetch full product details for each item
    //     foreach ($cart as $id => $item) {
    //         $product = Product::find($id);
    //         if ($product) {
    //             $product->cart_quantity = $item['quantity'];
    //             $products[] = $product;
    //         }
    //     }

    //     return view('app.Home', compact('products'));
    // }

    public function index()
{
    $cart = session()->get('cart', []);
    $products = [];

    foreach ($cart as $id => $item) {
        $product = Product::find($id);
        if ($product) {
            $product->cart_quantity = $item['quantity'];
            $products[] = $product;
        }
    }

    $cartProductIds = array_keys($cart); // ✅ Important line

    return view('app.Home', compact('products', 'cartProductIds'));
}


    // Add product to cart
    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'name' => $product->product_name,
                'price' => $product->price,
                'quantity' => 1
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart!');
    }

    // Remove item from cart
    public function remove($id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Product removed from cart.');
    }

    // Clear entire cart
    public function clear()
    {
        session()->forget('cart');
        return redirect()->back()->with('success', 'Cart cleared.');
    }
}
