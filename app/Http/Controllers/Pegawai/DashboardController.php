<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Jabatan;
use App\Models\Pegawai;
use App\Models\Pensiun;
use App\Models\RiwayatPendidikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function index()
    {
        // 1. Ambil ID User yang sedang login saat ini
        $userId = Auth::id();

        // 2. Cari data pegawai berdasarkan user_id yang sedang login
        // Hubungkan ke query spesifik pegawai tersebut
        $pegawai = Pegawai::with('jabatan')->where('user_id', Auth::id())->first();

        // Antisipasi jika akun user ini ternyata tidak terikat ke data pegawai mana pun di database
        if (!$pegawai) {
            return redirect()->route('login')->with('error', 'Profil pegawai Anda tidak ditemukan.');
        }
        // $pendidikanTerakhir = RiwayatPendidikan::where('id_user', $userId)
        //                         ->orderBy('tahun_lulus', 'desc') // atau sesuaikan nama kolom di databasemu, misal: 'tahun_keluar' atau 'tahun_tamat'
        //                         ->first();
        // 3. Hitung data agregat yang HANYA dimiliki oleh pegawai ini sendiri
        // Untuk total pegawai & jabatan di sekolah biasanya tetap global (opsional), 
        // namun untuk riwayat pendidikan & status pensiun disaring berdasarkan ID pegawai ini.
        $totalPegawai    = Pegawai::count(); 
        $totalJabatan    = Jabatan::count(); 
        
        // Menghitung data spesifik milik akun login ini sendiri
        $totalPensiun    = Pensiun::where('id_user', $userId)->count();
        $totalPendidikan = RiwayatPendidikan::where('id_user', $userId)->count();

        // 4. Kirim data diri $pegawai beserta statistik ke view dashboard
        return view('pegawai.dashboard', compact(
            'pegawai', 
            'totalPegawai', 
            'totalJabatan', 
            'totalPensiun', 
            'totalPendidikan',
        ));
    }
}
