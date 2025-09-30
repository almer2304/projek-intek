<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tambah Buku</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-6">

        <!-- Card -->
        <div class="card shadow-lg border-0 rounded-4">
          <div class="card-header bg-primary text-white text-center rounded-top-4">
            <h4 class="mb-0">Edit Buku</h4>
          </div>
          <div class="card-body">

            <!-- Alert error -->
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul class="mb-0">
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            <!-- Form -->
            <form action="{{ route('books.update', $book->id) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="mb-3">
                  <label for="judul" class="form-label">Judul Buku</label>
                  <input type="text" name="judul" id="judul" 
                        value="{{ old('judul', $book->judul) }}" 
                        class="form-control" required>
              </div>

              <div class="mb-3">
                  <label for="pengarang" class="form-label">Pengarang</label>
                  <input type="text" name="pengarang" id="pengarang" 
                        value="{{ old('pengarang', $book->pengarang) }}" 
                        class="form-control" required>
              </div>

                <div class="mb-3">
                    <label for="penerbit" class="form-label">Penerbit</label>
                    <input type="text" name="penerbit" id="penerbit" 
                          value="{{ old('penerbit', $book->penerbit) }}" 
                          class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                    <input type="number" name="tahun_terbit" id="tahun_terbit" 
                          value="{{ old('tahun_terbit', $book->tahun_terbit) }}" 
                          class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="stok" class="form-label">Stok</label>
                    <input type="number" name="stok" id="stok" 
                          value="{{ old('stok', $book->stok) }}" 
                          class="form-control" required>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-success btn-lg rounded-3">
                        <i class="bi bi-save"></i> Simpan
                    </button>
                </div>
            </form>

          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Icon Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</body>
</html>
