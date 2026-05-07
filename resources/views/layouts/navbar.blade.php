<nav class="navbar">
    <div class="logo">
        <img src="{{ asset('images/image_3.png') }}" class="logo">
        Gamon
    </div>

    <ul>
        <li><a href="/">Home Page</a></li>

        <li>
            <a href="{{ route('about.page') }}">
                About Us
            </a>
        </li>

        <li>
            <a href="{{ route('booking.page') }}">
                Booking
            </a>
        </li>

        @if(session('user'))

            <li><a href="/profile">Profile</a></li>

            <li class="points-nav">
                ⭐ {{ session('user')->points ?? 0 }} Poin
            </li>

        @else
            <li><a href="/login">Login</a></li>
            <li><a href="/register">Sign up</a></li>
        @endif
    </ul>
</nav>