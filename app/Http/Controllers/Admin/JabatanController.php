<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    //
    public function index(Request $request)
    {
        $query = Jabatan::query();

        // Fitur Pencarian berdasarkan Kode atau Nama Jabatan
        if ($request->filled('cari_jabatan')) {
            $search = $request->cari_jabatan;
            $query->where('kode_jabatan', 'LIKE', "%{$search}%")
                  ->orWhere('nama_jabatan', 'LIKE', "%{$search}%");
        }

        $jabatan = $query->latest()->paginate(10);
        return view('admin.jabatan.index', compact('jabatan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_jabatan'  => 'required|max:20|unique:jabatans,kode_jabatan',
            'nama_jabatan'  => 'required|max:100',
            'departemen'    => 'nullable|max:100',
            'level_jabatan' => 'required|in:kepala sekolah,wakil kepala sekolah,guru,staff TU',
            'gaji_pokok'    => 'required|numeric|min:0',
            'tunjangan'     => 'required|numeric|min:0',
            'jobdesk'       => 'nullable',
            'status_jabatan'=> 'required|in:aktif,non-aktif',
        ]);

        Jabatan::create($request->all());

        return redirect()->route('admin.jabatan.index')->with('success', 'Jabatan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $jabatan = Jabatan::findOrFail($id);
        return response()->json($jabatan); // Response JSON untuk Fetch API
    }

    public function update(Request $request, $id)
    {
        $jabatan = Jabatan::findOrFail($id);

        $request->validate([
            'kode_jabatan'  => 'required|max:20|unique:jabatans,kode_jabatan,' . $id,
            'nama_jabatan'  => 'required|max:100',
            'departemen'    => 'nullable|max:100',
            'level_jabatan' => 'required|in:kepala sekolah,wakil kepala sekolah,guru,staff TU',
            'gaji_pokok'    => 'required|numeric|min:0',
            'tunjangan'     => 'required|numeric|min:0',
            'jobdesk'       => 'nullable',
            'status_jabatan'=> 'required|in:aktif,non-aktif',
        ]);

        $jabatan->update($request->all());

        return redirect()->route('admin.jabatan.index')->with('success', 'Jabatan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $jabatan = Jabatan::findOrFail($id);
        
        // Proteksi jika jabatan masih digunakan oleh pegawai (opsional namun direkomendasikan)
        // if ($jabatan->pegawai()->exists()) {
        //     return redirect()->back()->withErrors(['error' => 'Jabatan gagal dihapus karena masih memiliki pegawai terkait.']);
        // }

        $jabatan->delete();
        return redirect()->route('admin.jabatan.index')->with('success', 'Jabatan berhasil dihapus!');
    }
}
