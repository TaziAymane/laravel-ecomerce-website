<form action="{{ route('product.update')}}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Edit Product</h5>
            </div>

            <div class="card-body">

                {{-- Name --}}
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter product name" value="{{$product->name}}">
                </div>

                {{-- Description --}}
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea type="text" name="description" class="form-control" placeholder="Enter product description" >
                        {{$product->description}}
                    </textarea>
                </div>

                {{-- Quantity --}}
                <div class="mb-3">
                    <label class="form-label">Quantity</label>
                    <input type="number" name="quantity" class="form-control" placeholder="Enter product quantity" value="{{$product->quantity}}">
                </div>

                {{-- Price --}}
                <div class="mb-3">
                    <label class="form-label">Price</label>
                    <input type="number" step="0.01" name="price" class="form-control" placeholder="Enter price (e.g. 49.99)" value="{{ $product->price}}">
                </div>

                {{-- Image --}}
                <div class="mb-3">
                    <label class="form-label">Image</label>
                    <input type="file" name="image" class="form-control">
                </div>

                {{-- Submit --}}
                <button class="btn btn-primary w-100">Update</button>

            </div>
        </div>
    </div>
</form>
