<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/admin-sidebar.css') }}">
    <title>Data Produk — BioCycle Admin</title>
</head>
<body>

<div class="admin-layout">

    @include('layouts.admin-sidebar')

    <header class="admin-topbar">
        <div class="topbar-left">
            <div>
                <div class="topbar-title">Data Produk</div>
                <div class="topbar-breadcrumb">Admin / <span>Data Produk</span></div>
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
                <h1>Data Produk</h1>
                <p>Kelola katalog produk yang dapat ditukar dengan poin</p>
            </div>
            <a href="{{ route('product.create') }}" class="btn btn-primary">
                <svg viewBox="0 0 24 24"><path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/></svg>
                Tambah Produk
            </a>
        </div>

        <div class="stats-row">
            <div class="stat-card">
                <div class="stat-icon green">
                    <svg viewBox="0 0 24 24"><path d="M20 6h-2.18c.07-.44.18-.88.18-1.36C18 2.06 15.73 0 13 0c-1.5 0-2.84.6-3.78 1.56L8 2.8 6.78 1.56C5.84.6 4.5 0 3 0 .27 0-2 2.06-2 4.64c0 .48.11.92.18 1.36H-4v14h28V6h-4z"/></svg>
                </div>
                <div class="stat-info">
                    <div class="stat-value">{{ $products->count() }}</div>
                    <div class="stat-label">Total Produk</div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon amber">
                    <svg viewBox="0 0 24 24"><path d="M11.8 10.9c-2.27-.59-3-1.2-3-2.15 0-1.09 1.01-1.85 2.7-1.85 1.78 0 2.44.85 2.5 2.1h2.21c-.07-1.72-1.12-3.3-3.21-3.81V3h-3v2.16c-1.94.42-3.5 1.68-3.5 3.61 0 2.31 1.91 3.46 4.7 4.13 2.5.6 3 1.48 3 2.41 0 .69-.49 1.79-2.7 1.79-2.06 0-2.87-.92-2.98-2.1h-2.2c.12 2.19 1.76 3.42 3.68 3.83V21h3v-2.15c1.95-.37 3.5-1.5 3.5-3.55 0-2.84-2.43-3.81-4.7-4.4z"/></svg>
                </div>
                <div class="stat-info">
                    <div class="stat-value">{{ $products->sum('points') }}</div>
                    <div class="stat-label">Total Poin Semua Produk</div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h2>Katalog Produk</h2>
            </div>
            <div class="card-body">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Produk</th>
                            <th>Poin</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $index => $product)
                            <tr>
                                <td style="color:var(--text-gray);font-weight:600;">{{ $index + 1 }}</td>
                                <td><strong>{{ $product->name }}</strong></td>
                                <td>
                                    <span class="badge badge-success">{{ number_format($product->points) }} poin</span>
                                </td>
                                <td>
                                    @if($product->image)
                                        <img src="{{ asset('storage/' . $product->image) }}"
                                             alt="{{ $product->name }}"
                                             style="width:44px;height:44px;object-fit:cover;border-radius:8px;border:1px solid var(--border);">
                                    @else
                                        <span style="color:var(--text-gray);font-size:0.78rem;">Tidak ada gambar</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="action-group">
                                        <a href="{{ route('product.edit', $product->id) }}" class="btn btn-outline btn-sm">
                                            <svg viewBox="0 0 24 24"><path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/></svg>
                                            Edit
                                        </a>
                                        <form action="{{ route('product.destroy', $product->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin hapus produk ini?')">
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
            </div>
        </div>

    </main>
</div>

</body>
</html>