<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artistry</title>
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="icon" href="{{ asset('images/makeupIcon.png') }}" type="image/png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Add your own styles or use a custom stylesheet -->
</head>
<body>
    <x-app-layout>
        <div class="container mt-5">
            <h2 class="mb-4">All Products</h2>

            <div class="row">
                @foreach($products as $product)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="{{ asset('storage/images/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">{{ $product->description }}</p>
                                <p class="card-text">Price: RM {{ $product->price }}</p>
                                <!-- Add a "Add to Cart" button or any other action you want -->
                                <form action="{{ route('user.addToCart', ['productId' => $product->id]) }}" method="post">
                                    @csrf
                                    <button type="submit" class="add-to-cart-btn">
                                        <i class="material-icons" style="color:red;">add_shopping_cart</i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

         <!-- Add the floating navigation component -->
         <x-floating-navigation :cartItemCount="$cartItemCount" />

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.8/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </x-app-layout>
</body>
</html>
