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
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            // Relasi ke tabel users (id_user)
            // foreignId akan otomatis mencocokkan tipe data dengan id di tabel users
            // cascadeOnDelete() artinya jika user dihapus, data pegawai ikut terhapus
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('jabatan_id')->nullable()->constrained('jabatans')->nullOnDelete();
            $table->string('nip', 20)->unique()->nullable(); // nullable jika ada pegawai NON-PNS yang belum punya NIP
            $table->string('nama', 150);
            $table->string('tempat_lahir', 100);
            $table->date('tgl_lahir');
            
            // Jenis Kelamin menggunakan ENUM
            $table->enum('jenis_kelamin', ['L', 'P']); // L: Laki-laki, P: Perempuan
            
            // Agama menggunakan ENUM
            $table->enum('agama', ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Khonghucu']);
            
            $table->text('alamat');
            $table->text('foto')->nullable(); // nullable jika foto belum diupload
            $table->string('no_telp', 15);
            
            // Status Pegawai menggunakan ENUM
            $table->enum('status_pegawai', ['PNS', 'NON-PNS']);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawais');
    }
};
