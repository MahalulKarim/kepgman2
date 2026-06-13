<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatPendidikan extends Model
{
    //
    protected $fillable = [
    'id_user', // Ubah dari id_admin
    'jenjang',
    'nama_institusi',
    'gelar',
    'id_pelatihan',
    'nama_pelatihan',
    'tahun_lulus',
];

// Relasi ke tabel User (Pegawai)
public function user()
{
    return $this->belongsTo(User::class, 'id_user', 'id');
}
}
