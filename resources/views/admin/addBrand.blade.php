@extends('app.layouts.admin')

@section('content')

<div class="brand-container">
    <h2 class="brand-title">Add New Brand</h2>

    @if ($errors->any())
        <div class="brand-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.brands.store') }}" class="brand-form" enctype="multipart/form-data">
        @csrf

        <div class="brand-form-group">
            <label for="name" class="brand-label">Brand Name</label>
            <input type="text" id="name" name="name" class="brand-input" value="{{ old('name') }}" required>
        </div>

        <div class="brand-form-group">
            <label for="slug" class="brand-label">Slug</label>
            <input type="text" id="slug" name="slug" class="brand-input" value="{{ old('slug') }}" required>
        </div>

        <div class="brand-form-group">
            <label for="logo" class="brand-label">Brand Logo</label>
            <input type="file" id="logo" name="logo" class="brand-input-file" accept="image/*">
        </div>

        <div class="brand-form-actions">
            <button type="submit" class="brand-button-update">Create Brand</button>
            <a href="{{ route('admin.brands.index') }}" class="brand-button-cancel">Cancel</a>
        </div>
    </form>
</div>
@endsection
