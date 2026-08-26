<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ProductController extends Controller
{
    public function showAddProduct()
    {
        return view('products.addproduct');
    }

    public function addProduct(Request $request)
    {
        $validated = $request->validate([
            'productname' => 'required|string|max:255',
            'description' => 'nullable|string',
            'productprice' => 'required|integer|max:255'
        ]);

        Products::create($validated);

        return redirect()->route("products.product")
            ->with('Product Created Successfully');
    }

    public function showProduct()
    {
        return view('products.product');
    }

    public function product()
    {
        $products = Products::all();

        return view('products.product', compact('products'));
    }
    public function destroy(Products $product)
    {
        $product->delete();

        return redirect()->back()->with('success', 'Product deleted successfully!');
    }
}
