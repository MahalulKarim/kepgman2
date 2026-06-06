<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pensiun;
use App\Models\User;
use Illuminate\Http\Request;

class PensiunController extends Controller
{
    //
public function index(Request $request)
{
    // Gunakan 'user.pegawai' di dalam fungsi has() 
    // Ini artinya: Ambil data Pensiun yang punya User, dan User tersebut punya Pegawai
    $query = Pensiun::has('user.pegawai')->with(['user.pegawai']);

    // Fitur Pencarian berdasarkan nama atau NIP pegawai
    if ($request->filled('cari_pensiun')) {
        $search = $request->cari_pensiun;
        $query->whereHas('user.pegawai', function($q) use ($search) {
            $q->where('nama', 'LIKE', "%{$search}%")
              ->orWhere('nip', 'LIKE', "%{$search}%");
        });
    }

    $pensiun = $query->latest()->paginate(10);
    
    // Pastikan select option pegawai di modal juga difilter agar tidak error 'nama on null'
    $pegawai = User::has('pegawai')->with('pegawai')->get(); 

    return view('admin.pensiun.index', compact('pensiun', 'pegawai'));
}

    public function store(Request $request)
    {
        $request->validate([
            'id_user'           => 'required|exists:users,id',
            'tanggal_pensiun'   => 'required|date',
            'tmt_cpns'          => 'nullable|date',
            'tmt_pangkat'          => 'nullable|date',
            'masa_kerja'        => 'required|string|max:50',
            'total_tunjangan'   => 'required|numeric|min:0',
            'status_pembayaran' => 'required|in:pending,proses,selesai',
        ]);

        Pensiun::create($request->all());

        return redirect()->route('admin.pensiun.index')->with('success', 'Data pensiun berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $pensiun = Pensiun::findOrFail($id);
        return response()->json($pensiun);
    }

    public function update(Request $request, $id)
    {
        $pensiun = Pensiun::findOrFail($id);

        $request->validate([
            'id_user'           => 'required|exists:users,id',
            'tanggal_pensiun'   => 'required|date',
             'tmt_cpns'          => 'nullable|date',
            'tmt_pangkat'          => 'nullable|date',
            'masa_kerja'        => 'required|string|max:50',
            'total_tunjangan'   => 'required|numeric|min:0',
            'status_pembayaran' => 'required|in:pending,proses,selesai',
        ]);

        $pensiun->update($request->all());

        return redirect()->route('admin.pensiun.index')->with('success', 'Data pensiun berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $pensiun = Pensiun::findOrFail($id);
        $pensiun->delete();

        return redirect()->route('admin.pensiun.index')->with('success', 'Data pensiun berhasil dihapus!');
    }
}
