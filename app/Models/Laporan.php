<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    //
    protected $fillable = [
        'id_pegawai', 'id_jabatan', 'id_pendidikan', 'id_pensiun', 'catatan', 'tgl_laporan'
    ];

    public function pegawai() {
        return $this->belongsTo(Pegawai::class, 'id_pegawai');
    }
    public function jabatan() {
        return $this->belongsTo(Jabatan::class, 'id_jabatan');
    }
    public function pendidikan() {
        return $this->belongsTo(RiwayatPendidikan::class, 'id_pendidikan', 'id_pendidikan');
    }
    public function pensiun() {
        return $this->belongsTo(Pensiun::class, 'id_pensiun');
    }
}
