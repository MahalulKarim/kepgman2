@extends('admin.layouts.app')
@php
$title = 'Pensiun';
@endphp
@section('content')



<div class="container p-4">
    <div class="row">
        <div class="col-lg-12 py-2">
            <h2>Kelola Data Pensiun Pegawai</h2>
        </div>
        <div class="col-lg-12 d-flex mb-3">
            <button type="button" class="btn btn-success btn-sm me-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
                + Tambah Data Pensiun
            </button>
            <form action="{{ route('admin.pensiun.index') }}" method="GET" class="d-flex gap-2">
                <div class="input-group">
                    <span class="input-group-text bg-success text-white border-0">
                        <button type="submit" class="btn btn-success btn-sm p-0"><i class="bi bi-search"></i></button>
                    </span>
                    <input type="text" name="cari_pensiun" class="form-control form-control-sm" 
                        placeholder="Cari NIP / NUPTK / ID /Nama pegawai..." 
                        value="{{ request('cari_pensiun') }}">
                    @if(request()->filled('cari_pensiun'))
                        <a href="{{ route('admin.pensiun.index') }}" class="btn btn-outline-secondary btn-sm d-flex align-items-center px-2" title="Reset Pencarian">
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

                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr class="text-nowrap">
                                    <th>No</th>
                                    <th>NIP / NUPTK</th>
                                    <th>Nama Lengkap + Gelar</th>
                                    <th>Tempat, Tgl Lahir</th>
                                    <th>TMT Golongan</th>
                                    <th>Golongan</th>
                                    <th>Jabatan Terakhir</th>
                                    <th>TMT Jabatan</th>
                                    <th>Usia Pensiun</th>
                                    <th>TMT Pensiun</th>
                                    <th>Sisa Masa Kerja</th>
                                    <th>Jenis Pensiun</th>
                                    <th>No Hp</th>
                                    <th>TMT CPNS</th>
                                    <th>TMT Pangkat</th>
                                    {{-- <th>Masa Kerja</th>
                                    <th>Total Tunjangan</th>
                                    <th>Status Pembayaran</th> --}}
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($pensiun as $key => $p)
    <tr class="text-nowrap">
        <td>{{ $pensiun->firstItem() + $key }}</td>
        <td>{{ $p->user->pegawai->nip ?? ($p->user->nip ?? '-') }}/{{ $p->user->pegawai->nuptk ??  '-' }}</td>
        <td>{{ $p->user->name ?? 'Tidak Diketahui' }}</td>
        <td>{{ $p->user->pegawai->tempat_lahir ?? '-' }}, {{ $p->user->pegawai->tgl_lahir ? \Carbon\Carbon::parse($p->user->pegawai->tgl_lahir)->locale('id')->translatedFormat('d F Y') : '-' }}</td>
        <td>{{ $p->tmt_golongan ? \Carbon\Carbon::parse($p->tmt_golongan)->locale('id')->translatedFormat('d F Y') : '-' }}</td>
        <td>{{ $p->golongan ?? '-' }}</td>
        <td>{{ $p->user->pegawai->jabatan->nama_jabatan ?? '-' }}</td>
        <td>{{ $p->tmt_jabatan ? \Carbon\Carbon::parse($p->tmt_jabatan)->locale('id')->translatedFormat('d F Y') : '-' }}</td>

        <td>{{ $p->masa_kerja ?? '-' }} Tahun</td>
        
        <td>
            {{ $p->tanggal_pensiun ? \Carbon\Carbon::parse($p->tanggal_pensiun)->locale('id')->translatedFormat('d F Y') : '-' }}
        </td>
         
        <td>
            @php
                $tgl_pensiun = $p->tanggal_pensiun ? \Carbon\Carbon::parse($p->tanggal_pensiun) : null;
                $hari_ini = \Carbon\Carbon::now();
            @endphp
        
            @if($tgl_pensiun && $hari_ini->lessThan($tgl_pensiun))
                @php $selisih = $hari_ini->diff($tgl_pensiun); @endphp
                {{ $selisih->y }} tahun {{ $selisih->m }} bulan {{ $selisih->d }} hari
            @else
                <span class="text-danger font-weight-bold">Batas Usia / Pensiun</span>
            @endif
        </td> 
        
        <td>{{ $p->jenis_pensiun ?? '-' }}</td>
        <td>{{ $p->user->pegawai->no_telp ?? '-' }}</td>
        <td>{{ $p->tmt_cpns ? \Carbon\Carbon::parse($p->tmt_cpns)->locale('id')->translatedFormat('d F Y') : '-' }}</td>
        <td>{{ $p->tmt_pangkat ? \Carbon\Carbon::parse($p->tmt_pangkat)->locale('id')->translatedFormat('d F Y') : '-' }}</td>
        
        <td class="text-center">
            <div class="d-flex gap-1">
                <button type="button" class="btn btn-sm btn-info text-white btn-edit" data-id="{{ $p->id }}">Edit / Detail</button>
                <form action="{{ route('admin.pensiun.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data pensiun ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </div>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="15" class="text-center text-muted">Belum ada data pensiun pegawai.</td>
    </tr>
@endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3">
                        {{ $pensiun->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('admin.pensiun.store') }}" method="POST">
                @csrf
                <div class="modal-header ">
                    <h5 class="modal-title" id="modalTambahLabel">Tambah Data Pensiun</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Pilih Pegawai</label>
                        <select name="id_user" class="form-select form_border" required>
                            <option value="">-- Pilih Pegawai --</option>
                            @foreach($pegawai as $peg)
                                <option value="{{ $peg->id }}">{{ $peg->pegawai->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label">TMT Jabatan</label>
                            <input type="date" name="tmt_jabatan" class="form-control form_border" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">TMT CPNS</label>
                            <input type="date" name="tmt_cpns" class="form-control form_border" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">TMT Pangkat</label>
                            <input type="date" name="tmt_pangkat" class="form-control form_border" required>
                        </div>
                       
                        <div class="col-md-6">
                            <label class="form-label">TMT Golongan</label>
                            <input type="date" name="tmt_golongan" class="form-control form_border" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Golongan</label>
                            <input type="text" name="golongan" class="form-control form_border" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Umur Pensiun</label>
                            <div class="input-group mb-3">
                                <input type="number" name="masa_kerja" class="form-control form_border" placeholder="ex: 20" aria-label="masa_kerja" aria-describedby="basic-addon2" required>
                                <span class="input-group-text form_border" id="basic-addon2">Tahun</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Jenis Pensiun</label>
                            <select name="jenis_pensiun" class="form-select form_border" required>
                                <option value="Batas Usia">Batas Usia</option>
                                <option value="Dini">Dini</option>
                                <option value="Janda / Duda">Janda / Duda</option>
                                <option value="Sakit">Sakit</option>
                                
                            </select>
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Total Tunjangan Pensiun (Rp)</label>
                            <input type="number" name="total_tunjangan" class="form-control form_border" min="0" required value="0">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Status Pembayaran</label>
                            <select name="status_pembayaran" class="form-select form_border" required>
                                <option value="pending">Pending</option>
                                <option value="proses">Proses</option>
                                <option value="selesai">Selesai</option>
                            </select>
                        </div>
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="formEdit" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditLabel">Edit Data Pensiun</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Pilih Pegawai</label>
                        <select name="id_user" id="edit_id_user" class="form-select form_border" required>
                            <option value="">-- Pilih Pegawai --</option>
                            @foreach($pegawai as $peg)
                                <option value="{{ $peg->id }}">{{ $peg->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label">TMT Jabatan</label>
                            <input type="date" id="edit_tmt_jabatan" name="tmt_jabatan" class="form-control form_border" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">TMT CPNS</label>
                            <input type="date" id="edit_tmt_cpns" name="tmt_cpns" class="form-control form_border" >
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">TMT Pangkat</label>
                            <input type="date" id="edit_tmt_pangkat" name="tmt_pangkat" class="form-control form_border" >
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">TMT Golongan</label>
                            <input type="date" id="edit_tmt_golongan" name="tmt_golongan" class="form-control form_border" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Golongan</label>
                            <input type="text" name="golongan" id="edit_golongan" class="form-control form_border" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Umur Pensiun</label>
                            <div class="input-group mb-3">
                                <input type="number" name="masa_kerja" id="edit_masa_kerja" class="form-control form_border" placeholder="ex: 20" aria-label="masa_kerja" aria-describedby="basic-addon2" required>
                                <span class="input-group-text form_border" id="basic-addon2">Tahun</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Jenis Pensiun</label>
                            <select name="jenis_pensiun" id="edit_jenis_pensiun" class="form-select form_border" required>
                                <option value="Batas Usia">Batas Usia</option>
                                <option value="Dini">Dini</option>
                                <option value="Janda / Duda">Janda / Duda</option>
                                <option value="Sakit">Sakit</option>
                                
                            </select>
                        </div>
                       
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Total Tunjangan Pensiun (Rp)</label>
                            <input type="number" name="total_tunjangan" id="edit_total_tunjangan" class="form-control form_border" min="0" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Status Pembayaran</label>
                            <select name="status_pembayaran" id="edit_status_pembayaran" class="form-select form_border" required>
                                <option value="pending">Pending</option>
                                <option value="proses">Proses</option>
                                <option value="selesai">Selesai</option>
                            </select>
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
document.addEventListener('DOMContentLoaded', function () {
    const editButtons = document.querySelectorAll('.btn-edit');
    const modalEditElement = document.getElementById('modalEdit');
    if (!modalEditElement) return;
    const modalEdit = new bootstrap.Modal(modalEditElement);
    
    editButtons.forEach(button => {
        button.addEventListener('click', function () {
            const id = this.getAttribute('data-id');
            
            fetch(`/admin/pensiun/${id}/edit`)
                .then(response => {
                    if (!response.ok) throw new Error('Gagal memuat data');
                    return response.json();
                })
                .then(data => {

                    console.log(data);

                    document.getElementById('formEdit').setAttribute('action', `/admin/pensiun/${id}`);
                    
                    // Auto-select aman menggunakan metode Loop Options agar terhindar dari mismatch tipe data
                    const selectUser = document.getElementById('edit_id_user');
                    if (data.id_user) {
                        for (let i = 0; i < selectUser.options.length; i++) {
                            if (selectUser.options[i].value == data.id_user) {
                                selectUser.selectedIndex = i;
                                break;
                            }
                        }
                    } else {
                        selectUser.value = '';
                    }
                    selectUser.dispatchEvent(new Event('change'));

                    // Suntik data field lainnya
                    document.getElementById('edit_tmt_jabatan').value = data.tmt_jabatan ?? '';
                    document.getElementById('edit_tmt_cpns').value = data.tmt_cpns ?? '';
                    document.getElementById('edit_tmt_golongan').value = data.tmt_golongan ?? '';
                    document.getElementById('edit_golongan').value = data.golongan ?? '';
                    document.getElementById('edit_jenis_pensiun').value = data.jenis_pensiun ?? '';
                    document.getElementById('edit_tmt_pangkat').value = data.tmt_pangkat ?? '';
                    // document.getElementById('edit_tanggal_pensiun').value = data.tanggal_pensiun ?? '';
                    document.getElementById('edit_masa_kerja').value = data.masa_kerja ?? '';
                    document.getElementById('edit_total_tunjangan').value = data.total_tunjangan ?? 0;
                    document.getElementById('edit_status_pembayaran').value = data.status_pembayaran ?? 'pending';

                    modalEdit.show();
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat mengambil data.');
                });
        });
    });
});
</script>
@endsection