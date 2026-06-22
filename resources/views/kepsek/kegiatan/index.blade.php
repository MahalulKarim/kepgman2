@extends('kepsek.layouts.app')
@php
$title = 'Kegiatan';
@endphp
@section('content')



<div class="container p-4">
    <div class="row">
        <div class="col-lg-12 py-2">
            <h2>Data Kegiatan Pegawai</h2>
        </div>
        {{-- <div class="col-lg-12 d-flex mb-3">
           <button type="button" class="btn btn-success shadow-sm fw-semibold" data-bs-toggle="modal" data-bs-target="#modalKegiatan">
                <i class="bi bi-plus-circle me-1"></i> Catat Kegiatan
            </button>
        </div> --}}
    </div>
    <div class="row pt-2">
        <div class="col-lg-12">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body p-3">
                    <form action="{{ route('kepsek.kegiatan.index') }}" method="GET" class="row g-2 align-items-end">
            <div class="col-12 col-md-3">
                <label class="form-label small fw-bold text-muted">Tanggal Mulai</label>
                <input type="date" name="tanggal_mulai" id="filter_tanggal_mulai" class="form-control form-control-sm" value="{{ request('tanggal_mulai') }}">
            </div>

            <div class="col-12 col-md-3">
                <label class="form-label small fw-bold text-muted">Tanggal Selesai</label>
                <input type="date" name="tanggal_selesai"  id="filter_tanggal_selesai" class="form-control form-control-sm" value="{{ request('tanggal_selesai') }}">
            </div>

            <div class="col-12 col-md-3">
                <label class="form-label small fw-bold text-muted">Pilih Pegawai</label>
                <select name="user_id" id="filter_userId" class="form-select form-select-sm">
                    <option value="">-- Semua Pegawai --</option>
                    @foreach($users as $u)
                        <option value="{{ $u->id }}" {{ request('user_id') == $u->id ? 'selected' : '' }}>
                            {{ $u->pegawai->nama ?? $u->name }} {{ $u->pegawai->nip ? '('.$u->pegawai->nip.')' : '' }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 col-md-3">
                <label class="form-label small fw-bold text-muted">Status</label>
                <select name="status" id="filter_status" class="form-select form-select-sm">
                    <option value="">-- Semua Status --</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>
                            Pending
                        </option>
                        <option value="disetujui" {{ request('status') == 'disetujui' ? 'selected' : '' }}>
                            Disetujui
                        </option>
                        <option value="ditolak" {{ request('status') == 'ditolak' ? 'selected' : '' }}>
                            Ditolak
                        </option>
                </select>
            </div>

            <div class="col-12 col-md-3 d-flex gap-2">
                <button type="submit" class="btn btn-sm btn-primary  fw-semibold">
                    <i class="bi bi-filter me-1"></i> Filter
                </button>
                <button type="button" onclick="cetakPdfFiltered()" class="btn btn-sm btn-success w-33 text-white fw-semibold">
                            <i class="bi bi-file-earmark-pdf me-1"></i> PDF
                        </button>
                <a href="{{ route('kepsek.kegiatan.index') }}" class="btn btn-sm btn-light  text-secondary border fw-semibold">
                    Reset
                </a>
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
                                 <th class="ps-3 text-center">No</th>
                                 <th >Waktu & Tanggal</th>
                                 <th >Pegawai</th>
                                 <th >Nama Kegiatan</th>
                                 <th >Deskripsi Detail</th>
                                 <th  class="text-center">Status</th>
                                 <th  class="text-center pe-3">Aksi</th>
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
                                     <td>{{ $item->user->name }}</td>
                                     
                                     <td><span class="fw-semibold text-dark">{{ $item->nama_kegiatan }}</span></td>
                                     <td>
                                         <div class="text-secondary text-truncate" style="max-width: 320px;" title="{{ $item->deskripsi }}">
                                             {{ $item->deskripsi }}
                                         </div>
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
                                            <button type="button" class="btn btn-sm btn-outline-success" 
                                                   data-bs-toggle="modal" data-bs-target="#modalVerifikasi{{ $item->id }}" title="Verifikasi Kegiatan">
                                                <i class="bi bi-shield-check fs-5"></i> Verifikasi
                                            </button>


                                             <div class="modal fade" id="modalVerifikasi{{ $item->id }}" tabindex="-1" aria-labelledby="modalVerifikasi{{ $item->id }}Label" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content border-0 shadow">
                                                    <div class="modal-header bg-dark text-white">
                                                        <h5 class="modal-title fw-bold" id="modalVerifikasi{{ $item->id }}Label"><i class="bi bi-shield-check me-2"></i>Verifikasi Kegiatan Pegawai</h5>
                                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    
                                                    <form action="{{ route('kepsek.kegiatan.update',$item->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')

                                                        <div class="modal-body p-4">
                                                            

                                                            <div class="mb-3">
                                                                <label class="form-label fw-bold small text-secondary">Tentukan Status</label>
                                                                <select name="status" id="select_status" class="form-select" required onchange="sesuaiLabelKeterangan()">
                                                                    <option value="disetujui">Disetujui</option>
                                                                    <option value="ditolak">Ditolak</option>
                                                                </select>
                                                            </div>

                                                            <div class="mb-0">
                                                                <label class="form-label fw-bold small text-secondary" id="label_keterangan">Deskripsi Kegiatan</label>
                                                                <textarea name="deskripsis" id="input_keterangan_admin" class="form-control" rows="3" readonly disabled>{{ $item->deskripsi }}</textarea>
                                                            </div>
                                                            <div class="mb-0">
                                                                <label class="form-label fw-bold small text-secondary" id="label_keterangan">Catatan / Keterangan Tambahan</label>
                                                                <textarea name="deskripsi" id="input_keterangan_admin" class="form-control" rows="3" placeholder="Contoh: Kegiatan valid / Berkas dokumen kurang lengkap..."></textarea>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="modal-footer bg-light border-top-0 px-4">
                                                            <button type="button" class="btn btn-light fw-semibold text-secondary border" data-bs-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-dark fw-semibold px-4">Simpan Keputusan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            </div>




                                             <form action="{{ route('kepsek.kegiatan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus catatan kegiatan harian ini?')">
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

   
</div>


</div>


</div>
<script>
function cetakPdfFiltered() {
    
    // Ambil nilai dari input date saat ini
    const tglMulai = document.getElementById('filter_tanggal_mulai').value;
    const tglSelesai = document.getElementById('filter_tanggal_selesai').value;
    
    const userId = document.getElementById('filter_userId').value;
    
    const status = document.getElementById('filter_status').value;
    // Susun URL Cetak dasar dari Laravel route
    let url = "{{ route('kepsek.kegiatan.cetak') }}";
    
    // Gabungkan parameter jika input tanggal terisi
    url += `?tanggal_mulai=${tglMulai}&tanggal_selesai=${tglSelesai}&user_id=${userId}&status=${status}`;
    
    // Buka proses cetak PDF di tab baru
    window.open(url, '_blank');
}
</script>
@endsection