<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.product.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.product.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required|max:100',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $image = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('products', 'public');
        }

        Product::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $image,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('product.index')->with('success', 'Product successfully added.');
    }

    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return view('admin.product.products.detail', compact('product'));
    }

    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.product.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required|max:100',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $product = Product::findOrFail($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('products', 'public');
            $product->image = $image;
        }

        $product->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $product->image,
        ]);

        return redirect()->route('product.index')->with('success', 'The product has been successfully updated.');
    }

    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        $product->delete();

        return redirect()->route('product.index')->with('success', 'The product has been successfully deleted.');
    }
}
