<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku - Google Books API</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-5">
    <h2 class="mb-4 text-center">📚 Daftar Buku dari Google Books API</h2>

    {{-- Form Pencarian --}}
    <form action="{{ route('books.search') }}" method="GET" class="mb-4">
        <div class="input-group">
            <button class="btn btn-primary">Cari buku</button>
        </div>
    </form>

    <div class="row">
        @forelse($books as $book)
            @php
                $info = $book['volumeInfo'];
            @endphp
            <div class="col-md-3 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ $info['imageLinks']['thumbnail'] ?? 'https://via.placeholder.com/150' }}"
                         class="card-img-top" alt="cover">
                    <div class="card-body">
                        <h5 class="card-title">{{ $info['title'] ?? 'Tanpa Judul' }}</h5>
                        <p class="card-text">
                            {{ $info['authors'][0] ?? 'Tidak diketahui' }}
                        </p>
                        <small class="text-muted">
                            {{ $info['publishedDate'] ?? 'Tahun tidak ada' }}
                        </small>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-warning text-center">
                    Tidak ada buku ditemukan.
                </div>
            </div>
        @endforelse
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
