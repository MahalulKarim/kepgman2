<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jabatan;
use App\Models\Pegawai;
use App\Models\Pensiun;
use App\Models\RiwayatPendidikan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
   public function index()
    {
        // Menghitung total data langsung dari database
        $totalPegawai = Pegawai::count();
        $totalJabatan = Jabatan::count();
        $totalPensiun = Pensiun::count();
        $totalPendidikan = RiwayatPendidikan::count();

        // Mengirimkan variabel ke dalam view admin.dashboard
        return view('admin.dashboard', compact('totalPegawai', 'totalJabatan', 'totalPensiun','totalPendidikan'));
    }
}
