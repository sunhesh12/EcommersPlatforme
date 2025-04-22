@extends('app.layouts.admin')

@section('content')

<div class="brand-container">
    <h2 class="brand-title">Edit Brand</h2>

    @if ($errors->any())
    <div class="brand-error">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li> 
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{ route('admin.brands.update', $brand->id) }}" class="brand-form" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="brand-form-group">
            <label for="name" class="brand-label">Brand Name</label>
            <input type="text" id="name" name="name" class="brand-input" value="{{ old('name', $brand->name) }}" required>
        </div>

        <div class="brand-form-group">
            <label for="slug" class="brand-label">Slug</label>
            <input type="text" id="slug" name="slug" class="brand-input" value="{{ old('slug', $brand->slug) }}" required>
        </div>

        <div class="brand-form-group">
            <label class="brand-label">Current Logo</label><br>
            @if($brand->logo)
            <img src="{{ asset('storage/' . $brand->logo) }}" class="brand-logo-preview" />
            @else
            <p>No logo uploaded</p>
            @endif
        </div>

        <div class="brand-form-group">
            <label for="logo" class="brand-label">Change Logo (optional)</label>
            <input type="file" id="logo" name="logo" class="brand-input-file" accept="image/*">
        </div>

        <div class="brand-form-group">
            <label class="brand-label">Current Wallpaper</label><br>
            @if($brand->wallpaper)
            <img src="{{ asset('storage/' . $brand->wallpaper) }}" class="brand-logo-preview" />
            @else
            <p>No wallpaper uploaded</p>
            @endif
        </div>


        <div class="brand-form-group">
            <label for="wallpaper" class="brand-label">Change Wallpaper (optional)</label>
            <input type="file" id="wallpaper" name="wallpaper" class="brand-input-file" accept="image/*">
        </div>


        <div class="brand-form-actions">
            <button type="submit" class="brand-button-update">Update Brand</button>
            <a href="{{ route('admin.brands.index') }}" class="brand-button-cancel">Cancel</a>
        </div>
    </form>
</div>

@endsection