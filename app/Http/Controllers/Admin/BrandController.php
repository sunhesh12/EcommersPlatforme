<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brandDetils', compact('brands'));
    }

    public function create()
    {
        return view('admin.addBrand');
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|unique:brands,name',
    //     ]);

    //     Brand::create([
    //         'name' => $request->name,
    //         'slug' => Str::slug($request->name),
    //     ]);

    //     return redirect()->route('brands.index')->with('success', 'Brand created successfully!');
    // }



    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|unique:brands,name',
    //         'slug' => 'required|unique:brands,slug',
    //         'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //     ]);

    //     $data = [
    //         'name' => $request->name,
    //         'slug' => Str::slug($request->slug),
    //     ];

    //     if ($request->hasFile('logo')) {
    //         $logoPath = $request->file('logo')->store('brands', 'public');
    //         $data['logo'] = $logoPath;
    //     }

    //     Brand::create($data);

    //     return redirect()->route('brands.index')->with('success', 'Brand created successfully!');
    // }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:brands,name',
            'slug' => 'required|unique:brands,slug',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = [
            'name' => $request->name,
            'slug' => Str::slug($request->slug),
        ];

        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $imageName = Str::slug($request->name) . '_' . time() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('brands', $imageName, 'public');
            $data['logo'] = $imagePath;
        }

        Brand::create($data);

        return $this->index()->with('success', 'Brand created successfully!');
    }


    public function edit(Brand $brand)
    {
        return view('admin.brands.edit', compact('brand'));
    }

    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name' => 'required|unique:brands,name,' . $brand->id,
        ]);

        $brand->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->route('brands.index')->with('success', 'Brand updated successfully!');
    }

    public function destroy(Brand $brand)
    {
        // Optionally delete logo file from storage

        if ($brand->logo && Storage::disk('public')->exists($brand->logo)) {
            Storage::disk('public')->delete($brand->logo);
        } else {
            Log::warning("Logo not found: " . $brand->logo);
        }
        
    
        $brand->delete();
    
        return redirect()->route('admin.brands.index')->with('success', 'Brand deleted successfully!');
    }
    
}
