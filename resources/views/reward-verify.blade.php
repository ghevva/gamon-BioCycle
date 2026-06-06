<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Verifikasi Penukaran Poin</title>

    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/reward-verify.css') }}">
</head>
<body>

@include('layouts.navbar')

<div class="verify-wrapper">

    <h1>Verifikasi Penukaran Poin</h1>

    <!-- Info Produk & Poin -->
    <div class="verify-product-card">
        <h3>{{ $product->name }}</h3>
        <div class="verify-row">
            <span>Poin Anda</span>
            <span>{{ $user->points }} poin</span>
        </div>
        <div class="verify-row">
            <span>Harga Produk</span>
            <span>{{ $product->points }} poin</span>
        </div>
    </div>

    <!-- Lokasi Pengambilan -->
    <div class="verify-location-card">
        <h3>📍 Lokasi Pengambilan</h3>
        <p>
            Perum Park Royal Regency, Desa T2/29, RT.05/RW.09,
            Sono, Sidokerto, Kec. Buduran,
            Kabupaten Sidoarjo, Jawa Timur 61252
        </p>

        <iframe
            src="https://maps.google.com/maps?q=bank%20sampah%20sidoarjo&t=&z=15&ie=UTF8&iwloc=&output=embed"
            height="300"
            allowfullscreen
            loading="lazy">
        </iframe>

        <a href="https://maps.google.com/maps?vet=10CAAQoqAOahcKEwi44PzR2PGUAxUAAAAAHQAAAAAQBg..i&pvq=Cg0vZy8xMWg5dmp0MXBnIhEKC2Jhbmsgc2FtcGFoEAIYAw&lqi=ChRiYW5rIHNhbXBhaCBzaWRvYXJqb0iujbKop6-AgAhaIBAAEAEYABgBGAIiFGJhbmsgc2FtcGFoIHNpZG9hcmpvkgENc29jaWFsX3dvcmtlcg&fvr=1&cs=1&um=1&ie=UTF-8&fb=1&gl=id&sa=X&ftid=0x2dd7e3fe085b5479:0x49c411c0db8766d6"
           target="_blank"
           class="btn-maps">
            📍 Buka di Google Maps
        </a>
    </div>

    <!-- Aksi -->
    <div class="verify-action-card">
        <form action="{{ route('reward.confirm', $product->id) }}" method="POST">
            @csrf
            <button type="submit" class="btn-confirm">Konfirmasi Penukaran</button>
        </form>

        <a href="{{ route('reward.index') }}" class="btn-cancel">Batal</a>
    </div>

</div>

@include('layouts.footer')

</body>
</html>