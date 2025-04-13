<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brands.brandDetils', compact('brands'));
    }

    public function create()
    {
        return view('admin.brands.addBrand');
    }

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

    public function edit($id)
{
    $brand = Brand::findOrFail($id);
    return view('admin.brands.editBrandDetils', compact('brand'));
}


public function update(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255|unique:brands,name,' . $id,
        'slug' => 'nullable|string|max:255',
        'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $brand = Brand::findOrFail($id);
    $brand->name = $request->name;
    $brand->slug = $request->slug ? Str::slug($request->slug) : Str::slug($request->name);

    if ($request->hasFile('logo')) {
        $filename = time() . '_' . Str::slug($request->name) . '.' . $request->logo->extension();
        $path = $request->logo->storeAs('brands', $filename, 'public');
        $brand->logo = $path;
    }

    $brand->save();

    return redirect()->route('admin.brands.index')->with('success', 'Brand updated successfully.');
}

public function destroy(Brand $id)
{

    // $brand = Brand::findOrFail($id);
    $id->delete();

    return $this->index()->with('success', 'Brand deleted successfully!');
}

    
}
