@extends('admin.layouts.app')
@php
$title = 'Dashboard';
@endphp
@section('content')
<div class="col-lg-12 bg-white p-4 text-primary">
    <h2>
        Selamat Datang Admin
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
                    <div class="col-lg-12 pt-5">
                        <h5 class="text-center">
                            Orang
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
                    <div class="col-lg-12 pt-5">
                        <h5 class="text-center">
                            Jenis
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
                            Total Pensiun
                        </h4>
                    </div>
                    <div class="col-lg-12 pt-5">
                        <h5 class="text-center">
                            {{ $totalPensiun }}
                        </h5>
                    </div>
                    <div class="col-lg-12 pt-5">
                        <h5 class="text-center">
                            Orang
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection