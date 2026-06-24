@extends('admin.layouts.app')
@php
$title = 'Pegawai';
@endphp
@section('content')



<div class="container p-4">
    <div class="row">
        <div class="col-lg-12 py-2">
            <h2>Kelola Data Pegawai</h2>
        </div>
        <div class="col-lg-12 d-flex mb-3">
            <button type="button" class="btn btn-success btn-sm me-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
                + Tambah Pegawai Baru
            </button>
            <form action="{{ route('admin.pegawai.index') }}" method="GET" class="d-flex gap-2">
                <div class="input-group">
                    <span class="input-group-text bg-success text-white border-0">
                        <button type="submit" class="btn btn-success btn-sm p-0"><i class="bi bi-search"></i></button>
                    </span>
                    <input type="text" name="cari_nip" class="form-control form-control-sm" 
                        placeholder="Masukkan NIP/NUPTK/ID Pegawai..." 
                        value="{{ request('cari_nip') }}">
                    @if(request()->filled('cari_nip'))
                        <a href="{{ route('admin.pegawai.index') }}" class="btn btn-outline-secondary btn-sm d-flex align-items-center px-2" title="Reset Pencarian">
                            ✕
                        </a>
                    @endif
                </div>
            </form>
        </div>
        <div class="col-md-12 pt-2">
            <div class="card shadow-sm">
                <div class="card-body">
                    {{-- @if(session('success'))
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
                    @endif --}}

                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Lengkap + Gelar</th>
                                    <th>NIP</th>
                                    <th>NUPTK/ID</th>
                                    <th>Jabatan</th>
                                    <th>Foto</th>
                                    <th>Tempat, Tgl Lahir</th>
                                    <th>Status Pegawai</th>
                                    {{-- <th>Status Sertifikasi</th>
                                    <th>NO.Sertifikasi</th>
                                    <th>NO.Peserta Serdik</th>
                                    <th>Bidang Studi</th>
                                    <th>Prodi Terakhir</th>
                                    <th>Mapel Di Ampu</th> --}}
                                    <th>Jam Kerja</th>
                                    <th>Tugas Tambahan</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Agama</th>
                                    <th>Alamat</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($pegawai as $key => $p)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $p->nama }}</td>
                                    <td>{{ $p->nip ?? '-' }}</td>
                                    <td>{{ $p->nuptk ?? '-' }}</td>
                                    <td>{{ $p->jabatan->nama_jabatan ?? '-' }}</td>
                                    
                                    <td>
                                        @if($p->foto)
                                            <img src="{{ asset('foto_pegawai/'.$p->foto) }}" alt="Foto" class="" width="70" height="80" style="object-fit: cover;">
                                        @else
                                            <span class="badge bg-secondary">No Foto</span>
                                        @endif
                                    </td>
                                    <td>{{ $p->tempat_lahir }}, {{ $p->tgl_lahir }}</td>
                                    <td>{{ $p->status_pegawai ?? '-' }}</td>
                                    {{-- <td>{{ $p->status_sertifikasi ?? '-' }}</td>
                                    <td>{{ $p->nomor_sertifikasi ?? '-' }}</td>
                                    <td>{{ $p->serdik_no ?? '-' }} no pes</td>
                                    <td>{{ $p->bidang_studi ?? '-' }} bidang</td>
                                    <td>{{ $p->prodi_terakhir ?? '-' }} prodi</td>
                                    <td>{{ $p->mapel_ampu ?? '-' }}</td> --}}
                                    <td>{{ $p->beban_ajar ?? '-' }}</td>
                                    <td>{{ $p->tugas_tambahan ?? '-' }}</td>
                                    <td>{{ $p->jenis_kelamin }}</td>
                                    <td>{{ $p->agama }}</td>
                                    <td>{{ $p->alamat }}</td>
                                    <td class="text-center">
                                        <div class="d-flex gap-1">
                                            <button type="button" class="btn btn-sm btn-info text-white btn-edit" data-id="{{ $p->id }}">Detail/Edit</button>
                                            <form action="{{ route('admin.pegawai.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted">
                                        @if(request()->filled('cari_nip'))
                                            Data pegawai dengan NIP "<strong>{{ request('cari_nip') }}</strong>" tidak ditemukan.
                                        @else
                                            Belum ada data pegawai.
                                        @endif
                                    </td>
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

<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form action="{{ route('admin.pegawai.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header text-center">
                    <h5 class="modal-title text-center" id="modalTambahLabel">Tambah Pegawai Baru</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h6 class="pb-1 mb-3 fw-bold border-bottom text-success">Profil Pegawai</h6>
                    <div class="row g-3 mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Nama Lengkap + Gelar</label>
                            <input type="text" name="nama" class="form-control form_border" required value="{{ old('nama') }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">NIP (Opsional)</label>
                            <input type="text" name="nip" class="form-control form_border" value="{{ old('nip') }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">NUPTK / ID (Opsional)</label>
                            <input type="text" name="nuptk" class="form-control form_border" value="{{ old('nuptk') }}">
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control form_border" required value="{{ old('tempat_lahir') }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir" class="form-control form_border" required value="{{ old('tgl_lahir') }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-select form_border" required>
                                <option value="">-- Pilih --</option>
                                <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Agama</label>
                            <select name="agama" class="form-select form_border" required>
                                @foreach(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Khonghucu'] as $agm)
                                    <option value="{{ $agm }}" {{ old('agama') == $agm ? 'selected' : '' }}>{{ $agm }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">No. Telepon</label>
                            <input type="text" name="no_telp" class="form-control form_border" required value="{{ old('no_telp') }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Status Pegawai</label>
                            <select name="status_pegawai" class="form-select form_border" required>
                                <option value="PNS" {{ old('status_pegawai') == 'PNS' ? 'selected' : '' }}>PNS</option>
                                <option value="NON-PNS" {{ old('status_pegawai') == 'NON-PNS' ? 'selected' : '' }}>NON-PNS</option>
                                <option value="GTT" {{ old('status_pegawai') == 'GTT' ? 'selected' : '' }}>GTT</option>
                                <option value="GTY" {{ old('status_pegawai') == 'GTY' ? 'selected' : '' }}>GTY</option>
                                <option value="ASN" {{ old('status_pegawai') == 'ASN' ? 'selected' : '' }}>ASN</option>
                                <option value="PPPK" {{ old('status_pegawai') == 'PPPK' ? 'selected' : '' }}>PPPK</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Status Sertifikasi (Opsional)</label>
                            <select name="status_sertifikasi" class="form-select form_border" >
                                <option value="sertifikasi" {{ old('status_sertifikasi') == 'Sertifikasi' ? 'selected' : '' }}>Sertifikasi</option>
                                <option value="belum_sertifikasi" {{ old('status_pegawai') == 'belum_sertifikasi' ? 'selected' : '' }}>Belum Sertifikasi</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">No. Sertifikasi ('Opsional')</label>
                            <input type="text" name="nomor_sertifikasi" class="form-control form_border"  value="{{ old('nomor_sertifikasi') }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">No. Peserta Serdik ('Opsional')</label>
                            <input type="text" name="serdik_no" class="form-control form_border"  value="{{ old('serdik_no') }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Bidang Studi ('Opsional')</label>
                            <input type="text" name="bidang_studi" class="form-control form_border"  value="{{ old('bidang_studi') }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Prodi Terakhir ('Opsional')</label>
                            <input type="text" name="prodi_terakhir" class="form-control form_border"  value="{{ old('prodi_terakhir') }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Mapel Diampu ('Opsional')</label>
                            <input type="text" name="mapel_ampu" class="form-control form_border"  value="{{ old('mapel_ampu') }}">
                            <small>Pisahkan dengan tanda , (koma) jika lebih dari 1</small>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Jumlah Jam Kerja (Jam) ('Opsional')</label>
                            <input type="number" name="beban_ajar" class="form-control form_border"  value="{{ old('beban_ajar') }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Tugas Tambahan ('Opsional')</label>
                            <input type="text" name="tugas_tambahan" class="form-control form_border"  value="{{ old('tugas_tambahan') }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat Rumah</label>
                        <textarea name="alamat" class="form-control form_border" rows="2" required>{{ old('alamat') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label d-block fw-bold text-start">Foto Pegawai</label>
                        <label for="foto" style="cursor: pointer;" class="d-inline-block">
                            <div class="preview-container" id="boxPreviewTambah">
                                <i id="iconPreviewTambah" class="bi bi-file-image text-muted" style="font-size: 40px;"></i>
                            </div>
                            <small class="text-muted d-block mt-2">Klik ikon untuk memilih foto</small>
                        </label>
                        <input type="file" name="foto" class="form-control form_border d-none" id="foto" accept="image/*" onchange="previewImage(this, 'Tambah')">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Jabatan Pegawai</label>
                        <select name="jabatan_id" class="form-select form_border" required>
                            <option value="" selected disabled>-- Pilih Jabatan --</option>
                            @foreach($jabatan as $j)
                                @if($j->status_jabatan == 'aktif')
                                    <option value="{{ $j->id }}" {{ old('jabatan_id') == $j->id ? 'selected' : '' }}>
                                        {{ $j->kode_jabatan }} - {{ $j->nama_jabatan }} ({{ ucwords($j->level_jabatan) }})
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <h6 class="pb-1 mb-3 pt-4 fw-bold border-bottom text-success">Akun Untuk Login</h6>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control form_border" required value="{{ old('email') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control form_border" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form id="formEdit" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditLabel">Edit Data Pegawai</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <h6 class="pb-1 mb-3 fw-bold text-success">Profil Pegawai</h6>
                    <div class="row g-3 mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Nama Lengkap + Gelar</label>
                            <input type="text" name="nama" id="edit_nama_lengkap" class="form-control form_border" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">NIP</label>
                            <input type="text" name="nip" id="edit_nip" class="form-control form_border">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">NUPTK / ID</label>
                            <input type="text" name="nuptk" id="edit_nuptk" class="form-control form_border">
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" id="edit_tempat_lahir" class="form-control form_border" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir" id="edit_tgl_lahir" class="form-control form_border" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="edit_jenis_kelamin" class="form-select form_border" required>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Agama</label>
                            <select name="agama" id="edit_agama" class="form-select form_border" required>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddha">Buddha</option>
                                <option value="Khonghucu">Khonghucu</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">No. Telepon</label>
                            <input type="text" name="no_telp" id="edit_no_telp" class="form-control form_border" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Status Pegawai</label>
                            <select name="status_pegawai" id="edit_status_pegawai" class="form-select form_border" required>
                                <option value="PNS">PNS</option>
                                <option value="NON-PNS">NON-PNS</option>
                                <option value="GTT">GTT</option>
                                <option value="GTY">GTY</option>
                                <option value="ASN">ASN</option>
                                <option value="PPPK">PPPK</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Status Sertifikasi (Opsional)</label>
                            <select name="status_sertifikasi" class="form-select form_border" id="edit_status_sertifikasi">
                                <option value="sertifikasi" {{ old('status_sertifikasi') == 'Sertifikasi' ? 'selected' : '' }}>Sertifikasi</option>
                                <option value="belum_sertifikasi" {{ old('status_pegawai') == 'belum_sertifikasi' ? 'selected' : '' }}>Belum Sertifikasi</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">No. Sertifikasi ('Opsional')</label>
                            <input type="text" name="nomor_sertifikasi" class="form-control form_border"  value="{{ old('nomor_sertifikasi') }}" id="edit_nomor_sertifikasi">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">No. Peserta Serdik ('Opsional')</label>
                            <input type="text" name="serdik_no" class="form-control form_border"  value="{{ old('serdik_no') }}"id="edit_serdik_no">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Bidang Studi ('Opsional')</label>
                            <input type="text" name="bidang_studi" class="form-control form_border"  value="{{ old('bidang_studi') }}"id="edit_bidang_studi">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Prodi Terakhir ('Opsional')</label>
                            <input type="text" name="prodi_terakhir" class="form-control form_border"  value="{{ old('prodi_terakhir') }}" id="edit_prodi_terakhir">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Mapel Diampu ('Opsional')</label>
                            <input type="text" name="mapel_ampu" class="form-control form_border"  value="{{ old('mapel_ampu') }}" id="edit_mapel_ampu">
                            <small>Pisahkan dengan tanda , (koma) jika lebih dari 1</small>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Jumlah Jam Kerja (Jam) ('Opsional')</label>
                            <input type="number" name="beban_ajar" class="form-control form_border"  value="{{ old('beban_ajar') }}" id="edit_jam_ajar">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Tugas Tambahan ('Opsional')</label>
                            <input type="text" name="tugas_tambahan" class="form-control form_border"  value="{{ old('tugas_tambahan') }}" id="edit_tugas_tambahan">
                        </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat Rumah</label>
                        <textarea name="alamat" id="edit_alamat" class="form-control form_border" rows="2" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label d-block fw-bold text-start">Foto Pegawai (Kosongkan jika tidak diubah)</label>
                        <label for="fotoEdit" style="cursor: pointer;" class="d-inline-block">
                            <div class="preview-container" id="preview_foto">
                                </div>
                            <small class="text-muted d-block mt-2">Klik untuk mengubah foto</small>
                        </label>
                        <input type="file" name="foto" class="form-control form_border d-none" id="fotoEdit" accept="image/*" onchange="previewImage(this, 'Edit')">
                    </div>

                    <div class="mb-2">
                        <label class="form-label font-weight-bold">Jabatan Pegawai</label>
                        <select name="jabatan_id" id="edit_jabatan_id" class="form-select form_border" required>
                            <option value="" disabled>-- Pilih Jabatan --</option>
                            @foreach($jabatan as $j)
                                @if($j->status_jabatan == 'aktif')
                                    <option value="{{ $j->id }}">
                                        {{ $j->kode_jabatan }} - {{ $j->nama_jabatan }} ({{ ucwords($j->level_jabatan) }})
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                     <h6 class="text-success pb-1 mb-3 fw-bold pt-5">Akun Login</h6>
                    <div class="row g-3 mb-3">
                       
                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" id="edit_email" class="form-control form_border" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Password (Kosongkan jika tidak diubah)</label>
                            <input type="password" name="password" class="form-control form_border" placeholder="Password baru">
                        </div>
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
/**
 * Mengatur perubahan gambar preview secara realtime dan dinamis
 */
function previewImage(input, type) {
    const containerId = (type === 'Edit') ? 'preview_foto' : 'boxPreviewTambah';
    const previewContainer = document.getElementById(containerId);
    
    if (!previewContainer) return;

    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
            previewContainer.innerHTML = `
                <img src="${e.target.result}" 
                     id="imgPreview${type}" 
                     style="width: 100%; height: 100%; object-fit: cover;">
            `;
        }
        reader.readAsDataURL(input.files[0]);
    } else {
        previewContainer.innerHTML = `
            <i id="iconPreview${type}" class="bi bi-file-image text-muted" style="font-size: 40px;"></i>
        `;
    }
}

document.addEventListener('DOMContentLoaded', function () {
    const editButtons = document.querySelectorAll('.btn-edit');
    const modalEditElement = document.getElementById('modalEdit');
    if (!modalEditElement) return;
    const modalEdit = new bootstrap.Modal(modalEditElement);
    
    editButtons.forEach(button => {
        button.addEventListener('click', function () {
            const id = this.getAttribute('data-id');
            
            fetch(`/admin/pegawai/${id}/edit`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Gagal mengambil data dari server');
                    }
                    return response.json();
                })
                .then(data => {
                    document.getElementById('formEdit').setAttribute('action', `/admin/pegawai/${id}`);
                    
                    if(document.getElementById('edit_name')) {
                        document.getElementById('edit_name').value = data.user ? data.user.name : '';
                    }
                    if(document.getElementById('edit_email')) {
                        document.getElementById('edit_email').value = data.user ? data.user.email : '';
                    }
                    
                    document.getElementById('edit_nama_lengkap').value = data.nama ?? '';
                    document.getElementById('edit_nip').value = data.nip ?? '';
                    document.getElementById('edit_nuptk').value = data.nuptk ?? '';
                    document.getElementById('edit_tempat_lahir').value = data.tempat_lahir ?? '';
                    document.getElementById('edit_tgl_lahir').value = data.tgl_lahir ?? '';
                    document.getElementById('edit_jenis_kelamin').value = data.jenis_kelamin ?? '';
                    document.getElementById('edit_agama').value = data.agama ?? '';
                    document.getElementById('edit_no_telp').value = data.no_telp ?? '';
                    document.getElementById('edit_status_pegawai').value = data.status_pegawai ?? '';
                    document.getElementById('edit_alamat').value = data.alamat ?? '';
                    document.getElementById('edit_jabatan_id').value = data.jabatan_id ?? '';


                    document.getElementById('edit_status_sertifikasi').value = data.status_sertifikasi ?? '';

                    document.getElementById('edit_nomor_sertifikasi').value = data.nomor_sertifikasi ?? '';
                    document.getElementById('edit_serdik_no').value = data.serdik_no ?? '';
                    document.getElementById('edit_bidang_studi').value = data.bidang_studi ?? '';
                    document.getElementById('edit_prodi_terakhir').value = data.prodi_terakhir ?? '';
                    document.getElementById('edit_mapel_ampu').value = data.mapel_ampu ?? '';
                    document.getElementById('edit_jam_ajar').value = data.beban_ajar ?? '';
                    
                    document.getElementById('edit_tugas_tambahan').value = data.tugas_tambahan ?? '';
                    
                    // Render Preview Foto Lama pada Modal Edit
                    const previewDiv = document.getElementById('preview_foto');
                    if (previewDiv) {
                        if(data.foto) {
                            previewDiv.innerHTML = `
                                <img src="{{ asset('foto_pegawai') }}/${data.foto}" 
                                     id="imgPreviewEdit" 
                                     style="width: 100%; height: 100%; object-fit: cover; ">
                            `;
                        } else {
                            previewDiv.innerHTML = `
                                <i id="iconPreviewEdit" class="bi bi-file-image text-muted" style="font-size: 40px;"></i>
                            `;
                        }
                    }

                    modalEdit.show();
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat memuat data pegawai. Pastikan URL Route sudah benar.');
                });
        });
    });
});
</script>
@endsection