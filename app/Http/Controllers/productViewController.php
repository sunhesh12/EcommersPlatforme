<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;

class productViewController extends Controller
{
    public function index()
    {
        $products = Product::with('brand')->get();
        return view('admin.products.index', compact('products'));
        // return view('components.cart', compact('products'));
    }

    public function create()
    {
        $brands = Brand::all();
        return view('admin.products.create', compact('brands'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'brand_id' => 'required|exists:brands,id',
            'product_name' => 'required|string|max:255',
            'logo' => 'image|nullable',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'old_price' => 'nullable|numeric',
            'quantity' => 'required|integer',
            'status' => 'boolean',

            // New fields
            'model' => 'required|string|max:255',
            'processor' => 'required|string|max:255',
            'graphics' => 'required|string|max:255',
            'memory' => 'required|string|max:255',
            'display' => 'required|string',
            'storage' => 'required|string|max:255',
            'io_ports' => 'required|string',
            'os' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'warranty' => 'required|string|max:255',
        ]);

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('product_logos', 'public');
        }

        Product::create($data);
        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        $brands = Brand::all();
        return view('app.ProductDetails', compact('product', 'brands'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'brand_id' => 'required|exists:brands,id',
            'product_name' => 'required|string|max:255',
            'logo' => 'image|nullable',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'old_price' => 'nullable|numeric',
            'quantity' => 'required|integer',
            'status' => 'boolean',

            // New fields
            'model' => 'required|string|max:255',
            'processor' => 'required|string|max:255',
            'graphics' => 'required|string|max:255',
            'memory' => 'required|string|max:255',
            'display' => 'required|string',
            'storage' => 'required|string|max:255',
            'io_ports' => 'required|string',
            'os' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'warranty' => 'required|string|max:255',
        ]);

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('product_logos', 'public');
        }

        $product->update($data);
        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return back()->with('success', 'Product deleted.');
    }
}
