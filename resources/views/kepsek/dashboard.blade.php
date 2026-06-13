@extends('kepsek.layouts.app')
@php
$title = 'Dashboard';
@endphp
@section('content')
<div class="col-lg-12 bg-success p-4 text-white">
    <h2>
        Selamat Datang, Kepala Sekolah
    </h2>
</div>
<div class="container-fluid p-4">
<div class="row p-3">
    <div class="col-lg-4 mb-4">
        <div class="card card-body border rounded-3 h-100"> <div class="row">
                <div class="col-lg-12">
                    <h6 class="text-center">
                        Total Pegawai Aktif <i class="bi bi-people-fill"></i>
                    </h6>
                </div>
                <div class="col-lg-12 pt-2">
                    <h3 class="text-center">
                       {{ $totalPegawai }}
                    </h3>
                </div>
                <div class="col-lg-12 text-center">
                    <span class="badge rounded-pill bg-success">
                        + {{ $pegawaiBaruMingguIni }} baru minggu ini
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 mb-4">
        <div class="card card-body border rounded-3 h-100"> <div class="row">
                <div class="col-lg-12">
                    <h6 class="text-center">
                        Total Jabatan <i class="bi bi-diagram-2-fill"></i>
                    </h6>
                </div>
                <div class="col-lg-12 pt-2">
                    <h3 class="text-center">
                       {{ $totalJabatan }}
                    </h3>
                </div>
                <div class="col-lg-12 text-center">
                   <p class="mb-0">Terbagi dalam {{ $departJabatan }} divisi</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 mb-4">
        <div class="card card-body border rounded-3 h-100"> <div class="row">
                <div class="col-lg-12">
                    <h6 class="text-center">
                        Pendidikan Terakhir <i class="bi bi-mortarboard-fill"></i>
                    </h6>
                </div>
                <div class="col-lg-12 pt-2">
                    <h3 class="text-center">
                       {{ $totalPendidikan }}
                    </h3>
                </div>
                <div class="col-lg-12 text-center text-muted small"> @if($lastPendidikan && $lastPendidikan->created_at)
                        data terbaru diperbarui {{ $lastPendidikan->created_at->locale('id')->diffForHumans() }}
                    @else
                        belum ada data yang diperbarui
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection