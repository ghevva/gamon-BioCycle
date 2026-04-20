<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>

@include('layouts.navbar')

<div class="auth-container">
    <div class="auth-card">

        <h2>Login</h2>

        @if(session('error'))
            <div class="error">{{ session('error') }}</div>
        @endif

        @if(session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="/login">
            @csrf

            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>

            <button type="submit">Login</button>
        </form>

        <a href="/register">Belum punya akun? Daftar</a>

    </div>
</div>

</body>
</html>