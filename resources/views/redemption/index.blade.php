<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/admin-sidebar.css') }}">
    <title>Penukaran Poin — BioCycle Admin</title>
</head>
<body>

<div class="admin-layout">

    @include('layouts.admin-sidebar')

    <header class="admin-topbar">
        <div class="topbar-left">
            <div>
                <div class="topbar-title">Penukaran Poin</div>
                <div class="topbar-breadcrumb">Admin / <span>Penukaran Poin</span></div>
            </div>
        </div>
        <div class="topbar-right">
            <div class="topbar-admin-badge">
                <div class="topbar-avatar">A</div>
                <span class="topbar-admin-name">Administrator</span>
            </div>
        </div>
    </header>

    <main class="admin-main">

        @if(session('success'))
            <div class="alert alert-success">
                <svg viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>
                {{ session('success') }}
            </div>
        @endif

        <div class="page-header">
            <div>
                <h1>Penukaran Poin</h1>
                <p>Kelola pengajuan penukaran poin dari pengguna</p>
            </div>
        </div>

        <div class="stats-row">
            <div class="stat-card">
                <div class="stat-icon green">
                    <svg viewBox="0 0 24 24"><path d="M11.8 10.9c-2.27-.59-3-1.2-3-2.15 0-1.09 1.01-1.85 2.7-1.85 1.78 0 2.44.85 2.5 2.1h2.21c-.07-1.72-1.12-3.3-3.21-3.81V3h-3v2.16c-1.94.42-3.5 1.68-3.5 3.61 0 2.31 1.91 3.46 4.7 4.13 2.5.6 3 1.48 3 2.41 0 .69-.49 1.79-2.7 1.79-2.06 0-2.87-.92-2.98-2.1h-2.2c.12 2.19 1.76 3.42 3.68 3.83V21h3v-2.15c1.95-.37 3.5-1.5 3.5-3.55 0-2.84-2.43-3.81-4.7-4.4z"/></svg>
                </div>
                <div class="stat-info">
                    <div class="stat-value">{{ $redemptions->count() }}</div>
                    <div class="stat-label">Total Penukaran</div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon amber">
                    <svg viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/></svg>
                </div>
                <div class="stat-info">
                    <div class="stat-value">{{ $redemptions->where('status','pending')->count() }}</div>
                    <div class="stat-label">Menunggu Pengambilan</div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon teal">
                    <svg viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>
                </div>
                <div class="stat-info">
                    <div class="stat-value">{{ $redemptions->where('status','completed')->count() }}</div>
                    <div class="stat-label">Sudah Diambil</div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon red">
                    <svg viewBox="0 0 24 24"><path d="M11.8 10.9c-2.27-.59-3-1.2-3-2.15 0-1.09 1.01-1.85 2.7-1.85 1.78 0 2.44.85 2.5 2.1h2.21c-.07-1.72-1.12-3.3-3.21-3.81V3h-3v2.16c-1.94.42-3.5 1.68-3.5 3.61 0 2.31 1.91 3.46 4.7 4.13 2.5.6 3 1.48 3 2.41 0 .69-.49 1.79-2.7 1.79-2.06 0-2.87-.92-2.98-2.1h-2.2c.12 2.19 1.76 3.42 3.68 3.83V21h3v-2.15c1.95-.37 3.5-1.5 3.5-3.55 0-2.84-2.43-3.81-4.7-4.4z"/></svg>
                </div>
                <div class="stat-info">
                    <div class="stat-value">{{ $redemptions->sum('points_used') }}</div>
                    <div class="stat-label">Total Poin Ditukar</div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h2>Riwayat Penukaran</h2>
            </div>
            <div class="card-body">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID User</th>
                            <th>Produk</th>
                            <th>Poin Digunakan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($redemptions as $index => $r)
                            <tr>
                                <td style="color:var(--text-gray);font-weight:600;">{{ $index + 1 }}</td>
                                <td>
                                    <span class="badge badge-success">#{{ $r->user_id }}</span>
                                </td>
                                <td><strong>{{ $r->product_name }}</strong></td>
                                <td>
                                    <span style="font-weight:700;color:var(--green-accent);">
                                        {{ number_format($r->points_used) }} poin
                                    </span>
                                </td>
                                <td>
                                    @if($r->status == 'pending')
                                        <span class="badge badge-pending">⏳ Menunggu Pengambilan</span>
                                    @else
                                        <span class="badge badge-success">✓ Sudah Diambil</span>
                                    @endif
                                </td>
                                <td>
                                    @if($r->status == 'pending')
                                        <form action="{{ route('redemption.complete', $r->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <svg viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>
                                                Sudah Diambil
                                            </button>
                                        </form>
                                    @else
                                        <span style="color:var(--text-gray);font-size:0.8rem;">—</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </main>
</div>

</body>
</html>