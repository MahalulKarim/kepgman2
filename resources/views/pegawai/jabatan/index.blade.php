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
        
        <div class="col-md-12 pt-2">
            <div class="card shadow-sm">
                <div class="card-body">
                    

                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle">
                            <thead>
                                <tr>
                                    <th>NIP</th>
                                    <th>Jabatan</th>
                                    <th>TMT Pangkat</th>
                                    <th>TMT Pensiun</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($pegawaiList as $p)
                                <tr>
                                   
                                    <td>{{ $p->nip }}</td>
                                    <td>{{ $p->jabatan->nama_jabatan }}</td>
                                    <td>
                                        @if($p->pensiun && $p->pensiun->tmt_pangkat)
                                            <span class="text-danger fw-bold">
                                                {{ \Carbon\Carbon::parse($p->pensiun->tmt_pangkat)->local('id')->translatedFormat('d F Y') }}
                                            </span>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($p->pensiun && $p->pensiun->tanggal_pensiun)
                                            <span class="text-danger fw-bold">
                                                {{ \Carbon\Carbon::parse($p->pensiun->tanggal_pensiun)->local('id')->translatedFormat('d F Y') }}
                                            </span>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                                                
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center text-muted">Belum ada data admin.jabatan</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{-- <div class="mt-3">
                        {{ $jabatan->links() }}
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection