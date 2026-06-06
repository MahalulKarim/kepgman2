<?php

namespace App\Models;

use App\Models\Pegawai;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Jabatan extends Model
{
    //
    protected $fillable = [
        'kode_jabatan',
        'nama_jabatan',
        'departemen',
        'level_jabatan',
        'gaji_pokok',
        'tunjangan',
        'jobdesk',
        'status_jabatan',
    ];

    public function pegawai(): HasMany
    {
        return $this->hasMany(Pegawai::class, 'jabatan_id');
    }
}
