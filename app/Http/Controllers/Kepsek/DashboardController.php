<?php

namespace App\Http\Controllers\Kepsek;

use App\Http\Controllers\Controller;
use App\Models\Jabatan;
use App\Models\Pegawai;
use App\Models\Pensiun;
use App\Models\RiwayatPendidikan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $totalPegawai = Pegawai::count();
        $totalJabatan = Jabatan::count();
        $departJabatan = Jabatan::distinct('departemen')->count('departemen');;
        $totalPensiun = Pensiun::count();
        $totalPendidikan = RiwayatPendidikan::count();
        $lastPendidikan = RiwayatPendidikan::latest()->first();

        // Menghitung pegawai baru yang 'created_at' nya ada di antara awal minggu ini sampai akhir minggu ini
        $pegawaiBaruMingguIni = Pegawai::whereBetween('created_at', [
            Carbon::now()->startOfWeek(), 
            Carbon::now()->endOfWeek()
        ])->count();

        return view('kepsek.dashboard', compact(
            'totalPegawai', 
            'totalJabatan', 
            'departJabatan', 
            'totalPensiun', 
            'totalPendidikan',
            'lastPendidikan',
            'pegawaiBaruMingguIni' // Kirim variabel baru ke view
        ));
    }
}
