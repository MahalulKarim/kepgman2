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
        Schema::create('jabatans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_jabatan', 20)->unique(); // Contoh: JAB001, GUR-01
            $table->string('nama_jabatan', 100);
            $table->string('departemen', 100)->nullable(); // Contoh: Kurikulum, Kesiswaan, Tata Usaha
            
            // Level Jabatan Menggunakan ENUM
            $table->enum('level_jabatan', ['kepala sekolah', 'wakil kepala sekolah', 'guru', 'staff TU']);
            
            // Keuangan (Gaji & Tunjangan)
            $table->double('gaji_pokok', 12, 2)->default(0);
            $table->double('tunjangan', 12, 2)->default(0);
            
            $table->text('jobdesk')->nullable();
            
            // Status Jabatan Menggunakan ENUM
            $table->enum('status_jabatan', ['aktif', 'non-aktif'])->default('aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jabatans');
    }
};
