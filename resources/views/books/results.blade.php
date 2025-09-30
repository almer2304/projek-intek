<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hasil Pencarian Buku</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container py-5">
    <div class="card shadow-lg border-0 rounded-4">
      <div class="card-header bg-info text-white text-center">
        <h3>Hasil Pencarian: "{{ $query }}"</h3>
      </div>
      <div class="card-body">
        @if (count($books) > 0)
          <div class="row">
            @foreach ($books as $book)
              <div class="col-md-4 mb-4">
                <div class="card h-100">
                  <img src="{{ $book['volumeInfo']['imageLinks']['thumbnail'] ?? 'https://via.placeholder.com/150' }}" 
                       class="card-img-top" alt="Cover Buku">
                  <div class="card-body">
                    <h5 class="card-title">{{ $book['volumeInfo']['title'] ?? 'Judul Tidak Diketahui' }}</h5>
                    <p class="card-text">
                      <strong>Penulis:</strong> {{ implode(', ', $book['volumeInfo']['authors'] ?? ['Tidak diketahui']) }}
                    </p>
                    <p><strong>Penerbit:</strong> {{ $book['volumeInfo']['publisher'] ?? 'Tidak diketahui' }}</p>
                    <p><strong>Tahun:</strong> {{ $book['volumeInfo']['publishedDate'] ?? '-' }}</p>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        @else
          <div class="alert alert-warning text-center">Buku tidak ditemukan</div>
        @endif
      </div>
    </div>
  </div>
</body>
</html>
