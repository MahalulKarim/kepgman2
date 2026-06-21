<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    //
    use HasFactory;

    protected $table = 'kegiatans';

    protected $fillable = [
        'user_id',
        'tanggal',
        'jam_mulai',
        'jam_selesai',
        'nama_kegiatan',
        'deskripsi',
        'status',
    ];

    // Relasi: Setiap kegiatan dimiliki oleh satu User/Pegawai
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
