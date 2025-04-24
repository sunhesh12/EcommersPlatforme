<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\AddToCart;

class HomeController extends Controller
{
    public function index()
{
    // $products = Product::where('brand', 'Asus')
    // ->orderBy('created_at', 'desc') // latest items first
    // ->take(12) // limit to 12 items
    // ->get();
    $products = Product::latest()->take(12)->get(); // Fetch latest 12 products

    $userId = Auth::id();
    $cartProductIds = AddToCart::where('user_id', $userId)->pluck('product_id')->toArray();

    return view('app.home', compact('products', 'cartProductIds'));
    // return view('app.home', compact('products'));
}

}
