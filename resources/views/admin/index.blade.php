<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Dashboard Admin</title>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card-custom {
            transition: transform 0.2s;
        }
        .card-custom:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="#">📚 Admin Perpustakaan</a>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="text-center mb-4">
            <h1 class="fw-bold">Selamat Datang, Admin!</h1>
            <p class="text-muted">Kelola data buku dan sistem perpustakaan dengan mudah.</p>
        </div>

        <div class="row g-4">
            <!-- Tambah Buku -->
            <div class="col-md-3">
                <div class="card card-custom h-100 text-center p-3">
                    <div class="card-body">
                        <h5 class="card-title">➕ Tambah Buku</h5>
                        <p class="text-muted">Masukkan data buku baru ke dalam sistem.</p>
                        <a href="{{ route('books.create') }}" class="btn btn-primary">Tambah</a>
                    </div>
                </div>
            </div>

            <!-- Daftar Buku -->
            <div class="col-md-3">
                <div class="card card-custom h-100 text-center p-3">
                    <div class="card-body">
                        <h5 class="card-title">📖 Daftar Buku</h5>
                        <p class="text-muted">Lihat seluruh koleksi buku yang tersedia.</p>
                        <a href="{{ route('books.all') }}" class="btn btn-success">Lihat</a>
                    </div>
                </div>
            </div>

            <!-- Edit Buku -->
            <div class="col-md-3">
                <div class="card card-custom h-100 text-center p-3">
                    <div class="card-body">
                        <h5 class="card-title">✏️ Edit Buku</h5>
                        <p class="text-muted">Update data buku tertentu berdasarkan ID.</p>
                        <a href="{{ route('books.edit', ['id' => 1]) }}" class="btn btn-warning">Edit</a>
                    </div>
                </div>
            </div>

            <!-- Hapus Buku -->
            <div class="col-md-3">
                <div class="card card-custom h-100 text-center p-3">
                    <div class="card-body">
                        <h5 class="card-title">🗑️ Hapus Buku</h5>
                        <p class="text-muted">Hapus data buku dari database.</p>
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-danger">Hapus</a>
                    </div>
                </div>
            </div>

            <!-- Sinkronisasi Buku -->
             <div class="col-md-3">
                <div class="card card-custom h-100 text-center p-3">
                    <div class="card-body">
                        <h5 class="card-title">Tes</h5>
                        <p class="text-muted">Sinkronisasi api</p>
                        <a href="{{ route('books.sync') }}" class="btn btn-primary mb-3">Sync Buku dari API</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
