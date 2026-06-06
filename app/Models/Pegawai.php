<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pegawai extends Model
{
    //
    // Menentukan nama tabel (opsional, karena Laravel otomatis menganggap jamak 'pegawais')
    protected $table = 'pegawais';

    // Kolom yang boleh diisi
    protected $fillable = [
        'user_id',
        'jabatan_id',
        'nip',
        'nama',
        'tempat_lahir',
        'tgl_lahir',
        'jenis_kelamin',
        'agama',
        'alamat',
        'no_telp',
        'foto',
        'status_pegawai',
    ];

    /**
     * Relasi ke model User (Setiap pegawai memiliki satu akun User)
     */
  public function user(): BelongsTo
    {
        // Parameter ke-2: Foreign Key di tabel pegawais (user_id)
        // Parameter ke-3: Owner Key di tabel users (id / id_user / user_id)
        return $this->belongsTo(User::class, 'user_id', 'id'); 
        // Note: Ganti 'id' di atas dengan 'id_user' atau 'user_id' jika itu nama primary key asli di tabel users kamu.
    }
    public function jabatan(): BelongsTo
    {
        return $this->belongsTo(Jabatan::class, 'jabatan_id');
    }
    public function pensiun()
    {
        // Parameter kedua adalah nama kolom foreign key di tabel pensiun
        // Parameter ketiga adalah nama kolom local key di tabel pegawai
        return $this->hasOne(Pensiun::class, 'id_user', 'id_user'); 
    }
}
