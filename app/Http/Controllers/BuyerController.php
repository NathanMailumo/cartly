<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class BuyerController extends Controller
{
    public function buyerdash()
    {
        $products = Products::latest()->get();
        return view('buyer.buyerdash', compact('products'));
    }

    public function viewproducts(){
        $products = Product::all();
        return view('buyer.products', compact('products'));
    }
}
