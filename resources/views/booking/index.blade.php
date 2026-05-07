<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
    <title>Data Booking</title>
</head>
<body>

    @include('layouts.admin-navbar')

    <br><br><br>
    <h1>Data Booking</h1>

    <a href="{{ route('booking.create') }}">Tambah Booking</a>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <br><br>

    @if($bookings->count())
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jenis</th>
                    <th>Volume / Berat</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>No Antrian</th>
                    <th>Status</th>
                    <th>Poin</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach($bookings as $index => $b)
                    <tr>

                        <td>{{ $index + 1 }}</td>

                        <td>{{ $b->name }}</td>

                        <td>
                            {{ $b->type == 'minyak'
                                ? 'Minyak Jelantah'
                                : 'Sampah Plastik' }}
                        </td>

                        <td>
                            @if($b->type == 'minyak')
                                {{ $b->volume }} Liter
                            @else
                                {{ $b->weight }} Kg
                            @endif
                        </td>

                        <td>{{ $b->date }}</td>

                        <td>{{ $b->time }}</td>

                        <td>{{ $b->queue_number }}</td>

                        <td>{{ $b->status }}</td>

                        <td>
                            @if($b->final_amount)
                                {{ $b->final_amount * 10 }} Poin
                            @else
                                -
                            @endif
                        </td>

                        <td>

                            {{-- FORM ACC --}}
                            @if($b->status == 'pending')

                            <form action="{{ route('booking.approve', $b->id) }}"
                                  method="POST">

                                @csrf

                                <input type="number"
                                       step="0.1"
                                       name="final_amount"
                                       placeholder="Final Kg/L"
                                       required>

                                <button type="submit">
                                    ACC
                                </button>

                            </form>

                            <br>

                            @endif

                            <a href="{{ route('booking.edit', $b->id) }}">
                                Edit
                            </a>

                            |

                            <form action="{{ route('booking.destroy', $b->id) }}"
                                  method="POST"
                                  style="display:inline;">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        onclick="return confirm('Yakin hapus?')">
                                    Hapus
                                </button>

                            </form>

                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>

    @else
        <p>Belum ada data booking.</p>
    @endif

</body>
</html>