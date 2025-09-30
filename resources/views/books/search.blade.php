<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cari Buku</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container py-5">
    <div class="card shadow-lg border-0 rounded-4">
      <div class="card-header bg-primary text-white text-center">
        <h3>Cari Buku di Google Books</h3>
      </div>
      <div class="card-body">
        <form action="{{ route('books.searchResults') }}" method="GET">
          <div class="input-group mb-3">
            <input type="text" name="query" class="form-control" placeholder="Masukkan judul buku..." required>
            <button type="submit" class="btn btn-success">Cari</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
