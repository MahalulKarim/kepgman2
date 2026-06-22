<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jabatan;
use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class PegawaiController extends Controller
{
    //
    public function index(Request $request)
    {
        // Ambil data jabatan yang aktif untuk kebutuhan Dropdown Modal
        $jabatan = Jabatan::where('status_jabatan', 'aktif')->get();

        // Query dasar pegawai beserta relasinya
        $pegawai = Pegawai::with(['user', 'jabatan'])
            ->latest()
            ->when($request->filled('cari_nip'), function ($query) use ($request) {
                // Filter pencarian berdasarkan NIP (menggunakan LIKE agar pencarian parsial bisa ketemu)
                return $query->where('nip', 'LIKE', '%' . $request->cari_nip . '%');
            })
            ->get(); // atau bisa diganti ->paginate(10) jika datanya banyak

        // Kirimkan juga request ke view supaya teks pencarian tidak hilang saat halaman di-refresh
        return view('admin.pegawai.index', compact('pegawai', 'jabatan'));
    }

    public function create()
    {
        return view('admin.pegawai.create');
    }

     public function edit($id)
    {
       // Ambil data pegawai beserta relasi user akunnya
        $pegawai = Pegawai::with('user')->findOrFail($id);

        // Kembalikan dalam bentuk JSON agar bisa dibaca oleh JavaScript Fetch API
        return response()->json($pegawai);
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'nip' => 'nullable|string|unique:pegawais,nip',
            'nama' => 'required|string|max:150',
            
            // Tambahkan validasi untuk jabatan_id di bawah ini
            // exists:jabatans,id artinya ID yang dipilih wajib ada di tabel jabatans
            'jabatan_id' => 'required|exists:jabatans,id',
            
            'tempat_lahir' => 'required|string|max:100',
            'tgl_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'agama' => 'required|in:Islam,Kristen,Katolik,Hindu,Buddha,Khonghucu',
            'alamat' => 'required|string',
            'no_telp' => 'required|string|max:15',
            'status_pegawai' => 'required|in:PNS,NON-PNS',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // 1. Buat User Akun Pegawai
        $jabatan = Jabatan::where('id',$request->jabatan_id)->first();
      
        if($jabatan->level_jabatan == 'kepala sekolah'){
            $level = 2;
        }else{
            $level = 3;
        }
        $user = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => $level,
        ]);

        // 2. Handling Upload Foto
        
        $namaFoto = null;

            if ($request->hasFile('foto')) {
                $foto = $request->file('foto');
                
                // Bersihkan nama file dari spasi agar aman di URL
                $namaOriginal = str_replace(' ', '_', $foto->getClientOriginalName());
                $namaFoto = time() . '_' . $namaOriginal;
                
                // Pindahkan file langsung ke folder public/foto_pegawai
                $foto->move(public_path('foto_pegawai'), $namaFoto);
            }
  

        // 3. Simpan Data Pegawai (Sertakan jabatan_id)
        Pegawai::create([
            'user_id' => $user->id,
            'jabatan_id' => $request->jabatan_id, // Tambahkan baris ini
            'nip' => $request->nip,
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'status_pegawai' => $request->status_pegawai,
            'foto' => $namaFoto,
        ]);

        return redirect()->route('admin.pegawai.index')->with('success', 'Data pegawai berhasil ditambahkan.');
    }

   

    public function update(Request $request, $id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $user = $pegawai->user;

        $request->validate([
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8',
            'nip' => 'nullable|string|unique:pegawais,nip,' . $pegawai->id,
            'nama' => 'required|string|max:150',
            
            // Tambahkan validasi untuk jabatan_id di sini juga
            'jabatan_id' => 'required|exists:jabatans,id',
            
            'tempat_lahir' => 'required|string|max:100',
            'tgl_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'agama' => 'required|in:Islam,Kristen,Katolik,Hindu,Buddha,Khonghucu',
            'alamat' => 'required|string',
            'no_telp' => 'required|string|max:15',
            'status_pegawai' => 'required|in:PNS,NON-PNS',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Update Akun User
         $jabatan = Jabatan::where('id',$request->jabatan_id)->first();
      
        if($jabatan->level_jabatan == 'kepala sekolah'){
            $level = 2;
        }else{
            $level = 3;
        }

        $user->level=$level;
        $user->name = $request->nama;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

      $namaFoto = $pegawai->foto;

        if ($request->hasFile('foto')) {
            // 1. Hapus foto lama langsung dari folder public (jika ada)
            if ($pegawai->foto && file_exists(public_path('foto_pegawai/' . $pegawai->foto))) {
                unlink(public_path('foto_pegawai/' . $pegawai->foto));
            }
            
            $foto = $request->file('foto');
            // 2. Buat nama file yang aman tanpa spasi
            $namaOriginal = str_replace(' ', '_', $foto->getClientOriginalName());
            $namaFoto = time() . '_' . $namaOriginal;
            
            // 3. Pindahkan file langsung ke folder public/foto_pegawai
            // Perintah ini akan otomatis membuat folder 'foto_pegawai' jika belum ada
            $foto->move(public_path('foto_pegawai'), $namaFoto);
        }

        // Update Data Pegawai (Sertakan jabatan_id)
        $pegawai->update([
            'jabatan_id' => $request->jabatan_id, // Tambahkan baris ini
            'nip' => $request->nip,
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'status_pegawai' => $request->status_pegawai,
            'foto' => $namaFoto,
        ]);

        return redirect()->route('admin.pegawai.index')->with('success', 'Data pegawai berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        
      
        // Hapus foto dari storage
       

        // Hapus user (akan otomatis menghapus pegawai karena cascadeOnDelete)
        $pegawai->user->delete();

        return redirect()->route('admin.pegawai.index')->with('success', 'Data pegawai berhasil dihapus.');
    }
}
