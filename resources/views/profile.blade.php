<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>

    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
</head>
<body>

@include('layouts.navbar')

<div class="profile-container">

    <div class="profile-card">

        <div class="profile-header">
            <div class="profile-avatar">
                {{ strtoupper(substr(session('user')->name, 0, 1)) }}
            </div>

            <div>
                <div class="profile-name">
                    {{ session('user')->name }}
                </div>
                <small>{{ session('user')->email }}</small>
            </div>
        </div>

        <div class="profile-info">
            <div>
                <span>Email</span>
                <strong>{{ session('user')->email }}</strong>
            </div>

            <div>
                <span>Phone</span>
                <strong>{{ session('user')->phone }}</strong>
            </div>
        </div>

        <div class="profile-actions">
            <a href="/logout" class="btn-logout">Logout</a>
        </div>

    </div>

</div>

</body>
</html>