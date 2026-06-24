<?php

namespace App\Http\Controllers\Kepsek;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use App\Models\Pegawai;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KegiatanController extends Controller
{
    //
    public function index(Request $request)
    {
        // Ambil data kegiatan beserta relasi user dan pegawainya
        $query = Kegiatan::with(['user.pegawai']);

        // 1. Filter berdasarkan rentang tanggal
        if ($request->filled('tanggal_mulai') && $request->filled('tanggal_selesai')) {
            $query->whereBetween('tanggal', [$request->tanggal_mulai, $request->tanggal_selesai]);
        }

        // 2. Filter berdasarkan User / Pegawai tertentu (Sudah diperbaiki tanda kurungnya)
        if ($request->filled('user_id')) {
            $query->where('user_id', $request->user_id);
        }
        // 2. Filter berdasarkan User / Pegawai tertentu (Sudah diperbaiki tanda kurungnya)
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Urutkan berdasarkan tanggal terbaru dan lakukan pagination
        $kegiatan = $query->orderBy('tanggal', 'desc')->latest()->paginate(10);

        // 3. Ambil semua data user yang memiliki profil pegawai untuk opsi pilihan dropdown di filter Admin
       $users = User::has('pegawai')
    ->with('pegawai')
    ->where('id', '!=', auth()->id()) // Menggunakan 'id' milik tabel users
    ->get();

        return view('kepsek.kegiatan.index', compact('kegiatan', 'users'));
    }


    // 3. Mengubah data kegiatan harian (jika salah input)
    public function update(Request $request, $id)
    {
        // Pastikan kegiatan yang mau diubah benar-benar milik user ini (mencegah bypass ID)
        $kegiatan = Kegiatan::where('id', $id)->firstOrFail();

        $request->validate([           
            'status'     => 'required|string',
        ]);
       if ($request->filled('deskripsi')) {
            // WAJIB gunakan kutip ganda ("\n") agar dibaca sebagai enter / baris baru
            $keterangan = $kegiatan->deskripsi . "\n\n[Catatan Kepsek]:\n" . $request->deskripsi;
        } else {
            $keterangan = $kegiatan->deskripsi;
        }

        $kegiatan->update([          
            'deskripsi'     => $keterangan,
            'status'     => $request->status,
        ]);

        

        return redirect()->back()->with('success', 'Catatan kegiatan berhasil diperbarui!');
    }

    public function cetakPdf(Request $request)
    {
        // Menggunakan relasi user dan pegawai
        $query = Kegiatan::with(['user.pegawai']);

        // 1. Filter berdasarkan rentang tanggal
        if ($request->filled('tanggal_mulai') && $request->filled('tanggal_selesai')) {
            $query->whereBetween('tanggal', [$request->tanggal_mulai, $request->tanggal_selesai]);
        }

        // 2. Filter berdasarkan User / Pegawai tertentu
        if ($request->filled('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        // 3. Filter berdasarkan Status (pending, disetujui, ditolak)
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Ambil SEMUA data kegiatan tanpa pagination agar tercetak seluruhnya di PDF
        $kegiatan = $query->orderBy('tanggal', 'desc')->latest()->get();

        // dd($kegiatan);

        // 4. Cari profil nama pegawai untuk penamaan file PDF (Jika filter user_id dipilih)
        $pegawai = null;
        if ($request->filled('user_id')) {
            // Ambil dari model Pegawai berdasarkan user_id-nya
            $pegawai = \App\Models\Pegawai::where('user_id', $request->user_id)->first();
        }
        // dd($pegawai);
        $kepsek = User::with('pegawai')->where('level',2)->first();
        // Data penunjang untuk dicetak ke file kertas PDF
        $metaData = [
            'tanggal_mulai'   => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'status'          => $request->status,
        ];

        // 5. Render ke view khusus format cetak PDF Admin
        $pdf = Pdf::loadView('kepsek.kegiatan.cetak_pdf', compact('kegiatan', 'pegawai', 'metaData','kepsek'))
                    ->setPaper('a4', 'portrait');

        // 6. Tentukan nama file secara dinamis
        $namaFile = 'Logbook_Kegiatan_' . ($pegawai->nama ?? 'Semua_Pegawai') . '_' . date('d-m-Y') . '.pdf';

        // 7. Alirkan file dokumen langsung ke browser tab baru
        return $pdf->stream($namaFile);
    }
    // 4. Menghapus data kegiatan harian
    public function destroy($id)
    {
        $kegiatan = Kegiatan::where('id', $id)->firstOrFail();
        $kegiatan->delete();

        return redirect()->back()->with('success', 'Catatan kegiatan berhasil dihapus!');
    }
}
