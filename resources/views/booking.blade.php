<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Booking - BioCycle</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/booking.css') }}">
</head>
<body>

@include('layouts.navbar')

<!-- ── HERO + PILIH JENIS ───────────────────── -->
<section class="booking-hero">
    <div class="booking-selector">
        <h3>Pilih Jenis Limbah yang akan di Setorkan !</h3>

        <div class="booking-choices">

            <!-- Minyak Jelantah -->
            <a href="{{ route('booking.create') }}?type=minyak" class="booking-choice">
                <img src="{{ asset('images/oil.jpg') }}" alt="Minyak Jelantah">
                <div class="booking-choice-label">Minyak Jelantah</div>
            </a>

            <!-- Limbah Plastik -->
            <a href="{{ route('booking.create') }}?type=plastik" class="booking-choice">
                <img src="{{ asset('images/plastic.jpg') }}" alt="Limbah Plastik">
                <div class="booking-choice-label">Limbah Plastik</div>
            </a>

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

<!-- ── RIWAYAT BOOKING ───────────────────────── -->
<div class="booking-history">

    <div class="booking-history-header">
        <h3>Semua Riwayat Booking</h3>
        <span>▼</span>
    </div>

    @if($bookings->count())
        @foreach($bookings as $b)
        <div class="booking-card">

            <!-- Tipe di atas -->
            <div class="booking-card-type">
                <span class="type-label">Jenis</span>
                <span class="type-value">
                    {{ $b->type == 'minyak' ? 'Minyak Jelantah' : 'Limbah Plastik' }}
                </span>
            </div>

            <!-- Detail -->
            <div class="booking-card-body">

                <div class="booking-field">
                    <span class="booking-field-label">Nama</span>
                    <span class="booking-field-value">{{ $b->name }}</span>
                </div>

                @if($b->type == 'minyak')
                <div class="booking-field">
                    <span class="booking-field-label">Volume (Liter)</span>
                    <span class="booking-field-value">{{ $b->volume }} liter</span>
                </div>
                @else
                <div class="booking-field">
                    <span class="booking-field-label">Berat (Kg)</span>
                    <span class="booking-field-value">{{ $b->weight }} kg</span>
                </div>
                @endif

                <div class="booking-field">
                    <span class="booking-field-label">Tanggal & Waktu Kedatangan</span>
                    <span class="booking-field-value">{{ $b->date }} / Pukul {{ $b->time }} WIB.</span>
                </div>

                <!-- NOMOR ANTRIAN -->
                <div class="booking-field">
                    <span class="booking-field-label">Nomor Antrian</span>
                    <span class="booking-field-value">#{{ $b->queue_number }}</span>
                </div>

            </div>
        </div>
        @endforeach

    @else
        <div class="booking-empty">
            <span>📭</span>
            Belum ada riwayat booking.
        </div>
    @endif

</div>

@include('layouts.footer')
</body>
</html>