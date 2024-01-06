<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artistry - Add To Cart</title>
    <link rel="icon" href="{{ asset('images/makeupIcon.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">


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
                                        <img src="{{ asset('storage/images/' . $cartItem->product->image) }}" alt="{{ $cartItem->product->name }}" class="cart-item-image" id="productImage_{{ $cartItem->id }}">
                                        <div class="cart-item-details">
                                            <h4>{{ $cartItem->product->brand }}</h4>
                                            <p>{{ $cartItem->product->name }}</p>
                                            <p>Price: RM {{ $cartItem->product->price }}</p>
                                            <div class="quantity">
                                                <label for="quantity_{{ $cartItem->id }}">Quantity:</label>
                                                <input type="number" name="quantity[{{ $cartItem->id }}]" id="quantity_{{ $cartItem->id }}" value="{{ $cartItem->quantity }}" min="1" onchange="submitForm()" class="small-input">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Add a delete button with a dynamic form -->
                                    <button type="button" onclick="createDeleteForm('{{ route('user.removeFromCart', ['cartItem' => $cartItem->id]) }}')" class="text-blue-500 hover:underline delete-btn">
                                        <i class="material-icons" style="color:red;">delete</i>
                                    </button>
                                @endforeach
                                <!-- Add a submit button for updating quantities -->
                                <button type="submit" class="btn btn-primary">Update Cart</button>
                            </form>
                        </div>
                    @endif
                    <x-floating-navigation :cartItemCount="$cartItemCount" />
                </div>
            </div>
        </div>
    </x-app-layout>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            @foreach($cartItems as $cartItem)
                document.getElementById('productImage_{{ $cartItem->id }}').addEventListener('click', function() {
                    redirectToShop('{{ route('products.shop') }}');
                });
            @endforeach

            function redirectToShop(shopRoute) {
                window.location.href = shopRoute;
            }
        });
    </script>

    <script>
        function submitForm() {
            document.getElementById("updateCartForm").submit();
        }

        function createDeleteForm(action) {
            var form = document.createElement('form');
            form.method = 'post';
            form.action = action;

            var csrfInput = document.createElement('input');
            csrfInput.type = 'hidden';
            csrfInput.name = '_token';
            csrfInput.value = '{{ csrf_token() }}';

            var methodInput = document.createElement('input');
            methodInput.type = 'hidden';
            methodInput.name = '_method';
            methodInput.value = 'DELETE';

            form.appendChild(csrfInput);
            form.appendChild(methodInput);

            document.body.appendChild(form);

            form.submit();
        }
    </script>

</body>
</html>
