<!DOCTYPE html>
<html>
<head>
    <title>Data Penukaran</title>
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
</head>
<body>

@include('layouts.admin-navbar')

<h1>Data Penukaran Poin</h1>

@if(session('success'))
    <p style="color:green;">
        {{ session('success') }}
    </p>
@endif

<table border="1" cellpadding="10">

    <tr>
        <th>ID User</th>
        <th>Produk</th>
        <th>Poin</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>

    @foreach($redemptions as $r)

    <tr>

        <td>{{ $r->user_id }}</td>

        <td>{{ $r->product_name }}</td>

        <td>{{ $r->points_used }}</td>

        <td>

            @if($r->status == 'pending')

                <span style="color:orange;">
                    Menunggu Pengambilan
                </span>

            @else

                <span style="color:green;">
                    Sukses
                </span>

            @endif

        </td>

        <td>

            @if($r->status == 'pending')

            <form
                action="{{ route('redemption.complete', $r->id) }}"
                method="POST"
            >

                @csrf

                <button type="submit">
                    Sudah Diambil
                </button>

            </form>

            @else

                -

            @endif

        </td>

    </tr>

    @endforeach

</table>

</body>
</html>