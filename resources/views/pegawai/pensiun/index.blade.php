@extends('pegawai.layouts.app')
@php
$title = 'Pensiun';
@endphp
@section('content')



<div class="container p-4">
    <div class="row">
        <div class="col-lg-12 py-2">
            <h2>Data Pensiun</h2>
        </div>
        
    </div>
    <div class="row">
        <div class="col-lg-4 mb-2">
            <div class="card card-body border-1 rounded-3 shadow-sm p-3 mb-5 bg-body">
                <div class="row">
                    <div class="col-lg-12 d-flex justify-content-center">
                        @if($pegawaiAnda->foto)
                            <img src="{{ asset('foto_pegawai/'.$pegawaiAnda->foto) }}" alt="Foto" class="" width="70%" height="260" style="object-fit: cover;">
                        @else
                          <h1 class="text-center" style="font-size: 100px">
                            <i class="bi bi-person-fill"></i>
                        </h1>
                        @endif

                    </div>
                    <div class="col-lg-12 pt-2">
                        <h3 class="text-center">
                        {{ $pegawaiAnda->nama ?? '-' }}
                        </h3>
                    
                    </div>
                </div>
                
               
            </div>
        </div>
        <div class="col-lg-8 mb-2">
            <div class="card card-body border-1 rounded-3 shadow-sm p-3 mb-5 bg-body">
                <div class="row">
                    <div class="col-lg-12">
                        <h5>Ringkasan Data Pensiun</h5>
                    </div>
                    @if (empty($pensiun))
                    <small>
                        Belum Ada Data
                    </small>
                        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalTambah">
                            + Tambah Data Pensiun
                        </button>
                    @else

<!-- Modal -->
<div class="modal fade" id="modalmadil" tabindex="-1" aria-labelledby="modalmadilLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        {{-- <h5 class="modal-title" id="modalmadilLabel">Modal title</h5> --}}
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <h6 class="text-muted">
            Sisa Masa Kerja Anda
         </h6>
           @php
             $tgl_pensiun = $pensiun->tanggal_pensiun ? \Carbon\Carbon::parse($pensiun->tanggal_pensiun) : null;
             $hari_ini = \Carbon\Carbon::now();
         @endphp
     
         @if($tgl_pensiun && $hari_ini->lessThan($tgl_pensiun))
             @php $selisih = $hari_ini->diff($tgl_pensiun); @endphp
             {{ $selisih->y }} tahun {{ $selisih->m }} bulan {{ $selisih->d }} hari
         @else
             <span class="text-danger font-weight-bold">Pensiun Batas Usia / Pensiun</span>
         @endif
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>


                        <div class="col-lg-12">
                            <div class="row px-3">
                                <div class="col-lg-5 border rounded-3">
                                    <div class="row py-3">
                                        <div class="col-2 my-auto">
                                            <h5>
                                                <i class="bi bi-clock"></i>
                                            </h5>
                                        </div>
                                        <div class="col-10">
                                            <h6 class="text-muted">
                                                Masa Kerja
                                            </h6>
                                            <h5>
                                                {{ $pensiun->masa_kerja }} Tahun
                                            </h5>
                                             <h6 class="text-muted">
                                               Sisa Masa Kerja
                                            </h6>
                                              @php
                                                $tgl_pensiun = $pensiun->tanggal_pensiun ? \Carbon\Carbon::parse($pensiun->tanggal_pensiun) : null;
                                                $hari_ini = \Carbon\Carbon::now();
                                            @endphp
                                        
                                            @if($tgl_pensiun && $hari_ini->lessThan($tgl_pensiun))
                                                @php $selisih = $hari_ini->diff($tgl_pensiun); @endphp
                                                {{ $selisih->y }} tahun {{ $selisih->m }} bulan {{ $selisih->d }} hari
                                            @else
                                                <span class="text-danger font-weight-bold">Batas Usia / Pensiun</span>
                                            @endif
                                            
                                        </div>
                                    </div>
                                   
                                </div>
                                <div class="col-lg-2"></div>
                                <div class="col-lg-5 border rounded-3">
                                    <div class="row py-3">
                                        <div class="col-2 my-auto">
                                            <h5>
                                                <i class="bi bi-bookmark-star-fill"></i>
                                            </h5>
                                        </div>
                                        <div class="col-10">
                                            <h6 class="text-muted">
                                                NIP
                                            </h6>
                                            <h5>
                                                {{ $pegawaiAnda->nip }} 
                                            </h5>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 pt-4">
                            <div class="row px-3">
                                <div class="col-lg-5 border rounded-3">
                                    <div class="row py-3">
                                        <div class="col-2 my-auto">
                                            <h5>
                                               <i class="bi bi-cash-stack"></i>
                                            </h5>
                                        </div>
                                        <div class="col-10">
                                            <h6 class="text-muted">
                                                Total Tunjangan
                                            </h6>
                                            <h5>
                                                {{ number_format($pensiun->total_tunjangan, 0, ',', '.') }}
                                            </h5>
                                        </div>
                                    </div>
                                   
                                </div>
                                <div class="col-lg-2"></div>
                                <div class="col-lg-5 border rounded-3">
                                    <div class="row py-3">
                                        <div class="col-2 my-auto">
                                            <h5>
                                                <i class="bi bi-exclamation-circle"></i>
                                            </h5>
                                        </div>
                                        <div class="col-10">
                                            <h6 class="text-muted">
                                                Status Pensiun
                                            </h6>
                                            <h5>
                                                Pegawai
                                              <span class="text-capitalize">
                                                   {{ $pegawaiAnda->jabatan->status_jabatan }} 
                                                
                                            </span> 
                                            </h5>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        
    @if (empty($pensiun))
                     
    @else
    <div class="col-lg-12 mb-2">
       <div class="card card-body border-1 rounded-3 shadow-sm p-3 mb-5 bg-body">
           <div class="row">
               <div class="col-lg-12">
                   <h5>Tanggal Terhitung Mulai (TMT)</h5>
               </div>
               <div class="col-lg-3 border rounded-3">
                   <div class="row py-3">
                       <div class="col-2 my-auto">
                           <h5>
                              <div class="col-lg-12">
                                   <h5>
                                       <i class="bi bi-calendar-week"></i>
                                   </h5>
                               </div>
                           </h5>
                       </div>
                       <div class="col-10">
                           <h6 class="text-muted">
                               TMT CPNS
                           </h6>
                           <h5>
                               {{ $pensiun->tmt_cpns ? \Carbon\Carbon::parse($pensiun->tmt_cpns)->locale('id')->isoFormat('DD MMMM YYYY') : '-' }}                                    
                           </h5>
                       </div>
                   </div>                       
               </div>
               
               <div class="col-lg-3 border rounded-3">
                   <div class="row py-3">
                       <div class="col-2 my-auto">
                           <h5>
                              <div class="col-lg-12">
                                   <h5>
                                       <i class="bi bi-calendar-week"></i>
                                   </h5>
                               </div>
                           </h5>
                       </div>
                       <div class="col-10">
                           <h6 class="text-muted">
                               TMT Pangkat
                           </h6>
                           <h5>
                               {{ $pensiun->tmt_pangkat ? \Carbon\Carbon::parse($pensiun->tmt_pangkat)->locale('id')->isoFormat('DD MMMM YYYY') : '-' }}                                    
                           </h5>
                       </div>
                   </div>                       
               </div>
             
               <div class="col-lg-3 border rounded-3">
                   <div class="row py-3">
                       <div class="col-2 my-auto">
                           <h5>
                              <div class="col-lg-12">
                                   <h5>
                                       <i class="bi bi-calendar-week"></i>
                                   </h5>
                               </div>
                           </h5>
                       </div>
                       <div class="col-10">
                           <h6 class="text-muted">
                               TMT Pensiun
                           </h6>
                           <h5>
                               {{ $pensiun->tanggal_pensiun ? \Carbon\Carbon::parse($pensiun->tanggal_pensiun)->locale('id')->isoFormat('DD MMMM YYYY') : '-' }}                                    
                           </h5>
                       </div>
                   </div>                       
               </div>
               <div class="col-lg-3 border rounded-3">
                   <div class="row py-3">
                       <div class="col-2 my-auto">
                           <h5>
                              <div class="col-lg-12">
                                   <h5>
                                       <i class="bi bi-file"></i>
                                   </h5>
                               </div>
                           </h5>
                       </div>
                       <div class="col-12">
                           <h6 class="text-muted">
                               Status Berkas Pensiun
                           </h6>
                           @if ($pensiun->status=='Sudah Verifikasi')
                                   {{ $pensiun->status }}
                           @else
                                   {{ $pensiun->status }}
                                   <hr>
                                   <b>Keterangan :</b>
                                   <br>
                                   {{ $pensiun->keterangan_berkas ?? '-' }}
                           @endif
                           {{-- TOMBOL LIHAT BERKAS --}}
                            @if (!empty($pensiun->berkas))
                                <div class="mt-3">
                                    <a href="{{ asset('file_pegawai/' . $pensiun->berkas) }}" 
                                    target="_blank" 
                                    class="btn btn-primary btn-sm">
                                        <i class="fas fa-eye"></i> Lihat Berkas
                                    </a>
                                </div>
                            @endif
                          
                       </div>
                   </div>                       
               </div>
           </div>
       </div>
    </div>
     <div class="col-lg-12">
            <div class="d-grid gap-2">
                <button type="button" class="btn btn-sm btn-primary text-white btn-edit" data-id="{{ $pensiun->id }}">Edit Data Pensiun</button>
        </div>
    @endif

    </div>
        
    <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="{{ route('pegawai.pensiun.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header ">
                        <h5 class="modal-title" id="modalTambahLabel">Tambah Data Pensiun</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <input type="hidden" name="id_user" value="{{ $pegawaiAnda->user_id }}">
                        
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
                            <div class="col-md-6">
                                <label class="form-label">Berkas Pensiun (Format PDF)</label>
                                <input type="file" 
                                    name="file" 
                                    class="form-control form_border" 
                                    accept=".pdf" 
                                    required>
                                <div class="form-text text-muted">*Hanya menerima berkas format .pdf</div>
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
    {{-- edit --}}
    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                {{-- TAMBAHKAN enctype="multipart/form-data" AGAR BISA UPLOAD FILE --}}
                <form id="formEdit" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditLabel">Edit Data Pensiun</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
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
                            {{-- Status Pembayaran (Sudah Dikembalikan dengan ID untuk JS) --}}
                            <div class="col-md-6">
                                <label class="form-label">Status Pembayaran</label>
                                <select name="status_pembayaran" id="edit_status_pembayaran" class="form-select form_border" required>
                                    <option value="pending">Pending</option>
                                    <option value="proses">Proses</option>
                                    <option value="selesai">Selesai</option>
                                </select>
                            </div>
                            
                            {{-- INPUT FILE BARU & PREVIEW FILE LAMA --}}
                            <div class="col-md-6">
                                <label class="form-label">Update Berkas (Format PDF)</label>
                                <input type="file" name="file" id="edit_file" class="form-control form_border" accept=".pdf">
                                <div class="form-text text-muted">*Kosongkan jika tidak ingin mengubah berkas.</div>
                                
                                {{-- Tempat untuk memunculkan tombol preview file lama --}}
                                <div id="preview_berkas_container" class="mt-2 d-none">
                                    <span style="font-size: 0.85rem;" class="text-muted">Berkas saat ini: </span>
                                    <a id="preview_berkas_link" href="#" target="_blank" class="btn btn-sm btn-outline-primary py-0 px-2" style="font-size: 0.85rem;">
                                        <i class="fas fa-file-pdf"></i> Lihat Berkas Lama
                                    </a>
                                </div>
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
       
    </div>
</div>
<script>
document.addEventListener("DOMContentLoaded", function() {
    // Inisialisasi dan tampilkan modal
    var myModal = new bootstrap.Modal(document.getElementById('modalmadil'));
    myModal.show();
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const editButtons = document.querySelectorAll('.btn-edit');
    const modalEditElement = document.getElementById('modalEdit');
    if (!modalEditElement) return;
    const modalEdit = new bootstrap.Modal(modalEditElement);
    
    editButtons.forEach(button => {
        button.addEventListener('click', function () {
            const id = this.getAttribute('data-id');

            fetch(`/pegawai/pensiun/${id}/edit`)
                .then(response => {
                    if (!response.ok) throw new Error('Gagal memuat data');
                    return response.json();
                })
                .then(data => {
                    console.log(data);

                    document.getElementById('formEdit').setAttribute('action', `/pegawai/pensiun/${id}`);
                    
                    // (Opsional: Bagian select user lama Anda yang di-comment, jika dipakai silakan di-uncomment sesuai kebutuhan)
                    
                    // Suntik data field lainnya
                    document.getElementById('edit_tmt_jabatan').value = data.tmt_jabatan ?? '';
                    document.getElementById('edit_tmt_cpns').value = data.tmt_cpns ?? '';
                    document.getElementById('edit_tmt_golongan').value = data.tmt_golongan ?? '';
                    document.getElementById('edit_golongan').value = data.golongan ?? '';
                    document.getElementById('edit_jenis_pensiun').value = data.jenis_pensiun ?? '';
                    document.getElementById('edit_tmt_pangkat').value = data.tmt_pangkat ?? '';
                    document.getElementById('edit_masa_kerja').value = data.masa_kerja ?? '';
                    document.getElementById('edit_total_tunjangan').value = data.total_tunjangan ?? 0;
                    // Memastikan dropdown Status Pembayaran otomatis memilih sesuai data database
                    document.getElementById('edit_status_pembayaran').value = data.status_pembayaran ?? 'pending';
                    
                    // --- LOGIKA PREVIEW FILE LAMA ---
                    const previewContainer = document.getElementById('preview_berkas_container');
                    const previewLink = document.getElementById('preview_berkas_link');
                    
                    // Cek nama property file dari JSON (sesuaikan dengan nama kolom di database Anda, misalnya 'berkas_pensiun' atau 'file')
                    const namaFileLama = data.berkas || data.file;

                    if (namaFileLama) {
                        // Munculkan tombol jika ada file
                        previewContainer.classList.remove('d-none');
                        // Set URL menuju file storage Anda
                        previewLink.href = `/file_pegawai/${namaFileLama}`; 
                    } else {
                        // Sembunyikan jika kosong
                        previewContainer.classList.add('d-none');
                        previewLink.href = '#';
                    }

                    // Reset input file agar kosong saat modal dibuka
                    document.getElementById('edit_file').value = '';

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