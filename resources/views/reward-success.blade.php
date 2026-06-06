<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Penukaran Berhasil - BioCycle</title>

    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/reward-success.css') }}">
</head>
<body>

@include('layouts.navbar')

<div class="success-wrapper">
    <div class="success-card">

        <div class="success-icon">✅</div>

        <h1>Penukaran Berhasil!</h1>

        <p>Produk berhasil ditukar menggunakan poin Anda.</p>
        <p>Silakan ambil produk di lokasi Bank Sampah BioCycle.</p>

        <div class="success-divider"></div>

        <div class="success-actions">
            <a href="{{ route('reward.history') }}" class="btn-primary-full">
                Lihat Riwayat Penukaran
            </a>
            <a href="{{ route('reward.index') }}" class="btn-secondary-full">
                Kembali ke Reward
            </a>
        </div>

    </div>
</div>

@include('layouts.footer')

</body>
</html>