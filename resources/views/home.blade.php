<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BioCycle</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body>

<!-- NAVBAR -->
@include('layouts.navbar')

<!-- HERO SECTION -->
<section class="hero">
    <div class="overlay">
        <h2>Selamat datang!</h2>
        <h1>BioCycle</h1>
        <p>
            BioCycle adalah platform bank sampah digital untuk menyetor
            serta mengelola minyak jelantah dan plastik secara transparan.
        </p>

        <div class="hero-buttons">
            <div class="motto">
                <h4>Motto Kami</h4>
                <p>Kami hadir untuk membantu masyarakat lebih baik dalam mengolah lingkungan.</p>
            </div>

            <a href="#" class="btn-primary">Setor Sekarang →</a>
        </div>
    </div>
</section>

<!-- FITUR ICON -->
<section class="features">
    <div>EcoValue</div>
    <div>CleanGain</div>
    <div>RecyPoint</div>
    <div>GreenEarn</div>
    <div>WasteWise</div>
</section>

<!-- SECTION EDUKASI -->
<section class="about">
    <div class="about-img"></div>
    <div class="about-text">
        <h2>Kenapa pengelolahan sampah harus menjadi masalah?</h2>
        <p>
            Sampah plastik terus meningkat setiap tahunnya.
            Kurangnya edukasi dan sistem pengolahan yang efektif
            membuat lingkungan semakin tercemar.
        </p>
    </div>
</section>

<!-- IMPLEMENTASI -->
<section class="implementation">
    <h2>Implementasi Pengolahan Minyak Jelantah dan Sampah Plastik</h2>
    <p>Berikut adalah video untuk mengolah sampah menjadi produk yang bermanfaat.</p>

    <div class="video-preview">
        ▶
    </div>
</section>

</body>
</html>