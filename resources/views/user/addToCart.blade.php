<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artistry - Add To Cart</title>
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
                    <h1>Add to Cart</h1>
                    <!-- Display the added cart items -->
                    @if(session('success'))
                        <p>{{ session('success') }}</p>
                    @endif

                    <!-- Display the added cart items -->
                    @if($cartItems->isNotEmpty())
                        <h2>Added to Cart:</h2>
                        <div class="shopping-cart">
                            @foreach($cartItems as $cartItem)
                                <div class="cart-item">
                                    <img src="{{ asset('storage/images/' . $cartItem->product->image) }}" alt="{{ $cartItem->product->name }}" class="cart-item-image">
                                    <div class="cart-item-details">
                                        <h4>{{ $cartItem->product->brand }}</h4>
                                        <p>{{ $cartItem->product->name }}</p>
                                        <p>Price: RM {{ $cartItem->product->price }}</p>
                                        <p>Quantity: {{ $cartItem->quantity }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </x-app-layout>
</body>
</html>
