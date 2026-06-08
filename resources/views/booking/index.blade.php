<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/admin-sidebar.css') }}">
    <title>Data Booking — BioCycle Admin</title>
</head>
<body>

<div class="admin-layout">

    @include('layouts.admin-sidebar')

    <header class="admin-topbar">
        <div class="topbar-left">
            <div>
                <div class="topbar-title">Data Booking</div>
                <div class="topbar-breadcrumb">Admin / <span>Data Booking</span></div>
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
                <h1>Data Booking</h1>
                <p>Kelola semua pengajuan booking sampah & minyak jelantah</p>
            </div>
            <a href="{{ route('booking.create') }}" class="btn btn-primary">
                <svg viewBox="0 0 24 24"><path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/></svg>
                Tambah Booking
            </a>
        </div>

        {{-- STATS --}}
        <div class="stats-row">
            <div class="stat-card">
                <div class="stat-icon green">
                    <svg viewBox="0 0 24 24"><path d="M19 3h-1V1h-2v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V8h14v11zM7 10h5v5H7z"/></svg>
                </div>
                <div class="stat-info">
                    <div class="stat-value">{{ $bookings->count() }}</div>
                    <div class="stat-label">Total Booking</div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon amber">
                    <svg viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/></svg>
                </div>
                <div class="stat-info">
                    <div class="stat-value">{{ $bookings->where('status','pending')->count() }}</div>
                    <div class="stat-label">Menunggu ACC</div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon teal">
                    <svg viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>
                </div>
                <div class="stat-info">
                    <div class="stat-value">{{ $bookings->where('status','approved')->count() }}</div>
                    <div class="stat-label">Selesai</div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h2>Daftar Booking</h2>
            </div>
            <div class="card-body">

                @if($bookings->count())
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jenis</th>
                                <th>Volume / Berat</th>
                                <th>Tanggal & Jam</th>
                                <th>Antrian</th>
                                <th>Status</th>
                                <th>Poin</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bookings as $index => $b)
                                <tr>
                                    <td style="color:var(--text-gray);font-weight:600;">{{ $index + 1 }}</td>
                                    <td><strong>{{ $b->name }}</strong></td>
                                    <td>
                                        @if($b->type == 'minyak')
                                            <span class="type-chip oil">🫙 Minyak Jelantah</span>
                                        @else
                                            <span class="type-chip plastic">♻️ Sampah Plastik</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($b->type == 'minyak')
                                            {{ $b->volume }} Liter
                                        @else
                                            {{ $b->weight }} Kg
                                        @endif
                                    </td>
                                    <td>
                                        <div style="font-weight:600;">{{ $b->date }}</div>
                                        <div style="font-size:0.75rem;color:var(--text-gray);">{{ $b->time }}</div>
                                    </td>
                                    <td>
                                        <span class="badge badge-success">#{{ $b->queue_number }}</span>
                                    </td>
                                    <td>
                                        @if($b->status == 'pending')
                                            <span class="badge badge-pending">⏳ Pending</span>
                                        @else
                                            <span class="badge badge-success">✓ Selesai</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($b->final_amount)
                                            <span class="badge badge-success">{{ $b->final_amount * 5 }} poin</span>
                                        @else
                                            <span style="color:var(--text-gray);">—</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="action-group" style="flex-wrap:wrap;">
                                            {{-- ACC FORM --}}
                                            @if($b->status == 'pending')
                                                <form action="{{ route('booking.approve', $b->id) }}" method="POST" class="inline-form">
                                                    @csrf
                                                    <input type="number" step="0.1" name="final_amount"
                                                           placeholder="Kg / L"
                                                           class="input-sm" required>
                                                    <button type="submit" class="btn btn-success btn-sm">ACC</button>
                                                </form>
                                            @endif

                                            <a href="{{ route('booking.edit', $b->id) }}" class="btn btn-outline btn-sm">
                                                <svg viewBox="0 0 24 24"><path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/></svg>
                                                Edit
                                            </a>

                                            <form action="{{ route('booking.destroy', $b->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin hapus booking ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <svg viewBox="0 0 24 24"><path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/></svg>
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="empty-state">
                        <svg viewBox="0 0 24 24"><path d="M19 3h-1V1h-2v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V8h14v11zM7 10h5v5H7z"/></svg>
                        <p>Belum ada data booking.</p>
                    </div>
                @endif

            </div>
        </div>

    </main>
</div>

</body>
</html>