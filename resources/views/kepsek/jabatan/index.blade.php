@extends('admin.layouts.app')
@php
$title = 'Jabatan';
@endphp
@section('content')



<div class="container p-4">
    <div class="row">
        <div class="col-lg-12 py-2">
            <h2>Kelola Data Jabatan</h2>
        </div>
        <div class="col-lg-12 d-flex mb-3">
            <button type="button" class="btn btn-success btn-sm me-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
                + Tambah Jabatan Baru
            </button>
            <form action="{{ route('admin.jabatan.index') }}" method="GET" class="d-flex gap-2">
                <div class="input-group">
                    <span class="input-group-text bg-success text-white border-0">
                        <button type="submit" class="btn btn-success btn-sm p-0"><i class="bi bi-search"></i></button>
                    </span>
                    <input type="text" name="cari_jabatan" class="form-control form-control-sm" 
                        placeholder="Cari kode atau nama jabatan.." 
                        value="{{ request('cari_jabatan') }}">
                    @if(request()->filled('cari_jabatan'))
                        <a href="{{ route('admin.jabatan.index') }}" class="btn btn-outline-secondary btn-sm d-flex align-items-center px-2" title="Reset Pencarian">
                            ✕
                        </a>
                    @endif
                </div>
            </form>
        </div>
        
        <div class="col-md-12 pt-2">
            <div class="card shadow-sm">
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Ups! Ada kesalahan:</strong>
                            <ul class="mb-0 mt-1">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Nama Jabatan</th>
                                    <th>Departemen</th>
                                    <th>Tgl Dibuat</th>
                                    <th>Tgl Diubah</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($jabatan as $key => $j)
                                <tr>
                                    <td>{{ $jabatan->firstItem() + $key }}</td>
                                    <td>{{ $j->kode_jabatan }}</td>
                                    <td>{{ $j->nama_jabatan }}</td>
                                    <td>{{ $j->departemen ?? '-' }}</td>
                                    <td>{{ \Carbon\Carbon::parse($j->created_at)->format('d-m-Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($j->updated_at)->format('d-m-Y') }}</td>
                                    {{-- <td>{{ ucwords($j->level_jabatan) }}</td> --}}
                                    {{-- <td>
                                        <small class="d-block">Gaji: Rp {{ number_format($j->gaji_pokok, 0, ',', '.') }}</small>
                                        <small class="text-muted">Tunj: Rp {{ number_format($j->tunjangan, 0, ',', '.') }}</small>
                                    </td>
                                    <td>
                                        <span class="badge {{ $j->status_jabatan == 'aktif' ? 'bg-success' : 'bg-danger' }}">
                                            {{ $j->status_jabatan }}
                                        </span>
                                    </td> --}}
                                    <td class="text-center">
                                        <div class="d-flex gap-1">
                                            <button type="button" class="btn btn-sm btn-info text-white btn-edit" data-id="{{ $j->id }}">Edit</button>
                                            <form action="{{ route('admin.jabatan.destroy', $j->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus jabatan ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center text-muted">Belum ada data admin.jabatan</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3">
                        {{ $jabatan->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form action="{{ route('admin.jabatan.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTambahLabel">Tambah Jabatan Baru</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-4">
                    <div class="row g-3 mb-3">
                        <div class="col-md-12">
                            <label class="form-label">Kode Jabatan</label>
                            <input type="text" name="kode_jabatan" class="form-control form_border" placeholder="Contoh: JAB001" required value="{{ old('kode_jabatan') }}">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Nama Jabatan</label>
                            <input type="text" name="nama_jabatan" class="form-control form_border" placeholder="Contoh: Guru Utama" required value="{{ old('nama_jabatan') }}">
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-12">
                            <label class="form-label">Departemen / Bagian (Opsional)</label>
                            <input type="text" name="departemen" class="form-control form_border" placeholder="Contoh: Kurikulum" value="{{ old('departemen') }}">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Level Jabatan</label>
                            <select name="level_jabatan" class="form-select form_border" required>
                                <option value="">-- Pilih Level --</option>
                                <option value="kepala sekolah">2</option>
                                <option value="wakil kepala sekolah">Wakil Kepala Sekolah</option>
                                <option value="guru">Guru</option>
                                <option value="staff TU">Staff TU</option>
                            </select>
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-12">
                            <label class="form-label">Gaji Pokok (Rupiah)</label>
                            <input type="number" name="gaji_pokok" class="form-control form_border" min="0" required value="{{ old('gaji_pokok', 0) }}">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Tunjangan (Rupiah)</label>
                            <input type="number" name="tunjangan" class="form-control form_border" min="0" required value="{{ old('tunjangan', 0) }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jobdesk / Deskripsi Kerja</label>
                        <textarea name="jobdesk" class="form-control form_border" rows="3" placeholder="Tulis deskripsi pekerjaan di sini...">{{ old('jobdesk') }}</textarea>
                    </div>
                    <div class="mb-5">
                        <label class="form-label">Status Jabatan</label>
                        <select name="status_jabatan" class="form-select form_border" required>
                            <option value="aktif">Aktif</option>
                            <option value="non-aktif">Non-Aktif</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form id="formEdit" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditLabel">Edit Data Jabatan</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-4">
                    <div class="row g-3 mb-3">
                        <div class="col-md-12">
                            <label class="form-label">Kode Jabatan</label>
                            <input type="text" name="kode_jabatan" id="edit_kode_jabatan" class="form-control form_border" required>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Nama Jabatan</label>
                            <input type="text" name="nama_jabatan" id="edit_nama_jabatan" class="form-control form_border" required>
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-12">
                            <label class="form-label">Departemen / Bagian</label>
                            <input type="text" name="departemen" id="edit_departemen" class="form-control form_border">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Level Jabatan</label>
                            <select name="level_jabatan" id="edit_level_jabatan" class="form-select form_border" required>
                                <option value="kepala sekolah">Kepala Sekolah</option>
                                <option value="wakil kepala sekolah">Wakil Kepala Sekolah</option>
                                <option value="guru">Guru</option>
                                <option value="staff TU">Staff TU</option>
                            </select>
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-12">
                            <label class="form-label">Gaji Pokok (Rupiah)</label>
                            <input type="number" name="gaji_pokok" id="edit_gaji_pokok" class="form-control form_border" min="0" required>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Tunjangan (Rupiah)</label>
                            <input type="number" name="tunjangan" id="edit_tunjangan" class="form-control form_border" min="0" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jobdesk / Deskripsi Kerja</label>
                        <textarea name="jobdesk" id="edit_jobdesk" class="form-control form_border" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status Jabatan</label>
                        <select name="status_jabatan" id="edit_status_jabatan" class="form-select form_border" required>
                            <option value="aktif">Aktif</option>
                            <option value="non-aktif">Non-Aktif</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-info text-white">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const editButtons = document.querySelectorAll('.btn-edit');
    const modalEditElement = document.getElementById('modalEdit');
    if (!modalEditElement) return;
    const modalEdit = new bootstrap.Modal(modalEditElement);
    
    editButtons.forEach(button => {
        button.addEventListener('click', function () {
            const id = this.getAttribute('data-id');
            
            // Ambil data detail jabatan via Fetch API
            fetch(`/admin/jabatan/${id}/edit`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Gagal memuat data dari server');
                    }
                    return response.json();
                })
                .then(data => {
                    // Set action form ke update URL
                    document.getElementById('formEdit').setAttribute('action', `/admin/jabatan/${id}`);
                    
                    // Suntikkan data ke input modal edit
                    document.getElementById('edit_kode_jabatan').value = data.kode_jabatan ?? '';
                    document.getElementById('edit_nama_jabatan').value = data.nama_jabatan ?? '';
                    document.getElementById('edit_departemen').value = data.departemen ?? '';
                    document.getElementById('edit_level_jabatan').value = data.level_jabatan ?? '';
                    document.getElementById('edit_gaji_pokok').value = data.gaji_pokok ?? 0;
                    document.getElementById('edit_tunjangan').value = data.tunjangan ?? 0;
                    document.getElementById('edit_jobdesk').value = data.jobdesk ?? '';
                    document.getElementById('edit_status_jabatan').value = data.status_jabatan ?? 'aktif';

                    // Tampilkan modal setelah form terisi penuh
                    modalEdit.show();
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat memuat data admin.jabatan');
                });
        });
    });
});
</script>
@endsection