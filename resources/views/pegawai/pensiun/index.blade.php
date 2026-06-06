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
        
        
        <div class="col-md-12 pt-2">
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
                                    {{-- <td>{{ $p->masa_kerja }}</td> --}}
                                    <td>Rp {{ number_format($p->total_tunjangan, 0, ',', '.') }}</td>
                                    {{-- <td>
                                        @if($p->status_pembayaran == 'selesai')
                                            <span class="badge bg-success">Selesai</span>
                                        @elseif($p->status_pembayaran == 'proses')
                                            <span class="badge bg-warning text-dark">Proses</span>
                                        @else
                                            <span class="badge bg-danger">Pending</span>
                                        @endif
                                    </td> --}}
                                   
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
        </div>
    </div>
</div>


@endsection