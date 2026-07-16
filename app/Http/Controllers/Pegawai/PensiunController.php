<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use App\Models\Pensiun;
use App\Models\User;
use Carbon\Carbon;
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
    $pensiun = $query->latest()->first();

   
    
    // 4. Ambil profil pegawai milik diri sendiri untuk keperluan info teks di form/modal (jika ada)
    $pegawaiAnda = Pegawai::where('user_id', Auth::id())->first(); 

    return view('pegawai.pensiun.index', compact('pensiun', 'pegawaiAnda'));
}
 public function store(Request $request)
    {

    // dd($request->all());
       
        $validated = $request->validate([
            'id_user'           => 'required|exists:users,id',
            // 'tanggal_pensiun'   => 'required|date',
            'jenis_pensiun'     => 'required',
            'tmt_golongan'      => 'required|date',
            'golongan'          => 'required',
            'tmt_jabatan'       => 'required|date',
            'tmt_cpns'          => 'nullable|date',
            'tmt_pangkat'       => 'nullable|date',
            'masa_kerja'        => 'required|string|max:50',
            'total_tunjangan'   => 'required|numeric|min:0',
            'status_pembayaran' => 'required|in:pending,proses,selesai',
        ]);
    
       // 2. Ambil data pegawai berdasarkan id_user untuk mendapatkan tanggal lahir
        $pegawai = Pegawai::where('user_id', $request->id_user)->first();

        if ($pegawai && $pegawai->tgl_lahir) {

         $umur_pensiun = (int) $request->masa_kerja;

            // Hitung tanggal pensiun: Tanggal Lahir + 60 Tahun
            $tanggal_pensiun = Carbon::parse($pegawai->tgl_lahir)->addYears($umur_pensiun)->format('Y-m-d');
        } else {
            // Fallback jika data pegawai/tgl_lahir tidak ditemukan
            $tanggal_pensiun = null; 
        }

        $namafile = null;

            if ($request->hasFile('file')) {
                $file = $request->file('file');
                
                // Bersihkan nama file dari spasi agar aman di URL
                $namaOriginal = str_replace(' ', '_', $file->getClientOriginalName());
                $namafile = time() . '_' . $namaOriginal;
                
                // Pindahkan file langsung ke folder public/file_pegawai
                $file->move(public_path('file_pegawai'), $namafile);
            }

            // 3. Masukkan hasil hitungan ke dalam array data yang tervalidasi
            $validated['tanggal_pensiun'] = $tanggal_pensiun;
            $validated['berkas'] = $namafile;

        


        Pensiun::create($validated);

        return redirect()->route('pegawai.pensiun.index')->with('success', 'Data pensiun berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $pensiun = Pensiun::findOrFail($id);
        return response()->json($pensiun);
    }

public function update(Request $request, $id)
{


    $pensiun = Pensiun::findOrFail($id);

    $validated = $request->validate([
        'jenis_pensiun'     => 'required',
        'tmt_golongan'      => 'required|date',
        'golongan'          => 'required',
        'tmt_jabatan'       => 'required|date',
        'tmt_cpns'          => 'nullable|date',
        'tmt_pangkat'       => 'nullable|date',
        'masa_kerja'        => 'required|string|max:50',
        'total_tunjangan'   => 'required|numeric|min:0',
        'status_pembayaran' => 'required|in:pending,proses,selesai',
        'file'              => 'nullable|file|mimes:pdf|max:2048', // Validasi opsional untuk berkas baru
    ]);

    // 1. Ambil data pegawai berdasarkan id_user dari request (agar tetap sinkron)
    $pegawai = Pegawai::where('user_id', Auth()->id())->first();

    // 2. Ambil data pegawai berdasarkan id_user untuk mendapatkan tanggal lahir
        $pegawai = Pegawai::where('user_id', $pensiun->id_user)->first();
        // dd($pegawai);

        if ($pegawai && $pegawai->tgl_lahir) {

         $umur_pensiun = (int) $request->masa_kerja;

            // Hitung tanggal pensiun: Tanggal Lahir + 60 Tahun
            $tanggal_pensiun = Carbon::parse($pegawai->tgl_lahir)->addYears($umur_pensiun)->format('Y-m-d');
        } else {
            // Fallback jika data pegawai/tgl_lahir tidak ditemukan
            $tanggal_pensiun = null; 
        }

    // 2. Logika Update File / Berkas
    $namafile = $pensiun->berkas; // Default menggunakan nama berkas lama jika tidak diganti

    if ($request->hasFile('file')) {
        // Hapus file lama fisik dari folder public/file_pegawai jika file lamanya ada
        if ($pensiun->berkas && file_exists(public_path('file_pegawai/' . $pensiun->berkas))) {
            unlink(public_path('file_pegawai/' . $pensiun->berkas));
        }

        $file = $request->file('file');
        
        // Bersihkan nama file dari spasi
        $namaOriginal = str_replace(' ', '_', $file->getClientOriginalName());
        $namafile = time() . '_' . $namaOriginal;
        
        // Pindahkan berkas baru ke folder public/file_pegawai
        $file->move(public_path('file_pegawai'), $namafile);
    }

    // 3. Masukkan hasil hitungan & nama berkas baru/lama ke dalam array validasi
    $validated['tanggal_pensiun'] = $tanggal_pensiun;
    $validated['berkas']          = $namafile;

    // 4. Eksekusi update data ke database
    $pensiun->update($validated);

    return redirect()->route('pegawai.pensiun.index')->with('success', 'Data pensiun berhasil diperbarui!');
}

}
