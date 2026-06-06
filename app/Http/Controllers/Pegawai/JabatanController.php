<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Jabatan;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JabatanController extends Controller
{
    //
    public function index(Request $request)
    {
         $jabatan = Jabatan::where('status_jabatan', 'aktif')->get();

        // // Query dasar pegawai beserta relasinya
        // $pegawai = Pegawai::with(['user', 'jabatan'])
        //     ->latest()
        //     ->when($request->filled('cari_nip'), function ($query) use ($request) {
        //         // Filter pencarian berdasarkan NIP (menggunakan LIKE agar pencarian parsial bisa ketemu)
        //         return $query->where('nip', 'LIKE', '%' . $request->cari_nip . '%');
        //     })
        //     ->get(); // atau bisa diganti ->paginate(10) jika datanya banyak

        // // Kirimkan juga request ke view supaya teks pencarian tidak hilang saat halaman di-refresh

       $pegawaiList = Pegawai::with(['jabatan', 'user', 'pensiun'])
                ->where('user_id', Auth::id())
                ->get();
        return view('pegawai.jabatan.index', compact('jabatan','pegawaiList'));
    }

   
}
