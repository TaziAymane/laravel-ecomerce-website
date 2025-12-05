@extends('base')
@section('title', 'Product')

@section('content')
    <div class="d-flex justify-content-between align-items-center p-3 border-bottom mb-3">
        <h2 class="mb-0">Product List</h2>
        <a href="{{ route('product.create') }}" class="btn btn-primary">
            + Add Product
        </a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>Image</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
                <tr>
                    <th>{{ $product->id }}</th>
                    <th>{{ $product->name }}</th>
                    <th>{{ $product->description }}</th>
                    <th>{{ $product->quantity }}</th>
                    <th>
                        <img src="storage/{{ $product->image }}" alt="" width="100px">
                    </th>
                    <th>{{ $product->price }}</th>
                    <th>
                        <div class="d-flex gap-2">
                            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary">Edit</a>

                            <form method="POST" action="{{ route('product.destroy', $product->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>

                    </th>
                </tr>
            @empty
                <tr>
                    <td colspan="6" align="center">
                        <h3>No product ..</h3>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{ $products->links() }}
@endsection
