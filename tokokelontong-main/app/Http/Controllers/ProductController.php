<?php

namespace App\Http\Controllers;
use App\Models\Products;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Products::with('category')->get();
        $categories = Category::all();

        return view('products.index', compact('products', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|min:3',
            'stock' => 'required|integer|min:0',
            'price' => 'required|numeric|min:1000',
            'category_id' => 'required|exists:categories,id',
        ]);

        Products::create($request->all());
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function show(string $id)
    {
        $product = Products::findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function edit(string $id)
    {
        $product = Products::findOrFail($id);
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'  => 'required|min:3',
            'stock' => 'required|integer|min:0',
            'price' => 'required|numeric|min:1000',
            'category_id' => 'required|exists:categories,id',
        ]);

        $product = Products::findOrFail($id);
        $product->update($request->all());
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(string $id)
    {
        $product = Products::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
