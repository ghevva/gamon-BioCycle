<nav class="navbar">
    <div class="logo">
        <img src="{{ asset('images/image_3.png') }}" class="logo">
        Gamon
    </div>

    <ul>
        <li><a href="/">Beranda</a></li>
        <li>About Us</li>
        <li>Booking</li>

        @if(session('user'))
            <li><a href="/profile">Profil</a></li>
            <li><a href="/logout">Logout</a></li>
        @else
            <li><a href="/login">Login</a></li>
            <li><a href="/register">Sign up</a></li>
        @endif
    </ul>
</nav>