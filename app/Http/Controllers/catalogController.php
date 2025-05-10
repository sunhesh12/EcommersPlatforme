<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\AddToCart;
use App\Models\Brand;

class catalogController extends Controller
{
    public function index()
    {
        // $products = Product::where('brand', 'Asus')
        // ->orderBy('created_at', 'desc') // latest items first
        // ->take(12) // limit to 12 items
        // ->get();
        $products = Product::latest()->take(12)->get(); // Fetch latest 12 products
    
        $userId = Auth::id();
        // $cartProductIds = AddToCart::where('user_id', $userId)->pluck('product_id')->toArray();
        $cartProductIds = [];
    
        if (Auth::check()) {
            $cartProductIds = AddToCart::where('user_id', Auth::id())->pluck('product_id')->toArray();
        }
        
        return view('app.catalog01', compact('products', 'cartProductIds'));
        // return view('app.home', compact('products'));
    }

    public function index01(Request $request)
{
    $query = Product::query();

    $search = $request->input('search', ''); // Get 'search' input or default to an empty string
    $query->where(function($q) use ($search) {
        $q->where('model', 'like', "%{$search}%")
          ->orWhere('processor', 'like', "%{$search}%")
          ->orWhere('graphics', 'like', "%{$search}%")
          ->orWhere('memory', 'like', "%{$search}%")
          ->orWhere('display', 'like', "%{$search}%")
          ->orWhere('storage', 'like', "%{$search}%")
          ->orWhere('io_ports', 'like', "%{$search}%")
          ->orWhere('os', 'like', "%{$search}%")
          ->orWhere('color', 'like', "%{$search}%");
    });
    

    if ($request->filled('min_price')) {
        $query->where('price', '>=', $request->min_price);
    }

    if ($request->filled('max_price')) {
        $query->where('price', '<=', $request->max_price);
    }

    if ($request->filled('brand')) {
        $query->whereIn('brand_id', $request->brand);
    }

    $products = $query->get();
    $brands = Brand::whereIn('id', Product::distinct()->pluck('brand_id'))->get();
    $cartProductIds = session()->get('cart', []);

    return view('app.catalog01', compact('products', 'brands', 'cartProductIds'));
}


// later update

// public function liveCatalog(Request $request)
// {
//     $query = Product::query();

//     if ($request->filled('search')) {
//         $search = $request->search;
//         $query->where(function ($q) use ($search) {
//             $q->where('model', 'like', "%{$search}%")
//               ->orWhere('processor', 'like', "%{$search}%")
//               ->orWhere('graphics', 'like', "%{$search}%")
//               ->orWhere('memory', 'like', "%{$search}%")
//               ->orWhere('display', 'like', "%{$search}%")
//               ->orWhere('storage', 'like', "%{$search}%")
//               ->orWhere('ports', 'like', "%{$search}%")
//               ->orWhere('os', 'like', "%{$search}%")
//               ->orWhere('color', 'like', "%{$search}%");
//         });
//     }

//     if ($request->filled('min_price')) {
//         $query->where('price', '>=', $request->min_price);
//     }

//     if ($request->filled('max_price')) {
//         $query->where('price', '<=', $request->max_price);
//     }

//     if ($request->has('brand')) {
//         $query->whereIn('brand_id', $request->brand);
//     }

//     $products = $query->get();
//     $cartProductIds = session()->get('cart', []);

//     return view('components.product-list', compact('products', 'cartProductIds'))->render();
// }


}
