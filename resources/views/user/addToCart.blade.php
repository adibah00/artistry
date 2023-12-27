<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artistry</title>
    <link rel="icon" href="{{ asset('images/makeupIcon.png') }}" type="image/png">
</head>
<body>
    <x-app-layout>
        <!-- This is the header content -->
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Add To Cart') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <h1>Add to cart</h1>
                    <!-- Display a list of products -->
                    @foreach($products as $product)
                        <div class="product-card">
                            <img src="{{ asset('storage/images/' . $product->image) }}" alt="{{ $product->name }}" class="product-image">
                            <h4><b>{{ $product->brand }}</b></h4>
                            <p>{{ $product->name }}</p>
                            <p>Price: RM {{ $product->price }}</p>

                            <!-- Form to add the product to the cart -->
                            <form action="{{ route('user.addToCart', ['product' => $product->id]) }}" method="post">
                                @csrf
                                <button type="submit" class="add-to-cart-btn">
                                    Add to Cart
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </x-app-layout>
</body>
</html>