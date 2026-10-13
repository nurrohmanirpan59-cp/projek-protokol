<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Divisi</title>
    
    <!-- Google Font: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    
    <style>
        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            background-color: #f8fafc;
            color: #334155;
        }

        /* Custom soft subtle badges & buttons */
        .btn-soft-warning {
            background-color: #fef3c7;
            color: #d97706;
            border: none;
        }
        .btn-soft-warning:hover {
            background-color: #fde68a;
            color: #b45309;
        }

        .btn-soft-danger {
            background-color: #fee2e2;
            color: #dc2626;
            border: none;
        }
        .btn-soft-danger:hover {
            background-color: #fca5a5;
            color: #b91c1c;
        }

        /* Input search custom focus */
        .search-input:focus {
            box-shadow: 0 0 0 0.25rem rgba(15, 23, 42, 0.08);
            border-color: #0f172a;
        }

        /* Subtle table row hover effect */
        .table-custom tbody tr {
            transition: background-color 0.15s ease-in-out;
        }
        .table-custom tbody tr:hover {
            background-color: #f1f5f9;
        }

        /* Table header style */
        .table-custom thead th {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #64748b;
            font-weight: 600;
            border-bottom-width: 1px;
            background-color: #f8fafc;
        }
    </style>
</head>
<body class="py-4 py-md-5">

    <div class="container-lg">
        
        <!-- Header & Breadcrumb Section -->
        <div class="row align-items-center mb-4 g-3">
            <div class="col-12 col-md">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-1 small text-muted">
                        <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-secondary">Dashboard</a></li>
                        <li class="breadcrumb-item active text-dark fw-medium" aria-current="page">Divisi</li>
                    </ol>
                </nav>
                <h3 class="fw-bold text-dark mb-0">Daftar Pegawai</h3>
                <p class="text-secondary small mb-0">Kelola dan atur struktur pegawai perusahaan Anda di sini.</p>
            </div>
            <div class="col-12 col-md-auto">
                <a href="{{ route('pegawai.create') }}" class="btn btn-dark fw-medium rounded-3 px-3 py-2 d-inline-flex align-items-center gap-2">
                    <i class="bi bi-plus-lg"></i>
                    <span>Tambah pegawai</span>
                </a>
            </div>
        </div>

        <!-- Main Content Card -->
        <div class="card border-0 shadow-sm rounded-4 bg-white overflow-hidden">
            
            <!-- Card Header / Search Toolbar -->
            <div class="card-header bg-white border-bottom border-light p-3 p-md-4">
                <div class="row g-3 justify-content-between align-items-center">
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0 rounded-start-3 text-secondary ps-3">
                                <i class="bi bi-search"></i>
                            </span>
                            <input type="text" class="form-control bg-light border-start-0 rounded-end-3 search-input fs-6" placeholder="Cari divisi...">
                        </div>
                    </div>
                    <div class="col-auto text-secondary small">
                        Total: <span class="fw-semibold text-dark">{{ count($data_pegawai ?? [1,2,3,4]) }} Pegawai</span>
                    </div>
                </div>
            </div>

            <!-- Table Body -->
            <div class="table-responsive">
                <table class="table table-custom align-middle mb-0">
                    <thead>
                        <tr>
                            <th class="ps-4 py-3" style="width: 80px;">No</th>
                            <th class="py-3">Nama Pegawai</th>
                            <th class="py-3"> Nip</th>
                            <th class="py-3">Jabatan</th>
                            <th class="py-3">Divisi</th>
                            <th class="text-end pe-4 py-3" style="width: 180px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data_pegawai ?? [] as $index => $pegawai)
                        <tr>
                            <td class="ps-4 text-secondary fw-medium">{{ $data_pegawai->firstItem() + $index }}</td> <!-- Fungsi agar list nomor halaman berlanjut tidak mengulang dari awal  -->
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="rounded-circle bg-light p-2 d-flex align-items-center justify-content-center text-secondary" style="width: 36px; height: 36px;">
                                        <i class="bi bi-diagram-3 fs-6"></i>
                                    </div>
                                    <span class="fw-semibold text-dark">{{ $pegawai->nama }}</span>
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-light text-secondary border px-2 py-1 rounded-2 fw-normal">
                                    <i class="bi bi-person-check me-1"></i>{{ $pegawai->nip }}
                                </span>
                            </td>
                            <td>
                                <span class=" bg-light text-secondary border px-2 py-1 rounded-2 fw-normal">
                                    <i class="bi bi-person-check me-1"></i>{{ $pegawai->jabatan }}
                                </span>
                            </td>
                            <td>
                                <span class="bg-light text-secondary border px-2 py-1 rounded-2 fw-normal">
                                    <i class="bi bi-person-check me-1"></i>{{ $pegawai->divisi->nama_divisi ?? '-' }}
                                </span>
                            </td>
                            <td class="text-end pe-4">
                                <div class="d-inline-flex gap-2">
                                    <a href="{{ route('pegawai.edit', $pegawai->id) }}" class="btn btn-soft-warning btn-sm rounded-2 px-2.5 py-1.5" data-bs-toggle="tooltip" title="Edit Divisi">
                                        <i class="bi bi-pencil-fill fs-7"></i>
                                        <span class="d-none d-md-inline ms-1 small fw-medium">Edit</span>
                                    </a>
                                    
                                    <!-- Delete Form Triggering Modal -->
                                    <button type="button" class="btn btn-soft-danger btn-sm rounded-2 px-2.5 py-1.5" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $pegawai->id }}" title="Hapus Divisi">
                                        <i class="bi bi-trash-fill fs-7"></i>
                                        <span class="d-none d-md-inline ms-1 small fw-medium">Hapus</span>
                                    </button>
                                </div>

                                <!-- Delete Confirmation Modal -->
                                <div class="modal fade text-start" id="deleteModal{{ $pegawai->id }}" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-sm">
                                        <div class="modal-content border-0 shadow-lg rounded-4">
                                            <div class="modal-body p-4 text-center">
                                                <div class="rounded-circle bg-danger-subtle text-danger d-inline-flex align-items-center justify-content-center mb-3" style="width: 52px; height: 52px;">
                                                    <i class="bi bi-exclamation-triangle fs-4"></i>
                                                </div>
                                                <h6 class="fw-bold text-dark mb-1">Hapus Divisi?</h6>
                                                <p class="text-secondary small mb-3">Anda yakin ingin menghapus Pegawai <strong>"{{ $pegawai->nama }}"</strong>?</p>
                                                
                                                <form action="{{ route('pegawai.destroy', $pegawai->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="d-flex gap-2">
                                                        <button type="button" class="btn btn-light w-50 rounded-3 fw-medium" data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-danger w-50 rounded-3 fw-medium">Hapus</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </td>
                        </tr>
                        @empty
                        <!-- Static Mock Data Fallback (Shown if $divisis is empty for instant preview) -->
                        <tr>
                            <td class="ps-4 text-secondary fw-medium">1</td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="rounded-circle bg-light p-2 d-flex align-items-center justify-content-center text-secondary" style="width: 36px; height: 36px;">
                                        <i class="bi bi-diagram-3 fs-6"></i>
                                    </div>
                                    <span class="fw-semibold text-dark">operator</span>
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-light text-secondary border px-2 py-1 rounded-2 fw-normal">
                                    <i class="bi bi-person-check me-1"></i>Aktif
                                </span>
                            </td>
                            <td class="text-end pe-4">
                                <div class="d-inline-flex gap-2">
                                    <a href="#" class="btn btn-soft-warning btn-sm rounded-2 px-3 py-1.5 fw-medium">
                                        <i class="bi bi-pencil-fill me-1"></i>Edit
                                    </a>
                                    <button type="button" class="btn btn-soft-danger btn-sm rounded-2 px-3 py-1.5 fw-medium">
                                        <i class="bi bi-trash-fill me-1"></i>Hapus
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="ps-4 text-secondary fw-medium">2</td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="rounded-circle bg-light p-2 d-flex align-items-center justify-content-center text-secondary" style="width: 36px; height: 36px;">
                                        <i class="bi bi-diagram-3 fs-6"></i>
                                    </div>
                                    <span class="fw-semibold text-dark">Back end Developer web</span>
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-light text-secondary border px-2 py-1 rounded-2 fw-normal">
                                    <i class="bi bi-person-check me-1"></i>Aktif
                                </span>
                            </td>
                            <td class="text-end pe-4">
                                <div class="d-inline-flex gap-2">
                                    <a href="#" class="btn btn-soft-warning btn-sm rounded-2 px-3 py-1.5 fw-medium">
                                        <i class="bi bi-pencil-fill me-1"></i>Edit
                                    </a>
                                    <button type="button" class="btn btn-soft-danger btn-sm rounded-2 px-3 py-1.5 fw-medium">
                                        <i class="bi bi-trash-fill me-1"></i>Hapus
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="ps-4 text-secondary fw-medium">3</td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="rounded-circle bg-light p-2 d-flex align-items-center justify-content-center text-secondary" style="width: 36px; height: 36px;">
                                        <i class="bi bi-diagram-3 fs-6"></i>
                                    </div>
                                    <span class="fw-semibold text-dark">DEV OPS</span>
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-light text-secondary border px-2 py-1 rounded-2 fw-normal">
                                    <i class="bi bi-person-check me-1"></i>Aktif
                                </span>
                            </td>
                            <td class="text-end pe-4">
                                <div class="d-inline-flex gap-2">
                                    <a href="#" class="btn btn-soft-warning btn-sm rounded-2 px-3 py-1.5 fw-medium">
                                        <i class="bi bi-pencil-fill me-1"></i>Edit
                                    </a>
                                    <button type="button" class="btn btn-soft-danger btn-sm rounded-2 px-3 py-1.5 fw-medium">
                                        <i class="bi bi-trash-fill me-1"></i>Hapus
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="ps-4 text-secondary fw-medium">4</td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="rounded-circle bg-light p-2 d-flex align-items-center justify-content-center text-secondary" style="width: 36px; height: 36px;">
                                        <i class="bi bi-diagram-3 fs-6"></i>
                                    </div>
                                    <span class="fw-semibold text-dark">Front End</span>
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-light text-secondary border px-2 py-1 rounded-2 fw-normal">
                                    <i class="bi bi-person-check me-1"></i>Aktif
                                </span>
                            </td>
                            <td class="text-end pe-4">
                                <div class="d-inline-flex gap-2">
                                    <a href="#" class="btn btn-soft-warning btn-sm rounded-2 px-3 py-1.5 fw-medium">
                                        <i class="bi bi-pencil-fill me-1"></i>Edit
                                    </a>
                                    <button type="button" class="btn btn-soft-danger btn-sm rounded-2 px-3 py-1.5 fw-medium">
                                        <i class="bi bi-trash-fill me-1"></i>Hapus
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                
            </div>

            <!-- Card Footer / Pagination -->
            <div class="card-footer bg-white border-top border-light p-3 p-md-4">
                <div class="row align-items-center justify-content-between g-3">
                    <div class="col-12 col-sm-auto text-secondary small text-center text-sm-start">
                        Menampilkan 1 hingga 4 dari 4 data
                    </div>
                 
                    {{ $data_pegawai->links() }} <!--untuk next data -->
                </div>
            </div>

        </div>
    </div>
  
    <!-- Bootstrap 5 JS Bundle CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>