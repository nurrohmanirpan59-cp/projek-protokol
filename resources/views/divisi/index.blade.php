<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Divisi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">

    <h2>Daftar Divisi</h2>
    
    <!-- Tombol ini mengarahkan user ke route 'divisi.create' -->
    <a href="{{ route('divisi.create') }}" class="btn btn-primary mb-3">+ Tambah Divisi</a>

    <!-- Notifikasi Sukses jika data berhasil disimpan -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Divisi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($divisis as $index => $divisi)
            <tr>
                
                <td>{{ $divisis->firstItem() + $index }}</td>
                <td>{{ $divisi->nama_divisi }}</td>
                <td>
                    
                    <form action="{{ route('divisi.destroy', $divisi->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus divisi ini?')">
                    
                    <!-- 1. Wajib CSRF Token untuk Keamanan -->
                    @csrf
                    
                    <!-- 2. Menyamarkan Method POST menjadi DELETE -->
                    @method('DELETE')
                    
                    <!-- 3. Tombol Submit -->
                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                    
<a href="{{ route('divisi.edit', $divisi->id) }}" class="btn btn-sm btn-warning">Edit</a>

                </td>
                
                    
                
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center">Data divisi masih kosong.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{ $divisis->links() }}

</body>
</html>