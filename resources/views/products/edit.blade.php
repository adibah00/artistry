<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <x-app-layout>
        <!-- This is the header content -->
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <section class="dark:bg-gray-900">
                        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
                            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add a new product</h2>
                            <form method="post" action="{{route('product.update', ['product' => $product])}}" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group dark:text-white">
                                            <label for="name">Product Name</label>
                                            <input type="text" name="name" id="name" class="form-control" placeholder="Type product name" value="{{$product->name}}">
                                        </div>
                                        <div class="form-group dark:text-white">
                                            <label for="productID">Product ID</label>
                                            <input type="text" name="productID" id="productID" class="form-control" placeholder="Product brand" value="{{$product->productID}}">
                                        </div>
                                        <div class="form-group dark:text-white">
                                            <label for="category">Category</label>
                                            <input type="text" name="category" id="category" class="form-control" placeholder="Product category" value="{{$product->category}}">
                                        </div>
                                        <div class="form-group dark:text-white">
                                            <label for="price">Price</label>
                                            <input type="text" name="price" id="price" class="form-control" placeholder="Product price" value="{{$product->price}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group dark:text-white">
                                            <label for="brand">Brand</label>
                                            <input type="text" name="brand" id="brand" class="form-control" placeholder="Product brand" value="{{$product->brand}}">
                                        </div>
                                        <div class="form-group dark:text-white">
                                            <label for="origin">Origin</label>
                                            <input type="text" name="origin" id="origin" class="form-control" placeholder="Product origin" value="{{$product->origin}}">
                                        </div>
                                        <div class="form-group dark:text-white">
                                            <label for="image">Current Image</label>
                                            @if($product->image)
                                                <div>
                                                    <img src="{{ asset('storage/images/' . $product->image) }}" alt="Current Product Image" class="w-32 h-32 object-cover">
                                                </div>
                                            @else
                                                <p>No image available</p>
                                            @endif
                                        </div>
                                        <div class="form-group dark:text-white">
                                            <label for="image">Image</label>
                                            <input type="file" multiple name="image" id="image" class="form-control" accept="image/*" placeholder="Upload Product Image">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="text-center dark:text-white">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="{{ route('product.cancel') }}" class="btn btn-secondary">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </x-app-layout>
</body>
</html>