<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use App\Models\RiwayatPendidikan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiwayatPendidikanController extends Controller
{
    //
   public function index(Request $request)
    {
        // 1. Base Query untuk user yang sedang login
        $baseQuery = RiwayatPendidikan::with('user')->where('id_user', Auth::id());

        // 2. Fitur Pencarian (berlaku untuk kedua kategori)
        if ($request->filled('cari_pendidikan')) {
            $search = $request->cari_pendidikan;
            $baseQuery->where(function($q) use ($search) {
                $q->where('nama_institusi', 'LIKE', "%{$search}%")
                  ->orWhere('jenjang', 'LIKE', "%{$search}%")
                  ->orWhere('nama_pelatihan', 'LIKE', "%{$search}%"); // Tambahan: bisa cari nama pelatihan juga
            });
        }

        // 3. PISAHKAN MENJADI 2 TABEL (Clone query dasar agar tidak saling tabrakan)
        
        // Tabel Formal: yang nama_pelatihannya NULL atau kosong
        $pendidikanFormal = (clone $baseQuery)->where(function($q) {
            $q->whereNull('nama_pelatihan')->orWhere('nama_pelatihan', '');
        })->latest()->paginate(5, ['*'], 'page_formal'); // custom nama halaman: ?page_formal=1

        // Tabel Pelatihan: yang nama_pelatihannya ADA isinya
        $pelatihanDiklat = (clone $baseQuery)->whereNotNull('nama_pelatihan')
            ->where('nama_pelatihan', '!=', '')
            ->latest()->paginate(5, ['*'], 'page_pelatihan'); // custom nama halaman: ?page_pelatihan=1
        
        // 4. Ambil data profil pegawai milik sendiri
        $pegawaiAnda = Pegawai::where('user_id', Auth::id())->first();

        // 5. Kirim variabel baru ke view
        return view('pegawai.pendidikan.index', compact('pendidikanFormal', 'pelatihanDiklat', 'pegawaiAnda'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'id_user'        => 'required',
            'jenjang'         => 'required|string|max:50',
            'nama_institusi'  => 'required|string|max:150',
            'gelar'           => 'nullable|string|max:50',
            'id_pelatihan'    => 'nullable',
            'nama_pelatihan'  => 'nullable|string|max:150',
        ]);

        RiwayatPendidikan::create($request->all());

        return redirect()->route('pegawai.pendidikan.index')->with('success', 'Riwayat pendidikan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $pendidikan = RiwayatPendidikan::findOrFail($id);
        return response()->json($pendidikan);
    }

    public function update(Request $request, $id)
    {
        $pendidikan = RiwayatPendidikan::findOrFail($id);

        $request->validate([
            'id_user'        => 'required',
            'jenjang'         => 'required|string|max:50',
            'nama_institusi'  => 'required|string|max:150',
            'gelar'           => 'nullable|string|max:50',
            'id_pelatihan'    => 'nullable',
            'nama_pelatihan'  => 'nullable|string|max:150',
        ]);

        $pendidikan->update($request->all());

        return redirect()->route('pegawai.pendidikan.index')->with('success', 'Riwayat pendidikan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $pendidikan = RiwayatPendidikan::findOrFail($id);
        $pendidikan->delete();

        return redirect()->route('pegawai.pendidikan.index')->with('success', 'Riwayat pendidikan berhasil dihapus!');
    }
}
