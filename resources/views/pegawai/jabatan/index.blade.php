@extends('pegawai.layouts.app')
@php
$title = 'Jabatan';
@endphp
@section('content')



<div class="container p-4">
    <div class="row">
        <div class="col-lg-12 py-2">
            <h2>Data Jabatan</h2>
        </div>
        <div class="col-lg-12 d-flex mb-3">
           
        </div>
    </div>
    <div class="row pt-2">
        <div class="col-lg-4">
            @if($pegawaiProfil->foto)
                <img src="{{ asset('storage/foto_pegawai/'.$pegawaiProfil->foto) }}" alt="Foto" class="" width="200" height="250" style="object-fit: cover;">
            @else
            <h1 class="text-center" style="font-size: 100px">
                <i class="bi bi-person-fill"></i>
            </h1>
            @endif
        </div>
        <div class="col-lg-8">
            <div class="row">
                <div class="col-lg-6 mb-2">
                   <div class="card card-body">
                        <h5>Nama Pegawai</h5>
                        <h3>{{ $pegawaiProfil->nama }}</h3>
                        <hr>
                        <h5>NIP</h5>
                        <h3>{{ $pegawaiProfil->nip }}</h3>
                   </div>
                </div>
                <div class="col-lg-6 mb-2">
                    <div class="row">
                        <div class="col-lg-12 mb-3">
                            <div class="card card-body">
                                 <h5>Jabatan Utama</h5>
                                 <h3 class="rounded-pill bg-primary text-center text-white">{{ $pegawaiProfil->jabatan->nama_jabatan }}</h3>
                            </div>
                             <div class="col-lg-12 mb-3 pt-3">
                                <div class="card card-body">
                                        <h5>Status Pegawai</h5>
                                        <h3 class="rounded-pill bg-success text-center text-white">{{ $pegawaiProfil->status_pegawai }}</h3>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
               
                <div class="col-lg-6">
                   <div class="card card-body">
                        <h5>TMT Pangkat</h5>
                          @if($lastPensiun)    
                          <h5>
                              <i class="bi bi-calendar-event-fill"></i>  {{ \Carbon\Carbon::parse($lastPensiun->tmt_pangkat)->format('d-m-Y') }}
                          </h5>
                            @else
                                <p>Data belum diisi.</p>
                            @endif
                   </div>
                </div>
                <div class="col-lg-6">
                   <div class="card card-body">
                        <h5>TMT Pensiun</h5>
                          @if($lastPensiun)    
                          <h5>
                              <i class="bi bi-calendar-event-fill"></i>  {{ \Carbon\Carbon::parse($lastPensiun->tanggal_pensiun)->format('d-m-Y') }}
                          </h5>
                            @else
                                <p>Data belum diisi.</p>
                            @endif
                   </div>
                </div>

            </div>
        </div>
        
       
    </div>
</div>


@endsection