<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Display all products + search + filter
    public function index(Request $request)
    {
        $search = $request->input('search');
        $category = $request->input('category');

        $products = Product::when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%");
            })
            ->when($category, function ($query, $category) {
                return $query->where('category_name', $category);
            })
            ->get();

        return view('products.index', compact('products', 'search', 'category'));
    }

    // Show create form
    public function create()
    {
        return view('products.create');
    }

    // Store new product
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category_name' => 'required|string|max:255'
        ]);

        Product::create($request->only('name', 'description', 'price', 'category_name'));
        return redirect()->route('products.index')->with('success', 'Product added successfully!');
    }

    // Show edit form
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    // Update product
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category_name' => 'required|string|max:255'
        ]);

        $product->update($request->only('name', 'description', 'price', 'category_name'));
        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }

    // Delete product
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }
}
