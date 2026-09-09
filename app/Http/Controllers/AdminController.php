<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function showAdmin()
    {
        $productCount = Products::count();
        $revenue = Products::sum('productprice');
        $userCount = User::count();

        return view('admin.index', compact('productCount', 'userCount', 'revenue'));
    }

    public function showAdminProduct()
    {
        $products = Products::where('status', 'waiting')
        ->with('category')
        ->latest()
        ->get();

    return view('admin.admin_product', compact('products'));
    }

    public function approveProduct(Products $product)
{
    $product->update(['status' => 'approved']);

    return redirect()->back()->with('success', 'Product has been approved and published to the store.');
}

public function rejectProduct(Products $product)
{
    $product->update(['status' => 'rejected']);

    return redirect()->back()->with('success', 'Product has been rejected.');
}
}
