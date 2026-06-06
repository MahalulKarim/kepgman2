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
                            <tr><th>No</th><th>NIP</th><th>Nama Lengkap</th><th>L/P</th><th>Jabatan Utama</th><th>Status</th></tr>
                        </thead>
                        <tbody>
                            <tr><td>1</td><td>19880211...</td><td>Ahmad Syarif, S.Ag</td><td>L</td><td>Kepala Sekolah</td><td><span class="badge bg-success">PNS</span></td></tr>
                            <tr><td>2</td><td>-</td><td>Siti Aminah, S.Pd</td><td>P</td><td>Guru Kurikulum</td><td><span class="badge bg-secondary">NON-PNS</span></td></tr>
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
                            <tr><td>1</td><td><code>JAB001</code></td><td>Kepala Sekolah</td><td>Manajemen</td><td>Rp 4.500.000</td><td>Rp 1.500.000</td></tr>
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
                            <tr><th>No</th><th>NIP</th><th>Nama Pegawai</th><th>Jenjang</th><th>Institusi Akademik</th><th>Gelar</th></tr>
                        </thead>
                        <tbody>
                            <tr><td>1</td><td>19880211...</td><td>Ahmad Syarif, S.Ag</td><td>S1</td><td>Universitas Islam Negeri</td><td>S.Ag</td></tr>
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
                            <tr><th>No</th><th>Nama Pegawai</th><th>Tanggal Pensiun</th><th>Masa Kerja</th><th>Total Tunjangan</th><th>Status</th></tr>
                        </thead>
                        <tbody>
                            <tr><td>1</td><td>Drs. H. Supriyadi</td><td>14 Juni 2026</td><td>32 Thn</td><td>Rp 15.000.000</td><td><span class="badge bg-warning">PROSES</span></td></tr>
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
        if (value === 'pegawai') {
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