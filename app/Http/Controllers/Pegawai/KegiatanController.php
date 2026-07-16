<?php

namespace App\Http\Controllers\Pegawai;

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
        $query = Kegiatan::where('user_id', Auth::id());

        // Filter pencarian berdasarkan rentang tanggal jika dicari
        if ($request->filled('tanggal_mulai') && $request->filled('tanggal_selesai')) {
            $query->whereBetween('tanggal', [$request->tanggal_mulai, $request->tanggal_selesai]);
        }

        $kegiatan = $query->orderBy('tanggal', 'asc')->latest()->paginate(10);

        return view('pegawai.kegiatan.index', compact('kegiatan'));
    }

    // 2. Menyimpan inputan kegiatan baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'tanggal'       => 'required|date',
            'jam_mulai'       => 'required',
            'jam_selesai'       => 'required',
            'nama_kegiatan' => 'required|string|max:255',
            'deskripsi'     => 'required|string',
        ]);
        $namaFoto = null;

            if ($request->hasFile('foto')) {
                $foto = $request->file('foto');
                
                // Bersihkan nama file dari spasi agar aman di URL
                $namaOriginal = str_replace(' ', '_', $foto->getClientOriginalName());
                $namaFoto = time() . '_' . $namaOriginal;
                
                // Pindahkan file langsung ke folder
                $foto->move(public_path('kegiatan_pegawai'), $namaFoto);
            }
        // Menyimpan data dengan mengunci user_id otomatis dari session login
        Kegiatan::create([
            'user_id'       => Auth::id(),
            'tanggal'       => $request->tanggal,
            'jam_mulai'       => $request->jam_mulai,
            'jam_selesai'       => $request->jam_selesai,
            'nama_kegiatan' => $request->nama_kegiatan,
            'deskripsi'     => $request->deskripsi,
            'foto'     => $namaFoto,
            'status'        => 'pending', // otomatis berstatus pending sebelum divalidasi
        ]);

        return redirect()->back()->with('success', 'Kegiatan harian berhasil dicatat!');
    }

    // 3. Mengubah data kegiatan harian (jika salah input)
    public function update(Request $request, $id)
    {
        // Pastikan kegiatan yang mau diubah benar-benar milik user ini (mencegah bypass ID)
        $kegiatan = Kegiatan::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        $request->validate([
            'tanggal'       => 'required|date',
            'jam_mulai'       => 'required',
            'jam_selesai'       => 'required',
            'nama_kegiatan' => 'required|string|max:255',
            'deskripsi'     => 'required|string',
        ]);


         $namaFoto = $kegiatan->foto;

        if ($request->hasFile('foto')) {
            // 1. Hapus foto lama langsung dari folder public (jika ada)
            if ($kegiatan->foto && file_exists(public_path('kegiatan_pegawai/' . $kegiatan->foto))) {
                unlink(public_path('kegiatan_pegawai/' . $kegiatan->foto));
            }
            
            $foto = $request->file('foto');
            // 2. Buat nama file yang aman tanpa spasi
            $namaOriginal = str_replace(' ', '_', $foto->getClientOriginalName());
            $namaFoto = time() . '_' . $namaOriginal;
            
            // 3. Pindahkan file langsung ke folder public/kegiatan_pegawai
            // Perintah ini akan otomatis membuat folder 'kegiatan_pegawai' jika belum ada
            $foto->move(public_path('kegiatan_pegawai'), $namaFoto);
        }
        

        $kegiatan->update([
            'tanggal'       => $request->tanggal,
             'jam_mulai'       => $request->jam_mulai,
            'jam_selesai'       => $request->jam_selesai,
            'nama_kegiatan' => $request->nama_kegiatan,
            'deskripsi'     => $request->deskripsi,
             'foto'     => $namaFoto,
        ]);

        return redirect()->back()->with('success', 'Catatan kegiatan berhasil diperbarui!');
    }

    public function cetakPdf(Request $request)
    {
        $query = Kegiatan::where('user_id', Auth::id());

        // 2. Terapkan filter rentang tanggal yang sama seperti halaman index jika parameter tersedia
        if ($request->filled('tanggal_mulai') && $request->filled('tanggal_selesai')) {
            $query->whereBetween('tanggal', [$request->tanggal_mulai, $request->tanggal_selesai]);
        }

        // 3. Ambil datanya tanpa pagination (karena untuk cetak dokumen keseluruhan)
        $kegiatan = $query->orderBy('tanggal', 'asc')->get();
        
        // 4. Ambil profil pegawai untuk kop/identitas dokumen laporan
        $pegawai = Pegawai::where('user_id', Auth::id())->first();

        // Data penunjang untuk dicetak ke file kertas PDF
        $metaData = [
            'tanggal_mulai'   => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
        ];
        $kepsek = User::with('pegawai')->where('level',2)->first();
        
        // 5. Render ke view khusus format cetak PDF
        $pdf = Pdf::loadView('pegawai.kegiatan.cetak_pdf', compact('kegiatan', 'pegawai', 'metaData','kepsek'))
                ->setPaper('a4', 'portrait');

        // 6. Alirkan file dokumen langsung ke browser tab baru
        return $pdf->stream('Logbook_Kegiatan_' . ($pegawai->nama ?? 'Pegawai') . '.pdf');
    }
    // 4. Menghapus data kegiatan harian
    public function destroy($id)
    {
        $kegiatan = Kegiatan::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $kegiatan->delete();

        return redirect()->back()->with('success', 'Catatan kegiatan berhasil dihapus!');
    }
}
