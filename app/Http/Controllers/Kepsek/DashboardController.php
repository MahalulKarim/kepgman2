<?php

namespace App\Http\Controllers\Kepsek;

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
             $totalPegawai = Pegawai::count();
            $totalJabatan = Jabatan::count();
            $totalPensiun = Pensiun::count();
            $totalPendidikan = RiwayatPendidikan::count();
            return view('kepsek.dashboard',compact('totalPegawai', 'totalJabatan', 'totalPensiun','totalPendidikan'));
        }
}
