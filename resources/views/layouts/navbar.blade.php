<nav class="navbar">
    <div class="logo">
        <img src="{{ asset('images/image_3.png') }}" class="logo">
        Gamon
    </div>

    <ul>
        <li><a href="/">Beranda</a></li>

        <li>
            <a href="{{ route('about.page') }}">
                Informasi
            </a>
        </li>

        <li>
            <a href="{{ route('booking.page') }}">
                Booking
            </a>
        </li>

        <li class="nav-dropdown" onclick="toggleDropdown(this)">
            <a href="#">Tukar Poin ▾</a>
            <ul class="nav-dropdown-menu">
                <li><a href="{{ route('reward.index') }}">Tukar Poin</a></li>
                <li><a href="{{ route('reward.history') }}">Riwayat Penukaran</a></li>
            </ul>
        </li>

        @if(session('user'))

            <li><a href="/profile">Profil</a></li>

            <li class="points-nav">
                ⭐ {{ session('user')->points ?? 0 }} Poin
            </li>

        @else
            <li><a href="/login">Login</a></li>
            <li><a href="/register">Sign up</a></li>
        @endif
    </ul>
</nav>

<script>
function toggleDropdown(el) {
    const menu = el.querySelector('.nav-dropdown-menu');
    const isOpen = menu.classList.contains('open');
    document.querySelectorAll('.nav-dropdown-menu.open').forEach(m => m.classList.remove('open'));
    if (!isOpen) menu.classList.add('open');
}

document.addEventListener('click', function(e) {
    if (!e.target.closest('.nav-dropdown')) {
        document.querySelectorAll('.nav-dropdown-menu.open').forEach(m => m.classList.remove('open'));
    }
});
</script>