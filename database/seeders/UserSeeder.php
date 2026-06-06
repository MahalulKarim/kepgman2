<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Akun Admin (Level 1)
        User::create([
            'name' => 'Admin MAN 2',
            'email' => 'admin@man.com',
            'password' => Hash::make('password123'), // Silakan ganti passwordnya nanti
            'level' => 1,
        ]);

        // 2. Akun Kepala Sekolah (Level 2)
        User::create([
            'name' => 'Kepala Sekolah MAN 2',
            'email' => 'kepsek@man.com',
            'password' => Hash::make('password123'),
            'level' => 2,
        ]);

        // 3. Akun Pegawai (Level 3)
        User::create([
            'name' => 'Pegawai MAN 2',
            'email' => 'pegawai@man.com',
            'password' => Hash::make('password123'),
            'level' => 3,
        ]);
    }
}
