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
       $query = RiwayatPendidikan::with('user')->where('id_user', Auth::id());

        // 2. Fitur Pencarian dikhususkan untuk mencari Nama Institusi atau Jenjang (S1/SMA/dll) miliknya
        if ($request->filled('cari_pendidikan')) {
            $search = $request->cari_pendidikan;
            
            // Menggunakan where bertingkat (advanced wheres) agar filter user_id tidak rusak oleh orWhere
            $query->where(function($q) use ($search) {
                $q->where('nama_institusi', 'LIKE', "%{$search}%")
                ->orWhere('jenjang', 'LIKE', "%{$search}%"); // Tambahan: bisa cari berdasarkan jenjang (misal: S1)
            });
        }

        // 3. Ambil data dengan urutan terbaru dan batasi 10 data per halaman
        $pendidikan = $query->latest()->paginate(10);
        
        // 4. Untuk form tambah data, user_id otomatis terisi milik dia sendiri, 
        // jadi tidak perlu memanggil Pegawai::all() (untuk mencegah dia memilih nama pegawai lain).
        // Kita cukup ambil data profil pegawai dia sendiri jika dibutuhkan untuk teks info.
        $pegawaiAnda = Pegawai::where('user_id', Auth::id())->first();

        return view('pegawai.pendidikan.index', compact('pendidikan', 'pegawaiAnda'));
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
