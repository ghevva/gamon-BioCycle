<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - BioCycle</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
</head>
<body>

@include('layouts.navbar')

<!-- ── HERO + TENTANG KAMI ───────────────────── -->
<section class="about-hero">
    <div class="about-card">

        <p class="about-card-title">Tentang Kami</p>

        <p class="about-card-desc">
            BioCycle adalah platform bank sampah digital untuk menyetor plastik dan minyak jelantah.
            Daftar, pilih jadwal, lalu datang untuk setor. Sampah ditimbang, poin masuk,
            dan bisa ditukar dengan berbagai manfaat. Prosesnya cepat, rapi, dan transparan.
        </p>

        <!-- Visi -->
        <div class="about-block">
            <h3>Visi</h3>
            <ul>
                <li>Menjadi platform digital yang membantu masyarakat mengelola sampah secara lebih mudah dan berkelanjutan.</li>
                <li>Menciptakan lingkungan yang lebih ramah dan sehat.</li>
            </ul>
        </div>

        <!-- Misi -->
        <div class="about-block">
            <h3>Misi</h3>
            <ul>
                <li>Menjadi platform digital yang membantu masyarakat mengelola sampah secara lebih mudah dan berkelanjutan.</li>
                <li>Menciptakan lingkungan yang lebih ramah dan sehat.</li>
            </ul>
        </div>

        <!-- Developer -->
        <div class="about-block">
            <h3>Developer</h3>
            <ul>
                <li>Muhammad Daffa Ronalvianto Pratama / @dapmonnn</li>
                <li>Ghefarah Arkhanza Nurwanda / @alwaysxgh</li>
            </ul>
        </div>

    </div>
</section>

<!-- ── FEATURES BAR ──────────────────────────── -->
<section class="features">
    <div>EcoValue</div>
    <div>CleanGain</div>
    <div>RecyPoint</div>
    <div>GreenEarn</div>
    <div>WasteWise</div>
</section>

<!-- ── KENAPA KAMI ───────────────────────────── -->
<section class="about-why">
    <div class="about-why-inner">

        <div class="about-why-img"></div>

        <div class="about-why-text">
            <h2>Mengapa Kami Membuat Website Ini</h2>
            <ul>
                <li>Banyak sampah plastik tidak terkelola.</li>
                <li>Minyak jelantah sering dibuang sembarangan dan merusak lingkungan.</li>
                <li>Perlu sistem digital agar bank sampah lebih teratur.</li>
                <li>Menjadi media literatur untuk menambah wawasan para pengguna akan pentingnya pengelolaan limbah.</li>
            </ul>

            <h3>Layanan Yang Tersedia</h3>
            <ul>
                <li>Layanan pengelolaan sampah plastik</li>
                <li>Layanan Pengelolahan limbah minyak</li>
                <li>Menyediakan barang - barang hasil olahan dengan harga yang terjangkau.</li>
            </ul>
        </div>

    </div>
</section>

<!-- ── TAGLINE ───────────────────────────────── -->
<section class="about-tagline">
    <div class="about-tagline-inner">
        <h2>BioCycle Menjamin Kemudahan Pengelolahan Sampahmu</h2>
        <p>Tidak ada alasan untuk tidak peduli terhadap kesehatan lingkungan. Sayangi dirimu dan tempat yang kamu gunakan untuk berpijak.</p>
    </div>
</section>

@include('layouts.footer')

</body>
</html>