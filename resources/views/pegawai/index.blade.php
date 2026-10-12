<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk</title>
    <!-- CSS Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Data pegawai dari Database</h4>
                        <a href="#" class="btn btn-light btn-sm">Tambah pegawai</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover align-middle">
                                <thead class="table-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Nama pegawai</th>
                                        <th>nip</th>
                                        <th>jabatan</th>
                                        <th>divisi</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($data_pegawai as $index => $pegawai)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $pegawai->nama }}</td>
                                            <td>{{ $pegawai->nip }}</td>
                                            <td>{{ $pegawai->jabatan }}</td>
                                            <!-- Memanggil field dari tabel divisi (ganti 'nama_divisi' sesuai nama kolom asli di database tabel divisi) -->
                                           <td>{{ $pegawai->divisi->nama_divisi ?? '-' }}</td>
                                            <td class="text-center">
                                                <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                                <button class="btn btn-danger btn-sm">Hapus</button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center text-muted py-4">Belum ada data produk.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>