<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pegawai</title>
    
    <!-- Google Font: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            background-color: #f8f9fa;
        }
        
        /* Smooth focus ring for input matching the dark button theme */
        .form-control:focus {
            box-shadow: 0 0 0 0.25rem rgba(33, 37, 41, 0.08);
            border-color: #212529;
        }
    </style>
</head>
<body class="bg-light d-flex align-items-center justify-content-center min-vh-100 py-5">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-7 col-lg-5">
                
                <div class="card border-0 shadow-sm rounded-4 p-3 p-md-4 bg-white">
                    <div class="card-body">
                        
                        <!-- Header Section -->
                        <div class="mb-4">
                            <h4 class="fw-bold text-dark mb-1">Edit Pegawai</h4>
                            <p class="text-secondary small mb-0">Perbarui informasi Edit  di bawah ini.</p>
                        </div>

                        <form action="{{ route('pegawai.update',$edit_data->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Input Field: Nama Divisi -->
                            <div class="mb-4">
                                <label for="nama_divisi" class="form-label small fw-semibold text-secondary">Nama Divisi</label>
                                <input 
                                    type="text" 
                                    class="form-control form-control-lg fs-6 rounded-3 @error('nama_divisi') is-invalid @enderror" 
                                    name="nama_divisi" 
                                    id="nama_divisi" 
                                    value="{{ old('nama_divisi', $divisi->nama_divisi) }}" 
                                    placeholder="Masukkan nama divisi"
                                    required
                                    autofocus
                                >
                                @error('nama_divisi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="d-flex align-items-center justify-content-end gap-2 pt-2">
                                <a href="{{ route('divisi.index') }}" class="btn btn-light text-secondary border-0 fw-medium px-4 py-2 rounded-3 text-decoration-none">
                                    Batal
                                </a>
                                <button type="submit" class="btn btn-dark fw-medium px-4 py-2 rounded-3">
                                    Simpan
                                </button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>