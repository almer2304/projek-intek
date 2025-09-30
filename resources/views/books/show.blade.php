<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Detail Buku</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-6">

      <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header bg-info text-white text-center rounded-top-4">
          <h4 class="mb-0">Detail Buku</h4>
        </div>
        <div class="card-body">
          <p><strong>Judul:</strong> {{ $book->judul }}</p>
          <p><strong>Pengarang:</strong> {{ $book->pengarang }}</p>
          <p><strong>Penerbit:</strong> {{ $book->penerbit }}</p>
          <p><strong>Tahun Terbit:</strong> {{ $book->tahun_terbit }}</p>
          <p><strong>Stok:</strong> {{ $book->stok }}</p>
        </div>
        <div class="card-footer text-center">
          <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning">
            <i class="bi bi-pencil-square"></i> Edit
          </a>
          <a href="{{ route('books.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
          </a>
        </div>
      </div>

    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</body>
</html>
