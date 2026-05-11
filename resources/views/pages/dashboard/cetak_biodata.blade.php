<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Formulir Pendaftaran - {{ $pendaftaran->no_register }}</title>
    <style>
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            font-size: 11pt;
            color: #333;
            line-height: 1.4;
            margin: 0;
            padding: 0;
        }
        .header {
            text-align: center;
            margin-bottom: 10px;
            position: relative;
        }
        .logo {
            width: 80px;
            margin-bottom: 10px;
        }
        .header h1 {
            font-size: 14pt;
            margin: 0;
            text-transform: uppercase;
        }
        .header h2 {
            font-size: 16pt;
            margin: 2px 0;
            text-transform: uppercase;
            font-weight: bold;
        }
        .header h3 {
            font-size: 13pt;
            margin: 2px 0;
            text-transform: uppercase;
        }
        .header p {
            font-size: 9pt;
            margin: 2px 0;
            font-style: italic;
        }
        .line {
            border-bottom: 3px solid #000;
            margin-bottom: 2px;
        }
        .line-thin {
            border-bottom: 1px solid #000;
            margin-bottom: 20px;
        }
        .content {
            padding: 0 20px;
        }
        .section-title {
            font-weight: bold;
            margin-top: 20px;
            margin-bottom: 10px;
            text-transform: uppercase;
        }
        .no-pendaftaran {
            float: right;
            font-weight: bold;
            font-size: 12pt;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }
        td {
            vertical-align: top;
            padding: 3px 0;
        }
        .label-cell {
            width: 200px;
        }
        .colon-cell {
            width: 20px;
            text-align: center;
        }
        .value-cell {
            font-weight: bold;
        }
        .list-num {
            width: 25px;
        }
    </style>
</head>
<body>
    <div class="header">
        @if($logoBase64)
            <img src="{{ $logoBase64 }}" class="logo">
        @endif
        <h1>PANITIA PENERIMAAN SANTRI BARU (PSB)</h1>
        <h2>{{ $pengaturan->nama_instansi ?? 'PESANTREN PERSATUAN ISLAM 80 AL AMIN' }}</h2>
        <h3>TINGKAT {{ $pendaftaran->nama_unit }} TAHUN {{ $pendaftaran->tahun_ajaran }}</h3>
        <p>{{ $pengaturan->alamat ?? 'Jln. Raya Ancol 1 No. 27 Kecamatan Sindangkasih Kabupaten Ciamis' }} Telp. {{ $pengaturan->no_hp ?? '085162940080' }}</p>
        <p>e-mail : {{ $pengaturan->email ?? 'ppi80alamin@gmail.com' }} - web : https://persis80alamin.com</p>
    </div>
    <div class="line"></div>
    <div class="line-thin"></div>

    <div class="content">
        <div class="no-pendaftaran">
            Nomor Pendaftaran : {{ $pendaftaran->no_register }}
        </div>
        
        <div class="section-title">A. DATA PESERTA DIDIK</div>
        <table>
            <tr>
                <td class="list-num">1.</td>
                <td class="label-cell">NISN</td>
                <td class="colon-cell">:</td>
                <td class="value-cell">{{ $pendaftaran->nisn ?? '-' }}</td>
            </tr>
            <tr>
                <td class="list-num">2.</td>
                <td class="label-cell">Nama Lengkap</td>
                <td class="colon-cell">:</td>
                <td class="value-cell">{{ $pendaftaran->nama_lengkap }}</td>
            </tr>
            <tr>
                <td class="list-num">3.</td>
                <td class="label-cell">Tempat / Tanggal Lahir</td>
                <td class="colon-cell">:</td>
                <td class="value-cell">{{ $pendaftaran->tempat_lahir }}, {{ $pendaftaran->tanggal_lahir ? \Carbon\Carbon::parse($pendaftaran->tanggal_lahir)->translatedFormat('d F Y') : '-' }}</td>
            </tr>
            <tr>
                <td class="list-num">4.</td>
                <td class="label-cell">Jenis Kelamin</td>
                <td class="colon-cell">:</td>
                <td class="value-cell">{{ $pendaftaran->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
            </tr>
            <tr>
                <td class="list-num">5.</td>
                <td class="label-cell">Anak Ke</td>
                <td class="colon-cell">:</td>
                <td class="value-cell">{{ $pendaftaran->anak_ke }}</td>
            </tr>
            <tr>
                <td class="list-num">6.</td>
                <td class="label-cell">Jumlah Saudara</td>
                <td class="colon-cell">:</td>
                <td class="value-cell">{{ $pendaftaran->jumlah_saudara }}</td>
            </tr>
        </table>

        <div class="section-title">B. ALAMAT</div>
        <table>
            <tr>
                <td class="list-num">1.</td>
                <td class="label-cell">Kp/Jln.</td>
                <td class="colon-cell">:</td>
                <td class="value-cell">{{ $pendaftaran->alamat }}</td>
            </tr>
            <tr>
                <td class="list-num">2.</td>
                <td class="label-cell">Kelurahan</td>
                <td class="colon-cell">:</td>
                <td class="value-cell">{{ $pendaftaran->desa }}</td>
            </tr>
            <tr>
                <td class="list-num">3.</td>
                <td class="label-cell">Kecamatan</td>
                <td class="colon-cell">:</td>
                <td class="value-cell">{{ $pendaftaran->kecamatan }}</td>
            </tr>
            <tr>
                <td class="list-num">4.</td>
                <td class="label-cell">Kota / Kabupaten</td>
                <td class="colon-cell">:</td>
                <td class="value-cell">{{ $pendaftaran->kabupaten }}</td>
            </tr>
            <tr>
                <td class="list-num">5.</td>
                <td class="label-cell">Provinsi</td>
                <td class="colon-cell">:</td>
                <td class="value-cell">{{ $pendaftaran->provinsi }}</td>
            </tr>
        </table>

        <div class="section-title">C. INFORMASI ORANG TUA</div>
        <table>
            <tr>
                <td class="list-num">1.</td>
                <td class="label-cell">NIK Ayah</td>
                <td class="colon-cell">:</td>
                <td class="value-cell">{{ $pendaftaran->nik_ayah }}</td>
            </tr>
            <tr>
                <td class="list-num">2.</td>
                <td class="label-cell">Nama Ayah</td>
                <td class="colon-cell">:</td>
                <td class="value-cell">{{ $pendaftaran->nama_ayah }}</td>
            </tr>
            <tr>
                <td class="list-num">3.</td>
                <td class="label-cell">Pendidikan Ayah</td>
                <td class="colon-cell">:</td>
                <td class="value-cell">{{ $pendaftaran->pendidikan_ayah }}</td>
            </tr>
            <tr>
                <td class="list-num">4.</td>
                <td class="label-cell">Pekerjaan Ayah</td>
                <td class="colon-cell">:</td>
                <td class="value-cell">{{ $pendaftaran->pekerjaan_ayah }}</td>
            </tr>
            <tr>
                <td class="list-num">5.</td>
                <td class="label-cell">NIK Ibu</td>
                <td class="colon-cell">:</td>
                <td class="value-cell">{{ $pendaftaran->nik_ibu }}</td>
            </tr>
            <tr>
                <td class="list-num">6.</td>
                <td class="label-cell">Nama Ibu</td>
                <td class="colon-cell">:</td>
                <td class="value-cell">{{ $pendaftaran->nama_ibu }}</td>
            </tr>
            <tr>
                <td class="list-num">7.</td>
                <td class="label-cell">Pendidikan Ibu</td>
                <td class="colon-cell">:</td>
                <td class="value-cell">{{ $pendaftaran->pendidikan_ibu }}</td>
            </tr>
            <tr>
                <td class="list-num">8.</td>
                <td class="label-cell">Pekerjaan Ibu</td>
                <td class="colon-cell">:</td>
                <td class="value-cell">{{ $pendaftaran->pekerjaan_ibu }}</td>
            </tr>
            <tr>
                <td class="list-num">9.</td>
                <td class="label-cell">No. WhatsApp</td>
                <td class="colon-cell">:</td>
                <td class="value-cell">{{ $pendaftaran->no_hp }}</td>
            </tr>
        </table>
    </div>
</body>
</html>
