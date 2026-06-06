@extends('admin.layouts.app')
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
    .active-report {
        border: 2px solid #198754 !important;
        background-color: #198754 !important;
        color: #f9f9f9 !important;
    }
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
        <form action="{{ route('admin.laporan.cetak') }}" method="POST" target="_blank">
                @csrf
                <div class="mb-4">                    
                    <input type="hidden" name="jenis_laporan" id="selected_jenis_laporan" value="pegawai" required>

                    <div class="row g-3 p-4">
                        <div class="col-6 col-md-3">
                            <div class="card h-100 report-card active-report" data-value="pegawai" onclick="selectReportCard(this)">
                                <div class="card-body text-center p-3">
                                    <div class="icon-box mb-2 text-primary">
                                        <i class="bi bi-file-earmark-person fs-1"></i>
                                    </div>
                                    <h6 class="card-title mb-1 small fw-bold">Laporan Data Diri Pegawai</h6>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 col-md-3">
                            <div class="card h-100 report-card" data-value="jabatan" onclick="selectReportCard(this)">
                                <div class="card-body text-center p-3">
                                    <div class="icon-box mb-2 text-info">
                                        <i class="bi bi-card-list fs-2"></i>
                                    </div>
                                    <h6 class="card-title mb-1 small fw-bold">Struktur Jabatan</h6>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 col-md-3">
                            <div class="card h-100 report-card" data-value="pendidikan" onclick="selectReportCard(this)">
                                <div class="card-body text-center p-3">
                                    <div class="icon-box mb-2 text-warning">
                                        <i class="bi bi-file-earmark-ruled fs-2"></i>
                                    </div>
                                    <h6 class="card-title mb-1 small fw-bold">Pendidikan</h6>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 col-md-3">
                            <div class="card h-100 report-card" data-value="pensiun" onclick="selectReportCard(this)">
                                <div class="card-body text-center p-3">
                                    <div class="icon-box mb-2 text-danger">
                                        <i class="bi bi-file-earmark-lock fs-2"></i>
                                    </div>
                                    <h6 class="card-title mb-1 small fw-bold">Data Pensiun</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row p-4">
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
                    </div>
                </div>


                <div class="text-end">
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="bi bi-printer"></i> Generate & Cetak PDF
                    </button>
                </div>
            </form>
    </div>
   
</div>
<script>
function selectReportCard(element) {
    // 1. Hapus class aktif dari semua card laporan
    document.querySelectorAll('.report-card').forEach(card => {
        card.classList.remove('active-report');
    });

    // 2. Tambahkan class aktif ke card yang baru saja diklik
    element.classList.add('active-report');

    // 3. Ambil value atribut 'data-value' card tersebut
    const value = element.getAttribute('data-value');

    // 4. Masukkan value ke dalam input hidden asli untuk dikirim ke controller
    document.getElementById('selected_jenis_laporan').value = value;
    
    // 5. LOGIKA SEMBUNYIKAN / TAMPILKAN FILTER KEYWORD
    const keywordContainer = document.getElementById('keyword-container');
    const keywordInput = document.getElementById('keyword-input');
    const keywordLabel = document.getElementById('keyword-label');

    if (value === 'jabatan') {
        // Sembunyikan kontainer filter jika yang dipilih adalah jabatan
        keywordContainer.style.display = 'none';
        keywordInput.value = ''; // Kosongkan nilainya agar tidak ikut terkirim data lama
    } else {
        // Tampilkan kembali untuk kategori lainnya (pegawai, pendidikan, pensiun)
        keywordContainer.style.display = 'block';
        
        // Opsional: Menyesuaikan placeholder teks agar lebih relevan dengan modul yang aktif
        if (value === 'pegawai') {
            keywordLabel.innerText = "2. Saring Berdasarkan Nama / NIP (Opsional)";
            keywordInput.placeholder = "Kosongkan jika ingin mencetak semua data pegawai...";
        } else if (value === 'pendidikan' || value === 'pensiun') {
            keywordLabel.innerText = "2. Saring Berdasarkan Nama / NIP Pegawai (Opsional)";
            keywordInput.placeholder = "Cari nama atau NIP pegawai terkait...";
        }
    }
    
    console.log("Kategori Laporan Aktif:", value);
}
</script>
@endsection