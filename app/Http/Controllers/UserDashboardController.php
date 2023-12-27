<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index() {
        return view('user.dashboard');
    }

    public function fetchProducts() {
        $products = Product::all();
        return view('user.dashboard', compact('products'));
    }

    public function add(Product $product) {
        $cart = session()->get('cart', []);
        $cart[] = $product->id;
        session(['cart' => $cart]);

        return redirect()->back()->with('success', 'Product added to cart successfully');
    }
}
