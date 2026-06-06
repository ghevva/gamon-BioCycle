<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Product</title>
</head>
<body>

<h1>Tambah Product</h1>

<form action="{{ route('product.store') }}" method="POST">

    @csrf

    <input type="text" name="name" placeholder="Nama Product">
    <br><br>

    <input type="number" name="points" placeholder="Harga Poin">
    <br><br>

    <input type="text" name="image" placeholder="Nama Gambar">
    <br><br>

    <textarea name="description" placeholder="Deskripsi"></textarea>
    <br><br>
    
    <button type="submit">
        Simpan
    </button>

</form>

</body>
</html>