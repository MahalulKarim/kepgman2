<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pensiun extends Model
{
    //
    use HasFactory;

    protected $table = 'pensiuns';

    protected $fillable = [
        'id_user',
        'tmt_cpns',
        'tmt_pangkat',
        'tanggal_pensiun',
        'masa_kerja',
        'total_tunjangan',
        'status_pembayaran'
    ];

    // Relasi ke User / Pegawai
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
