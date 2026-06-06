<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Data Contoh Jabatan MAN 2 Wonosobo
        Jabatan::create([
            'kode_jabatan' => 'KS-01',
            'nama_jabatan' => 'Kepala Madrasah',
            'departemen' => 'Pimpinan',
            'level_jabatan' => 'kepala sekolah',
            'gaji_pokok' => 5000000,
            'tunjangan' => 2500000,
            'jobdesk' => 'Memimpin seluruh kegiatan operasional dan akademis di MAN 2 Wonosobo.',
            'status_jabatan' => 'aktif'
        ]);

        Jabatan::create([
            'kode_jabatan' => 'WAKUR-02',
            'nama_jabatan' => 'Waka Kurikulum',
            'departemen' => 'Kurikulum',
            'level_jabatan' => 'wakil kepala sekolah',
            'gaji_pokok' => 4000000,
            'tunjangan' => 1200000,
            'jobdesk' => 'Mengatur administrasi pembelajaran, jadwal mengajar, dan kalender akademik.',
            'status_jabatan' => 'aktif'
        ]);

        Jabatan::create([
            'kode_jabatan' => 'GUR-03',
            'nama_jabatan' => 'Guru Pengajar',
            'departemen' => 'Akademik',
            'level_jabatan' => 'guru',
            'gaji_pokok' => 3000000,
            'tunjangan' => 500000,
            'jobdesk' => 'Melaksanakan kegiatan belajar mengajar dan mengevaluasi hasil belajar siswa.',
            'status_jabatan' => 'aktif'
        ]);

        Jabatan::create([
            'kode_jabatan' => 'TU-04',
            'nama_jabatan' => 'Staf Administrasi Kepegawaian',
            'departemen' => 'Tata Usaha',
            'level_jabatan' => 'staff TU',
            'gaji_pokok' => 2500000,
            'tunjangan' => 300000,
            'jobdesk' => 'Mengelola arsip, data guru/pegawai, dan persuratan madrasah.',
            'status_jabatan' => 'aktif'
        ]);
    }
}
