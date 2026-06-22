<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jabatan;
use App\Models\Laporan;
use App\Models\Pegawai;
use App\Models\Pensiun;
use App\Models\RiwayatPendidikan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class LaporanController extends Controller
{
    //
    public function index()
    {
        return view('admin.laporan.index');
    }

    // Fungsi Utama Eksekusi Cetak ke PDF
public function cetakPdf(Request $request)
    {
        $request->validate([
            'jenis_laporan' => 'required|in:pegawai,jabatan,pendidikan,pensiun,kegiatan',
            'keyword'       => 'nullable|string',
            'catatan'       => 'nullable|string'
        ]);

        $jenis = $request->jenis_laporan;
        $keyword = $request->keyword;
        $catatan = $request->catatan ?? 'Laporan diekspor oleh sistem.';
        $tgl_sekarang = Carbon::now()->locale('id')->format('Y-m-d');

        $data_laporan = [];

        // --- 1. MODUL PEGAWAI ---
        if ($jenis == 'pegawai') {
            $query = Pegawai::with('jabatan');
            if ($keyword) {
                $query->where('nama', 'LIKE', "%{$keyword}%")->orWhere('nip', 'LIKE', "%{$keyword}%");
            }
            $data_laporan = $query->get();

            foreach ($data_laporan as $row) {
                Laporan::create([
                    'id_pegawai'  => $row->id,
                    'catatan'     => $catatan,
                    'tgl_laporan' => $tgl_sekarang
                ]);
            }
        } 
        
        // --- 2. MODUL JABATAN ---
        elseif ($jenis == 'jabatan') {
            $query = Jabatan::query();
            if ($keyword) {
                $query->where('nama_jabatan', 'LIKE', "%{$keyword}%")->orWhere('kode_jabatan', 'LIKE', "%{$keyword}%");
            }
            $data_laporan = $query->get();

            foreach ($data_laporan as $row) {
                Laporan::create([
                    'id_jabatan'  => $row->id,
                    'catatan'     => $catatan,
                    'tgl_laporan' => $tgl_sekarang
                ]);
            }
        } 
        
        // --- 3. MODUL PENDIDIKAN ---
        elseif ($jenis == 'pendidikan') {
            // Tarik data riwayat pendidikan beserta profil pegawainya via relasi user
            $query = RiwayatPendidikan::with('user.pegawai');
            if ($keyword) {
                $query->whereHas('user.pegawai', function($q) use ($keyword) {
                    $q->where('nama', 'LIKE', "%{$keyword}%")->orWhere('nip', 'LIKE', "%{$keyword}%");
                });
            }
            $data_laporan = $query->get();

            foreach ($data_laporan as $row) {
                Laporan::create([
                    'id_pendidikan' => $row->id,
                    'catatan'       => $catatan,
                    'tgl_laporan'   => $tgl_sekarang
                ]);
            }
        } 
        
        // --- 4. MODUL PENSIUN ---
        elseif ($jenis == 'pensiun') {
            $query = Pensiun::with('user.pegawai');
            if ($keyword) {
                $query->whereHas('user.pegawai', function($q) use ($keyword) {
                    $q->where('nama', 'LIKE', "%{$keyword}%")->orWhere('nip', 'LIKE', "%{$keyword}%");
                });
            }
            $data_laporan = $query->get();

            foreach ($data_laporan as $row) {
                Laporan::create([
                    'id_pensiun'  => $row->id,
                    'catatan'     => $catatan,
                    'tgl_laporan' => $tgl_sekarang
                ]);
            }
        }
      // --- 5. MODUL KEGIATAN (PERBAIKAN KONDISI DAN BLOK PROGRAM) ---
    elseif ($jenis == 'kegiatan') {
        // Memuat relasi 'kegiatan' yang ada di model Pegawai
        $query = Pegawai::with('kegiatan');

        // Fitur pencarian berdasarkan nama atau nip pegawai
        if ($keyword) {
            $query->where(function($q) use ($keyword) {
                $q->where('nama', 'LIKE', "%{$keyword}%")
                  ->orWhere('nip', 'LIKE', "%{$keyword}%");
            });
        }

        $data_laporan = $query->get();

        foreach ($data_laporan as $row) {
            // 1. Ambil total kegiatan pegawai tersebut
            $total_kegiatan = $row->kegiatan->count();
            
            // 2. Ambil status kegiatan
            $disetujui = $row->kegiatan->where('status', 'disetujui')->count();
            $pending   = $row->kegiatan->where('status', 'pending')->count();

            // 3. Gabungkan informasi tersebut ke dalam string catatan laporan
            $catatan_otomatis = "Pegawai ini telah menginput " . $total_kegiatan . " kegiatan harian. " .
                                "(" . $disetujui . " Disetujui, " . $pending . " Pending). " . 
                                ($catatan ? "\nCatatan Tambahan Admin: " . $catatan : "");

            // 4. Masukkan ke dalam tabel laporans (Asumsikan logbook masuk via id_pegawai)
            Laporan::create([
                'id_pegawai'  => $row->id,
                'catatan'     => $catatan_otomatis,
                'tgl_laporan' => $tgl_sekarang
            ]);
        }
    }

        if ($data_laporan->isEmpty()) {
            return redirect()->back()->with('error', 'Tidak ada data pencocokan yang dapat dicetak berdasarkan filter tersebut.');
        }

        $pdfData = [
            'title'        => 'LAPORAN DATA ' . strtoupper($jenis),
            'data'         => $data_laporan,
            'jenis'        => $jenis,
            'catatan'      => $catatan,
            'tgl_laporan'  => Carbon::parse($tgl_sekarang)->locale('id')->translatedFormat('d F Y')
        ];

        // Format kertas diatur Landscape agar menampung data kolom yang lebar
        $pdf = Pdf::loadView('admin.laporan.cetak_pdf', $pdfData)->setPaper('a4', 'landscape');
        return $pdf->stream('Laporan_'. $jenis .'_'. $tgl_sekarang .'.pdf');
    }
}
