@extends('admin.layouts.app')
@php
$title = 'Riwayat Pendidikan';
@endphp
@section('content')


<div class="container p-4">
    <div class="row">
        <div class="col-lg-12 py-2">
            <h2>Kelola Riwayat Pendidikan Pegawai</h2>
        </div>
        <div class="col-lg-12 d-flex mb-3">
            <button type="button" class="btn btn-success btn-sm me-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
                + Tambah Pendidikan
            </button>
            <form action="{{ route('admin.pendidikan.index') }}" method="GET" class="d-flex gap-2">
                <div class="input-group">
                    <span class="input-group-text bg-success text-white border-0">
                        <button type="submit" class="btn btn-success btn-sm p-0"><i class="bi bi-search"></i></button>
                    </span>
                    <input type="text" name="cari_pendidikan" class="form-control form-control-sm" 
                        placeholder="Cari institusi atau nama..." 
                        value="{{ request('cari_pendidikan') }}">
                    @if(request()->filled('cari_pendidikan'))
                        <a href="{{ route('admin.pendidikan.index') }}" class="btn btn-outline-secondary btn-sm d-flex align-items-center px-2" title="Reset Pencarian">
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
                                    <th>Nama Pegawai</th>
                                    <th>Jenjang</th>
                                    <th>Nama Institusi</th>
                                    <th>Gelar</th>
                                    <th>Pelatihan / Diklat</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($pendidikan as $key => $p)
                                <tr>
                                    <td>{{ $pendidikan->firstItem() + $key }}</td>
                                    <td><strong>{{ $p->user->name ?? 'Tidak Diketahui' }}</strong></td>
                                    <td>{{ $p->jenjang }}</td>
                                    <td>{{ $p->nama_institusi }}</td>
                                    <td>{{ $p->gelar ?? '-' }}</td>
                                    <td>{{ $p->nama_pelatihan ?? '-' }}</td>
                                    <td>
                                        <div class="d-flex gap-1">
                                            <button type="button" class="btn btn-sm btn-info text-white btn-edit" data-id="{{ $p->id }}">Edit</button>
                                            <form action="{{ route('admin.pendidikan.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus riwayat pendidikan ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted">Belum ada data riwayat pendidikan.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3">
                        {{ $pendidikan->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form action="{{ route('admin.pendidikan.store') }}" method="POST">
                @csrf
                <div class="modal-header ">
                    <h5 class="modal-title" id="modalTambahLabel">Tambah Riwayat Pendidikan</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Pilih Pegawai</label>
                        <select name="id_user" class="form-select form_border" required>
                            <option value="">-- Pilih Pegawai --</option>
                            @foreach($pegawai as $peg)
                                <option value="{{ $peg->user_id }}" {{ old('id_user') == $peg->user_id ? 'selected' : '' }}>{{ $peg->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-12">
                            <label class="form-label">Jenjang Pendidikan</label>
                            <input type="text" name="jenjang" id="" class="form-control form_border" required>
                            {{-- <select name="jenjang" class="form-select form_border" required>
                                <option value="">-- Pilih Jenjang --</option>
                                <option value="SD">SD</option>
                                <option value="SMP">SMP</option>
                                <option value="SMA/SMK">SMA/SMK</option>
                                <option value="D3">D3</option>
                                <option value="S1">S1</option>
                                <option value="S2">S2</option>
                                <option value="S3">S3</option>
                            </select> --}}
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Nama Institusi / Sekolah</label>
                            <input type="text" name="nama_institusi" class="form-control form_border" placeholder="Contoh: Universitas Sains Al-Qur'an" required value="{{ old('nama_institusi') }}">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Gelar (Opsional)</label>
                            <input type="text" name="gelar" class="form-control form_border" placeholder="Contoh: S.Kom" value="{{ old('gelar') }}">
                        </div>
                        <div class="col-md-12 mb-5">
                            <label class="form-label">Nama Pelatihan (Opsional)</label>
                            <input type="text" name="nama_pelatihan" class="form-control form_border" placeholder="Contoh: Microsoft Office" value="{{ old('nama_pelatihan') }}">
                        </div>
                    </div>

                    <!-- Hidden/Kosong sementara sesuai request untuk Pelatihan -->
                    <input type="hidden" name="id_pelatihan" value="">
                    {{-- <input type="hidden" name="nama_pelatihan" value=""> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form id="formEdit" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditLabel">Edit Riwayat Pendidikan</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Pilih Pegawai</label>
                        <select name="id_user" id="edit_id_user" class="form-select form_border" required>
                                <option value="">-- Pilih Pegawai --</option>
                                @foreach($pegawai as $peg)
                                    {{-- Bersihkan ternary lama yang rusak, biarkan murni value ID dan nama --}}
                                    <option value="{{ $peg->user_id }}">{{ $peg->nama }}</option>
                                @endforeach
                            </select>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-12">
                            <label class="form-label">Jenjang Pendidikan</label>
                             <input type="text" name="jenjang" id="edit_jenjang" class="form-control form_border" required>
                            {{-- <select name="jenjang" id="edit_jenjang" class="form-select form_border" required>
                                <option value="SD">SD</option>
                                <option value="SMP">SMP</option>
                                <option value="SMA/SMK">SMA/SMK</option>
                                <option value="D3">D3</option>
                                <option value="S1">S1</option>
                                <option value="S2">S2</option>
                                <option value="S3">S3</option>
                            </select> --}}
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Nama Institusi / Sekolah</label>
                            <input type="text" name="nama_institusi" id="edit_nama_institusi" class="form-control form_border" required>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Gelar (Opsional)</label>
                            <input type="text" name="gelar" id="edit_gelar" class="form-control form_border">
                        </div>
                        <div class="col-md-12 mb-5">
                            <label class="form-label">Nama Pelatihan (Opsional)</label>
                            <input type="text" name="nama_pelatihan" id="edit_nama_pelatihan" class="form-control form_border">
                        </div>
                    </div>

                    <input type="hidden" name="id_pelatihan" id="edit_id_pelatihan">
                    {{-- <input type="hidden" name="nama_pelatihan" id="edit_nama_pelatihan"> --}}
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
        
        // Ambil data via Fetch API
        fetch(`/admin/pendidikan/${id}/edit`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Gagal memuat data dari server');
                }
                return response.json();
            })
            .then(data => {
                // Set action form target ke primary key id_pendidikan
                document.getElementById('formEdit').setAttribute('action', `/admin/pendidikan/${id}`);
                
               // 1. Ambil elemen select id_user
                const selectUser = document.getElementById('edit_id_user');
                const targetIdUser = data.id_user; // ID yang didapat dari database (misal: 5)

//                console.log("=== DEBUG AUTO-SELECT PEGAWAI ===");
// console.log("ID Pegawai dari Database (targetIdUser):", targetIdUser, `[Tipe: ${typeof targetIdUser}]`);

if (targetIdUser) {
    let ditemukan = false;
    
    for (let i = 0; i < selectUser.options.length; i++) {
        let optionValue = selectUser.options[i].value;
        let optionText = selectUser.options[i].text;
        
        console.log(`Memeriksa Opsi ke-${i}: value="${optionValue}" (${optionText})`);

        // Cocokkan nilai dengan '==' (mengabaikan perbedaan tipe data string/integer)
        if (optionValue == targetIdUser) {
            console.log(`=> COCOK! Opsi ke-${i} (${optionText}) akan di-select otomatis.`);
            
            selectUser.selectedIndex = i; // Paksa pilih opsi ke-i
            ditemukan = true;
            break;
        }
    }
    
    if (!ditemukan) {
        console.warn(`=> GAGAL: Tidak ditemukan <option> yang memiliki value sesuai dengan ID ${targetIdUser}.`);
    }

} else {
    console.log("=> ID Pegawai dari database kosong/null. Mengembalikan ke default.");
    selectUser.value = ''; 
}
console.log("=================================");
                
                // 3. Trigger event change agar browser menyadari ada perubahan pilihan
                selectUser.dispatchEvent(new Event('change'));
                            
                // Suntikkan data ke text input lainnya
                document.getElementById('edit_jenjang').value = data.jenjang ?? '';
                document.getElementById('edit_nama_institusi').value = data.nama_institusi ?? '';
                document.getElementById('edit_gelar').value = data.gelar ?? '';
                document.getElementById('edit_id_pelatihan').value = data.id_pelatihan ?? '';
                document.getElementById('edit_nama_pelatihan').value = data.nama_pelatihan ?? '';

                // Tampilkan modal
                modalEdit.show();
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat memuat data riwayat pendidikan.');
            });
    });
});
});
</script>
@endsection