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

         $cartItemCount = $cartItems->count();

        // Pass the cart items to the view
        return view('user.addToCart', compact('cartItems', 'cartItemCount'))->with('success', 'Product added to cart successfully');
    }

    public function showCart()
    {
        // Get the authenticated user
        $user = auth()->user();

        // Fetch the cart items with their associated products
        $cartItems = Cart::where('user_id', $user->id)->with('product')->get();

        // Get the count of items in the cart
        $cartItemCount = $cartItems->count();

        // Pass the cart items and their count to the view
        return view('user.addToCart', compact('cartItems', 'cartItemCount'));
    }

    public function updateCart(Request $request)
    {
        $user = auth()->user();

        foreach ($request->input('quantity') as $cartItemId => $quantity) {
            Cart::where('user_id', $user->id)
                ->where('id', $cartItemId)
                ->update(['quantity' => $quantity]);
        }

        return redirect()->route('user.showCart')->with('success', 'Cart updated successfully');
    }

    public function removeFromCart(Cart $cartItem)
    {
        $user = auth()->user();

        // Ensure the cart item belongs to the authenticated user
        if ($cartItem->user_id !== $user->id) {
            abort(403, 'Unauthorized action.');
        }

        // Delete the cart item
        $cartItem->delete();

        // Redirect directly to the cart view
        return redirect()->route('user.showCart')->with('success', 'Product removed from cart successfully');
    }


    // Inside the relevant controller method for rendering dashboard.blade.php
        public function showDashboard()
        {
            // Get the authenticated user
            $user = auth()->user();

            // Fetch the cart items with their associated products
            $cartItems = Cart::where('user_id', $user->id)->with('product')->get();

            // Get the count of items in the cart
            $cartItemCount = $cartItems->count();

            // Pass the cart items and their count to the view
            return view('dashboard', compact('cartItems', 'cartItemCount'));
        }

}
