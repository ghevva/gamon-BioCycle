<aside class="admin-sidebar">

    {{-- HEADER / BRAND --}}
    <div class="sidebar-header">
        <img src="{{ asset('images/image_3.png') }}" class="logo" style="width:36px;height:36px;object-fit:contain;border-radius:10px;flex-shrink:0;">
        <div class="sidebar-brand">
            <div class="sidebar-brand-name">BioCycle</div>
            <div class="sidebar-brand-sub">Admin Panel</div>
        </div>
    </div>

    {{-- NAV --}}
    <nav class="sidebar-nav">
        <div class="sidebar-section-label">Menu Utama</div>
        <ul>
            <li>
                <a href="{{ route('user.index') }}"
                   class="{{ request()->routeIs('user.*') ? 'active' : '' }}">
                    <span class="nav-icon">
                        <svg viewBox="0 0 24 24"><path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/></svg>
                    </span>
                    <span class="nav-label">Data User</span>
                </a>
            </li>
            <li>
                <a href="{{ route('booking.index') }}"
                   class="{{ request()->routeIs('booking.*') ? 'active' : '' }}">
                    <span class="nav-icon">
                        <svg viewBox="0 0 24 24"><path d="M19 3h-1V1h-2v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V8h14v11zM7 10h5v5H7z"/></svg>
                    </span>
                    <span class="nav-label">Data Booking</span>
                </a>
            </li>
            <li>
                <a href="{{ route('product.index') }}"
                   class="{{ request()->routeIs('product.*') ? 'active' : '' }}">
                    <span class="nav-icon">
                        <svg viewBox="0 0 24 24"><path d="M20 6h-2.18c.07-.44.18-.88.18-1.36C18 2.06 15.73 0 13 0c-1.5 0-2.84.6-3.78 1.56L8 2.8 6.78 1.56C5.84.6 4.5 0 3 0 .27 0-2 2.06-2 4.64c0 .48.11.92.18 1.36H-4v14h28V6h-4zm-7.79 11H3.79l3.21-3.56 4.21 4.68V17zm7.79 0h-5.79v-1.12l4.21-4.68L24 17zm-1-9H5V8h14v1z"/><path d="M13 2c1.65 0 3 1.35 3 3 0 .48-.13.93-.33 1.33L13 9.17l-2.67-2.84C10.13 5.93 10 5.48 10 5c0-1.65 1.35-3 3-3z"/></svg>
                    </span>
                    <span class="nav-label">Produk</span>
                </a>
            </li>
            <li>
                <a href="{{ route('redemption.index') }}"
                   class="{{ request()->routeIs('redemption.*') ? 'active' : '' }}">
                    <span class="nav-icon">
                        <svg viewBox="0 0 24 24"><path d="M11.8 10.9c-2.27-.59-3-1.2-3-2.15 0-1.09 1.01-1.85 2.7-1.85 1.78 0 2.44.85 2.5 2.1h2.21c-.07-1.72-1.12-3.3-3.21-3.81V3h-3v2.16c-1.94.42-3.5 1.68-3.5 3.61 0 2.31 1.91 3.46 4.7 4.13 2.5.6 3 1.48 3 2.41 0 .69-.49 1.79-2.7 1.79-2.06 0-2.87-.92-2.98-2.1h-2.2c.12 2.19 1.76 3.42 3.68 3.83V21h3v-2.15c1.95-.37 3.5-1.5 3.5-3.55 0-2.84-2.43-3.81-4.7-4.4z"/></svg>
                    </span>
                    <span class="nav-label">Penukaran Poin</span>
                </a>
            </li>
        </ul>
    </nav>

    {{-- FOOTER --}}
    <div class="sidebar-footer">
        <a href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <svg viewBox="0 0 24 24"><path d="M17 7l-1.41 1.41L18.17 11H8v2h10.17l-2.58 2.58L17 17l5-5zM4 5h8V3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H4V5z"/></svg>
            <span class="logout-label">Keluar</span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
            @csrf
        </form>
    </div>

</aside>