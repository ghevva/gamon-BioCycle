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

            <a href="{{ route('booking.page') }}" class="btn-primary">Setor Sekarang →</a>
        </div>
    </div>
</section>

<!-- FITUR ICON -->
<section class="features">
    <div class="reveal reveal-delay-1">EcoValue</div>
    <div class="reveal reveal-delay-2">CleanGain</div>
    <div class="reveal reveal-delay-3">RecyPoint</div>
    <div class="reveal reveal-delay-4">GreenEarn</div>
    <div class="reveal reveal-delay-5">WasteWise</div>
</section>

<!-- SECTION EDUKASI -->
<section class="about">
    <div class="about-img reveal"></div>
    <div class="about-text reveal reveal-delay-2">
        <h2>Kenapa pengelolahan sampah harus menjadi masalah?</h2>
        <p>
            Sampah plastik terus meningkat setiap tahunnya.
            Kurangnya edukasi dan sistem pengolahan yang efektif
            membuat lingkungan semakin tercemar.
        </p>
    </div>
</section>

@include('layouts.footer')

<script>
const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('visible');
        }
    });
}, { threshold: 0.15 });

document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
</script>

</body>
</html>