<div class="floating-navigation">
    <div class="nav-buttons">
        <a href="{{ route('dashboard') }}" class="cart-icon-btn">
            <i class="material-icons" style="color: white;">home</i>
        </a>
        <a href="{{ route('user.showCart') }}" class="cart-icon-btn">
            <i class="material-icons" style="color: white;">shopping_cart</i>
            @if($cartItemCount > 0)
                <span class="badge">{{ $cartItemCount }}</span>
            @endif
        </a>
        <a href="{{ route('videos.fetch') }}" class="cart-icon-btn">
            <i class="material-icons" style="color: white;">video_library</i>
        </a>
    </div>
</div>