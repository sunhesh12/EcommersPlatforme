@extends('app.layouts.admin')

@section('content')


<div class="product-edit-wrapper">
    <div class="product-edit-card">
        <h1>Edit Product</h1>
        <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')

            <label>Brand:</label>
            <select name="brand_id" required>
                @foreach($brands as $brand)
                <option value="{{ $brand->id }}" @if($product->brand_id == $brand->id) selected @endif>
                    {{ $brand->name }}
                </option>
                @endforeach
            </select><br><br>

            <label>Product Name:</label>
            <input type="text" name="product_name" value="{{ $product->product_name }}" required><br><br>

            <label>Logo:</label>
            <input type="file" name="logo"><br>
            @if($product->logo)
            <img src="{{ asset('storage/' . $product->logo) }}" width="50">
            @endif<br><br>

            <label>Description:</label>
            <textarea name="description">{{ $product->description }}</textarea><br><br>

            <label>Price:</label>
            <input type="number" step="0.01" name="price" value="{{ $product->price }}" required><br><br>

            <label>Quantity:</label>
            <input type="number" name="quantity" value="{{ $product->quantity }}" required><br><br>

            <label>Status:</label>
            <select name="status">
                <option value="1" @if($product->status) selected @endif>Active</option>
                <option value="0" @if(!$product->status) selected @endif>Inactive</option>
            </select><br><br>

            <label>Model:</label>
            <input type="text" name="model" value="{{ $product->model }}" required><br><br>

            <label>Processor:</label>
            <input type="text" name="processor" value="{{ $product->processor }}" required><br><br>

            <label>Graphics:</label>
            <input type="text" name="graphics" value="{{ $product->graphics }}" required><br><br>

            <label>Memory:</label>
            <input type="text" name="memory" value="{{ $product->memory }}" required><br><br>

            <label>Display:</label>
            <textarea name="display" required>{{ $product->display }}</textarea><br><br>

            <label>Storage:</label>
            <input type="text" name="storage" value="{{ $product->storage }}" required><br><br>

            <label>I/O Ports:</label>
            <textarea name="io_ports" required>{{ $product->io_ports }}</textarea><br><br>

            <label>Operating System (OS):</label>
            <input type="text" name="os" value="{{ $product->os }}" required><br><br>

            <label>Color:</label>
            <input type="text" name="color" value="{{ $product->color }}" required><br><br>

            <label>Warranty:</label>
            <input type="text" name="warranty" value="{{ $product->warranty }}" required><br><br>

            <label>Old Price:</label>
            <input type="number" step="0.01" name="old_price" value="{{ $product->old_price }}"><br><br>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection