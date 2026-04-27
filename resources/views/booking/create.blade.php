<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Booking - BioCycle</title>
    <link rel="stylesheet" href="{{ asset('css/booking-create.css') }}">
</head>
<body>

<div class="create-card">

    <!-- Header -->
    <div class="create-header">
        <h1>Tambah Booking</h1>
        <p>Isi data penyetoran limbah kamu di bawah ini</p>
    </div>

    <!-- Form -->
    <form action="{{ route('booking.store') }}" method="POST" class="create-form">
        @csrf

        <!-- Jenis Limbah -->
        <div class="form-group">
            <label for="type">Jenis Limbah</label>
            <div class="select-wrapper">
                <select name="type" id="type" onchange="toggleForm()">
                    <option value="">-- Pilih Jenis --</option>
                    <option value="minyak" {{ request('type') == 'minyak' ? 'selected' : '' }}>Minyak Jelantah</option>
                    <option value="plastik" {{ request('type') == 'plastik' ? 'selected' : '' }}>Sampah Plastik</option>
                </select>
            </div>
        </div>

        <!-- Nama -->
        <div class="form-group">
            <label for="name">Nama Lengkap</label>
            <input type="text" name="name" id="name" placeholder="Masukkan nama lengkap">
        </div>

        <!-- Volume (Minyak) -->
        <div id="minyakForm" class="form-group">
            <label for="volume">Volume (Liter)</label>
            <input type="number" name="volume" id="volume" placeholder="Contoh: 5" min="0" step="0.1">
        </div>

        <!-- Berat (Plastik) -->
        <div id="plastikForm" class="form-group">
            <label for="weight">Berat (Kg)</label>
            <input type="number" name="weight" id="weight" placeholder="Contoh: 3" min="0" step="0.1">
        </div>

        <div class="form-divider"></div>

        <!-- Tanggal -->
        <div class="form-group">
            <label for="date">Tanggal Kedatangan</label>
            <input type="date" name="date" id="date">
        </div>

        <!-- Jam -->
        <div class="form-group">
            <label for="time">Waktu Kedatangan</label>
            <div class="select-wrapper">
                <select name="time" id="time">
                    @for ($hour = 8; $hour <= 17; $hour++)
                        @foreach (['00', '30'] as $minute)
                            @php $time = str_pad($hour, 2, '0', STR_PAD_LEFT) . ':' . $minute; @endphp
                            @if(!($hour == 17 && $minute == '30'))
                                <option value="{{ $time }}">{{ $time }} WIB</option>
                            @endif
                        @endforeach
                    @endfor
                </select>
            </div>
        </div>

        <!-- Submit -->
        <button type="submit" class="btn-submit">Simpan Booking →</button>



    </form>
</div>

<script>
function toggleForm() {
    const type = document.getElementById("type").value;
    document.getElementById("minyakForm").style.display = "none";
    document.getElementById("plastikForm").style.display = "none";

    if (type === "minyak") {
        document.getElementById("minyakForm").style.display = "flex";
    } else if (type === "plastik") {
        document.getElementById("plastikForm").style.display = "flex";
    }
}

window.onload = toggleForm;
</script>

</body>
</html>