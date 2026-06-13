<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use App\Models\RiwayatPendidikan;
use App\Models\User;
use Illuminate\Http\Request;

class RiwayatPendidikanController extends Controller
{
    //
    public function index(Request $request)
    {
        $query = RiwayatPendidikan::with('user');

        // Fitur Pencarian berdasarkan nama institusi atau nama pegawai
        if ($request->filled('cari_pendidikan')) {
            $search = $request->cari_pendidikan;
            $query->where('nama_institusi', 'LIKE', "%{$search}%")
                  ->orWhereHas('user', function($q) use ($search) {
                      $q->where('name', 'LIKE', "%{$search}%");
                  });
        }

        $pendidikan = $query->latest()->paginate(10);
        
        // Mengambil data user/pegawai untuk pilihan dropdown di form
        $pegawai = Pegawai::all(); 

        return view('admin.pendidikan.index', compact('pendidikan', 'pegawai'));
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
            'tahun_lulus'      => 'nullable|numeric|digits_between:1,54'
        ]);

        RiwayatPendidikan::create($request->all());

        return redirect()->route('admin.pendidikan.index')->with('success', 'Riwayat pendidikan berhasil ditambahkan!');
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
            'tahun_lulus'      => 'nullable|numeric|digits_between:1,54'

        ]);

        $pendidikan->update($request->all());

        return redirect()->route('admin.pendidikan.index')->with('success', 'Riwayat pendidikan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $pendidikan = RiwayatPendidikan::findOrFail($id);
        $pendidikan->delete();

        return redirect()->route('admin.pendidikan.index')->with('success', 'Riwayat pendidikan berhasil dihapus!');
    }
}
