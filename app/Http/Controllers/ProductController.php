<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::query()->paginate(2);
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product = new Product();
        return view('product.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        // Validate all fields
        $formFields = $request->validated();

        // Handle image upload
        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('products', 'public');
        }

        // Create the product
        Product::create($formFields);

        // Redirect with success message
        return to_route('product.index')->with('success', 'Product created successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, $id)
{
    $product = Product::findOrFail($id);

    // Validate
    $validData = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'quantity' => 'required|integer|min:0',
        'price' => 'required|numeric|min:0',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    // Image upload
    if ($request->hasFile('image')) {
        $validData['image'] = $request->file('image')->store('products', 'public');
    }

    // Update product
    $product->update($validData);

    return redirect()
        ->route('product.index')
        ->with('success', 'Product updated successfully!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return to_route('product.index')->with('success', 'Product delted successfully!');
    }
}
