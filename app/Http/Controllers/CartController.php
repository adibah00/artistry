<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;

class CartController extends Controller
{
    public function addToCart(Request $request, $productId)
    {
        // Get the authenticated user
        $user = auth()->user();

        // Check if the product is already in the cart
        $cartItem = Cart::where('user_id', $user->id)
            ->where('product_id', $productId)
            ->first();

        // If the product is in the cart, increment the quantity; otherwise, create a new cart item
        if ($cartItem) {
            $cartItem->increment('quantity');
        } else {
            Cart::create([
                'user_id' => $user->id,
                'product_id' => $productId,
                'quantity' => 1,
            ]);
        }

         // Fetch the updated cart items
         $cartItems = Cart::where('user_id', $user->id)->with('product')->get();

        // Pass the cart items to the view
        return view('user.addToCart', compact('cartItems'))->with('success', 'Product added to cart successfully');
    }

    public function showCart()
    {
        // Get the authenticated user
        $user = auth()->user();

        // Output the user's ID for debugging
        dd($user->id);

        // Fetch the cart items with their associated products
        $cartItems = Cart::where('user_id', $user->id)->with('product')->get();

        // Output the fetched cart items for debugging
        dd($cartItems);

        // Get the count of items in the cart
        $cartItemCount = $cartItems->count();

        // Pass the cart items and their count to the view
        return view('user.addToCart', compact('cartItems', 'cartItemCount'));
    }

}
