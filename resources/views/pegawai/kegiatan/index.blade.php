@extends('pegawai.layouts.app')
@php
$title = 'Kegiatan';
@endphp
@section('content')



<div class="container p-4">
    <div class="row">
        <div class="col-lg-12 py-2">
            <h2>Data Kegiatan</h2>
        </div>
        <div class="col-lg-12 d-flex mb-3">
           <button type="button" class="btn btn-success shadow-sm fw-semibold" data-bs-toggle="modal" data-bs-target="#modalKegiatan">
                <i class="bi bi-plus-circle me-1"></i> Catat Kegiatan
            </button>
        </div>
    </div>
    <div class="row pt-2">
        <div class="col-lg-12">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body p-3">
                    <form action="{{ route('pegawai.kegiatan.index') }}" method="GET" id="filter-form" class="row g-2 align-items-end">
                    <div class="col-12 col-md-4">
                        <label class="form-label small fw-bold text-muted">Tanggal Mulai</label>
                        <input type="date" name="tanggal_mulai" id="filter_tanggal_mulai" class="form-control form-control-sm" value="{{ request('tanggal_mulai') }}">
                    </div>
                    <div class="col-12 col-md-4">
                        <label class="form-label small fw-bold text-muted">Tanggal Selesai</label>
                        <input type="date" name="tanggal_selesai" id="filter_tanggal_selesai" class="form-control form-control-sm" value="{{ request('tanggal_selesai') }}">
                    </div>
                    <div class="col-12 col-md-4 d-flex gap-2">
                        <button type="submit" class="btn btn-sm btn-primary w-33 fw-semibold">
                            <i class="bi bi-filter me-1"></i> Filter
                        </button>
                        
                        <button type="button" onclick="cetakPdfFiltered()" class="btn btn-sm btn-success w-33 text-white fw-semibold">
                            <i class="bi bi-file-earmark-pdf me-1"></i> PDF
                        </button>
                        
                        <a href="{{ route('pegawai.kegiatan.index') }}" class="btn btn-sm btn-light w-33 text-secondary border fw-semibold">Reset</a>
                    </div>
                </form>
                </div>
            </div>
        </div>
       <div class="col-lg-12">
            <div class="card card-body">
                <div class="table-responsive">
                     <table class="table table-hover align-middle mb-0" style="font-size: 14px;">
                         <thead class="table-light text-secondary">
                             <tr>
                                 <th width="5%" class="ps-3 text-center">No</th>
                                 <th width="15%">Waktu & Tanggal</th>
                                 <th width="25%">Nama Kegiatan</th>
                                 <th width="35%">Deskripsi Detail</th>
                                 <th width="35%">Foto Kegiatan</th>
                                 <th width="10%" class="text-center">Status</th>
                                 <th width="10%" class="text-center pe-3">Aksi</th>
                             </tr>
                         </thead>
                         <tbody>
                             @forelse($kegiatan as $key => $item)
                                 <tr>
                                     <td class="text-center ps-3 text-muted">{{ $kegiatan->firstItem() + $key }}</td>
                                     <td>
                                         <div class="fw-bold text-dark mb-1">{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d M Y') }}</div>
                                         <span class="badge bg-light text-dark border small fw-normal">
                                             <i class="bi bi-clock text-success me-1"></i>
                                             {{ date('H:i', strtotime($item->jam_mulai)) }} - {{ date('H:i', strtotime($item->jam_selesai)) }}
                                         </span>
                                     </td>
                                     <td><span class="fw-semibold text-dark">{{ $item->nama_kegiatan }}</span></td>
                                     
                                     <td>
                                         <div class="text-secondary text-truncate" style="max-width: 320px;" title="{{ $item->deskripsi }}">
                                             {{ $item->deskripsi }}
                                         </div>
                                     </td>
                                     <td>
                                        {{-- MENAMPILKAN FOTO KEGIATAN --}}
                                        @if(!empty($item->foto))
                                            <a href="{{ asset('kegiatan_pegawai/' . $item->foto) }}" target="_blank">
                                                <img src="{{ asset('kegiatan_pegawai/' . $item->foto) }}" 
                                                    alt="Foto Kegiatan" 
                                                    class="img-thumbnail" 
                                                    style="max-height: 60px; max-width: 100px; object-fit: cover;"
                                                    title="Klik untuk memperbesar">
                                            </a>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                     <td class="text-center">
                                          @if($item->status == 'disetujui')
                                             <span class="badge bg-success bg-opacity-10 text-white border border-success px-2 py-1">Disetujui</span>
                                         @elseif($item->status == 'ditolak')
                                             <span class="badge bg-danger bg-opacity-10 text-white border border-danger px-2 py-1">Ditolak</span>
                                         @else
                                             <span class="badge bg-warning bg-opacity-10 text-white border border-warning px-2 py-1">Pending</span>
                                         @endif
                                     </td>
                                     <td class="text-center pe-3">
                                         <div class="d-flex gap-1 justify-content-center">
                                             <button type="button" class="btn btn-sm btn-outline-primary border-0" data-bs-toggle="modal"
                                                     data-bs-target="#modalKegiatanUbah{{ $item->id }}" title="Ubah Catatan">
                                                 <i class="bi bi-pencil-square fs-5"></i>
                                             </button>


                                             <div class="modal fade" id="modalKegiatanUbah{{ $item->id }}" tabindex="-1" aria-labelledby="modalKegiatanUbah{{ $item->id }}Label" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content border-0 shadow">
                                                    <div class="modal-header bg-success text-white">
                                                        <h5 class="modal-title fw-bold" id="modalKegiatanUbah{{ $item->id }}Label"><i class="bi bi-plus-circle me-2"></i>Catat Kegiatan Ubah</h5>
                                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    
                                                    <form action="{{ route('pegawai.kegiatan.update',$item->id) }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body p-4">
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label fw-bold small text-secondary">Tanggal Kegiatan</label>
                                                                        <input type="date" name="tanggal" id="input_tanggal" class="form-control" required value="{{ $item->tanggal }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label fw-bold small text-secondary">Foto Kegiatan</label>
                                                                        <input type="file" name="foto" id="input_foto" class="form-control" accept="image/*" required>
                                                                        <div class="form-text text-muted" style="font-size: 0.8rem;">*Hanya menerima format gambar (JPG, JPEG, PNG).</div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row g-3 mb-3">
                                                                <div class="col-6">
                                                                    <label class="form-label fw-bold small text-secondary">Jam Mulai</label>
                                                                    <input type="time" name="jam_mulai" id="input_jam_mulai" class="form-control" value="{{ $item->jam_mulai }}" required>
                                                                </div>
                                                                <div class="col-6">
                                                                    <label class="form-label fw-bold small text-secondary">Jam Selesai</label>
                                                                    <input type="time" name="jam_selesai" id="input_jam_selesai" class="form-control" value="{{ $item->jam_selesai }}" required>
                                                                </div>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label class="form-label fw-bold small text-secondary">Nama / Judul Kegiatan</label>
                                                                <input type="text" name="nama_kegiatan" id="input_nama_kegiatan" class="form-control" placeholder="Contoh: Mengawas Ujian Madrasah Aliyah" value="{{ $item->nama_kegiatan }}" required>
                                                            </div>

                                                            <div class="mb-0">
                                                                <label class="form-label fw-bold small text-secondary">Deskripsi / Hasil Aktivitas</label>
                                                                <textarea name="deskripsi" id="input_deskripsi" class="form-control" rows="4" placeholder="Tulis rincian apa saja yang dikerjakan serta capaian hasil kerja di sini..." required>{{ $item->deskripsi }}</textarea>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="modal-footer bg-light border-top-0 px-4">
                                                            <button type="button" class="btn btn-light fw-semibold text-secondary border" data-bs-dismiss="modal">Batal</button>
                                                            <button type="submit" id="btn-submit" class="btn btn-success fw-semibold px-4">Simpan Data</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                             </div>
                                             <form action="{{ route('pegawai.kegiatan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus catatan kegiatan harian ini?')">
                                                 @csrf
                                                 @method('DELETE')
                                                 <button type="submit" class="btn btn-sm btn-outline-danger border-0" title="Hapus">
                                                     <i class="bi bi-trash3 fs-5"></i>
                                                 </button>
                                             </form>
                                         </div>
                                     </td>
                                 </tr>
                             @empty
                                 <tr>
                                     <td colspan="6" class="text-center py-5 text-muted">
                                         <i class="bi bi-journal-x fs-1 d-block text-opacity-25 mb-2"></i>
                                         Belum ada catatan aktivitas kegiatan harian pada rentang waktu ini.
                                     </td>
                                 </tr>
                             @endforelse
                         </tbody>
                     </table>
                 </div>
                 <div class="pt-2">
                     {{ $kegiatan->links() }}
                 </div>
            </div>
       </div>
       <div class="col-lg-12">
            
               
                   
       </div>
        
       
    </div>

    <div class="modal fade" id="modalKegiatan" tabindex="-1" aria-labelledby="modalKegiatanLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title fw-bold" id="modalKegiatanLabel"><i class="bi bi-plus-circle me-2"></i>Catat Kegiatan Baru</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <form id="formKegiatan" action="{{ route('pegawai.kegiatan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div id="method-container"></div>

                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label fw-bold small text-secondary">Tanggal Kegiatan</label>
                                <input type="date" name="tanggal" id="input_tanggal" class="form-control" required value="{{ date('Y-m-d') }}">
                            </div>

                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label fw-bold small text-secondary">Foto Kegiatan</label>
                                <input type="file" name="foto" id="input_foto" class="form-control" accept="image/*" required>
                                <div class="form-text text-muted" style="font-size: 0.8rem;">*Hanya menerima format gambar (JPG, JPEG, PNG).</div>
                            </div>
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-6">
                            <label class="form-label fw-bold small text-secondary">Jam Mulai</label>
                            <input type="time" name="jam_mulai" id="input_jam_mulai" class="form-control" required>
                        </div>
                        <div class="col-6">
                            <label class="form-label fw-bold small text-secondary">Jam Selesai</label>
                            <input type="time" name="jam_selesai" id="input_jam_selesai" class="form-control" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold small text-secondary">Nama / Judul Kegiatan</label>
                        <input type="text" name="nama_kegiatan" id="input_nama_kegiatan" class="form-control" placeholder="Contoh: Mengawas Ujian Madrasah Aliyah" required>
                    </div>

                    <div class="mb-0">
                        <label class="form-label fw-bold small text-secondary">Deskripsi / Hasil Aktivitas</label>
                        <textarea name="deskripsi" id="input_deskripsi" class="form-control" rows="4" placeholder="Tulis rincian apa saja yang dikerjakan serta capaian hasil kerja di sini..." required></textarea>
                    </div>
                </div>
                
                <div class="modal-footer bg-light border-top-0 px-4">
                    <button type="button" class="btn btn-light fw-semibold text-secondary border" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" id="btn-submit" class="btn btn-success fw-semibold px-4">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>


</div>
<script>
function cetakPdfFiltered() {
    // Ambil nilai dari input date saat ini
    const tglMulai = document.getElementById('filter_tanggal_mulai').value;
    const tglSelesai = document.getElementById('filter_tanggal_selesai').value;
    
    // Susun URL Cetak dasar dari Laravel route
    let url = "{{ route('pegawai.kegiatan.cetak') }}";
    
    // Gabungkan parameter jika input tanggal terisi
    url += `?tanggal_mulai=${tglMulai}&tanggal_selesai=${tglSelesai}`;
    
    // Buka proses cetak PDF di tab baru
    window.open(url, '_blank');
}
</script>
@endsection