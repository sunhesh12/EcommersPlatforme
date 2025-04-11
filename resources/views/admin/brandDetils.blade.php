@extends('app.layouts.admin')

@section('content')
<link rel="stylesheet" href="{{ asset('css/brand-style.css') }}">

<div class="brand-container">
    <div class="brand-header">
        <h1 class="brand-title">Brand Management</h1>
        <p class="brand-description">Manage your brands here.</p>
        <a href="{{ route('admin.brands.create') }}" class="brand-button-add">+ Add Brand</a>
    </div>

    <table class="brand-table">
        <thead>
            <tr>
                <th class="brand-th">Name</th>
                <th class="brand-th">Slug</th>
                <th class="brand-th">logo</th>
                <th class="brand-th">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($brands as $brand)
            <tr>
                <td class="brand-td">{{ $brand->name }}</td>
                <td class="brand-td">{{ $brand->slug }}</td>
                <td class="brand-td"><img src="{{ $brand->logo }}"/></td>
                <td class="brand-td">
                    <a href="{{ route('admin.brands.edit', $brand) }}" class="brand-action-edit">Edit</a>
                    <form method="POST" action="{{ route('admin.brands.destroy', $brand) }}" class="brand-form-inline" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="brand-action-delete">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
