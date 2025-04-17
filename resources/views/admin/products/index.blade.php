@extends('app.layouts.admin')

@section('content')
<div class="product-admin-wrapper">
    <div class="product-dashboard-card">
        <h1 class="product-heading">Product Management</h1>

        @if(session('success'))
            <div class="product-success-alert">{{ session('success') }}</div>
        @endif

        <div class="product-action-row">
            <a href="{{ route('admin.products.create') }}" class="product-button-add">+ Add New Product</a>
        </div>

        <table class="product-data-table">
            <thead>
                <tr>
                    <th>Brand</th>
                    <th>Name</th>
                    <th>Logo</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->brand->name }}</td>
                    <td>{{ $product->product_name }}</td>
                    <td><img src="{{ asset('storage/'.$product->logo) }}" class="product-thumbnail" alt="Logo"></td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                        @if ($product->status == 1)
                            <span class="product-status-active">Active</span>
                        @else
                            <span class="product-status-inactive">Inactive</span>
                        @endif
                    <td>
                        <a href="{{ route('admin.products.edit', $product->id) }}" class="product-button-edit">Edit</a>
                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="product-delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="product-button-delete" onclick="return confirm('Delete this product?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
