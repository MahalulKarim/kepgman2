<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use App\Models\Pensiun;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PensiunController extends Controller
{
    //
public function index(Request $request)
{
  $query = Pensiun::with(['user.pegawai'])->where('id_user', Auth::id());

    // 2. Fitur Pencarian disesuaikan untuk menyaring data miliknya sendiri (misal berdasarkan SK Pensiun atau Status)
    // Judul filter input bisa disesuaikan di Blade (contoh: cari berdasarkan nomor SK atau status pembayaran)
    if ($request->filled('cari_pensiun')) {
        $search = $request->cari_pensiun;
        $query->where(function($q) use ($search) {
            $q->where('no_sk', 'LIKE', "%{$search}%") // Contoh jika ada kolom no_sk
              ->orWhere('status_pembayaran', 'LIKE', "%{$search}%"); // Contoh jika ada kolom status
        });
    }

    // 3. Ambil data pensiun miliknya
    $pensiun = $query->latest()->paginate(10);
    
    // 4. Ambil profil pegawai milik diri sendiri untuk keperluan info teks di form/modal (jika ada)
    $pegawaiAnda = Pegawai::where('user_id', Auth::id())->first(); 

    return view('pegawai.pensiun.index', compact('pensiun', 'pegawaiAnda'));
}

}
