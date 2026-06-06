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
        Schema::create('riwayat_pendidikans', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('id_user'); // Foreign key ke pegawai/user
            $table->string('jenjang', 50); // Contoh: SD, SMP, SMA, S1, S2
            $table->string('nama_institusi', 150); // Contoh: Universitas Diponegoro
            $table->string('gelar', 50)->nullable(); // Contoh: S.Kom, M.T (nullable untuk SD-SMA)
            
            // Sesuai request: pelatihan dibuat nullable dulu
            $table->unsignedBigInteger('id_pelatihan')->nullable(); 
            $table->string('nama_pelatihan', 150)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_pendidikans');
    }
};
