<nav class="admin-navbar">
    <div class="admin-logo">
        Admin Panel
    </div>

    <ul>
        <li><a href="{{ route('user.index') }}">Data User</a></li>
        <li><a href="{{ route('booking.index') }}">Data Booking</a></li>
        <li><a href="{{ route('product.index') }}">Product</a></li>
        <li><a href="{{ route('redemption.index') }}">Penukaran Poin</a></li>
    </ul>
</nav>