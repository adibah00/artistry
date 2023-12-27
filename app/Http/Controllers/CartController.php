<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{

    public function addToCartPage()
    {
        // Retrieve the list of products from your data source
        $products = Product::all();

        // Pass the $products variable to the view
        return view('user.addToCart', ['products' => $products]);
    }

    public function addToCart(Request $request, $productId)
    {
        // Add your logic here to handle adding the product to the cart
        // You may use sessions, databases, or any other storage mechanism

        // For example, if using sessions:
        $cart = $request->session()->get('cart', []);

        // Check if the product is already in the cart
        if (isset($cart[$productId])) {
            // Increment the quantity if already in the cart
            $cart[$productId]['quantity']++;
        } else {
            // Add the product to the cart
            $cart[$productId] = [
                'id' => $productId,
                'quantity' => 1,
            ];
        }

        // Save the cart back to the session
        $request->session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully');
    }
}
