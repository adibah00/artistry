<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artistry</title>
    <link rel="icon" href="{{ asset('images/makeupIcon.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

</head>
<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>
    
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="grid-container">
                        <!-- First Row (Banner) -->
                        <div class="grid-item banner">
                            <img src="{{ asset('images/banner.jpeg') }}" alt="Banner Image" style="width: 100%; height: 200px; object-fit: cover;">
                            <p>Enhance Your Beauty</p>
                        </div>


                        <!-- Second Row (Three Columns) -->
                        <div class="scrollable-row">
                            <div class="grid-item">
                                <img src="{{ asset('images/beauty_service.jpeg') }}" alt="Banner Image" style="width: 100%; height: 200px; object-fit: cover;">
                                <p>BEAUTY SERVICES</p>
                            </div>
                            <div class="grid-item">
                                <img src="{{ asset('images/banner.jpeg') }}" alt="Banner Image" style="width: 100%; height: 200px; object-fit: cover;">
                                <p>MARKDOWN</p>
                            </div>
                            <div class="grid-item">
                                <img src="{{ asset('images/New-Product.jpeg') }}" alt="Banner Image" style="width: 100%; height: 200px; object-fit: cover;">
                                <p>NEW PRODUCT</p>
                            </div>
                        </div>

                        <!-- Third Row (Three Columns) LETAK PRODUCT2 YANG ADA SINI -->
                        <div class="grid-item third-row">
                            <div class="product-container">
                                @if($products->isEmpty())
                                    <div class="product-card">
                                        <p class="text-center font-medium text-gray-500 dark:text-gray-400">
                                            No data available
                                        </p>
                                    </div>
                                @else
                                    @foreach($products as $product)
                                        <div class="product-card">
                                            <div class="product-image-container">
                                                <img src="{{ asset('storage/images/' . $product->image) }}" alt="{{ $product->name }}" class="product-image">
                                                <!-- Add container for the icon -->
                                                <div class="cart-icon-container">
                                                    <form action="{{ route('user.addToCart', ['product' => $product->id]) }}" method="post">
                                                        @csrf
                                                        <button type="submit" class="add-to-cart-btn">
                                                            <i class="material-icons" style="color:red;">add_shopping_cart</i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                            <h4><b>{{ $product->brand }}</b></h4>
                                            <p>{{ $product->name }}</p>
                                            <p>Price: RM {{ $product->price }}</p>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="floating-navigation">
                        <div class="nav-buttons">
                            <a href="#" class="cart-icon-btn">
                                <i class="material-icons" style="color: white;">home</i>
                            </a>
                            <a href="{{ route('user.cart') }}" class="cart-icon-btn">
                                <i class="material-icons" style="color: white;">shopping_cart</i>
                            </a>
                            <a href="#" class="cart-icon-btn">
                                <i class="material-icons" style="color: white;">video_library</i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
</body>
</html>

