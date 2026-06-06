<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Product</title>

    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
</head>
<body>

@include('layouts.admin-navbar')

<br><br><br>

<h1>Data Product</h1>

<a href="{{ route('product.create') }}">
    Tambah Product
</a>

<br><br>

<table border="1" cellpadding="10" cellspacing="0">

    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Poin</th>
            <th>Image</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>

        @foreach($products as $index => $product)

        <tr>

            <td>{{ $index + 1 }}</td>

            <td>{{ $product->name }}</td>

            <td>{{ $product->points }}</td>

            <td>{{ $product->image }}</td>

            <td>

                <a href="{{ route('product.edit', $product->id) }}">
                    Edit
                </a>

                |

                <form
                    action="{{ route('product.destroy', $product->id) }}"
                    method="POST"
                    style="display:inline;"
                >
                    @csrf
                    @method('DELETE')

                    <button type="submit">
                        Hapus
                    </button>
                </form>

            </td>

        </tr>

        @endforeach

    </tbody>

</table>

</body>
</html>