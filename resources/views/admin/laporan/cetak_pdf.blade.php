<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $title }}</title>
    <style>
        body { font-family: sans-serif; font-size: 11px; line-height: 1.4; color: #222; }
        .header { text-align: center; margin-bottom: 25px; border-bottom: 3px double #000; padding-bottom: 8px; }
        .header h2 { margin: 0; padding: 0; font-size: 18px; letter-spacing: 1px; }
        .header p { margin: 4px 0 0 0; font-size: 11px; color: #444; }
        .title-doc { text-align: center; font-size: 13px; font-weight: bold; margin-bottom: 15px; text-decoration: underline; }
        .table-data { width: 100%; border-collapse: collapse; margin-bottom: 15px; }
        .table-data th, .table-data td { border: 1px solid #444; padding: 6px 8px; text-align: left; }
        .table-data th { background-color: #f5f5f5; font-weight: bold; font-size: 11px; }
        .footer-note { margin-top: 20px; font-style: italic; background: #fdfdfd; padding: 8px; border-left: 3px solid #198754; font-size: 10px; }
        .ttd-container { width: 100%; margin-top: 30px; }
        .ttd-box { float: right; width: 230px; text-align: center; }
        .text-center { text-align: center; }
        .badge { padding: 2px 5px; font-size: 10px; font-weight: bold; border: 1px solid #ccc; background: #fafafa; }
    </style>
</head>
<body>

    <div class="header">
        <h2>MADRASAH ALIYAH NEGERI 2 WONOSOBO</h2>
        <p>Jl. Dieng No.Km. 05, Krasak, Kec. Mojotengah, Kabupaten Wonosobo, Jawa Tengah 56351</p>
    </div>

    <div class="title-doc">{{ $title }}</div>
    <div style="margin-bottom: 10px; font-size: 10px;"><strong>Tanggal Cetak Dokumen:</strong> {{ $tgl_laporan }}</div>

    @if($jenis == 'pegawai')
    <table class="table-data">
        <thead>
            <tr>
                <th width="4%" class="text-center">No</th>
                <th width="15%">NIP</th>
                <th>Nama Lengkap</th>
                <th width="10%" class="text-center">L/P</th>
                <th>Jabatan Utama</th>
                <th>Agama</th>
                <th>No. Telepon</th>
                <th width="12%" class="text-center">Status Kepegawaian</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $key => $p)
            <tr>
                <td class="text-center">{{ $key + 1 }}</td>
                <td><strong>{{ $p->nip ?? 'Belum PNS (Non-NIP)' }}</strong></td>
                <td>{{ $p->nama }}</td>
                <td class="text-center">{{ $p->jenis_kelamin }}</td>
                <td>{{ $p->jabatan->nama_jabatan ?? 'Belum Diplot' }}</td>
                <td>{{ $p->agama }}</td>
                <td>{{ $p->no_telp }}</td>
                <td class="text-center"><span class="badge">{{ $p->status_pegawai }}</span></td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @elseif($jenis == 'jabatan')
    <table class="table-data">
        <thead>
            <tr>
                <th width="4%" class="text-center">No</th>
                <th width="15%">Kode Jabatan</th>
                <th>Nama Jabatan</th>
                <th>Departemen / Divisi</th>
                <th width="15%">Gaji Pokok</th>
                <th width="15%">Tunjangan Jabatan</th>
                <th width="10%" class="text-center">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $key => $j)
            <tr>
                <td class="text-center">{{ $key + 1 }}</td>
                <td><code>{{ $j->kode_jabatan }}</code></td>
                <td>{{ $j->nama_jabatan }}</td>
                <td>{{ $j->departemen ?? 'Umum' }}</td>
                <td>Rp {{ number_format($j->gaji_pokok, 0, ',', '.') }}</td>
                <td>Rp {{ number_format($j->tunjangan, 0, ',', '.') }}</td>
                <td class="text-center">{{ ucfirst($j->status_jabatan) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @elseif($jenis == 'pendidikan')
    <table class="table-data">
        <thead>
            <tr>
                <th width="4%" class="text-center">No</th>
                <th width="15%">NIP Pegawai</th>
                <th>Nama Pegawai</th>
                <th width="10%">Jenjang</th>
                <th>Nama Institusi Akademik</th>
                <th width="12%">Gelar Kelulusan</th>
                <th>Pelatihan Eksternal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $key => $edu)
            <tr>
                <td class="text-center">{{ $key + 1 }}</td>
                <td>{{ $edu->user->pegawai->nip ?? '-' }}</td>
                <td><strong>{{ $edu->user->pegawai->nama ?? 'Akun Bukan Pegawai' }}</strong></td>
                <td><span class="badge">{{ $edu->jenjang }}</span></td>
                <td>{{ $edu->nama_institusi }}</td>
                <td>{{ $edu->gelar ?? '-' }}</td>
                <td>{{ $edu->nama_pelatihan ?? '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @elseif($jenis == 'pensiun')
    <table class="table-data">
        <thead>
            <tr>
                <th width="4%" class="text-center">No</th>
                <th width="14%">NIP</th>
                <th>Nama Pegawai</th>
                <th width="12%">TMT CPNS</th>
                <th width="12%">TMT Pangkat</th>
                <th width="12%">Tanggal Pensiun</th>
                <th width="10%">Masa Kerja</th>
                <th>Total Tunjangan</th>
                <th width="10%" class="text-center">Status Dana</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $key => $pen)
            <tr>
                <td class="text-center">{{ $key + 1 }}</td>
                <td>{{ $pen->user->pegawai->nip ?? '-' }}</td>
                <td><strong>{{ $pen->user->pegawai->nama ?? 'Tidak Diketahui' }}</strong></td>
                <td>{{ $pen->tmt_cpns ? \Carbon\Carbon::parse($pen->tmt_cpns)->translatedFormat('d/m/Y') : '-' }}</td>
                <td>{{ $pen->tmt_pangkat ? \Carbon\Carbon::parse($pen->tmt_pangkat)->translatedFormat('d/m/Y') : '-' }}</td>
                <td><strong>{{ \Carbon\Carbon::parse($pen->tanggal_pensiun)->translatedFormat('d F Y') }}</strong></td>
                <td>{{ $pen->masa_kerja }} Thn</td>
                <td>Rp {{ number_format($pen->total_tunjangan, 0, ',', '.') }}</td>
                <td class="text-center"><span class="badge">{{ strtoupper($pen->status_pembayaran) }}</span></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @elseif($jenis == 'kegiatan')
        <table class="tabel-data" style="width: 100%!important">
            <thead>
                <tr>
                    <th width="4%" class="text-center">No</th>
                    <th width="15%">NIP</th>
                    <th width="25%">Nama Pegawai</th>
                    <th width="15%" class="text-center">Total Input Logbook</th>
                    <th width="13%" class="text-center">Disetujui</th>
                    <th width="13%" class="text-center">Pending / Ditinjau</th>
                    <th width="15%" class="text-center">Ditolak</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $key => $row)
                <tr>
                    <td class="text-center">{{ $key + 1 }}</td>
                    <td>{{ $row->nip ?? '-' }}</td>
                    <td><strong>{{ $row->nama ?? 'Tidak Diketahui' }}</strong></td>
                    
                    {{-- Menghitung total data kegiatan yang terikat pada pegawai --}}
                    <td class="text-center" style="font-weight: bold;">
                        {{ $row->kegiatan->count() }} Kegiatan
                    </td>
                    
                    {{-- Menghitung jumlah kegiatan berdasarkan status masing-masing --}}
                    <td class="text-center" style="color: #198754; font-weight: bold;">
                        {{ $row->kegiatan->where('status', 'disetujui')->count() }}
                    </td>
                    <td class="text-center" style="color: #ffc107; font-weight: bold;">
                        {{ $row->kegiatan->where('status', 'pending')->count() }}
                    </td>
                    <td class="text-center" style="color: #dc3545; font-weight: bold;">
                        {{ $row->kegiatan->where('status', 'ditolak')->count() }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <div class="footer-note">
        <strong>Memorandum/Catatan Autentikasi Laporan:</strong><br>
        {{ $catatan }}
    </div>

    <div class="ttd-container">
        <div class="ttd-box">
            <p>Wonosobo, {{ $tgl_laporan }}</p>
            <p style="margin-bottom: 50px;">Kepala Tata Usaha MAN 2</p>
            <p><strong>_______________________</strong></p>
        </div>
    </div>

</body>
</html>