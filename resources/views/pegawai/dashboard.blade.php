@extends('pegawai.layouts.app')
@php
$title = 'Dashboard';
@endphp
@section('content')
<div class="col-lg-12 bg-success p-4 text-white d-flex justify-content-between">
    <div class="">
        <h3>
            Selamat Datang,
        </h3>
        <h4>
            {{ $pegawai->nama }}
        </h4>

    </div>
    <div class="my-auto">
        <h2>
            NIP: {{ $pegawai->nip ?? '-' }}
        </h2>

    </div>
</div>
<div class="container-fluid p-4">
    <div class="row">
        <div class="col-lg-4 mb-4">
            <div class="card card-body" style="border-right: 10px solid #9cb50e;">
                <div class="row">
                    <div class="col-lg-12">
                        <h4 class="text-center">
                            Status Pegawai
                        </h4>
                    </div>
                    <div class="col-lg-12 pt-5">
                        <h5 class="text-center">
                           {{ $pegawai->status_pegawai ?? '-' }}
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
                            Jabatan Aktif
                        </h4>
                    </div>
                    <div class="col-lg-12 pt-5">
                        <h5 class="text-center">
                           {{ $pegawai->jabatan->nama_jabatan ?? '-' }}
                    </div>
                   
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="card card-body" style="border-right: 10px solid #9cb50e;">
                <div class="row">
                    <div class="col-lg-12">
                        <h4 class="text-center">
                          Seluruh Penddikan Terakhir
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