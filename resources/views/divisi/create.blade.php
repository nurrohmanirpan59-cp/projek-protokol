<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Divisi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">

    <h2>Tambah Data Divisi</h2>

    <!-- Form ini akan mengirim data dengan method POST ke route 'divisi.store' -->
    <form action="{{ route('divisi.store') }}" method="POST">
        <!-- @csrf WAJIB ada untuk keamanan agar form tidak diblokir Laravel -->
        @csrf

        <div class="mb-3">
            <label for="nama_divisi" class="form-label">Nama Divisi</label>
            <input 
                type="text" 
                name="nama_divisi" 
                id="nama_divisi" 
                class="form-control @error('nama_divisi') is-invalid @enderror" 
                value="{{ old('nama_divisi') }}"
                placeholder="Contoh: HRD, IT, Keuangan"
            >
            
            <!-- Pesan Error jika validasi gagal -->
            @error('nama_divisi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Simpan Data</button>
        <a href="{{ route('divisi.index') }}" class="btn btn-secondary">Batal</a>
    </form>

</body>
</html>