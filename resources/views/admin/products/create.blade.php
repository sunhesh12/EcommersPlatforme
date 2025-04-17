@extends('app.layouts.admin')

@section('content')


<div class="product-add-wrapper">
    <div class="product-add-card">
        <h1 class="product-add-title">Add New Product</h1>
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="product-add-form">
            @csrf

            <label class="product-add-label">Brand:</label>
            <select name="brand_id" required class="product-add-select">
                @foreach($brands as $brand)
                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                @endforeach
            </select>

            <label class="product-add-label">Product Name:</label>
            <input type="text" name="product_name" required class="product-add-input">

            <label class="product-add-label">Logo:</label>
            <input type="file" name="logo" class="product-add-file">

            <label class="product-add-label">Description:</label>
            <textarea name="description" class="product-add-textarea"></textarea>

            <label class="product-add-label">Price:</label>
            <input type="number" step="0.01" name="price" required class="product-add-input">

            <label class="product-add-label">Quantity:</label>
            <input type="number" name="quantity" required class="product-add-input">

            <label class="product-add-label">Status:</label>
            <select name="status" class="product-add-select">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
            <!-- Other fields remain -->
            <label>Model:</label>
            <input type="text" name="model" required><br><br>

            <label>Processor:</label>
            <input type="text" name="processor" required><br><br>

            <label>Graphics:</label>
            <input type="text" name="graphics" required><br><br>

            <label>Memory:</label>
            <input type="text" name="memory" required><br><br>

            <label>Display:</label>
            <textarea name="display" required></textarea><br><br>

            <label>Storage:</label>
            <input type="text" name="storage" required><br><br>

            <label>I/O Ports:</label>
            <textarea name="io_ports" required></textarea><br><br>

            <label>Operating System (OS):</label>
            <input type="text" name="os" required><br><br>

            <label>Color:</label>
            <input type="text" name="color" required><br><br>

            <label>Warranty:</label>
            <input type="text" name="warranty" required><br><br>

            <label>Old Price:</label>
            <input type="number" step="0.01" name="old_price"><br><br>

            <button type="submit" class="product-add-button">Create</button>
        </form>
    </div>
</div>
@endsection