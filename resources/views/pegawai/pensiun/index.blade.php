@extends('pegawai.layouts.app')
@php
$title = 'Pensiun';
@endphp
@section('content')



<div class="container p-4">
    <div class="row">
        <div class="col-lg-12 py-2">
            <h2>Data Pensiun</h2>
        </div>
        
    </div>
    <div class="row">
        <div class="col-lg-4 mb-2">
            <div class="card card-body border-1 rounded-3 shadow-sm p-3 mb-5 bg-body">
                <div class="row">
                    <div class="col-lg-12 d-flex justify-content-center">
                        @if($pegawaiAnda->foto)
                            <img src="{{ asset('storage/foto_pegawai/'.$pegawaiAnda->foto) }}" alt="Foto" class="" width="70%" height="260" style="object-fit: cover;">
                        @else
                          <h1 class="text-center" style="font-size: 100px">
                            <i class="bi bi-person-fill"></i>
                        </h1>
                        @endif

                    </div>
                    <div class="col-lg-12 pt-2">
                        <h3 class="text-center">
                        {{ $pegawaiAnda->nama ?? '-' }}
                        </h3>
                    
                    </div>
                </div>
                
               
            </div>
        </div>
        <div class="col-lg-8 mb-2">
            <div class="card card-body border-1 rounded-3 shadow-sm p-3 mb-5 bg-body">
                <div class="row">
                    <div class="col-lg-12">
                        <h5>Ringkasan Data Pensiun</h5>
                    </div>
                    <div class="col-lg-12">
                        <div class="row px-3">
                            <div class="col-lg-5 border rounded-3">
                                <div class="row py-3">
                                    <div class="col-2 my-auto">
                                        <h5>
                                            <i class="bi bi-clock"></i>
                                        </h5>
                                    </div>
                                    <div class="col-10">
                                        <h6 class="text-muted">
                                            Masa Kerja
                                        </h6>
                                        <h5>
                                            {{ $pensiun->masa_kerja }} Tahun
                                        </h5>
                                    </div>
                                </div>
                               
                            </div>
                            <div class="col-lg-2"></div>
                            <div class="col-lg-5 border rounded-3">
                                <div class="row py-3">
                                    <div class="col-2 my-auto">
                                        <h5>
                                            <i class="bi bi-bookmark-star-fill"></i>
                                        </h5>
                                    </div>
                                    <div class="col-10">
                                        <h6 class="text-muted">
                                            NIP
                                        </h6>
                                        <h5>
                                            {{ $pegawaiAnda->nip }} 
                                        </h5>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 pt-4">
                        <div class="row px-3">
                            <div class="col-lg-5 border rounded-3">
                                <div class="row py-3">
                                    <div class="col-2 my-auto">
                                        <h5>
                                           <i class="bi bi-cash-stack"></i>
                                        </h5>
                                    </div>
                                    <div class="col-10">
                                        <h6 class="text-muted">
                                            Total Tunjangan
                                        </h6>
                                        <h5>
                                            {{ number_format($pensiun->total_tunjangan, 0, ',', '.') }}
                                        </h5>
                                    </div>
                                </div>
                               
                            </div>
                            <div class="col-lg-2"></div>
                            <div class="col-lg-5 border rounded-3">
                                <div class="row py-3">
                                    <div class="col-2 my-auto">
                                        <h5>
                                            <i class="bi bi-exclamation-circle"></i>
                                        </h5>
                                    </div>
                                    <div class="col-10">
                                        <h6 class="text-muted">
                                            Status Pensiun
                                        </h6>
                                        <h5>
                                            Pegawai
                                          <span class="text-capitalize">
                                               {{ $pegawaiAnda->jabatan->status_jabatan }} 
                                            
                                        </span> 
                                        </h5>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        
         <div class="col-lg-12 mb-4">
            <div class="card card-body border-1 rounded-3 shadow-sm p-3 mb-5 bg-body">
                <div class="row">
                    <div class="col-lg-12">
                        <h5>Tanggal Terhitung Mulai (TMT)</h5>
                    </div>
                    <div class="col-lg-3 border rounded-3">
                        <div class="row py-3">
                            <div class="col-2 my-auto">
                                <h5>
                                   <div class="col-lg-12">
                                        <h5>
                                            <i class="bi bi-calendar-week"></i>
                                        </h5>
                                    </div>
                                </h5>
                            </div>
                            <div class="col-10">
                                <h6 class="text-muted">
                                    TMT CPNS
                                </h6>
                                <h5>
                                    {{ $pensiun->tmt_cpns ? \Carbon\Carbon::parse($pensiun->tmt_cpns)->locale('id')->isoFormat('DD MMMM YYYY') : '-' }}                                    
                                </h5>
                            </div>
                        </div>                       
                    </div>
                    <div class="col-lg-2"></div>
                    <div class="col-lg-3 border rounded-3">
                        <div class="row py-3">
                            <div class="col-2 my-auto">
                                <h5>
                                   <div class="col-lg-12">
                                        <h5>
                                            <i class="bi bi-calendar-week"></i>
                                        </h5>
                                    </div>
                                </h5>
                            </div>
                            <div class="col-10">
                                <h6 class="text-muted">
                                    TMT Pangkat
                                </h6>
                                <h5>
                                    {{ $pensiun->tmt_pangkat ? \Carbon\Carbon::parse($pensiun->tmt_pangkat)->locale('id')->isoFormat('DD MMMM YYYY') : '-' }}                                    
                                </h5>
                            </div>
                        </div>                       
                    </div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-3 border rounded-3">
                        <div class="row py-3">
                            <div class="col-2 my-auto">
                                <h5>
                                   <div class="col-lg-12">
                                        <h5>
                                            <i class="bi bi-calendar-week"></i>
                                        </h5>
                                    </div>
                                </h5>
                            </div>
                            <div class="col-10">
                                <h6 class="text-muted">
                                    TMT Pensiun
                                </h6>
                                <h5>
                                    {{ $pensiun->tanggal_pensiun ? \Carbon\Carbon::parse($pensiun->tanggal_pensiun)->locale('id')->isoFormat('DD MMMM YYYY') : '-' }}                                    
                                </h5>
                            </div>
                        </div>                       
                    </div>
                </div>
            </div>
         </div>
    </div>
        
        {{-- <div class="col-md-12 pt-2">
            <div class="card shadow-sm">
                <div class="card-body">
                 

                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle">
                            <thead>
                                <tr>
                                    
                                    <th>Masa Kerja</th>
                                    <th>NIP</th>
                                    <th>TMT CPNS</th>
                                    <th>TMT Pangkat</th>
                                    <th>TMT Pensiun</th>
                                    <th>Total Tunjangan</th>
                                  
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($pensiun as $key => $p)
                                <tr>
                                   
                                    <td>{{ $p->masa_kerja ?? 'Tidak Diketahui' }}</td>
                                    <td>{{ $p->user->pegawai->nip ?? ($p->user->nip ?? '-') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($p->tmt_cpns)->locale('id')->translatedFormat('d F Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($p->tmt_pangkat)->locale('id')->translatedFormat('d F Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($p->tanggal_pensiun)->locale('id')->translatedFormat('d F Y') }}</td>
                                   
                                    <td>Rp {{ number_format($p->total_tunjangan, 0, ',', '.') }}</td>
                                   
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted">Belum ada data pensiun pegawai.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3">
                        {{ $pensiun->links() }}
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</div>


@endsection