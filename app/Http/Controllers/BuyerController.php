<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
// use App\Models\Products;
use App\Models\Category;
use App\Models\cart;
use Illuminate\Support\Facades\Auth;

class BuyerController extends Controller
{
    public function buyerdash()
    {
        $products = Products::latest()->get();
        return view('buyer.buyerdash', compact('products'));
    }

    public function viewproducts(){
        $products = Products::all();
        return view('buyer.products', compact('products'));
    }

    public function buyerCategoryDash(Request $request)
    {
        $categories = Category::withCount('products')->get();
        $selectedCategory = null;
        $products = collect();

        if ($request->filled('category')) {
            $selectedCategory = Category::find($request->category);
            if ($selectedCategory) {
                $products = Products::where('category_id', $selectedCategory->id)->latest()->get();
            }
        }

        return view('buyer.buyercategorydash', compact('categories', 'selectedCategory', 'products'));
    }

    public function showCart(){
        $cartItems = cart::where('buyer_id', Auth::id())->with('products.category')->get();
        return view('buyer.cart', compact('cartItems'));
    }

    public function addToCart(Request $request){
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $buyer = Auth::user();

        $product = Products::findOrFail($request->product_id);

        $cartItem = cart::where('buyer_id', $buyer->id)
                        ->where('product_id', $product->id)
                        ->first();

        if ($cartItem) {
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        } else {
            cart::create([
                'buyer_id' => $buyer->id,
                'product_id' => $product->id,
                'quantity' => $request->quantity,
            ]);
        }
        return back()
            ->with('success', 'Product added to cart.')
            ->with('added_product_id', $product->id);
    }

    public function updateCart(Request $request)
    {
        $cartId = $request->cart_id ?? $request->cart_item_id;

        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $cartItem = cart::where('id', $cartId)
                        ->where('buyer_id', Auth::id())
                        ->firstOrFail();

        $cartItem->quantity = $request->quantity;
        $cartItem->save();

        return back()->with('success', 'Cart updated successfully.');
    }

    public function removeFromCart(Request $request)
    {
        $cartId = $request->cart_id ?? $request->cart_item_id;

        $cartItem = cart::where('id', $cartId)
                        ->where('buyer_id', Auth::id())
                        ->firstOrFail();

        $cartItem->delete();

        return back()->with('success', 'Product removed from cart.');
    }
}
