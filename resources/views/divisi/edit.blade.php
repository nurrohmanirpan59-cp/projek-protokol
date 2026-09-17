<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Divisi</title>
    <!-- Kamu bisa sesuaikan dengan framework CSS yang kamu pakai, misal Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container py-4">

    <h2 class="mb-4">Edit Divisi</h2>

    <!-- Form mengarah ke route 'divisi.update' dengan membawa ID dari $divisi -->
    <form action="{{ route('divisi.update', $divisi->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Wajib untuk proses update -->

        <div class="mb-3">
            <label for="nama_divisi" class="form-label">Nama Divisi</label>
            <input 
                type="text" 
                name="nama_divisi" 
                id="nama_divisi"
                class="form-control @error('nama_divisi') is-invalid @enderror"
                value="{{ old('nama_divisi', $divisi->nama_divisi) }}"
            >

            <!-- Menampilkan pesan validasi jika ada error -->
            @error('nama_divisi')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('divisi.index') }}" class="btn btn-secondary">Batal</a>
    </form>

</body>
</html>