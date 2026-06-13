<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Jabatan;
use App\Models\Pegawai;
use App\Models\Pensiun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JabatanController extends Controller
{
    //
    public function index(Request $request)
    {
        

        // 2. Cari data pegawai berdasarkan user_id yang sedang login
        // Hubungkan ke query spesifik pegawai tersebut
        $pegawaiProfil = Pegawai::with('jabatan')->where('user_id', Auth::id())->first();

         $jabatan = Jabatan::where('status_jabatan', 'aktif')->get();

        $lastPensiun    = Pensiun::where('id_user', Auth::id())->latest()
                        ->first();
       $pegawaiList = Pegawai::with(['jabatan', 'user', 'pensiun'])
                ->where('user_id', Auth::id())
                ->get();
        return view('pegawai.jabatan.index', compact('pegawaiProfil','jabatan','pegawaiList','lastPensiun'));
    }

   
}
