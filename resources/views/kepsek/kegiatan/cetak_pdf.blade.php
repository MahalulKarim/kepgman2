<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Logbook Kegiatan Harian Pegawai</title>
    <style>
        /* Pengaturan Kertas Dasar */
        @page {
            margin: 2cm 2cm 2cm 2cm;
        }
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            font-size: 12px;
            line-height: 1.5;
            color: #333;
        }
        
        /* Desain Kop Surat Formal */
        .kop-surat {
            border-bottom: 3px double #000;
            padding-bottom: 10px;
            margin-bottom: 20px;
            text-align: center;
        }
        .kop-surat h2 {
            margin: 0;
            font-size: 16px;
            text-transform: uppercase;
        }
        .kop-surat h3 {
            margin: 3px 0;
            font-size: 14px;
            text-transform: uppercase;
        }
        .kop-surat p {
            margin: 0;
            font-size: 11px;
            color: #666;
        }

        /* Judul Dokumen & Periode Laporan */
        .judul-laporan {
            text-align: center;
            font-weight: bold;
            font-size: 13px;
            text-transform: uppercase;
            margin-bottom: 15px;
            text-decoration: underline;
        }
        .periode-info {
            font-size: 11px;
            margin-bottom: 15px;
            color: #444;
        }

        /* Tabel Identitas Pegawai */
        .tabel-identitas {
            width: 100%;
            margin-bottom: 20px;
            border-collapse: collapse;
        }
        .tabel-identitas td {
            padding: 4px 0;
            vertical-align: top;
        }
        .tabel-identitas td.label {
            width: 18%;
            color: #555;
        }
        .tabel-identitas td.titik {
            width: 2%;
        }

        /* Tabel Utama Data Logbook */
        .tabel-data {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        .tabel-data th {
            background-color: #f2f2f2;
            border: 1px solid #111;
            padding: 8px;
            font-weight: bold;
            font-size: 11px;
            text-align: center;
            text-transform: uppercase;
        }
        .tabel-data td {
            border: 1px solid #111;
            padding: 7px;
            vertical-align: top;
            font-size: 11px;
        }
        .text-center {
            text-align: center;
        }
        
        /* Bagian Tanda Tangan (Asimetris / Kanan) */
        .tanda-tangan-container {
            width: 100%;
            margin-top: 30px;
            page-break-inside: avoid;
        }
        .tanda-tangan-table {
            width: 100%;
            border-collapse: collapse;
        }
        .tanda-tangan-table td {
            width: 50%;
            text-align: center;
            vertical-align: top;
        }
        .space-ttd {
            height: 70px;
        }
    </style>
</head>
<body>

    <div class="kop-surat">
        <h2>MADRASAH ALIYAH NEGERI 2 WONOSOBO</h2>
        {{-- <h3>MAN 2 WONOSOBO</h3> --}}
        <p>Jl. Dieng No.Km. 05, Krasak, Kec. Mojotengah, Kabupaten Wonosobo, Jawa Tengah 56351</p>
    </div>

    <div class="judul-laporan">
        Laporan Rekapitulasi Kegiatan Harian @if (empty($pegawai->nama)) Semua @else @endif Pegawai
    </div>

    <table class="tabel-identitas">
        @if (empty($pegawai->nama))
            
        @else
        <tr>
            <td class="label">Nama Pegawai</td>
            <td class="titik">:</td>
            <td><strong>{{ $pegawai->nama ?? '-' }}</strong></td>
        </tr>
        <tr>
            <td class="label">NIP / NUPTK / ID</td>
            <td class="titik">:</td>
            <td>{{ $pegawai->nip ??'-' }} / {{  $pegawai->nuptk ?? '-' }}</td>
        </tr>
        <tr>
            <td class="label">Jabatan Utama</td>
            <td class="titik">:</td>
            <td>{{ $pegawai->jabatan->nama_jabatan ?? '-' }}</td>
        </tr>
        @endif
       
        <tr>
            <td class="label">Periode Laporan</td>
            <td class="titik">:</td>
            <td>
                @if($metaData['tanggal_mulai'] && $metaData['tanggal_selesai'])
                    {{ \Carbon\Carbon::parse($metaData['tanggal_mulai'])->locale('id')->translatedFormat('d F Y') }} 
                    s/d 
                    {{ \Carbon\Carbon::parse($metaData['tanggal_selesai'])->locale('id')->translatedFormat('d F Y') }}
                @else
                    Semua Riwayat Kegiatan
                @endif
            </td>
        </tr>
    </table>

    <table class="tabel-data">
        <thead>
            <tr>
                <th width="5%">No</th>
                @if (empty($pegawai->nama))
                <th>
                    NIP/NUPTK/ID
                </th>
                <th>
                    Nama Pegawai
                </th>
                @else
                    
                @endif
                <th width="15%">Tanggal</th>
                <th width="15%">Waktu / Jam</th>
                <th width="25%">Nama Kegiatan</th>
                <th width="25%">Deskripsi & Hasil Capaian</th>
                <th width="15%">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($kegiatan as $key => $item)
                <tr>
                    <td class="text-center">{{ $key + 1 }}</td>
                     @if (empty($pegawai->nama))
                       <td>
                        {{ $item->user->pegawai->nip ??  '-'}} / {{ $item->user->pegawai->nuptk ?? '-' }}
                       </td>
                       <td>
                        {{ $item->user->pegawai->nama }}
                       </td>
                    @else
                        
                    @endif
                    <td class="text-center">
                        {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d-m-Y') }}
                    </td>
                    <td class="text-center">
                        {{ date('H:i', strtotime($item->jam_mulai)) }} - {{ date('H:i', strtotime($item->jam_selesai)) }}
                    </td>
                    <td><strong>{{ $item->nama_kegiatan }}</strong></td>
                    <td>{{ $item->deskripsi }}</td>
                    <td>{{ $item->status }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center" style="padding: 20px; color: #777; font-style: italic;">
                        Tidak ada rekaman data aktivitas pada periode tanggal yang dipilih.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="tanda-tangan-container">
        <table class="tanda-tangan-table">
            <tr>
                <td>
                    {{-- Sisi Kiri: Atasan/Verifikator (Kosongkan jika hanya butuh tanda tangan pegawai) --}}
                    <p>Mengetahui,</p>
                    <p>Kepala Sekolah MAN 2 Wonosobo</p>
                    <div class="space-ttd"></div>
                   <p>{{ $kepsek->pegawai->nama ?? '-' }}</p>
                    <p class="text-muted" style="font-size: 10px;">NIP/NUPTK/ID .{{ $kepsek->pegawai->nip ??  '-' }}/{{ $kepsek->pegawai->nuptk ??  '-' }}</p>
                </td>
                <td>
                    {{-- Sisi Kanan: Pegawai Terkait --}}
                    <p>Wonosobo, {{ \Carbon\Carbon::now()->locale('id')->translatedFormat('d F Y') }}</p>
                    <p>Pegawai yang bersangkutan,</p>
                    <div class="space-ttd"></div>
                    <p><strong>{{ $pegawai->nama ?? '-' }}</strong></p>
                    <p style="font-size: 11px;">NIP/NUPTK. {{ $pegawai->nip ?? $pegawai->nupk ?? '.........................' }}</p>
                </td>
            </tr>
        </table>
    </div>

</body>
</html>