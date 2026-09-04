<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Category;

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
}
