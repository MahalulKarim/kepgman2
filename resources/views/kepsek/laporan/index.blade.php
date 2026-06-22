@extends('kepsek.layouts.app')
@php
$title = 'Laporan';
@endphp
@section('content')

<style>
    .report-card {
        cursor: pointer;
        transition: all 0.2s ease-in-out;
        border: 1px solid #dee2e6;
        border-radius: 8px;
        background-color: #ffffff;
    }
    .report-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.05);
        border-color: #198754;
    }
    /* Style BARU saat card dipilih aktif (Tema Hijau Success) */
    /* .active-report {
        border: 2px solid #b1a182 !important;
        background-color: #198754 !important;
        color: #f9f9f9 !important;
    } */
    .extra-small {
        font-size: 11px;
    }
</style>

<div class="container p-4">
    <div class="row">
        <div class="col-lg-12 py-2">
            <h2>Laporan</h2>
        </div>
    </div>
    <div class="row">
         @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
<form action="{{ route('kepsek.laporan.cetak') }}" method="POST" id="main-report-form" target="_blank">
    @csrf
    <div class="mb-4">                     
        <input type="hidden" name="jenis_laporan" id="selected_jenis_laporan" value="pegawai" required>

        <div class="row g-3 p-2">
            <div class="col-12">
                <div class="card h-100 report-card active-report" data-value="pegawai" onclick="selectReportCard(this)">
                    <div class="card-body p-3">
                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <div class="d-flex align-items-center">
                                <div class="icon-box text-success me-3">
                                    <i class="bi bi-file-earmark-person fs-1"></i>
                                </div>
                                <div>
                                    <h6 class="card-title mb-0 fw-bold">Laporan Data Diri Pegawai</h6>
                                    <small class="text-muted extra-small">Cetak biodata, NIP, profil, dan status kepegawaian</small>
                                </div>
                            </div>
                            <div class="d-flex gap-2">
                                <button type="button" class="btn btn-sm btn-outline-secondary px-3" data-bs-toggle="modal" data-bs-target="#modalPreviewPegawai" onclick="event.stopPropagation();">
                                    <i class="bi bi-eye me-1"></i> Lihat
                </button>
                                <button type="button" class="btn btn-sm btn-success px-3" onclick="directPrint(event, 'pegawai')">
                                    <i class="bi bi-file-earmark-pdf me-1"></i> PDF
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card h-100 report-card" data-value="jabatan" onclick="selectReportCard(this)">
                    <div class="card-body p-3">
                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <div class="d-flex align-items-center">
                                <div class="icon-box text-success me-3">
                                    <i class="bi bi-card-list fs-1"></i>
                                </div>
                                <div>
                                    <h6 class="card-title mb-0 fw-bold">Laporan Struktur Jabatan</h6>
                                    <small class="text-muted extra-small">Cetak master data jabatan, tingkatan, departemen, serta finansial</small>
                                </div>
                            </div>
                            <div class="d-flex gap-2">
                                <button type="button" class="btn btn-sm btn-outline-secondary px-3" data-bs-toggle="modal" data-bs-target="#modalPreviewJabatan" onclick="event.stopPropagation();">
                                    <i class="bi bi-eye me-1"></i> Lihat
                </button>
                                <button type="button" class="btn btn-sm btn-success px-3" onclick="directPrint(event, 'jabatan')">
                                    <i class="bi bi-file-earmark-pdf me-1"></i> PDF
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card h-100 report-card" data-value="pendidikan" onclick="selectReportCard(this)">
                    <div class="card-body p-3">
                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <div class="d-flex align-items-center">
                                <div class="icon-box text-success me-3">
                                    <i class="bi bi-file-earmark-ruled fs-1"></i>
                                </div>
                                <div>
                                    <h6 class="card-title mb-0 fw-bold">Laporan Riwayat Pendidikan</h6>
                                    <small class="text-muted extra-small">Cetak kualifikasi pendidikan pegawai beserta berkas pelatihan resmi</small>
                                </div>
                            </div>
                            <div class="d-flex gap-2">
                                <button type="button" class="btn btn-sm btn-outline-secondary px-3" data-bs-toggle="modal" data-bs-target="#modalPreviewPendidikan" onclick="event.stopPropagation();">
                                    <i class="bi bi-eye me-1"></i> Lihat
                </button>
                                <button type="button" class="btn btn-sm btn-success px-3" onclick="directPrint(event, 'pendidikan')">
                                    <i class="bi bi-file-earmark-pdf me-1"></i> PDF
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card h-100 report-card" data-value="pensiun" onclick="selectReportCard(this)">
                    <div class="card-body p-3">
                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <div class="d-flex align-items-center">
                                <div class="icon-box text-success me-3">
                                    <i class="bi bi-file-earmark-lock fs-1"></i>
                                </div>
                                <div>
                                    <h6 class="card-title mb-0 fw-bold">Laporan Data Pensiun</h6>
                                    <small class="text-muted extra-small">Cetak arsip purnabakti, perhitungan masa bakti, dan sisa dana tunjangan</small>
                                </div>
                            </div>
                            <div class="d-flex gap-2">
                                <button type="button" class="btn btn-sm btn-outline-secondary px-3" data-bs-toggle="modal" data-bs-target="#modalPreviewPensiun" onclick="event.stopPropagation();">
                                    <i class="bi bi-eye me-1"></i> Lihat
                </button>
                                <button type="button" class="btn btn-sm btn-success px-3" onclick="directPrint(event, 'pensiun')">
                                    <i class="bi bi-file-earmark-pdf me-1"></i> PDF
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-12">
                <div class="card h-100 report-card" data-value="kegiatan" onclick="selectReportCard(this)">
                    <div class="card-body p-3">
                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <div class="d-flex align-items-center">
                                <div class="icon-box text-success me-3">
                                    <i class="bi bi-card-checklist fs-1"></i>
                                </div>
                                <div>
                                    <h6 class="card-title mb-0 fw-bold">Laporan Data Kegiatan</h6>
                                    <small class="text-muted extra-small">Cetak arsip kegiatan pegawai</small>
                                </div>
                            </div>
                            <div class="d-flex gap-2">
                                <button type="button" class="btn btn-sm btn-outline-secondary px-3" data-bs-toggle="modal" data-bs-target="#modalPreviewKegiatan" onclick="event.stopPropagation();">
                                    <i class="bi bi-eye me-1"></i> Lihat
                </button>
                                <button type="button" class="btn btn-sm btn-success px-3" onclick="directPrint(event, 'kegiatan')">
                                    <i class="bi bi-file-earmark-pdf me-1"></i> PDF
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>

        {{-- <div class="row p-4 mt-2">
            <div class="col-lg-6">
                <div class="mb-3" id="keyword-container">
                    <label class="form-label fw-bold" id="keyword-label">Berdasarkan Nama / NIP (Opsional)</label>
                    <input type="text" name="keyword" id="keyword-input" class="form-control" placeholder="Kosongkan jika ingin mencetak semua data...">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-4">
                    <label class="form-label fw-bold">Tambahkan Catatan Laporan (Otomatis Tersimpan)</label>
                    <textarea name="catatan" class="form-control" rows="3" placeholder="Tulis maksud cetak laporan atau memorandum resmi di sini..."></textarea>
                </div>
            </div>
        </div> --}}
    </div>

    {{-- <div class="text-end px-4">
        <button type="submit" class="btn btn-success px-4 shadow-sm fw-bold">
            <i class="bi bi-printer me-1"></i> Generate & Cetak Komparatif PDF
        </button>
    </div> --}}
</form>
    </div>
   <div class="modal fade" id="modalPreviewPegawai" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title fw-bold"><i class="bi bi-file-earmark-person"></i> Preview Modul Data Pegawai</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <div class="p-3 bg-light border-bottom small text-muted">Berikut adalah simulasi ringkas kerangka tabel keluaran cetak:</div>
                <div class="table-responsive p-3">
                    <table class="table table-sm table-bordered table-striped mb-0 text-nowrap" style="font-size: 11px;">
                        <thead class="table-secondary">
                            <tr><th>No</th><th>NIP</th><th>Nama Lengkap</th><th>L/P</th><th>Jabatan</th></tr>
                        </thead>
                        <tbody>
                        @php
                            $no=1;
                        @endphp
                        @foreach ($pegawai as $p)
                        <tr><td>{{ $no++ }}</td><td>{{ $p->nip }}</td><td>{{ $p->nama }}</td><td>{{ $p->jenis_kelamin }}</td><td>{{ $p->jabatan->nama_jabatan }}</td>
                            
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Tutup Preview</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalPreviewJabatan" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title fw-bold"><i class="bi bi-card-list"></i> Preview Modul Struktur Jabatan</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <div class="p-3 bg-light border-bottom small text-muted">Berikut adalah simulasi ringkas kerangka tabel keluaran cetak:</div>
                <div class="table-responsive p-3">
                    <table class="table table-sm table-bordered table-striped mb-0 text-nowrap" style="font-size: 11px;">
                        <thead class="table-secondary">
                            <tr><th>No</th><th>Kode</th><th>Nama Jabatan</th><th>Departemen</th><th>Gaji Pokok</th><th>Tunjangan</th></tr>
                        </thead>

                        <tbody>
                            @php
                                $nom=1;
                            @endphp
                            @foreach ($jabatan as $jab)
                            <tr><td>{{ $no++ }}</td><td><code>{{ $jab->kode_jabatan }}</code></td><td>{{ $jab->nama_jabatan }}</td><td>{{ $jab->departemen }}</td><td>Rp {{ $jab->gaji_pokok }}</td><td>Rp {{ $jab->tunjangan }}</td></tr>
                                
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Tutup Preview</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalPreviewPendidikan" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title fw-bold"><i class="bi bi-file-earmark-ruled"></i> Preview Modul Pendidikan</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <div class="p-3 bg-light border-bottom small text-muted">Berikut adalah simulasi ringkas kerangka tabel keluaran cetak:</div>
                <div class="table-responsive p-3">
                    <table class="table table-sm table-bordered table-striped mb-0 text-nowrap" style="font-size: 11px;">
                        <thead class="table-secondary">
                         <tr>
                            <th width="4%" class="text-center">No</th>
                            <th width="15%">NIP Pegawai</th>
                            <th>Nama Pegawai</th>
                            <th width="10%">Jenjang</th>
                            <th>Nama Institusi Akademik</th>
                            <th width="12%">Gelar Kelulusan</th>
                            <th>Pelatihan Eksternal</th>
                        </tr>
                        <tbody>
                            @foreach($riwayatPendidikan as $key => $edu)
                            <tr>
                                <td class="text-center">{{ $key + 1 }}</td>
                                <td>{{ $edu->user->pegawai->nip ?? '-' }}</td>
                                <td><strong>{{ $edu->user->pegawai->nama ?? 'Akun Bukan Pegawai' }}</strong></td>
                                <td><span class="badge">{{ $edu->jenjang }}</span></td>
                                <td>{{ $edu->nama_institusi }}</td>
                                <td>{{ $edu->gelar ?? '-' }}</td>
                                <td>{{ $edu->nama_pelatihan ?? '-' }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Tutup Preview</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalPreviewPensiun" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title fw-bold"><i class="bi bi-file-earmark-lock"></i> Preview Modul Data Pensiun</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <div class="p-3 bg-light border-bottom small text-muted">Berikut adalah simulasi ringkas kerangka tabel keluaran cetak:</div>
                <div class="table-responsive p-3">
                    <table class="table table-sm table-bordered table-striped mb-0 text-nowrap" style="font-size: 11px;">
                        <thead class="table-secondary">
                           <tr>
                                <th width="4%" class="text-center">No</th>
                                <th width="14%">NIP</th>
                                <th>Nama Pegawai</th>
                                <th width="12%">TMT CPNS</th>
                                <th width="12%">TMT Pangkat</th>
                                <th width="12%">Tanggal Pensiun</th>
                                <th width="10%">Masa Kerja</th>
                                <th>Total Tunjangan</th>
                                <th width="10%" class="text-center">Status Dana</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach($pensiun as $key => $pen)
                                <tr>
                                    <td class="text-center">{{ $key + 1 }}</td>
                                    <td>{{ $pen->user->pegawai->nip ?? '-' }}</td>
                                    <td><strong>{{ $pen->user->pegawai->nama ?? 'Tidak Diketahui' }}</strong></td>
                                    <td>{{ $pen->tmt_cpns ? \Carbon\Carbon::parse($pen->tmt_cpns)->translatedFormat('d/m/Y') : '-' }}</td>
                                    <td>{{ $pen->tmt_pangkat ? \Carbon\Carbon::parse($pen->tmt_pangkat)->translatedFormat('d/m/Y') : '-' }}</td>
                                    <td><strong>{{ \Carbon\Carbon::parse($pen->tanggal_pensiun)->translatedFormat('d F Y') }}</strong></td>
                                    <td>{{ $pen->masa_kerja }} Thn</td>
                                    <td>Rp {{ number_format($pen->total_tunjangan, 0, ',', '.') }}</td>
                                    <td class="text-center"><span class="badge">{{ strtoupper($pen->status_pembayaran) }}</span></td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Tutup Preview</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalPreviewKegiatan" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title fw-bold"><i class="bi bi-file-earmark-lock"></i> Preview Modul Data Kegiatan Pegawai</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <div class="p-3 bg-light border-bottom small text-muted">Berikut adalah simulasi ringkas kerangka tabel keluaran cetak:</div>
                <div class="table-responsive p-3">
                    <table class="table table-sm table-bordered table-striped mb-0 text-nowrap" style="font-size: 11px;">
                        <thead class="table-secondary">
                           <tr>
                                <th class="text-center">No</th>
                                <th >NIP</th>
                                <th >Nama Pegawai</th>
                               
                                <th  class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no=1;
                            @endphp
                             @foreach($kegiatan as $row)
                <tr>
                    <td class="text-center">{{ $no ++ }}</td>
                    <td>{{ $row->nip ?? '-' }}</td>
                    <td><strong>{{ $row->nama ?? 'Tidak Diketahui' }}</strong></td>
                    
                    {{-- Menghitung total data kegiatan yang terikat pada pegawai --}}
                    
                    
                    {{-- Menghitung jumlah kegiatan berdasarkan status masing-masing --}}
                    <td class="text-center">
                        {{ $row->status ?? 'Tidak Diketahui' }}
                    </td>
                    
                </tr>
                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Tutup Preview</button>
            </div>
        </div>
    </div>
</div>
</div>
<script>
function selectReportCard(element) {
    // 1. Bersihkan class aktif lama
    document.querySelectorAll('.report-card').forEach(card => {
        card.classList.remove('active-report');
    });

    // 2. Pasang class aktif ke card terpilih
    element.classList.add('active-report');

    // 3. Ubah isi value input hidden
    const value = element.getAttribute('data-value');
    document.getElementById('selected_jenis_laporan').value = value;
    
    // 4. Logika sembunyikan kolom filter NIP jika memilih modul Jabatan
    const keywordContainer = document.getElementById('keyword-container');
    const keywordInput = document.getElementById('keyword-input');
    const keywordLabel = document.getElementById('keyword-label');

    if (value === 'jabatan') {
        keywordContainer.style.display = 'none';
        keywordInput.value = '';
    } else {
        keywordContainer.style.display = 'block';
        if (value === 'pendidikan' || value === 'pensiun' || value === 'kegiatan' ) {
            keywordLabel.innerText = "Berdasarkan Nama / NIP (Opsional)";
            keywordInput.placeholder = "Kosongkan jika ingin mencetak semua data...";
        } else {
            keywordLabel.innerText = "Berdasarkan Nama / NIP Pegawai (Opsional)";
            keywordInput.placeholder = "Cari nama atau NIP pegawai terkait...";
        }
    }
}

// Fungsi BARU: Eksekusi cetak langsung via tombol di baris card
function directPrint(event, reportType) {
    // Mencegah trigger klik card induk aktif berpindah
    event.stopPropagation();
    
    // Set value input hidden ke modul target yang diklik
    document.getElementById('selected_jenis_laporan').value = reportType;
    
    // Jalankan submit form utama secara otomatis
    document.getElementById('main-report-form').submit();
}
</script>
@endsection