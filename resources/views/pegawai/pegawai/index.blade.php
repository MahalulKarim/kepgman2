@extends('pegawai.layouts.app')
@php
$title = 'Data Diri';
@endphp
@section('content')



<div class="container p-4">
    <div class="row">
        <div class="col-lg-12 py-2">
            <h2>Data Diri Saya</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card card-body border-0 rounded-3 shadow-sm p-3 mb-5 bg-body">
                <div class="row">
                    <div class="col-lg-12 d-flex justify-content-center">
                        @if($pegawai->foto)
                            <img src="{{ asset('foto_pegawai/'.$pegawai->foto) }}" alt="Foto" class="" width="100" height="120" style="object-fit: cover;">
                        @else
                          <h1 class="text-center" style="font-size: 100px">
                            <i class="bi bi-person-fill"></i>
                        </h1>
                        @endif

                    </div>
                    <div class="col-lg-12 pt-2">
                    <h3 class="text-center">
                       {{ $pegawai->nama ?? '-' }}
                    </h3>
                    <h4 class="text-center text-muted">
                        NIP : {{ $pegawai->nip ?? '-' }}
                    </h4>
                    <h4 class="text-center text-muted">
                        Jabatan : {{ $pegawai->jabatan->nama_jabatan ?? '-' }}
                    </h4>
                    </div>
                </div>
                
               
            </div>
        </div>
        <div class="col-lg-6 p-3" style="background-color: rgba(133, 133, 133, 0.614)">
            <h3 class="">
                Informasi Dasar
            </h3>
             <form id="formEdit" method="POST" action="{{ route('pegawai.pegawai.update',$pegawai->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                    <div class="row g-3 mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Nama Lengkap + Gelar :</label>
                            <input type="text" name="nama" id="edit_nama_lengkap" class="form-control form_border" required value="{{ $pegawai->nama }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">NIP :</label>
                            <input type="text" name="nip" id="edit_nip" class="form-control form_border" value="{{ $pegawai->nip }}">
                        </div>
                         <div class="col-md-4">
                            <label class="form-label">NUPTK / ID</label>
                            <input type="text" name="nuptk" id="edit_nuptk" class="form-control form_border" value="{{ $pegawai->nuptk }}">
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" id="edit_tempat_lahir" class="form-control form_border" required value="{{ $pegawai->tempat_lahir }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir" id="edit_tgl_lahir" class="form-control form_border" required value="{{ $pegawai->tgl_lahir }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="edit_jenis_kelamin" class="form-select form_border" required>
                                <option value="L" {{ ($pegawai->jenis_kelamin=='L')?'selected':'' }}>Laki-laki</option>
                                <option value="P" {{ ($pegawai->jenis_kelamin=='P')?'selected':'' }}>Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Agama</label>
                            <select name="agama" id="edit_agama" class="form-select form_border" required>
                                <option value="Islam" {{ ($pegawai->agama=='Islam')?'selected':'' }}>Islam</option>
                                <option value="Kristen" {{ ($pegawai->agama=='Kristen')?'selected':'' }}>Kristen</option>
                                <option value="Katolik" {{ ($pegawai->agama=='Katolik')?'selected':'' }}>Katolik</option>
                                <option value="Hindu" {{ ($pegawai->agama=='Hindu')?'selected':'' }}>Hindu</option>
                                <option value="Buddha" {{ ($pegawai->agama=='Buddha')?'selected':'' }}>Buddha</option>
                                <option value="Khonghucu" {{ ($pegawai->agama=='Konghucu')?'selected':'' }}>Khonghucu</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">No. Telepon</label>
                            <input type="text" name="no_telp" id="edit_no_telp" class="form-control form_border" required value="{{ $pegawai->no_telp }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Status Pegawai</label>
                            <select name="status_pegawai" id="edit_status_pegawai" class="form-select form_border" required>
                                <option value="PNS" {{ ($pegawai->status_pegawai=='PNS')?'selected':'' }}>PNS</option>
                                <option value="NON-PNS"{{ ($pegawai->status_pegawai=='NON-PNS')?'selected':'' }}>NON-PNS</option>
                                 <option value="GTT" {{ ($pegawai->status_pegawai == 'GTT') ? 'selected' : '' }}>GTT</option>
                                <option value="GTY" {{ ($pegawai->status_pegawai == 'GTY') ? 'selected' : '' }}>GTY</option>
                                <option value="ASN" {{ ($pegawai->status_pegawai == 'ASN') ? 'selected' : '' }}>ASN</option>
                                <option value="PPPK" {{ ($pegawai->status_pegawai == 'PPPK') ? 'selected' : '' }}>PPPK</option>
                            </select>
                        </div>
<div class="col-md-4">
                            <label class="form-label">Status Sertifikasi (Opsional)</label>
                            <select name="status_sertifikasi" class="form-select form_border" id="edit_status_sertifikasi">
                                <option value="sertifikasi" {{ ($pegawai->status_sertifikasi == 'serifikasi') ? 'selected' : '' }}>Sertifikasi</option>

                                <option value="belum_sertifikasi" {{($pegawai->status_sertifikasi == 'belum_sertifikasi') ? 'selected' : '' }}>Belum Sertifikasi</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">No. Sertifikasi ('Opsional')</label>
                            <input type="text" name="nomor_sertifikasi" class="form-control form_border"   id="edit_nomor_sertifikasi" value="{{ $pegawai->nomor_sertifikasi }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">No. Peserta Serdik ('Opsional')</label>
                            <input type="text" name="serdik_no" class="form-control form_border"  "id="edit_serdik_no" value="{{ $pegawai->serdik_no }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Bidang Studi ('Opsional')</label>
                            <input type="text" name="bidang_studi" class="form-control form_border"  id="edit_bidang_studi" value="{{ $pegawai->program_studi }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Prodi Terakhir ('Opsional')</label>
                            <input type="text" name="prodi_terakhir" class="form-control form_border"   id="edit_prodi_terakhir" value="{{ $pegawai->prodi_terakhir }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Mapel Diampu ('Opsional')</label>
                            <input type="text" name="mapel_ampu" class="form-control form_border"  id="edit_mapel_ampu" value="{{ $pegawai->mapel_ampu }}">
                            <small>Pisahkan dengan tanda , (koma) jika lebih dari 1</small>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Jumlah Jam Kerja (Jam) ('Opsional')</label>
                            <input type="number" name="beban_ajar" class="form-control form_border"   id="edit_jam_ajar" value="{{ $pegawai->beban_ajar }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Tugas Tambahan ('Opsional')</label>
                            <input type="text" name="tugas_tambahan" class="form-control form_border"   id="edit_tugas_tambahan" value="{{ $pegawai->tugas_tambahan }}">
                        </div>
                        


                    </div>

                    <div class="mb-3">
                        <label class="form-label">Alamat Rumah</label>
                        <textarea name="alamat" id="edit_alamat" class="form-control form_border" rows="2" required>{{ $pegawai->alamat }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label d-block fw-bold text-start">Foto Pegawai (Kosongkan jika tidak diubah)</label>
                        <label for="fotoEdit" style="cursor: pointer;" class="d-inline-block">
                            @if ($pegawai->foto)
                            <div class="preview-container" id="preview_foto">
                                <img src="{{ asset('foto_pegawai/'.$pegawai->foto) }}" 
                                     id="imgPreviewEdit" 
                                     style="width: 100%; height: 100%; object-fit: cover; ">
                                </div>
                                
                            @else
                            <div class="preview-container" id="preview_foto">
                                </div>
                                
                            @endif
                            <small class="text-muted d-block mt-2">Klik untuk mengubah foto</small>
                        </label>
                        <input type="file" name="foto" class="form-control form_border d-none" id="fotoEdit" accept="image/*" onchange="previewImage(this, 'Edit')">
                    </div>

                    <div class="mb-2">
                        <label class="form-label font-weight-bold">Jabatan Pegawai (Jabatan hanya dapat di update melalui admin *)</label>
                        <select name="jabatan_id" id="edit_jabatan_id" class="form-control" required readonly disabled>
                            <option value="" disabled>-- Pilih Jabatan --</option>
                            @foreach($jabatan as $j)
                                @if($j->status_jabatan == 'aktif')
                                    <option value="{{ $j->id }}" {{ ($pegawai->jabatan_id==$j->id)?'selected':'' }}>
                                        {{ $j->kode_jabatan }} - {{ $j->nama_jabatan }} ({{ ucwords($j->level_jabatan) }})
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                     <h6 class="pb-1 mb-3 fw-bold pt-5">Akun Login</h6>
                    <div class="row g-3 mb-3">
                       
                        <div class="col-md-12">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" id="edit_email" class="form-control form_border" required value="{{ $pegawai->user->email }}">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Password (Kosongkan jika tidak diubah)</label>
                            <input type="password" name="password" class="form-control form_border" placeholder="Password baru">
                        </div>
                    </div>

            
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-info text-white">Update</button>
                </div>
            </form>
        </div>
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