@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Products List</h2>
@if(session('success'))

    <div class="alert alert-success">

        {{ session('success') }}

    </div>

@endif
        <a href="{{ route('products.create') }}" class="btn btn-primary">
            Add Product
        </a>
    </div>

    <table class="table table-bordered table-striped">

        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th width="180">Action</th>
            </tr>
        </thead>

        <tbody>

        @foreach($products as $product)

            <tr>

                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>${{ $product->price }}</td>

                <td>
<a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">
    Edit
</a>
<form action="{{ route('products.destroy', $product->id) }}"
      method="POST"
      style="display:inline;">

    @csrf
    @method('DELETE')

    <button
        class="btn btn-danger btn-sm"
        onclick="return confirm('Are you sure you want to delete this product?')">

        Delete

    </button>

</form>

                </td>

            </tr>

        @endforeach

        </tbody>

    </table>

</div>
@endsection