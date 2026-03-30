<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Tambah User</h1>

    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Nama"><br>
        <input type="email" name="email" placeholder="Email"><br>
        <input type="text" name="phone" placeholder="No HP"><br>
        <input type="password" name="password" placeholder="Password"><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>