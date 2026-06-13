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
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-light">
            <h5 class="card-title mb-0">Riwayat Pendidikan Formal</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead>
                        <tr>
                            <th><i class="bi bi-mortarboard-fill"></i>Jenjang</th>
                            <th><i class="bi bi-bank2"></i>Perguruan Tinggi / Instansi</th>
                            <th><i class="bi bi-file-earmark-text-fill"></i>Gelar/Jurusan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pendidikanFormal as $p)
                            <tr>
                                <td>{{ $p->jenjang }}</td>
                                <td>{{ $p->nama_institusi }}</td>
                                <td>
                                    {{ $p->gelar ?? '-' }}
                                   

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted">Belum ada data riwayat pendidikan formal.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                {{ $pendidikanFormal->appends(request()->except('page_formal'))->links() }}
            </div>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-light">
            <h5 class="card-title mb-0">Riwayat Pelatihan / Diklat</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead>
                        <tr>
                            <th>Nama Pelatihan</th>
                            <th><i class="bi bi-calendar-minus"></i> Tahun</th>
                            <th><i class="bi bi-file-earmark-text-fill"></i>Sertifikat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pelatihanDiklat as $p)
                            <tr>
                                <td>{{ $p->nama_pelatihan }}</td>
                                <td>
                                    {{ \Carbon\Carbon::parse($p->tahun_lulus)->format('Y') }}
                                </td>
                                <td>Ya</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted">Belum ada data riwayat pelatihan / diklat.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                {{ $pelatihanDiklat->appends(request()->except('page_pelatihan'))->links() }}
            </div>
        </div>
    </div>
</div>
    </div>
</div>

@endsection