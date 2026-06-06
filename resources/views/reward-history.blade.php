<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Penukaran - BioCycle</title>

    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/reward-history.css') }}">
</head>
<body>

@include('layouts.navbar')

<div class="history-wrapper">

    <h1>Riwayat Penukaran Poin</h1>

    <div class="history-table-card">

        @if($histories->count())
        <table class="history-table">

            <thead>

                <tr>
                    <th>Produk</th>
                    <th>Poin Digunakan</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                </tr>

            </thead>

            <tbody>

                @foreach($histories as $item)

                <tr>

                    <td>
                        {{ $item->product_name }}
                    </td>

                    <td>
                        {{ $item->points_used }} poin
                    </td>

                    <td>

                        @if($item->status == 'pending')

                            <span style="
                                color: #ff9800;
                                font-weight: bold;
                            ">
                                Belum Diambil
                            </span>

                        @else

                            <span style="
                                color: green;
                                font-weight: bold;
                            ">
                                Penukaran Sukses
                            </span>

                        @endif

                    </td>

                    <td>
                        {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y, H:i') }}
                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

        @else
        <div class="history-empty">
            <span>📭</span>
            <p>Belum ada riwayat penukaran poin.</p>
        </div>
        @endif

    </div>

</div>

@include('layouts.footer')

</body>
</html>