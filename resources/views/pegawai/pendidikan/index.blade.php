@extends('pegawai.layouts.app')
@php
$title = 'Riwayat Pendidikan';
@endphp
@section('content')


<div class="container p-4">
    <div class="row">
        <div class="col-lg-12 py-2">
            <h2>Riwayat Pendidikan</h2>
        </div>
        
        
        <div class="col-md-12 pt-2">
            <div class="card shadow-sm">
                <div class="card-body">
                   
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle">
                            <thead>
                                <tr>
                                    <th>Jenjang</th>
                                    <th>Perguruan Tinggi / Instansi</th>
                                   
                                    <th>Gelar</th>
                                    <th>Pelatihan / Diklat</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($pendidikan as $key => $p)
                                <tr>
                                    
                                    <td>{{ $p->jenjang }}</td>
                                    <td>{{ $p->nama_institusi }}</td>
                                    <td>{{ $p->gelar ?? '-' }}</td>
                                    <td>{{ $p->nama_pelatihan ?? '-' }}</td>
                                   
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted">Belum ada data riwayat pendidikan.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3">
                        {{ $pendidikan->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection