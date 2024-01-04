<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artistry - Add To Cart</title>
    <link rel="icon" href="{{ asset('images/makeupIcon.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
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
                    <!-- Display the added cart items -->
                    @if(session('success'))
                        <p>{{ session('success') }}</p>
                    @endif

                    <!-- Display the added cart items -->
                    @if($cartItems->isNotEmpty())
                        <h2>Added to Cart:</h2>
                        <div class="shopping-cart">
                            <form action="{{ route('user.updateCart') }}" method="post" id="updateCartForm">
                                @csrf
                                @foreach($cartItems as $cartItem)
                                    <div class="cart-item">
                                        <img src="{{ asset('storage/images/' . $cartItem->product->image) }}" alt="{{ $cartItem->product->name }}" class="cart-item-image">
                                        <div class="cart-item-details">
                                            <h4>{{ $cartItem->product->brand }}</h4>
                                            <p>{{ $cartItem->product->name }}</p>
                                            <p>Price: RM {{ $cartItem->product->price }}</p>
                                            <div class="quantity">
                                                <label for="quantity_{{ $cartItem->id }}">Quantity:</label>
                                                <input type="number" name="quantity[{{ $cartItem->id }}]" id="quantity_{{ $cartItem->id }}" value="{{ $cartItem->quantity }}" min="1" onchange="submitForm()" class="small-input">
                                            </div>

                                            <!-- Add a delete button -->
                                            <form method="post" action="{{ route('user.removeFromCart', ['cartItem' => $cartItem->id]) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-blue-500 hover:underline delete-btn">
                                                    <i class="material-icons" style="color:red;">delete</i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </x-app-layout>

    <script>
        function submitForm() {
            document.getElementById("updateCartForm").submit();
        }
    </script>

</body>
</html>
