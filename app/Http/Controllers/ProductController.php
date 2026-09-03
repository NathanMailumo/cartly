<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function sellerdash(){
        return view('seller.sellerdash');
    }
    
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

        $validated['seller_id'] = Auth::user()->seller->id;

        Products::create($validated);

        return redirect()->route("products.product")
            ->with('Product Created Successfully');
    }

    public function showProduct()
    {
        // $products = Products::all();
        $sellerId = Auth::user()->seller->id;

        $products = Products::where('seller_id', $sellerId)->latest()->get();

        return view('products.product', compact('products'));
    }

    // public function product()
    // {
    //     $products = Products::all();

    //     return view('products.product', compact('products'));
    // }
    public function destroy(Products $product)
    {
        $product->delete();

        return redirect()->back()->with('success', 'Product deleted successfully!');
    }

    public function edit(Products $product)
    {
        return view('products.edit', compact('product'));
    }

    // Update the product in the database
    public function update(Request $request, Products $product)
    {
        $validated = $request->validate([
            'productname' => 'required|string|max:255',
            'description' => 'required|string',
            'productprice' => 'required|numeric',
        ]);

        $product->update($validated);

        return redirect()->route('products.product')->with('success', 'Product updated successfully!');
    }
}
