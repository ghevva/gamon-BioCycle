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

        <span class="modal-close" onclick="closeModal()">
            &times;
        </span>

        <h3>Peringatan</h3>

        <p>{{ session('error') }}</p>

    </div>
</div>
@endif

<div class="reward-page">

    <div class="reward-header">
        <h1>Tukar Poinmu</h1>

        <p>
            Gunakan poin dari setoran untuk menukarkan reward
        </p>

        <div class="point-card">
            <span>Total Poin</span>
            <h2>{{ session('user')->points ?? 0 }} poin</h2>
        </div>

        @if(session('success'))
            <p style="color:green; font-weight:bold;">
                {{ session('success') }}
            </p>
        @endif

    </div>

    <div class="reward-grid">

        @foreach($products as $product)

        <div class="reward-card">

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
function closeModal() {
    document.getElementById('errorModal').style.display = 'none';
}
</script>

</body>
</html>