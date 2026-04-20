<!DOCTYPE html>
<html>
<head>
    <title>Register</title>

    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>

@include('layouts.navbar')

<div class="auth-container">
    <div class="auth-card">

        <h2>Daftar</h2>

        <form method="POST" action="/register">
            @csrf

            <input type="text" name="name" placeholder="Nama" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="text" name="phone" placeholder="Phone" required>
            <input type="password" name="password" placeholder="Password" required>

            <button type="submit">Daftar</button>
        </form>

        <a href="/login">Sudah punya akun? Login</a>

    </div>
</div>

</body>
</html>