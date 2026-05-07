<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
    <title>Data User</title>
</head>
<body>

    @include('layouts.admin-navbar')

    <br><br><br>
    <h1>Data User</h1>

    <a href="{{ route('user.create') }}">Tambah User</a>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <br><br>

    @if($users->count())
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Poin</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $index => $user)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->points }}</td>

                        <td>
                            <a href="{{ route('user.edit', $user->id) }}">Edit</a>

                            |

                            <form action="{{ route('user.destroy', $user->id) }}"
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
        <p>Belum ada data user.</p>
    @endif

</body>
</html>