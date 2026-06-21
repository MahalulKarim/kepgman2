<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\PegawaiController as AdminPegawai;
use App\Http\Controllers\Admin\JabatanController as AdminJabatan;
use App\Http\Controllers\Admin\RiwayatPendidikanController as AdminRiwayatPendidikan;
use App\Http\Controllers\Admin\PensiunController as AdminPensiun;
use App\Http\Controllers\Admin\KegiatanController as AdminKegiatan;
use App\Http\Controllers\Admin\LaporanController as AdminLaporan;

use App\Http\Controllers\Kepsek\DashboardController as KepsekDashboard;
use App\Http\Controllers\Kepsek\LaporanController as KepsekLaporan;
use App\Http\Controllers\Kepsek\KegiatanController as KepsekKegiatan;

use App\Http\Controllers\Pegawai\DashboardController as PegawaiDashboard;
use App\Http\Controllers\Pegawai\PegawaiController as PegawaiPegawai;
use App\Http\Controllers\Pegawai\JabatanController as PegawaiJabatan;
use App\Http\Controllers\Pegawai\RiwayatPendidikanController as PegawaiRiwayatPendidikan;
use App\Http\Controllers\Pegawai\PensiunController as PegawaiPensiun;

use App\Http\Controllers\Pegawai\KegiatanController as PegawaiKegiatan;

Route::get('', function () {
    return view('auth/login');
});

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('dashboard');
        
        Route::resource('pegawai', AdminPegawai::class);
        Route::resource('jabatan', AdminJabatan::class);
        Route::resource('pendidikan', AdminRiwayatPendidikan::class);
        Route::resource('pensiun', AdminPensiun::class);
         Route::get('/kegiatan/cetak', [AdminKegiatan::class, 'cetakPdf'])->name('kegiatan.cetak');
        Route::resource('kegiatan', AdminKegiatan::class);
        Route::get('laporan', [AdminLaporan::class, 'index'])->name('laporan.index');
        Route::post('laporan/cetak', [AdminLaporan::class, 'cetakPdf'])->name('laporan.cetak');


    });

 Route::prefix('kepsek')->name('kepsek.')->group(function () {

    Route::get('/dashboard', [KepsekDashboard::class, 'index'])->name('dashboard');

        Route::get('/kegiatan/cetak', [KepsekKegiatan::class, 'cetakPdf'])->name('kegiatan.cetak');
        Route::resource('kegiatan', KepsekKegiatan::class);

    Route::get('laporan', [KepsekLaporan::class, 'index'])->name('laporan.index');
   Route::post('laporan/cetak', [KepsekLaporan::class, 'cetakPdf'])->name('laporan.cetak');
 });
 Route::prefix('pegawai')->name('pegawai.')->group(function () {

    Route::get('/dashboard', [PegawaiDashboard::class, 'index'])->name('dashboard');
    Route::resource('pegawai', PegawaiPegawai::class);
       Route::resource('jabatan', PegawaiJabatan::class);
        Route::resource('pendidikan', PegawaiRiwayatPendidikan::class);
        Route::resource('pensiun', PegawaiPensiun::class);
        Route::get('/kegiatan/cetak', [PegawaiKegiatan::class, 'cetakPdf'])->name('kegiatan.cetak');
        Route::resource('kegiatan', PegawaiKegiatan::class);

 });



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
