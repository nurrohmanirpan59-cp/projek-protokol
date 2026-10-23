<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Form Tambah Pegawai</h4>
                    </div>
                    <div class="card-body">
                        <!-- Form mengarah ke route 'pegawai.store' dengan method POST -->
                        <form action="{{ route('pegawai.store') }}" method="POST">
                            @csrf <!-- Wajib ada di Laravel untuk keamanan form POST -->
                            
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Pegawai</label>
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>

                            <div class="mb-3">
                                <label for="nama" class="form-label">Nip</label>
                                <input type="text" class="form-control" id="nama" name="nip" required>
                            </div>

                            <div class="mb-3">
                                <label for="nama" class="form-label">Jabatan</label>
                                <input type="text" class="form-control" id="nama" name="jabatan" required>
                            </div>

                            <div class="mb-3">
                                <label for="divisi_id" class="form-label">Divisi</label>
                                <select class="form-select" id="divisi_id" name="divisi_id" required>
                                    <option value="">Pilih Divisi</option>
                                    @foreach($divisis as $divisi)
                                        <option value="{{ $divisi->id }}">{{ $divisi->nama_divisi }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('pegawai.index') }}" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-success">Simpan Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>