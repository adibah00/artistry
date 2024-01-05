<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('products.product', ['products' => $products]);
    }

    public function view(){
        $user = auth()->user();
        $cartItems = Cart::where('user_id', $user->id)->with('product')->get();
        $cartItemCount = $cartItems->count();
        $products = Product::all();
        return view('dashboard', compact('products', 'cartItems', 'cartItemCount'));
    }

    public function create(){
        return view('products.create');
    }

    public function store(Request $request){
        $data = $request -> validate([
            'name'=> 'required',
            'productID'=> 'required',
            'category'=> 'required',
            'price'=> 'required|numeric|between:0,999999.99',
            'brand'=> 'required',
            'origin'=> 'required',
            'image'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
            $data['image'] = $imageName; 
        }

        $newProduct = Product::create($data);

        return redirect(route('products.index'));
    }

    public function edit(Product $product){
        return view('products.edit', ['product' => $product]);
    }

    public function update(Product $product, Request $request){
        $data = $request -> validate([
            'name'=> 'required',
            'productID'=> 'required',
            'category'=> 'required',
            'price'=> 'required|numeric|between:0,999999.99',
            'brand'=> 'required',
            'origin'=> 'required',
            'image'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
            $data['image'] = $imageName; 
        }

        $product->update($data);

        return redirect(route('products.index'))->with('Success', 'Product Updated Successfully');
    }

    public function destroy(Product $product){
        $product->delete();
        return redirect(route('products.index'))->with('Success', 'Product Deleted Successfully');
    }

    public function cancel(){
        return redirect()->route('products.index');
    }

}
