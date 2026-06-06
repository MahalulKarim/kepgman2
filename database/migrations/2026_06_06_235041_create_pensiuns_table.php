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
        Schema::create('pensiuns', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user'); // Foreign key ke pegawai
            $table->date('tmt_cpns')->nullable();
            $table->date('tmt_pangkat')->nullable();
            $table->date('tanggal_pensiun');
            $table->string('masa_kerja', 50); // Contoh: 20 Tahun 5 Bulan
            $table->double('total_tunjangan', 12, 2)->default(0);
            $table->enum('status_pembayaran', ['pending', 'proses', 'selesai'])->default('pending');
            $table->timestamps();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pensiuns');
    }
};
