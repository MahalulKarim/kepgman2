@extends('kepsek.layouts.app')
@php
$title = 'Dashboard';
@endphp
@section('content')
<div class="col-lg-12 bg-success p-4 text-white">
    <h2>
        Selamat Datang
    </h2>
</div>
<div class="container-fluid p-4">
    <div class="row">
        <div class="col-lg-4 mb-4">
            <div class="card card-body" style="border-right: 10px solid #9cb50e;">
                <div class="row">
                    <div class="col-lg-12">
                        <h4 class="text-center">
                            Total Pegawai Aktif
                        </h4>
                    </div>
                    <div class="col-lg-12 pt-5">
                        <h5 class="text-center">
                           {{ $totalPegawai }}
                        </h5>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="card card-body" style="border-right: 10px solid #9cb50e;">
                <div class="row">
                    <div class="col-lg-12">
                        <h4 class="text-center">
                            Total Jabatan
                        </h4>
                    </div>
                    <div class="col-lg-12 pt-5">
                        <h5 class="text-center">
                            {{ $totalJabatan }}
                        </h5>
                    </div>
                   
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="card card-body" style="border-right: 10px solid #9cb50e;">
                <div class="row">
                    <div class="col-lg-12">
                        <h4 class="text-center">
                            Total Riwayat Pendidikan
                        </h4>
                    </div>
                    <div class="col-lg-12 pt-5">
                        <h5 class="text-center">
                            {{ $totalPendidikan }}
                        </h5>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection