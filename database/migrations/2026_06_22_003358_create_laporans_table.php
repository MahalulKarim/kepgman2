<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            // Semua foreign key dibuat nullable untuk mendukung cetak per modul
            $table->unsignedBigInteger('id_pegawai')->nullable();
            $table->unsignedBigInteger('id_jabatan')->nullable();
            $table->unsignedBigInteger('id_pendidikan')->nullable();
            $table->unsignedBigInteger('id_pensiun')->nullable();
            
            $table->text('catatan')->nullable();
            $table->date('tgl_laporan'); // Akan diisi otomatis saat tombol cetak diklik
            $table->timestamps();

            // Definisi Relasi (Setiap tabel tujuan disesuaikan dengan primary key asli aplikasimu)
            $table->foreign('id_pegawai')->references('id')->on('pegawais')->onDelete('set null');
            $table->foreign('id_jabatan')->references('id')->on('jabatans')->onDelete('set null');
            $table->foreign('id_pendidikan')->references('id')->on('riwayat_pendidikans')->onDelete('set null');
            $table->foreign('id_pensiun')->references('id')->on('pensiuns')->onDelete('set null');
         
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporans');
    }
};
