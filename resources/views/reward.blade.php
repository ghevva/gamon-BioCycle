<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tukar Poin</title>

    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/reward.css') }}">
</head>

<body>

@include('layouts.navbar')

@if(session('error'))
<div id="errorModal" class="modal-overlay">
    <div class="modal-box">
        <span class="modal-close" onclick="closeModal()">&times;</span>
        <h3>Peringatan</h3>
        <p>{{ session('error') }}</p>
    </div>
</div>
@endif

<div class="reward-page">

    {{-- HEADER --}}
    <div class="reward-header">

        <h1 class="reveal">Tukar Poinmu</h1>

        <p class="reveal reveal-delay-1">
            Gunakan poin dari setoran untuk menukarkan reward
        </p>

        <div class="point-card reveal reveal-delay-2">
            <span>Total Poin</span>
            <h2>{{ session('user')->points ?? 0 }} poin</h2>
        </div>

        @if(session('success'))
            <p class="reveal reveal-delay-3" style="color:green; font-weight:bold;">
                {{ session('success') }}
            </p>
        @endif

    </div>

    {{-- PRODUCT GRID --}}
    <div class="reward-grid">

        @foreach($products as $index => $product)

        {{-- Stagger delay 1–8, lalu mulai lagi --}}
        @php $delay = ($index % 8) + 1; @endphp

        <div class="reward-card reveal reveal-delay-{{ $delay }}">

            <img
                src="{{ asset('images/' . $product->image) }}"
                alt="{{ $product->name }}"
            >

            <h3>{{ $product->name }}</h3>

            @if($product->description)
                <p>{{ $product->description }}</p>
            @endif

            <p><strong>{{ $product->points }} Poin</strong></p>

            <a href="{{ route('reward.verify', $product->id) }}">
                Tukar Poin
            </a>

        </div>

        @endforeach

    </div>

</div>

@include('layouts.footer')

<script>
/* ── MODAL ── */
function closeModal() {
    document.getElementById('errorModal').style.display = 'none';
}

/* ── REVEAL ON SCROLL (efek laci) ── */
const revealObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('visible');
            // Setelah visible, stop observe supaya tidak reset saat scroll balik
            revealObserver.unobserve(entry.target);
        }
    });
}, {
    threshold: 0.12,      // muncul saat 12% elemen terlihat
    rootMargin: '0px 0px -40px 0px'  // sedikit sebelum benar-benar masuk viewport
});

// Observe semua elemen dengan class .reveal
document.querySelectorAll('.reveal').forEach(el => {
    revealObserver.observe(el);
});
</script>

</body>
</html>