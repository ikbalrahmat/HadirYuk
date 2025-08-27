{{-- <!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Risalah Rapat</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 14px; }
        h2, h3 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 6px; }
    </style>
</head>
<body>
    <h2>RISALAH RAPAT</h2>
    <p><strong>Agenda:</strong> {{ $risalah->agenda }}</p>
    <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($risalah->tanggal)->format('d M Y') }}</p>
    <p><strong>Tempat:</strong> {{ $risalah->tempat }}</p>
    <p><strong>Pimpinan:</strong> {{ $risalah->pimpinan }}</p>
    <p><strong>Pencatat:</strong> {{ $risalah->pencatat }}</p>
    <p><strong>Jenis Rapat:</strong> {{ $risalah->jenis_rapat }}</p>

    <h3>Penjelasan Rapat</h3>
    <p>{{ $risalah->penjelasan }}</p>

    <h3>Kesimpulan</h3>
    <p>{{ $risalah->kesimpulan }}</p>

    <h3>Lampiran Daftar Hadir</h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NP</th>
                <th>Jabatan</th>
                <th>Unit Kerja</th>
            </tr>
        </thead>
        <tbody>
            @foreach($presenceDetails as $i => $p)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->np }}</td>
                    <td>{{ $p->jabatan }}</td>
                    <td>{{ $p->asal_instansi }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html> --}}

{{--
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Risalah Rapat</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 14px; }
        h2 { text-align: center; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        table, th, td { border: 1px solid black; padding: 6px; }
    </style>
</head>
<body>
    <h2>Risalah Rapat</h2>

    <p><strong>Agenda:</strong> {{ $risalah->agenda }}</p>
    <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($risalah->tanggal)->format('d M Y') }}</p>
    <p><strong>Tempat:</strong> {{ $risalah->tempat }}</p>
    <p><strong>Pimpinan:</strong> {{ $risalah->pimpinan }}</p>
    <p><strong>Pencatat:</strong> {{ $risalah->pencatat }}</p>
    <p><strong>Jenis Rapat:</strong> {{ $risalah->jenis_rapat }}</p>

    <h3>Penjelasan</h3>
    <p>{{ $risalah->penjelasan }}</p>

    <h3>Kesimpulan</h3>
    <p>{{ $risalah->kesimpulan }}</p>

    <h3>Daftar Hadir</h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NP</th>
                <th>Jabatan</th>
                <th>Instansi</th>
                <th>Tanda Tangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($presenceDetails as $detail)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $detail->nama }}</td>
                    <td>{{ $detail->np }}</td>
                    <td>{{ $detail->jabatan }}</td>
                    <td>{{ $detail->asal_instansi }}</td>
                    <td>
                        @if ($detail->tanda_tangan)
                            <img src="{{ asset('uploads/'.$detail->tanda_tangan) }}" style="max-height:40px;">
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html> --}}
{{--
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Risalah Rapat</title>
  <style>
    * { font-family: Arial, sans-serif; font-size: 13px; }
    h2, h3 { text-align: center; margin: 10px 0; }
    table { width: 100%; border-collapse: collapse; margin-top: 10px; }
    table, th, td { border: 1px solid black; padding: 6px; }
    .info-table td { border: none; padding: 4px; }
    .signature { margin-top: 50px; text-align: right; }
    .page-break { page-break-before: always; }

    /* --- Lampiran Daftar Hadir --- */
    .main-table { width: 100%; border-collapse: collapse; border: 1px solid black; margin-bottom: 20px; }
    .main-table td, .main-table th { border: 1px solid black; padding: 6px; vertical-align: top; }
    .logo-cell { width: 150px; text-align: center; padding: 20px; }
    .logo-cell img { width: 120px; object-fit: contain; }
    .header-title { text-align: center; font-weight: bold; font-size: 18px; text-transform: uppercase; }
    .info-label { width: 25%; font-weight: bold; }
    .info-value { width: 65%; }
    .table-peserta { width: 100%; border-collapse: collapse; margin-top: 10px; }
    .table-peserta th, .table-peserta td { border: 1px solid black; padding: 8px; text-align: center; }
    .table-peserta td.text-left { text-align: left; }
  </style>
</head>
<body>
  <!-- ================== HALAMAN 1: RISALAH ================== -->
  <h2>Risalah Rapat</h2>

  <table class="info-table">
      <tr><td><strong>Agenda</strong></td><td>: {{ $risalah->agenda }}</td></tr>
      <tr><td><strong>Tanggal</strong></td><td>: {{ \Carbon\Carbon::parse($risalah->tanggal)->translatedFormat('l, d F Y') }}</td></tr>
      <tr><td><strong>Tempat</strong></td><td>: {{ $risalah->tempat }}</td></tr>
      <tr><td><strong>Pimpinan</strong></td><td>: {{ $risalah->pimpinan }}</td></tr>
      <tr><td><strong>Pencatat</strong></td><td>: {{ $risalah->pencatat }}</td></tr>
      <tr><td><strong>Jenis Rapat</strong></td><td>: {{ $risalah->jenis_rapat }}</td></tr>
  </table>

  <h3>Penjelasan</h3>
  <p>{{ $risalah->penjelasan }}</p>

  <h3>Kesimpulan</h3>
  <p>{{ $risalah->kesimpulan }}</p>

  <!-- Tanda Tangan Pimpinan -->
  <div class="signature">
    <p><strong>{{ $risalah->pimpinan }}</strong></p>
    <p>Pimpinan Rapat</p>
  </div>

  <!-- ================== HALAMAN 2: DAFTAR HADIR ================== -->
  <div class="page-break"></div>

  @php
    $path = public_path('assets/logo.png');
    $logo = null;
    if (file_exists($path)) {
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $logo = 'data:image/' . $type . ';base64,' . base64_encode($data);
    }
  @endphp

  <!-- HEADER -->
  <table class="main-table">
    <tr>
      <td class="logo-cell" rowspan="5">
        @if ($logo)
          <img src="{{ $logo }}">
        @endif
      </td>
      <td colspan="2" class="header-title">DAFTAR HADIR</td>
    </tr>
    <tr>
      <td class="info-label">Agenda / Kegiatan :</td>
      <td class="info-value">{{ $risalah->agenda }}</td>
    </tr>
    <tr>
      <td class="info-label">Hari / Tanggal :</td>
      <td class="info-value">{{ \Carbon\Carbon::parse($risalah->tanggal)->translatedFormat('l, d F Y') }}</td>
    </tr>
    <tr>
      <td class="info-label">Waktu :</td>
      <td class="info-value">{{ $risalah->waktu_mulai }} - Selesai</td>
    </tr>
    <tr>
      <td class="info-label">Tempat :</td>
      <td class="info-value">{{ $risalah->tempat }}</td>
    </tr>
  </table>

  <!-- TABEL PESERTA -->
  <table class="table-peserta">
    <thead>
      <tr>
        <th width="30">No</th>
        <th>Nama</th>
        <th width="60">NP</th>
        <th>Jabatan</th>
        <th>Unit Kerja / Instansi</th>
        <th width="120">Tanda Tangan</th>
      </tr>
    </thead>
    <tbody>
      @forelse($presenceDetails as $detail)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td class="text-left">{{ $detail->nama }}</td>
          <td>{{ $detail->np }}</td>
          <td class="text-left">{{ $detail->jabatan }}</td>
          <td class="text-left">{{ $detail->asal_instansi }}</td>
          <td>
            @if ($detail->tanda_tangan)
              @php
                $ttdPath = public_path('uploads/' . $detail->tanda_tangan);
                if (file_exists($ttdPath)) {
                    $ttdType = pathinfo($ttdPath, PATHINFO_EXTENSION);
                    $ttdData = file_get_contents($ttdPath);
                    $ttdBase64 = 'data:image/' . $ttdType . ';base64,' . base64_encode($ttdData);
                } else {
                    $ttdBase64 = null;
                }
              @endphp
              @if ($ttdBase64)
                <img src="{{ $ttdBase64 }}" style="max-height:40px;">
              @endif
            @endif
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="6">Tidak ada data peserta.</td>
        </tr>
      @endforelse
    </tbody>
  </table>

</body>
</html> --}}
{{--
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Risalah Rapat</title>
  <style>
    * { font-family: Arial, sans-serif; font-size: 13px; }
    h2, h3 { text-align: center; margin: 10px 0; }
    table { width: 100%; border-collapse: collapse; margin-top: 10px; }
    table, th, td { border: 1px solid black; padding: 6px; }
    .info-table td { border: none; padding: 4px; }
    .signature { margin-top: 50px; text-align: right; }
    .page-break { page-break-before: always; }

    /* Header tabel risalah */
    .header-table { width: 100%; border: 1px solid black; }
    .header-table td { border: 1px solid black; padding: 6px; vertical-align: top; }
    .header-title { text-align: center; font-weight: bold; font-size: 14px; }

    /* Section penjelasan & kesimpulan */
    .section-header {
      background: #cfc9a5;
      font-weight: bold;
      padding: 6px;
    }
    .section-body {
      border: 1px solid black;
      padding: 10px;
      min-height: 50px;
    }

    /* --- Lampiran Daftar Hadir --- */
    .main-table { width: 100%; border-collapse: collapse; border: 1px solid black; margin-bottom: 20px; }
    .main-table td, .main-table th { border: 1px solid black; padding: 6px; vertical-align: top; }
    .logo-cell { width: 150px; text-align: center; padding: 20px; }
    .logo-cell img { width: 120px; object-fit: contain; }
    .header-title2 { text-align: center; font-weight: bold; font-size: 18px; text-transform: uppercase; }
    .info-label { width: 25%; font-weight: bold; }
    .info-value { width: 65%; }
    .table-peserta { width: 100%; border-collapse: collapse; margin-top: 10px; }
    .table-peserta th, .table-peserta td { border: 1px solid black; padding: 8px; text-align: center; }
    .table-peserta td.text-left { text-align: left; }
  </style>
</head>
<body>
  <!-- ================== HALAMAN 1: RISALAH ================== -->

  <!-- HEADER -->
  <table class="header-table">
    <tr>
      <td rowspan="3" style="width:120px; text-align:center;">
        @php
          $path = public_path('assets/logo.png');
          $logo = null;
          if (file_exists($path)) {
              $type = pathinfo($path, PATHINFO_EXTENSION);
              $data = file_get_contents($path);
              $logo = 'data:image/' . $type . ';base64,' . base64_encode($data);
          }
        @endphp
        @if ($logo)
          <img src="{{ $logo }}" style="width:100px;">
        @endif
      </td>
      <td colspan="2" class="header-title">RISALAH RAPAT</td>
    </tr>
    <tr>
      <td style="width:120px;">Hari/Tanggal</td>
      <td>: {{ \Carbon\Carbon::parse($risalah->tanggal)->translatedFormat('F Y') }}</td>
    </tr>
    <tr>
      <td>Waktu</td>
      <td>: {{ $risalah->waktu_mulai }} s.d Selesai</td>
    </tr>
    <tr>
      <td>Tempat</td>
      <td colspan="2">: {{ $risalah->tempat }}</td>
    </tr>
  </table>

  <br>

  <!-- DETAIL RAPAT -->
  <table style="width:100%; border:1px solid black;">
    <tr>
      <td style="width:150px;"><strong>Agenda</strong></td>
      <td>: {{ $risalah->agenda }}</td>
    </tr>
    <tr>
      <td><strong>Pimpinan Rapat</strong></td>
      <td>: {{ $risalah->pimpinan }}</td>
    </tr>
    <tr>
      <td><strong>Pencatat Rapat</strong></td>
      <td>: {{ $risalah->pencatat }}</td>
    </tr>
    <tr>
      <td><strong>Jenis Rapat</strong></td>
      <td>
        {!! $risalah->jenis_rapat == 'Entry Meeting' ? '☑' : '☐' !!} Entry Meeting &nbsp;&nbsp;
        {!! $risalah->jenis_rapat == 'Expose Meeting' ? '☑' : '☐' !!} Expose Meeting &nbsp;&nbsp;
        {!! $risalah->jenis_rapat == 'Exit Meeting' ? '☑' : '☐' !!} Exit Meeting &nbsp;&nbsp;
        {!! $risalah->jenis_rapat == 'Lainnya' ? '☑' : '☐' !!} Lainnya
      </td>
    </tr>
  </table>

  <br>

<!-- PENJELASAN & KESIMPULAN -->
<table style="width:100%; border:1px solid black; border-collapse: collapse;">
  <tr>
    <td colspan="2" class="section-header">Penjelasan Rapat</td>
  </tr>
  <tr>
    <td colspan="2" class="section-body">{{ $risalah->penjelasan }}</td>
  </tr>
  <tr>
    <td colspan="2" class="section-header">Kesimpulan</td>
  </tr>
  <tr>
    <td colspan="2" class="section-body">
      {{ $risalah->kesimpulan }}
      <!-- tanda tangan di dalam sel kesimpulan -->
      <div style="margin-top:40px; text-align:right;">
        Jakarta, {{ \Carbon\Carbon::parse($risalah->tanggal)->translatedFormat('F Y') }}<br>
        Pimpinan Rapat<br><br><br>
        <strong>{{ $risalah->pimpinan }}</strong><br>
        Ka.SPI
      </div>
    </td>
  </tr>
</table>




  <!-- ================== HALAMAN 2: DAFTAR HADIR ================== -->
  <div class="page-break"></div>

  <!-- HEADER DAFTAR HADIR -->
  <table class="main-table">
    <tr>
      <td class="logo-cell" rowspan="5">
        @if ($logo)
          <img src="{{ $logo }}">
        @endif
      </td>
      <td colspan="2" class="header-title2">DAFTAR HADIR</td>
    </tr>
    <tr>
      <td class="info-label">Agenda / Kegiatan :</td>
      <td class="info-value">{{ $risalah->agenda }}</td>
    </tr>
    <tr>
      <td class="info-label">Hari / Tanggal :</td>
      <td class="info-value">{{ \Carbon\Carbon::parse($risalah->tanggal)->translatedFormat('l, d F Y') }}</td>
    </tr>
    <tr>
      <td class="info-label">Waktu :</td>
      <td class="info-value">{{ $risalah->waktu_mulai }} - Selesai</td>
    </tr>
    <tr>
      <td class="info-label">Tempat :</td>
      <td class="info-value">{{ $risalah->tempat }}</td>
    </tr>
  </table>

  <!-- TABEL PESERTA -->
  <table class="table-peserta">
    <thead>
      <tr>
        <th width="30">No</th>
        <th>Nama</th>
        <th width="60">NP</th>
        <th>Jabatan</th>
        <th>Unit Kerja / Instansi</th>
        <th width="120">Tanda Tangan</th>
      </tr>
    </thead>
    <tbody>
      @forelse($presenceDetails as $detail)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td class="text-left">{{ $detail->nama }}</td>
          <td>{{ $detail->np }}</td>
          <td class="text-left">{{ $detail->jabatan }}</td>
          <td class="text-left">{{ $detail->asal_instansi }}</td>
          <td>
            @if ($detail->tanda_tangan)
              @php
                $ttdPath = public_path('uploads/' . $detail->tanda_tangan);
                if (file_exists($ttdPath)) {
                    $ttdType = pathinfo($ttdPath, PATHINFO_EXTENSION);
                    $ttdData = file_get_contents($ttdPath);
                    $ttdBase64 = 'data:image/' . $ttdType . ';base64,' . base64_encode($ttdData);
                } else {
                    $ttdBase64 = null;
                }
              @endphp
              @if ($ttdBase64)
                <img src="{{ $ttdBase64 }}" style="max-height:40px;">
              @endif
            @endif
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="6">Tidak ada data peserta.</td>
        </tr>
      @endforelse
    </tbody>
  </table>

</body>
</html> --}}

{{-- <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Risalah Rapat</title>
    <style>
        * { font-family: Arial, sans-serif; font-size: 13px; }
        h2, h3 { text-align: center; margin: 10px 0; }
        /* Reset default table padding/margin to ensure consistent borders */
        table { width: 100%; border-collapse: collapse; }
        table, th, td { border: 1px solid black; padding: 6px; vertical-align: top; }
        .page-break { page-break-before: always; }

        /* Header (RISALAH RAPAT) styles */
        .header-table { margin-bottom: 10px; } /* Space below header */
        .header-table td { border: 1px solid black; padding: 6px; vertical-align: top; }
        .header-logo-cell { width: 120px; text-align: center; padding: 20px 0; }
        .header-logo-cell img { width: 100px; object-fit: contain; }
        .header-title-cell { text-align: center; font-weight: bold; font-size: 14px; }
        .header-info-label { width: 90px; } /* Fixed width for labels like Hari/tanggal */
        .header-info-colon { width: 10px; text-align: center; } /* For the colon */

        /* Detail Rapat (Agenda, Pimpinan, etc.) styles */
        .detail-table { margin-bottom: 10px; } /* Space below detail table */
        .detail-table td { border: 1px solid black; padding: 6px; vertical-align: top; }
        .detail-label-cell { width: 120px; font-weight: bold; } /* Fixed width for detail labels */
        .detail-colon-cell { width: 10px; text-align: center; } /* For the colon */
        .jenis-rapat-options label { margin-right: 15px; display: inline-block; } /* Spacing for checkboxes */

        /* Penjelasan & Kesimpulan sections */
        .section-header {
            background: #cfc9a5; /* Specific background color */
            font-weight: bold;
            padding: 6px;
            text-transform: uppercase;
        }
        .signature-block {
            margin-top: 40px;
            text-align: right;
        }
        .signature-name {
            text-decoration: underline;
            font-weight: bold; /* Added bold as it appears bold in the image */
        }

        /* Attendance List (Daftar Hadir) styles */
        .main-table-attendance { border: 1px solid black; margin-bottom: 20px; }
        .main-table-attendance td, .main-table-attendance th { border: 1px solid black; padding: 6px; vertical-align: top; }
        .logo-cell-attendance { width: 150px; text-align: center; padding: 20px; }
        .logo-cell-attendance img { width: 120px; object-fit: contain; }
        .header-title-attendance { text-align: center; font-weight: bold; font-size: 18px; text-transform: uppercase; }
        .info-label-attendance { width: 25%; font-weight: bold; }
        .info-value-attendance { width: 65%; }
        .table-peserta { margin-top: 10px; }
        .table-peserta th, .table-peserta td { border: 1px solid black; padding: 8px; text-align: center; }
        .table-peserta td.text-left { text-align: left; }
    </style>
</head>
<body>
<table class="header-table">
    <tr>
        <td rowspan="4" class="header-logo-cell">
            @php
                $path = public_path('assets/logo.png');
                $logo = null;
                if (file_exists($path)) {
                    $type = pathinfo($path, PATHINFO_EXTENSION);
                    $data = file_get_contents($path);
                    $logo = 'data:image/' . $type . ';base64,' . base64_encode($data);
                }
            @endphp
            @if ($logo)
                <img src="{{ $logo }}">
            @else
                PERURI
            @endif
        </td>
        <td colspan="3" class="header-title-cell">RISALAH RAPAT</td>
    </tr>
    <tr>
        <td class="header-info-label">Hari/tanggal</td>
        <td class="header-info-colon">:</td>
        <td>{{ \Carbon\Carbon::parse($risalah->tanggal)->translatedFormat('F Y') }}</td>
    </tr>
    <tr>
        <td class="header-info-label">Waktu</td>
        <td class="header-info-colon">:</td>
        <td>{{ $risalah->waktu_mulai }} s.d Selesai</td>
    </tr>
    <tr>
        <td class="header-info-label">Tempat</td>
        <td class="header-info-colon">:</td>
        <td>{{ $risalah->tempat }}</td>
    </tr>
</table>

<table class="detail-table">
    <tr>
        <td class="detail-label-cell">Agenda</td>
        <td class="detail-colon-cell">:</td>
        <td>{{ $risalah->agenda }}</td>
    </tr>
    <tr>
        <td class="detail-label-cell">Pimpinan Rapat</td>
        <td class="detail-colon-cell">:</td>
        <td>{{ $risalah->pimpinan }}</td>
    </tr>
    <tr>
        <td class="detail-label-cell">Peserta Rapat</td>
        <td class="detail-colon-cell">:</td>
        <td></td> </tr>
    <tr>
        <td class="detail-label-cell">Pencatat Rapat</td>
        <td class="detail-colon-cell">:</td>
        <td>{{ $risalah->pencatat }}</td>
    </tr>
    <tr>
        <td class="detail-label-cell">Jenis Rapat</td>
        <td class="detail-colon-cell">:</td>
        <td class="jenis-rapat-options">
            <label>{!! $risalah->jenis_rapat == 'Entry Meeting' ? '☑' : '☐' !!} Entry Meeting</label>
            <label>{!! $risalah->jenis_rapat == 'Expose Meeting' ? '☑' : '☐' !!} Expose Meeting</label>
            <label>{!! $risalah->jenis_rapat == 'Exit Meeting' ? '☑' : '☐' !!} Exit Meeting</label>
            <label>{!! $risalah->jenis_rapat == 'Lainnya' ? '☑' : '☐' !!} Lainnya</label>
        </td>
    </tr>
</table>

<table>
    <tr>
        <td class="section-header" colspan="2">Penjelasan Rapat</td>
    </tr>
    <tr>
        <td colspan="2" style="min-height:80px; padding:10px;">
            {{ $risalah->penjelasan }}
        </td>
    </tr>
    <tr>
        <td class="section-header" colspan="2">Kesimpulan</td>
    </tr>
    <tr>
        <td colspan="2" style="min-height:100px; padding:10px;">
            {{ $risalah->kesimpulan }}
            <div class="signature-block">
                Jakarta, {{ \Carbon\Carbon::parse($risalah->tanggal)->translatedFormat('F Y') }}<br>
                Pimpinan Rapat<br><br><br>
                <span class="signature-name">{{ $risalah->pimpinan }}</span><br>
                Ka SPI
            </div>
        </td>
    </tr>
</table>

<div class="page-break"></div>

<table class="main-table-attendance">
    <tr>
        <td class="logo-cell-attendance" rowspan="5">
            @if ($logo)
                <img src="{{ $logo }}">
            @endif
        </td>
        <td colspan="2" class="header-title-attendance">DAFTAR HADIR</td>
    </tr>
    <tr>
        <td class="info-label-attendance">Agenda / Kegiatan :</td>
        <td class="info-value-attendance">{{ $risalah->agenda }}</td>
    </tr>
    <tr>
        <td class="info-label-attendance">Hari / Tanggal :</td>
        <td class="info-value-attendance">{{ \Carbon\Carbon::parse($risalah->tanggal)->translatedFormat('l, d F Y') }}</td>
    </tr>
    <tr>
        <td class="info-label-attendance">Waktu :</td>
        <td class="info-value-attendance">{{ $risalah->waktu_mulai }} - Selesai</td>
    </tr>
    <tr>
        <td class="info-label-attendance">Tempat :</td>
        <td class="info-value-attendance">{{ $risalah->tempat }}</td>
    </tr>
</table>

<table class="table-peserta">
    <thead>
    <tr>
        <th width="30">No</th>
        <th>Nama</th>
        <th width="60">NP</th>
        <th>Jabatan</th>
        <th>Unit Kerja / Instansi</th>
        <th width="120">Tanda Tangan</th>
    </tr>
    </thead>
    <tbody>
    @forelse($presenceDetails as $detail)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td class="text-left">{{ $detail->nama }}</td>
            <td>{{ $detail->np }}</td>
            <td class="text-left">{{ $detail->jabatan }}</td>
            <td class="text-left">{{ $detail->asal_instansi }}</td>
            <td>
                @if ($detail->tanda_tangan)
                    @php
                        $ttdPath = public_path('uploads/' . $detail->tanda_tangan);
                        if (file_exists($ttdPath)) {
                            $ttdType = pathinfo($ttdPath, PATHINFO_EXTENSION);
                            $ttdData = file_get_contents($ttdPath);
                            $ttdBase64 = 'data:image/' . $ttdType . ';base64,' . base64_encode($ttdData);
                        } else {
                            $ttdBase64 = null;
                        }
                    @endphp
                    @if ($ttdBase64)
                        <img src="{{ $ttdBase64 }}" style="max-height:40px;">
                    @endif
                @endif
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="6">Tidak ada data peserta.</td>
        </tr>
    @endforelse
    </tbody>
</table>

</body>
</html> --}}
{{--
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Risalah Rapat</title>
    <style>
        * { font-family: Arial, sans-serif; font-size: 13px; }
        h2, h3 { text-align: center; margin: 10px 0; }
        table { width: 100%; border-collapse: collapse; }
        table, th, td { border: 1px solid black; padding: 6px; vertical-align: top; }
        .page-break { page-break-before: always; }

        .header-table { margin-bottom: 10px; }
        .header-logo-cell { width: 120px; text-align: center; padding: 20px 0; }
        .header-logo-cell img { width: 100px; object-fit: contain; }
        .header-title-cell { text-align: center; font-weight: bold; font-size: 14px; }
        .header-info-label { width: 90px; }

        .main-body-table { margin-top: 10px; }
        .separator-grey { background: #808080; height: 10px; padding: 0; }
        .section-header { background: #cfc9a5; font-weight: bold; text-transform: uppercase; }
        .jenis-rapat-options label { margin-right: 15px; display: inline-block; }

        .signature-block { margin-top: 40px; text-align: right; }
        .signature-name { text-decoration: underline; font-weight: bold; }

        .main-table-attendance { margin-bottom: 20px; }
        .logo-cell-attendance { width: 150px; text-align: center; padding: 20px; }
        .logo-cell-attendance img { width: 120px; object-fit: contain; }
        .header-title-attendance { font-weight: bold; font-size: 18px; text-transform: uppercase; }
        .info-label-attendance { width: 25%; font-weight: bold; }
        .table-peserta td.text-left { text-align: left; }
    </style>
</head>
<body>
<table class="header-table">
    <tr>
        <td rowspan="4" class="header-logo-cell">
            @php
                $path = public_path('assets/logo.png');
                $logo = file_exists($path) ? 'data:image/' . pathinfo($path, PATHINFO_EXTENSION) . ';base64,' . base64_encode(file_get_contents($path)) : null;
            @endphp
            @if ($logo)
                <img src="{{ $logo }}">
            @else
                PERURI
            @endif
        </td>
        <td colspan="2" class="header-title-cell">RISALAH RAPAT</td>
    </tr>
    <tr>
        <td class="header-info-label">Hari/tanggal</td>
        <td>: {{ \Carbon\Carbon::parse($risalah->tanggal)->translatedFormat('F Y') }}</td>
    </tr>
    <tr>
        <td class="header-info-label">Waktu</td>
        <td>: {{ $risalah->waktu_mulai }} s.d Selesai</td>
    </tr>
    <tr>
        <td class="header-info-label">Tempat</td>
        <td>: {{ $risalah->tempat }}</td>
    </tr>
</table>

<table class="main-body-table">
    <tr>
        <td colspan="2">Agenda : {{ $risalah->agenda }}</td>
    </tr>
    <tr>
        <td>Pimpinan Rapat : {{ $risalah->pimpinan }}</td>
        <td>Pencatat Rapat : {{ $risalah->pencatat }}</td>
    </tr>
    <tr>
        <td colspan="2">Peserta Rapat : </td>
    </tr>
    <tr>
        <td colspan="2">
            <span>Jenis Rapat :</span>
            <span class="jenis-rapat-options">
                <label>{!! $risalah->jenis_rapat == 'Entry Meeting' ? '☑' : '☐' !!} Entry Meeting</label>
                <label>{!! $risalah->jenis_rapat == 'Expose Meeting' ? '☑' : '☐' !!} Expose Meeting</label>
                <label>{!! $risalah->jenis_rapat == 'Exit Meeting' ? '☑' : '☐' !!} Exit Meeting</label>
                <label>{!! $risalah->jenis_rapat == 'Lainnya' ? '☑' : '☐' !!} Lainnya</label>
            </span>
        </td>
    </tr>
    <tr>
        <td colspan="2" class="separator-grey"></td>
    </tr>
    <tr>
        <td class="section-header" colspan="2">Penjelasan Rapat</td>
    </tr>
    <tr>
        <td colspan="2" style="min-height:80px; padding:10px;">{{ $risalah->penjelasan }}</td>
    </tr>
    <tr>
        <td class="section-header" colspan="2">Kesimpulan</td>
    </tr>
    <tr>
        <td colspan="2" style="min-height:100px; padding:10px;">
            {{ $risalah->kesimpulan }}
            <div class="signature-block">
                Jakarta, {{ \Carbon\Carbon::parse($risalah->tanggal)->translatedFormat('F Y') }}<br>
                Pimpinan Rapat<br><br><br>
                <span class="signature-name">{{ $risalah->pimpinan }}</span><br>
                Ka SPI
            </div>
        </td>
    </tr>
</table>
<div class="page-break"></div>

<table class="main-table-attendance">
    <tr>
        <td class="logo-cell-attendance" rowspan="5">
            @if ($logo)
                <img src="{{ $logo }}">
            @endif
        </td>
        <td colspan="2" class="header-title-attendance">DAFTAR HADIR</td>
    </tr>
    <tr>
        <td class="info-label-attendance">Agenda / Kegiatan :</td>
        <td class="info-value-attendance">{{ $risalah->agenda }}</td>
    </tr>
    <tr>
        <td class="info-label-attendance">Hari / Tanggal :</td>
        <td class="info-value-attendance">{{ \Carbon\Carbon::parse($risalah->tanggal)->translatedFormat('l, d F Y') }}</td>
    </tr>
    <tr>
        <td class="info-label-attendance">Waktu :</td>
        <td class="info-value-attendance">{{ $risalah->waktu_mulai }} - Selesai</td>
    </tr>
    <tr>
        <td class="info-label-attendance">Tempat :</td>
        <td class="info-value-attendance">{{ $risalah->tempat }}</td>
    </tr>
</table>

<table class="table-peserta">
    <thead>
    <tr>
        <th width="30">No</th>
        <th>Nama</th>
        <th width="60">NP</th>
        <th>Jabatan</th>
        <th>Unit Kerja / Instansi</th>
        <th width="120">Tanda Tangan</th>
    </tr>
    </thead>
    <tbody>
    @forelse($presenceDetails as $detail)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td class="text-left">{{ $detail->nama }}</td>
            <td>{{ $detail->np }}</td>
            <td class="text-left">{{ $detail->jabatan }}</td>
            <td class="text-left">{{ $detail->asal_instansi }}</td>
            <td>
                @if ($detail->tanda_tangan)
                    @php
                        $ttdPath = public_path('uploads/' . $detail->tanda_tangan);
                        $ttdBase64 = file_exists($ttdPath) ? 'data:image/' . pathinfo($ttdPath, PATHINFO_EXTENSION) . ';base64,' . base64_encode(file_get_contents($ttdPath)) : null;
                    @endphp
                    @if ($ttdBase64)
                        <img src="{{ $ttdBase64 }}" style="max-height:40px;">
                    @endif
                @endif
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="6">Tidak ada data peserta.</td>
        </tr>
    @endforelse
    </tbody>
</table>
</body>
</html> --}}
{{--

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Risalah Rapat</title>
    <style>
        * { font-family: Arial, sans-serif; font-size: 13px; }
        h2, h3 { text-align: center; margin: 10px 0; }
        table { width: 100%; border-collapse: collapse; }
        table, th, td { border: 1px solid black; padding: 6px; vertical-align: top; }
        .page-break { page-break-before: always; }

        /* Header Table Styles */
        .header-table { margin-bottom: 10px; }
        .header-logo-cell { width: 120px; text-align: center; padding: 20px 0; }
        .header-logo-cell img { width: 100px; object-fit: contain; }
        .header-title-cell { text-align: center; font-weight: bold; font-size: 14px; }
        .header-info-label { width: 90px; }

        /* Main Body Table Styles */
        .main-body-table { margin-top: 10px; }
        .separator-grey { background: #808080; height: 10px; padding: 0; }
        .section-header { background: #cfc9a5; font-weight: bold; text-transform: uppercase; }
        .jenis-rapat-options label { margin-right: 15px; display: inline-block; }

        /* Signature Block */
        .signature-block { margin-top: 40px; text-align: right; }
        .signature-name { text-decoration: underline; font-weight: bold; }

        /* Attendance List Styles */
        .main-table-attendance { margin-bottom: 20px; }
        .logo-cell-attendance { width: 150px; text-align: center; padding: 20px; }
        .logo-cell-attendance img { width: 120px; object-fit: contain; }
        .header-title-attendance { font-weight: bold; font-size: 18px; text-transform: uppercase; }
        .info-label-attendance { width: 25%; font-weight: bold; }
        .table-peserta td.text-left { text-align: left; }
    </style>
</head>
<body>
<table class="header-table">
    <tr>
        <td rowspan="4" class="header-logo-cell">
            @php
                $path = public_path('assets/logo.png');
                $logo = file_exists($path) ? 'data:image/' . pathinfo($path, PATHINFO_EXTENSION) . ';base64,' . base64_encode(file_get_contents($path)) : null;
            @endphp
            @if ($logo)
                <img src="{{ $logo }}">
            @else
                PERURI
            @endif
        </td>
        <td colspan="2" class="header-title-cell">RISALAH RAPAT</td>
    </tr>
    <tr>
        <td class="header-info-label">Hari/tanggal</td>
        <td>: {{ \Carbon\Carbon::parse($risalah->tanggal)->translatedFormat('F Y') }}</td>
    </tr>
    <tr>
        <td class="header-info-label">Waktu</td>
        <td>: {{ $risalah->waktu_mulai }} s.d Selesai</td>
    </tr>
    <tr>
        <td class="header-info-label">Tempat</td>
        <td>: {{ $risalah->tempat }}</td>
    </tr>
</table>

<table class="main-body-table">
    <tr>
        <td colspan="2">Agenda : {{ $risalah->agenda }}</td>
    </tr>
    <tr>
        <td>Pimpinan Rapat : {{ $risalah->pimpinan }}</td>
        <td>Pencatat Rapat : {{ $risalah->pencatat }}</td>
    </tr>
    <tr>
        <td colspan="2">Peserta Rapat : Daftar Hadir Terlampir</td>
    </tr>
    <tr>
        <td colspan="2">
            <span>Jenis Rapat :</span>
            <span class="jenis-rapat-options">
                <label>{!! $risalah->jenis_rapat == 'Entry Meeting' ? '☑' : '☐' !!} Entry Meeting</label>
                <label>{!! $risalah->jenis_rapat == 'Expose Meeting' ? '☑' : '☐' !!} Expose Meeting</label>
                <label>{!! $risalah->jenis_rapat == 'Exit Meeting' ? '☑' : '☐' !!} Exit Meeting</label>
                <label>{!! $risalah->jenis_rapat == 'Lainnya' ? '☑' : '☐' !!} Lainnya</label>
            </span>
        </td>
    </tr>
    <tr>
        <td colspan="2" class="separator-grey"></td>
    </tr>
    <tr>
        <td class="section-header" colspan="2">Penjelasan Rapat</td>
    </tr>
    <tr>
        <td colspan="2" style="min-height:80px; padding:10px;">{{ $risalah->penjelasan }}</td>
    </tr>
    <tr>
        <td class="section-header" colspan="2">Kesimpulan</td>
    </tr>
    <tr>
        <td colspan="2" style="min-height:100px; padding:10px;">
            {{ $risalah->kesimpulan }}
            <div class="signature-block">
                Jakarta, {{ \Carbon\Carbon::parse($risalah->tanggal)->translatedFormat('F Y') }}<br>
                Pimpinan Rapat<br><br><br>
                <span class="signature-name">{{ $risalah->pimpinan }}</span><br>
                Ka SPI
            </div>
        </td>
    </tr>
</table>
<div class="page-break"></div>

<table class="main-table-attendance">
    <tr>
        <td class="logo-cell-attendance" rowspan="5">
            @if ($logo)
                <img src="{{ $logo }}">
            @endif
        </td>
        <td colspan="2" class="header-title-attendance">DAFTAR HADIR</td>
    </tr>
    <tr>
        <td class="info-label-attendance">Agenda / Kegiatan :</td>
        <td class="info-value-attendance">{{ $risalah->agenda }}</td>
    </tr>
    <tr>
        <td class="info-label-attendance">Hari / Tanggal :</td>
        <td class="info-value-attendance">{{ \Carbon\Carbon::parse($risalah->tanggal)->translatedFormat('l, d F Y') }}</td>
    </tr>
    <tr>
        <td class="info-label-attendance">Waktu :</td>
        <td class="info-value-attendance">{{ $risalah->waktu_mulai }} - Selesai</td>
    </tr>
    <tr>
        <td class="info-label-attendance">Tempat :</td>
        <td class="info-value-attendance">{{ $risalah->tempat }}</td>
    </tr>
</table>

<table class="table-peserta">
    <thead>
    <tr>
        <th width="30">No</th>
        <th>Nama</th>
        <th width="60">NP</th>
        <th>Jabatan</th>
        <th>Unit Kerja / Instansi</th>
        <th width="120">Tanda Tangan</th>
    </tr>
    </thead>
    <tbody>
    @forelse($presenceDetails as $detail)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td class="text-left">{{ $detail->nama }}</td>
            <td>{{ $detail->np }}</td>
            <td class="text-left">{{ $detail->jabatan }}</td>
            <td class="text-left">{{ $detail->asal_instansi }}</td>
            <td>
                @if ($detail->tanda_tangan)
                    @php
                        $ttdPath = public_path('uploads/' . $detail->tanda_tangan);
                        $ttdBase64 = file_exists($ttdPath) ? 'data:image/' . pathinfo($ttdPath, PATHINFO_EXTENSION) . ';base64,' . base64_encode(file_get_contents($ttdPath)) : null;
                    @endphp
                    @if ($ttdBase64)
                        <img src="{{ $ttdBase64 }}" style="max-height:40px;">
                    @endif
                @endif
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="6">Tidak ada data peserta.</td>
        </tr>
    @endforelse
    </tbody>
</table>
</body>
</html> --}}
{{--
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Risalah Rapat</title>
    <style>
        * { font-family: Arial, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; }
        table, th, td { border: 1px solid black; padding: 6px; vertical-align: top; }
        .page-break { page-break-before: always; }

        /* Header Table */
        .header-logo-cell { width: 120px; text-align: center; padding: 10px 0; }
        .header-logo-cell img { width: 90px; object-fit: contain; }
        .header-title-cell { text-align: center; font-weight: bold; font-size: 14px; }
        .header-info-label { width: 120px; white-space: nowrap; }

        /* Detail Rapat */
        .col-label { width: 160px; white-space: nowrap; }
        .separator-grey { background: #808080; height: 10px; padding: 0; }

        /* Section Header */
        .section-header { background: #cfc9a5; font-weight: bold; padding: 8px; height: 28px; }

        /* Checkbox Styling */
        .checkbox {
            display: inline-block;
            width: 12px;
            height: 12px;
            border: 1px solid black;
            margin-right: 4px;
            vertical-align: middle;
            background: #f2f2f2; /* abu-abu */
            text-align: center;
            font-size: 11px;
            line-height: 12px;
        }
        .checkbox.checked::after {
            content: "✔";
            font-size: 10px;
            color: black;
        }

        /* Signature */
        .signature-block { margin-top: 40px; text-align: right; }
        .signature-name { text-decoration: underline; font-weight: bold; }

        /* Daftar Hadir */
        .logo-cell-attendance { width: 120px; text-align: center; padding: 15px; }
        .logo-cell-attendance img { width: 90px; object-fit: contain; }
        .header-title-attendance { font-weight: bold; font-size: 16px; text-transform: uppercase; text-align: center; }
        .info-label-attendance { width: 30%; font-weight: bold; }
        .info-value-attendance { width: 70%; }
        .table-peserta th, .table-peserta td { font-size: 12px; padding: 6px; }
        .table-peserta td.text-left { text-align: left; }
    </style>
</head>
<body>

<!-- HEADER -->
<table>
    <tr>
        <td rowspan="4" class="header-logo-cell">
            @php
                $path = public_path('assets/logo.png');
                $logo = file_exists($path) ? 'data:image/' . pathinfo($path, PATHINFO_EXTENSION) . ';base64,' . base64_encode(file_get_contents($path)) : null;
            @endphp
            @if ($logo)
                <img src="{{ $logo }}">
            @else
                PERURI
            @endif
        </td>
        <td colspan="2" class="header-title-cell">RISALAH RAPAT</td>
    </tr>
    <tr>
        <td class="header-info-label">Hari/Tanggal</td>
        <td>: {{ \Carbon\Carbon::parse($risalah->tanggal)->translatedFormat('F Y') }}</td>
    </tr>
    <tr>
        <td class="header-info-label">Waktu</td>
        <td>: {{ $risalah->waktu_mulai }} s.d Selesai</td>
    </tr>
    <tr>
        <td class="header-info-label">Tempat</td>
        <td>: {{ $risalah->tempat }}</td>
    </tr>
</table>

<!-- DETAIL RAPAT -->
<table>
    <tr>
        <td class="col-label">Agenda</td>
        <td colspan="3">: {{ $risalah->agenda }}</td>
    </tr>
    <tr>
        <td class="col-label">Pimpinan Rapat</td>
        <td>: {{ $risalah->pimpinan }}</td>
        <td class="col-label">Pencatat Rapat</td>
        <td>: {{ $risalah->pencatat }}</td>
    </tr>
    <tr>
        <td class="col-label">Peserta Rapat</td>
        <td colspan="3">: Daftar Hadir Terlampir</td>
    </tr>
    <tr>
        <td class="col-label">Jenis Rapat</td>
        <td colspan="3">
            <table style="width:100%; border-collapse: collapse;">
                <tr>
                    <td style="width:25%; border:none;">
                        <span class="checkbox {{ $risalah->jenis_rapat == 'Entry Meeting' ? 'checked' : '' }}"></span> Entry Meeting
                    </td>
                    <td style="width:25%; border:none;">
                        <span class="checkbox {{ $risalah->jenis_rapat == 'Expose Meeting' ? 'checked' : '' }}"></span> Expose Meeting
                    </td>
                    <td style="width:25%; border:none;">
                        <span class="checkbox {{ $risalah->jenis_rapat == 'Exit Meeting' ? 'checked' : '' }}"></span> Exit Meeting
                    </td>
                    <td style="width:25%; border:none;">
                        <span class="checkbox {{ $risalah->jenis_rapat == 'Lainnya' ? 'checked' : '' }}"></span> Lainnya
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td colspan="4" class="separator-grey"></td>
    </tr>
    <tr>
        <td class="section-header" colspan="4">Penjelasan Rapat</td>
    </tr>
    <tr>
        <td colspan="4" style="min-height:80px; padding:10px;">{{ $risalah->penjelasan }}</td>
    </tr>
    <tr>
        <td class="section-header" colspan="4">Kesimpulan</td>
    </tr>
    <tr>
        <td colspan="4" style="min-height:100px; padding:10px;">
            {{ $risalah->kesimpulan }}
            <div class="signature-block">
                Jakarta, {{ \Carbon\Carbon::parse($risalah->tanggal)->translatedFormat('F Y') }}<br>
                Pimpinan Rapat<br><br><br>
                <span class="signature-name">{{ $risalah->pimpinan }}</span><br>
                Ka SPI
            </div>
        </td>
    </tr>
</table>

<div class="page-break"></div>

<!-- DAFTAR HADIR -->
<table>
    <tr>
        <td class="logo-cell-attendance" rowspan="5">
            @if ($logo)
                <img src="{{ $logo }}">
            @endif
        </td>
        <td colspan="2" class="header-title-attendance">DAFTAR HADIR</td>
    </tr>
    <tr>
        <td class="info-label-attendance">Agenda / Kegiatan :</td>
        <td class="info-value-attendance">{{ $risalah->agenda }}</td>
    </tr>
    <tr>
        <td class="info-label-attendance">Hari / Tanggal :</td>
        <td class="info-value-attendance">{{ \Carbon\Carbon::parse($risalah->tanggal)->translatedFormat('l, d F Y') }}</td>
    </tr>
    <tr>
        <td class="info-label-attendance">Waktu :</td>
        <td class="info-value-attendance">{{ $risalah->waktu_mulai }} - Selesai</td>
    </tr>
    <tr>
        <td class="info-label-attendance">Tempat :</td>
        <td class="info-value-attendance">{{ $risalah->tempat }}</td>
    </tr>
</table>

<table class="table-peserta">
    <thead>
    <tr>
        <th width="30">No</th>
        <th width="160">Nama</th>
        <th width="60">NP</th>
        <th width="150">Jabatan</th>
        <th>Unit Kerja / Instansi</th>
        <th width="120">Tanda Tangan</th>
    </tr>
    </thead>
    <tbody>
    @forelse($presenceDetails as $detail)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td class="text-left">{{ $detail->nama }}</td>
            <td>{{ $detail->np }}</td>
            <td class="text-left">{{ $detail->jabatan }}</td>
            <td class="text-left">{{ $detail->asal_instansi }}</td>
            <td>
                @if ($detail->tanda_tangan)
                    @php
                        $ttdPath = public_path('uploads/' . $detail->tanda_tangan);
                        $ttdBase64 = file_exists($ttdPath) ? 'data:image/' . pathinfo($ttdPath, PATHINFO_EXTENSION) . ';base64,' . base64_encode(file_get_contents($ttdPath)) : null;
                    @endphp
                    @if ($ttdBase64)
                        <img src="{{ $ttdBase64 }}" style="max-height:40px;">
                    @endif
                @endif
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="6">Tidak ada data peserta.</td>
        </tr>
    @endforelse
    </tbody>
</table>

</body>
</html> --}}

{{--
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Risalah Rapat</title>
    <style>
        * { font-family: Arial, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; }
        table, th, td { border: 1px solid black; padding: 6px; vertical-align: top; }
        .page-break { page-break-before: always; }

        /* Header Table */
        .header-logo-cell { width: 120px; text-align: center; padding: 10px 0; }
        .header-logo-cell img { width: 90px; object-fit: contain; }
        .header-title-cell { text-align: center; font-weight: bold; font-size: 14px; }
        .header-info-label { width: 120px; white-space: nowrap; }

        /* Detail Rapat */
        .col-label { width: 160px; white-space: nowrap; }
        .separator-grey { background: #808080; height: 10px; padding: 0; }

        /* Section Header */
        .section-header { background: #cfc9a5; font-weight: bold; padding: 8px; height: 28px; }

        /* Checkbox Styling */
        .checkbox {
            display: inline-block;
            width: 12px;
            height: 12px;
            border: 1px solid black;
            margin-right: 4px;
            vertical-align: middle;
            background: #f2f2f2; /* abu-abu */
            text-align: center;
            font-size: 11px;
            line-height: 12px;
            font-weight: bold;
        }
        .checkbox.checked::after {
            content: "X"; /* aman buat export PDF */
            color: black;
        }

        /* Signature */
        .signature-block { margin-top: 40px; text-align: right; }
        .signature-name { text-decoration: underline; font-weight: bold; }

        /* Daftar Hadir */
        .logo-cell-attendance { width: 120px; text-align: center; padding: 15px; }
        .logo-cell-attendance img { width: 90px; object-fit: contain; }
        .header-title-attendance { font-weight: bold; font-size: 16px; text-transform: uppercase; text-align: center; }
        .info-label-attendance { width: 30%; font-weight: bold; }
        .info-value-attendance { width: 70%; }
        .table-peserta th, .table-peserta td { font-size: 12px; padding: 6px; }
        .table-peserta td.text-left { text-align: left; }
    </style>
</head>
<body>

<!-- HEADER -->
<table>
    <tr>
        <td rowspan="4" class="header-logo-cell">
            @php
                $path = public_path('assets/logo.png');
                $logo = file_exists($path) ? 'data:image/' . pathinfo($path, PATHINFO_EXTENSION) . ';base64,' . base64_encode(file_get_contents($path)) : null;
            @endphp
            @if ($logo)
                <img src="{{ $logo }}">
            @else
                PERURI
            @endif
        </td>
        <td colspan="2" class="header-title-cell">RISALAH RAPAT</td>
    </tr>
    <tr>
        <td class="header-info-label">Hari/Tanggal</td>
        <td>: {{ \Carbon\Carbon::parse($risalah->tanggal)->translatedFormat('F Y') }}</td>
    </tr>
    <tr>
        <td class="header-info-label">Waktu</td>
        <td>: {{ $risalah->waktu_mulai }} s.d Selesai</td>
    </tr>
    <tr>
        <td class="header-info-label">Tempat</td>
        <td>: {{ $risalah->tempat }}</td>
    </tr>
</table>

<!-- DETAIL RAPAT -->
<table>
    <tr>
        <td class="col-label">Agenda</td>
        <td colspan="3">: {{ $risalah->agenda }}</td>
    </tr>
    <tr>
        <td class="col-label">Pimpinan Rapat</td>
        <td>: {{ $risalah->pimpinan }}</td>
        <td class="col-label">Pencatat Rapat</td>
        <td>: {{ $risalah->pencatat }}</td>
    </tr>
    <tr>
        <td class="col-label">Peserta Rapat</td>
        <td colspan="3">: Daftar Hadir Terlampir</td>
    </tr>
    <tr>
        <td class="col-label">Jenis Rapat</td>
        <td colspan="3" style="padding:0;">
            <table style="width:100%; border-collapse: collapse; border: none;">
                <tr>
                    <td style="width:25%; border-left:none; border-top:none; border-bottom:none;">
                        <span class="checkbox {{ $risalah->jenis_rapat == 'Entry Meeting' ? 'checked' : '' }}"></span> Entry Meeting
                    </td>
                    <td style="width:25%; border-top:none; border-bottom:none;">
                        <span class="checkbox {{ $risalah->jenis_rapat == 'Expose Meeting' ? 'checked' : '' }}"></span> Expose Meeting
                    </td>
                    <td style="width:25%; border-top:none; border-bottom:none;">
                        <span class="checkbox {{ $risalah->jenis_rapat == 'Exit Meeting' ? 'checked' : '' }}"></span> Exit Meeting
                    </td>
                    <td style="width:25%; border-right:none; border-top:none; border-bottom:none;">
                        <span class="checkbox {{ $risalah->jenis_rapat == 'Lainnya' ? 'checked' : '' }}"></span> Lainnya
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td colspan="4" class="separator-grey"></td>
    </tr>
    <tr>
        <td class="section-header" colspan="4">Penjelasan Rapat</td>
    </tr>
    <tr>
        <td colspan="4" style="min-height:80px; padding:10px;">{{ $risalah->penjelasan }}</td>
    </tr>
    <tr>
        <td class="section-header" colspan="4">Kesimpulan</td>
    </tr>
    <tr>
        <td colspan="4" style="min-height:100px; padding:10px;">
            {{ $risalah->kesimpulan }}
            <div class="signature-block">
                Jakarta, {{ \Carbon\Carbon::parse($risalah->tanggal)->translatedFormat('F Y') }}<br>
                Pimpinan Rapat<br><br><br>
                <span class="signature-name">{{ $risalah->pimpinan }}</span><br>
                Ka SPI
            </div>
        </td>
    </tr>
</table>

<div class="page-break"></div>

<!-- DAFTAR HADIR -->
<table>
    <tr>
        <td class="logo-cell-attendance" rowspan="5">
            @if ($logo)
                <img src="{{ $logo }}">
            @endif
        </td>
        <td colspan="2" class="header-title-attendance">DAFTAR HADIR</td>
    </tr>
    <tr>
        <td class="info-label-attendance">Agenda / Kegiatan :</td>
        <td class="info-value-attendance">{{ $risalah->agenda }}</td>
    </tr>
    <tr>
        <td class="info-label-attendance">Hari / Tanggal :</td>
        <td class="info-value-attendance">{{ \Carbon\Carbon::parse($risalah->tanggal)->translatedFormat('l, d F Y') }}</td>
    </tr>
    <tr>
        <td class="info-label-attendance">Waktu :</td>
        <td class="info-value-attendance">{{ $risalah->waktu_mulai }} - Selesai</td>
    </tr>
    <tr>
        <td class="info-label-attendance">Tempat :</td>
        <td class="info-value-attendance">{{ $risalah->tempat }}</td>
    </tr>
</table>

<table class="table-peserta">
    <thead>
    <tr>
        <th width="30">No</th>
        <th width="160">Nama</th>
        <th width="60">NP</th>
        <th width="150">Jabatan</th>
        <th>Unit Kerja / Instansi</th>
        <th width="120">Tanda Tangan</th>
    </tr>
    </thead>
    <tbody>
    @forelse($presenceDetails as $detail)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td class="text-left">{{ $detail->nama }}</td>
            <td>{{ $detail->np }}</td>
            <td class="text-left">{{ $detail->jabatan }}</td>
            <td class="text-left">{{ $detail->asal_instansi }}</td>
            <td>
                @if ($detail->tanda_tangan)
                    @php
                        $ttdPath = public_path('uploads/' . $detail->tanda_tangan);
                        $ttdBase64 = file_exists($ttdPath) ? 'data:image/' . pathinfo($ttdPath, PATHINFO_EXTENSION) . ';base64,' . base64_encode(file_get_contents($ttdPath)) : null;
                    @endphp
                    @if ($ttdBase64)
                        <img src="{{ $ttdBase64 }}" style="max-height:40px;">
                    @endif
                @endif
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="6">Tidak ada data peserta.</td>
        </tr>
    @endforelse
    </tbody>
</table>

</body>
</html> --}}

{{--
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Risalah Rapat</title>
    <style>
        * { font-family: Arial, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; }
        table, th, td { border: 1px solid black; padding: 6px; vertical-align: middle; }
        .page-break { page-break-before: always; }

        /* Header */
        .header-logo-cell { width: 120px; text-align: center; padding: 10px; }
        .header-logo-cell img { width: 90px; object-fit: contain; display: block; margin: 0 auto; }
        .header-title-cell { text-align: center; font-weight: bold; font-size: 14px; }

        /* Section */
        .section-header { background: #cfc9a5; font-weight: bold; padding: 8px; height: 28px; }

        /* Checkbox */
        .checkbox { display: inline-block; width: 12px; height: 12px; border: 1px solid black; margin-right: 4px;
            vertical-align: middle; background: #f2f2f2; text-align: center; font-size: 11px; line-height: 12px; }
        .checkbox.checked::after { content: "X"; color: black; font-weight: bold; }

        /* Signature */
        .signature-block { margin-top: 40px; text-align: right; }
        .signature-name { text-decoration: underline; font-weight: bold; }

        /* Daftar Hadir */
        .lampiran-title { text-align: center; font-weight: bold; margin-bottom: 6px; }
        .logo-cell-attendance { width: 120px; text-align: center; padding: 10px; }
        .logo-cell-attendance img { width: 90px; object-fit: contain; display: block; margin: 0 auto; }
        .header-title-attendance { font-weight: bold; font-size: 16px; text-transform: uppercase; text-align: center; }
        .info-label-attendance { width: 30%; font-weight: bold; white-space: nowrap; }
        .info-value-attendance { width: 70%; }
        .table-peserta th, .table-peserta td { font-size: 12px; padding: 6px; }
        .table-peserta th { background: #f2f2f2; }
        .table-peserta td.text-left { text-align: left; }
    </style>
</head>
<body>
@php
    $path = public_path('assets/logo.png');
    $logo = null;
    if (file_exists($path)) {
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $logo = 'data:image/' . $type . ';base64,' . base64_encode($data);
    }
@endphp

<!-- HEADER RISALAH -->
<table>
    <tr>
        <td rowspan="4" class="header-logo-cell">
            @if ($logo)<img src="{{ $logo }}">@endif
        </td>
        <td colspan="2" class="header-title-cell">RISALAH RAPAT</td>
    </tr>
    <tr><td>Hari/Tanggal</td><td>: {{ \Carbon\Carbon::parse($risalah->tanggal)->translatedFormat('F Y') }}</td></tr>
    <tr><td>Waktu</td><td>: {{ $risalah->waktu_mulai }} s.d Selesai</td></tr>
    <tr><td>Tempat</td><td>: {{ $risalah->tempat }}</td></tr>
</table>

<!-- DETAIL RAPAT -->
<table>
    <tr><td>Agenda</td><td colspan="3">: {{ $risalah->agenda }}</td></tr>
    <tr><td>Pimpinan Rapat</td><td>: {{ $risalah->pimpinan }}</td><td>Pencatat Rapat</td><td>: {{ $risalah->pencatat }}</td></tr>
    <tr><td>Peserta Rapat</td><td colspan="3">: Daftar Hadir Terlampir</td></tr>
    <tr>
        <td>Jenis Rapat</td>
        <td colspan="3" style="padding:0;">
            <table style="width:100%; border:none;">
                <tr>
                    <td style="border:none;"><span class="checkbox {{ $risalah->jenis_rapat == 'Entry Meeting' ? 'checked' : '' }}"></span> Entry Meeting</td>
                    <td style="border:none;"><span class="checkbox {{ $risalah->jenis_rapat == 'Expose Meeting' ? 'checked' : '' }}"></span> Expose Meeting</td>
                    <td style="border:none;"><span class="checkbox {{ $risalah->jenis_rapat == 'Exit Meeting' ? 'checked' : '' }}"></span> Exit Meeting</td>
                    <td style="border:none;"><span class="checkbox {{ $risalah->jenis_rapat == 'Lainnya' ? 'checked' : '' }}"></span> Lainnya</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr><td colspan="4" class="section-header">Penjelasan Rapat</td></tr>
    <tr><td colspan="4">{{ $risalah->penjelasan }}</td></tr>
    <tr><td colspan="4" class="section-header">Kesimpulan</td></tr>
    <tr>
        <td colspan="4">
            {{ $risalah->kesimpulan }}
            <div class="signature-block">
                Jakarta, {{ \Carbon\Carbon::parse($risalah->tanggal)->translatedFormat('F Y') }}<br>
                Pimpinan Rapat<br><br><br>
                <span class="signature-name">{{ $risalah->pimpinan }}</span><br>
                Ka SPI
            </div>
        </td>
    </tr>
</table>

<div class="page-break"></div>

<!-- DAFTAR HADIR -->
<div class="lampiran-title">Lampiran : Daftar Hadir</div>

<table>
    <tr>
        <td class="logo-cell-attendance" rowspan="5">@if ($logo)<img src="{{ $logo }}">@endif</td>
        <td colspan="2" class="header-title-attendance">DAFTAR HADIR</td>
    </tr>
    <tr><td class="info-label-attendance">Agenda / Kegiatan :</td><td>{{ $risalah->agenda }}</td></tr>
    <tr><td class="info-label-attendance">Hari / Tanggal :</td><td>{{ \Carbon\Carbon::parse($risalah->tanggal)->translatedFormat('l, d F Y') }}</td></tr>
    <tr><td class="info-label-attendance">Waktu :</td><td>{{ $risalah->waktu_mulai }} - Selesai</td></tr>
    <tr><td class="info-label-attendance">Tempat :</td><td>{{ $risalah->tempat }}</td></tr>
</table>

<table class="table-peserta">
    <thead>
        <tr>
            <th width="30">No</th>
            <th width="160">Nama</th>
            <th width="60">NP</th>
            <th width="150">Jabatan</th>
            <th>Unit Kerja / Instansi</th>
            <th width="120">Tanda Tangan</th>
        </tr>
    </thead>
    <tbody>
        @forelse($presenceDetails as $detail)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td class="text-left">{{ $detail->nama }}</td>
                <td>{{ $detail->np }}</td>
                <td class="text-left">{{ $detail->jabatan }}</td>
                <td class="text-left">{{ $detail->asal_instansi }}</td>
                <td>
                    @if ($detail->tanda_tangan)
                        @php
                            $ttdPath = public_path('uploads/' . $detail->tanda_tangan);
                            $ttdBase64 = file_exists($ttdPath) ? 'data:image/' . pathinfo($ttdPath, PATHINFO_EXTENSION) . ';base64,' . base64_encode(file_get_contents($ttdPath)) : null;
                        @endphp
                        @if ($ttdBase64)<img src="{{ $ttdBase64 }}" style="max-height:40px;">@endif
                    @endif
                </td>
            </tr>
        @empty
            <tr><td colspan="6">Tidak ada data peserta.</td></tr>
        @endforelse
    </tbody>
</table>

</body>
</html> --}}

{{--
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Risalah Rapat</title>
    <style>
        * { font-family: Arial, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; }
        table, th, td { border: 1px solid black; padding: 6px; vertical-align: middle; }
        .page-break { page-break-before: always; }

        /* Header */
        .header-logo-cell { width: 120px; text-align: center; padding: 10px; }
        .header-logo-cell img { width: 90px; object-fit: contain; display: block; margin: 0 auto; }
        .header-title-cell { text-align: center; font-weight: bold; font-size: 14px; }

        /* Section */
        .section-header { background: #cfc9a5; font-weight: bold; padding: 8px; height: 28px; }

        /* Checkbox */
        .checkbox { display: inline-block; width: 12px; height: 12px; border: 1px solid black; margin-right: 4px;
            vertical-align: middle; background: #f2f2f2; text-align: center; font-size: 11px; line-height: 12px; }
        .checkbox.checked::after { content: "X"; color: black; font-weight: bold; }

        /* Signature */
        .signature-block { margin-top: 40px; text-align: right; }
        .signature-name { text-decoration: underline; font-weight: bold; }

        /* Lampiran / Daftar Hadir (NEW STYLE) */
        .main-table {
          width: 100%;
          border-collapse: collapse;
          border: 1px solid black;
          margin-bottom: 20px;
        }
        .main-table td,
        .main-table th {
          border: 1px solid black;
          padding: 6px;
          vertical-align: top;
        }
        .logo-cell {
          width: 150px;
          text-align: center;
          padding: 20px;
        }
        .logo-cell img {
          width: 150px;
          height: 150px;
          object-fit: contain;
          margin-top: 10px;
        }
        .header-title {
          text-align: center;
          font-weight: bold;
          padding: 6px;
          border-bottom: 1px solid black;
          font-size: 22px;
          text-transform: uppercase;
        }
        .info-label {
          width: 20%;
          text-align: left;
          font-weight: bold;
        }
        .info-value {
          width: 65%;
          text-align: left;
        }
        .table-peserta {
          width: 100%;
          border-collapse: collapse;
          margin-top: 10px;
        }
        .table-peserta th,
        .table-peserta td {
          border: 1px solid black;
          padding: 8px;
          text-align: center;
        }
        .table-peserta td.text-left {
          text-align: left;
        }
    </style>
</head>
<body>
@php
    $path = public_path('assets/logo.png');
    $logo = null;
    if (file_exists($path)) {
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $logo = 'data:image/' . $type . ';base64,' . base64_encode($data);
    }
@endphp

<!-- HEADER RISALAH -->
<table>
    <tr>
        <td rowspan="4" class="header-logo-cell">
            @if ($logo)<img src="{{ $logo }}">@endif
        </td>
        <td colspan="2" class="header-title-cell">RISALAH RAPAT</td>
    </tr>
    <tr><td>Hari/Tanggal</td><td>: {{ \Carbon\Carbon::parse($risalah->tanggal)->translatedFormat('F Y') }}</td></tr>
    <tr><td>Waktu</td><td>: {{ $risalah->waktu_mulai }} s.d Selesai</td></tr>
    <tr><td>Tempat</td><td>: {{ $risalah->tempat }}</td></tr>
</table>

<!-- DETAIL RAPAT -->
<table>
    <tr><td>Agenda</td><td colspan="3">: {{ $risalah->agenda }}</td></tr>
    <tr><td>Pimpinan Rapat</td><td>: {{ $risalah->pimpinan }}</td><td>Pencatat Rapat</td><td>: {{ $risalah->pencatat }}</td></tr>
    <tr><td>Peserta Rapat</td><td colspan="3">: Daftar Hadir Terlampir</td></tr>
    <tr>
        <td>Jenis Rapat</td>
        <td colspan="3" style="padding:0;">
            <table style="width:100%; border:none;">
                <tr>
                    <td style="border:none;"><span class="checkbox {{ $risalah->jenis_rapat == 'Entry Meeting' ? 'checked' : '' }}"></span> Entry Meeting</td>
                    <td style="border:none;"><span class="checkbox {{ $risalah->jenis_rapat == 'Expose Meeting' ? 'checked' : '' }}"></span> Expose Meeting</td>
                    <td style="border:none;"><span class="checkbox {{ $risalah->jenis_rapat == 'Exit Meeting' ? 'checked' : '' }}"></span> Exit Meeting</td>
                    <td style="border:none;"><span class="checkbox {{ $risalah->jenis_rapat == 'Lainnya' ? 'checked' : '' }}"></span> Lainnya</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr><td colspan="4" class="section-header">Penjelasan Rapat</td></tr>
    <tr><td colspan="4">{{ $risalah->penjelasan }}</td></tr>
    <tr><td colspan="4" class="section-header">Kesimpulan</td></tr>
    <tr>
        <td colspan="4">
            {{ $risalah->kesimpulan }}
            <div class="signature-block">
                Jakarta, {{ \Carbon\Carbon::parse($risalah->tanggal)->translatedFormat('F Y') }}<br>
                Pimpinan Rapat<br><br><br>
                <span class="signature-name">{{ $risalah->pimpinan }}</span><br>
                Ka SPI
            </div>
        </td>
    </tr>
</table>

<div class="page-break"></div>

<!-- DAFTAR HADIR -->
<div class="lampiran-title">Lampiran : Daftar Hadir</div>

<!-- HEADER DAFTAR HADIR -->
<table class="main-table">
  <tr>
    <td class="logo-cell" rowspan="5">
      @if ($logo)<img src="{{ $logo }}">@endif
    </td>
    <td colspan="2" class="header-title">DAFTAR HADIR</td>
  </tr>
  <tr>
    <td class="info-label">Agenda / Kegiatan :</td>
    <td class="info-value">{{ $risalah->agenda }}</td>
  </tr>
  <tr>
    <td class="info-label">Hari / Tanggal :</td>
    <td class="info-value">{{ \Carbon\Carbon::parse($risalah->tanggal)->translatedFormat('l, d F Y') }}</td>
  </tr>
  <tr>
    <td class="info-label">Waktu :</td>
    <td class="info-value">{{ $risalah->waktu_mulai }} - Selesai</td>
  </tr>
  <tr>
    <td class="info-label">Tempat :</td>
    <td class="info-value">{{ $risalah->tempat }}</td>
  </tr>
</table>

<!-- TABEL PESERTA -->
<table class="table-peserta">
  <thead>
    <tr>
      <th width="30">No</th>
      <th>Nama</th>
      <th width="60">NP</th>
      <th>Jabatan</th>
      <th>Unit Kerja / Instansi</th>
      <th width="120">Tanda Tangan</th>
    </tr>
  </thead>
  <tbody>
    @forelse($presenceDetails as $detail)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td class="text-left">{{ $detail->nama }}</td>
        <td>{{ $detail->np }}</td>
        <td class="text-left">{{ $detail->jabatan }}</td>
        <td class="text-left">{{ $detail->asal_instansi }}</td>
        <td>
          @if ($detail->tanda_tangan)
            @php
              $ttdPath = public_path('uploads/' . $detail->tanda_tangan);
              $ttdBase64 = file_exists($ttdPath)
                  ? 'data:image/' . pathinfo($ttdPath, PATHINFO_EXTENSION) . ';base64,' . base64_encode(file_get_contents($ttdPath))
                  : null;
            @endphp
            @if ($ttdBase64)<img src="{{ $ttdBase64 }}" style="max-width: 100%; max-height:40px;">@endif
          @endif
        </td>
      </tr>
    @empty
      <tr><td colspan="6">Tidak ada data peserta.</td></tr>
    @endforelse
  </tbody>
</table>

</body>
</html> --}}

{{--
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Risalah Rapat</title>
    <style>
        * { font-family: Arial, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; }
        table, th, td { border: 1px solid black; padding: 6px; vertical-align: middle; }
        .page-break { page-break-before: always; }

        /* Header Risalah */
        .header-logo-cell { width: 100px; text-align: center; padding: 6px; }
        .header-logo-cell img { width: 70px; object-fit: contain; display: block; margin: 0 auto; }
        .header-title-cell { text-align: center; font-weight: bold; font-size: 14px; }

        /* Section abu-abu */
        .section-header { background: #cfc9a5; font-weight: bold; padding: 6px; height: 24px; }

        /* Checkbox */
        .checkbox { display: inline-block; width: 12px; height: 12px; border: 1px solid black; margin-right: 4px;
            vertical-align: middle; background: #f2f2f2; text-align: center; font-size: 11px; line-height: 12px; }
        .checkbox.checked::after { content: "X"; color: black; font-weight: bold; }

        /* Signature */
        .signature-block { margin-top: 40px; text-align: right; }
        .signature-name { text-decoration: underline; font-weight: bold; }

        /* Lampiran / Daftar Hadir */
        .lampiran-title { text-align: center; font-weight: bold; margin-bottom: 6px; }

        .main-table {
          width: 100%;
          border-collapse: collapse;
          border: 1px solid black;
          margin-bottom: 10px;
        }
        .main-table td,
        .main-table th {
          border: 1px solid black;
          padding: 6px;
          vertical-align: middle;
          font-size: 12px;
        }
        .logo-cell {
          width: 120px;
          text-align: center;
          padding: 10px;
        }
        .logo-cell img {
          width: 90px;
          height: 90px;
          object-fit: contain;
        }
        .header-title {
          text-align: center;
          font-weight: bold;
          padding: 6px;
          font-size: 16px;
          text-transform: uppercase;
        }
        .info-label {
          width: 25%;
          text-align: left;
          font-weight: bold;
          white-space: nowrap;
        }
        .info-value {
          width: 65%;
          text-align: left;
        }
        .table-peserta {
          width: 100%;
          border-collapse: collapse;
          margin-top: 6px;
        }
        .table-peserta th,
        .table-peserta td {
          border: 1px solid black;
          padding: 6px;
          text-align: center;
          font-size: 12px;
        }
        .table-peserta td.text-left {
          text-align: left;
        }
    </style>
</head>
<body>
@php
    $path = public_path('assets/logo.png');
    $logo = null;
    if (file_exists($path)) {
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $logo = 'data:image/' . $type . ';base64,' . base64_encode($data);
    }
@endphp

<!-- HEADER RISALAH -->
<table>
    <tr>
        <td rowspan="4" class="header-logo-cell">
            @if ($logo)<img src="{{ $logo }}">@endif
        </td>
        <td colspan="2" class="header-title-cell">RISALAH RAPAT</td>
    </tr>
    <tr><td>Hari/Tanggal</td><td>: {{ \Carbon\Carbon::parse($risalah->tanggal)->translatedFormat('F Y') }}</td></tr>
    <tr><td>Waktu</td><td>: {{ $risalah->waktu_mulai }} s.d Selesai</td></tr>
    <tr><td>Tempat</td><td>: {{ $risalah->tempat }}</td></tr>
</table>

<!-- DETAIL RAPAT -->
<table>
    <tr><td>Agenda</td><td colspan="3">: {{ $risalah->agenda }}</td></tr>
    <tr><td>Pimpinan Rapat</td><td>: {{ $risalah->pimpinan }}</td><td>Pencatat Rapat</td><td>: {{ $risalah->pencatat }}</td></tr>
    <tr><td>Peserta Rapat</td><td colspan="3">: Daftar Hadir Terlampir</td></tr>
    <tr>
        <td>Jenis Rapat</td>
        <td colspan="3" style="padding:0;">
            <table style="width:100%; border:none;">
                <tr>
                    <td style="border:none;"><span class="checkbox {{ $risalah->jenis_rapat == 'Entry Meeting' ? 'checked' : '' }}"></span> Entry Meeting</td>
                    <td style="border:none;"><span class="checkbox {{ $risalah->jenis_rapat == 'Expose Meeting' ? 'checked' : '' }}"></span> Expose Meeting</td>
                    <td style="border:none;"><span class="checkbox {{ $risalah->jenis_rapat == 'Exit Meeting' ? 'checked' : '' }}"></span> Exit Meeting</td>
                    <td style="border:none;"><span class="checkbox {{ $risalah->jenis_rapat == 'Lainnya' ? 'checked' : '' }}"></span> Lainnya</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr><td colspan="4" class="section-header">&nbsp;</td></tr>
    <tr><td colspan="4" class="section-header">Penjelasan Rapat</td></tr>
    <tr><td colspan="4">{{ $risalah->penjelasan }}</td></tr>
    <tr><td colspan="4" class="section-header">Kesimpulan</td></tr>
    <tr>
        <td colspan="4">
            {{ $risalah->kesimpulan }}
            <div class="signature-block">
                Jakarta, {{ \Carbon\Carbon::parse($risalah->tanggal)->translatedFormat('F Y') }}<br>
                Pimpinan Rapat<br><br><br>
                <span class="signature-name">{{ $risalah->pimpinan }}</span><br>
                Ka SPI
            </div>
        </td>
    </tr>
</table>

<div class="page-break"></div>

<!-- DAFTAR HADIR -->
<div class="lampiran-title">Lampiran : Daftar Hadir</div>

<!-- HEADER DAFTAR HADIR -->
<table class="main-table">
  <tr>
    <td class="logo-cell" rowspan="5">
      @if ($logo)<img src="{{ $logo }}">@endif
    </td>
    <td colspan="2" class="header-title">DAFTAR HADIR</td>
  </tr>
  <tr>
    <td class="info-label">Agenda / Kegiatan :</td>
    <td class="info-value">{{ $risalah->agenda }}</td>
  </tr>
  <tr>
    <td class="info-label">Hari / Tanggal :</td>
    <td class="info-value">{{ \Carbon\Carbon::parse($risalah->tanggal)->translatedFormat('l, d F Y') }}</td>
  </tr>
  <tr>
    <td class="info-label">Waktu :</td>
    <td class="info-value">{{ $risalah->waktu_mulai }} - Selesai</td>
  </tr>
  <tr>
    <td class="info-label">Tempat :</td>
    <td class="info-value">{{ $risalah->tempat }}</td>
  </tr>
</table>

<!-- TABEL PESERTA -->
<table class="table-peserta">
  <thead>
    <tr>
      <th width="30">No</th>
      <th>Nama</th>
      <th width="60">NP</th>
      <th>Jabatan</th>
      <th>Unit Kerja / Instansi</th>
      <th width="120">Tanda Tangan</th>
    </tr>
  </thead>
  <tbody>
    @forelse($presenceDetails as $detail)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td class="text-left">{{ $detail->nama }}</td>
        <td>{{ $detail->np }}</td>
        <td class="text-left">{{ $detail->jabatan }}</td>
        <td class="text-left">{{ $detail->asal_instansi }}</td>
        <td>
          @if ($detail->tanda_tangan)
            @php
              $ttdPath = public_path('uploads/' . $detail->tanda_tangan);
              $ttdBase64 = file_exists($ttdPath)
                  ? 'data:image/' . pathinfo($ttdPath, PATHINFO_EXTENSION) . ';base64,' . base64_encode(file_get_contents($ttdPath))
                  : null;
            @endphp
            @if ($ttdBase64)<img src="{{ $ttdBase64 }}" style="max-width: 100%; max-height:40px;">@endif
          @endif
        </td>
      </tr>
    @empty
      <tr><td colspan="6">Tidak ada data peserta.</td></tr>
    @endforelse
  </tbody>
</table>

</body>
</html> --}}

{{--
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Risalah Rapat</title>
    <style>
        * { font-family: Arial, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; }
        table, th, td { border: 1px solid black; padding: 6px; vertical-align: middle; }
        .page-break { page-break-before: always; }

        /* Header Risalah */
        .header-logo-cell { width: 100px; text-align: center; padding: 6px; }
        .header-logo-cell img { width: 70px; object-fit: contain; display: block; margin: 0 auto; }
        .header-title-cell { text-align: center; font-weight: bold; font-size: 14px; }

        /* Section abu-abu */
        .section-header { background: #cfc9a5; font-weight: bold; padding: 6px; height: 24px; }
        .section-spacer { background: #e0e0e0; height: 20px; }

        /* Checkbox */
        .checkbox { display: inline-block; width: 12px; height: 12px; border: 1px solid black; margin-right: 4px;
            vertical-align: middle; background: #f2f2f2; text-align: center; font-size: 11px; line-height: 12px; }
        .checkbox.checked::after { content: "X"; color: black; font-weight: bold; }

        /* Signature */
        .signature-block { margin-top: 40px; text-align: right; }
        .signature-name { text-decoration: underline; font-weight: bold; }

        /* Lampiran / Daftar Hadir */
        .lampiran-title { text-align: center; font-weight: bold; margin-bottom: 6px; }

        .main-table {
          width: 100%;
          border-collapse: collapse;
          border: 1px solid black;
          margin-bottom: 10px;
        }
        .main-table td,
        .main-table th {
          border: 1px solid black;
          padding: 6px;
          vertical-align: middle;
          font-size: 12px;
        }
        .logo-cell {
          width: 120px;
          text-align: center;
          padding: 10px;
        }
        .logo-cell img {
          width: 90px;
          height: 90px;
          object-fit: contain;
        }
        .header-title {
          text-align: center;
          font-weight: bold;
          padding: 6px;
          font-size: 16px;
          text-transform: uppercase;
        }
        .info-label {
          width: 25%;
          text-align: left;
          font-weight: bold;
          white-space: nowrap;
        }
        .info-value {
          width: 65%;
          text-align: left;
        }
        .table-peserta {
          width: 100%;
          border-collapse: collapse;
          margin-top: 6px;
        }
        .table-peserta th,
        .table-peserta td {
          border: 1px solid black;
          padding: 6px;
          text-align: center;
          font-size: 12px;
        }
        .table-peserta td.text-left {
          text-align: left;
        }
    </style>
</head>
<body>
@php
    $path = public_path('assets/logo.png');
    $logo = null;
    if (file_exists($path)) {
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $logo = 'data:image/' . $type . ';base64,' . base64_encode($data);
    }
@endphp

<!-- HEADER RISALAH -->
<table>
    <tr>
        <td rowspan="4" class="header-logo-cell">
            @if ($logo)<img src="{{ $logo }}">@endif
        </td>
        <td colspan="2" class="header-title-cell">RISALAH RAPAT</td>
    </tr>
    <tr><td>Hari/Tanggal</td><td>: {{ \Carbon\Carbon::parse($risalah->tanggal)->translatedFormat('F Y') }}</td></tr>
    <tr><td>Waktu</td><td>: {{ $risalah->waktu_mulai }} s.d Selesai</td></tr>
    <tr><td>Tempat</td><td>: {{ $risalah->tempat }}</td></tr>
</table>

<!-- DETAIL RAPAT -->
<table>
    <tr><td>Agenda</td><td colspan="3">: {{ $risalah->agenda }}</td></tr>
    <tr><td>Pimpinan Rapat</td><td>: {{ $risalah->pimpinan }}</td><td>Pencatat Rapat</td><td>: {{ $risalah->pencatat }}</td></tr>
    <tr><td>Peserta Rapat</td><td colspan="3">: Daftar Hadir Terlampir</td></tr>
    <tr>
        <td>Jenis Rapat</td>
        <td colspan="3" style="padding:0;">
            <table style="width:100%; border:none;">
                <tr>
                    <td style="border:none;"><span class="checkbox {{ $risalah->jenis_rapat == 'Entry Meeting' ? 'checked' : '' }}"></span> Entry Meeting</td>
                    <td style="border:none;"><span class="checkbox {{ $risalah->jenis_rapat == 'Expose Meeting' ? 'checked' : '' }}"></span> Expose Meeting</td>
                    <td style="border:none;"><span class="checkbox {{ $risalah->jenis_rapat == 'Exit Meeting' ? 'checked' : '' }}"></span> Exit Meeting</td>
                    <td style="border:none;"><span class="checkbox {{ $risalah->jenis_rapat == 'Lainnya' ? 'checked' : '' }}"></span> Lainnya</td>
                </tr>
            </table>
        </td>
    </tr>
    <!-- Baris kosong abu-abu -->
    <tr><td colspan="4" class="section-spacer">&nbsp;</td></tr>
    <tr><td colspan="4" class="section-header">Penjelasan Rapat</td></tr>
    <tr><td colspan="4">{{ $risalah->penjelasan }}</td></tr>
    <tr><td colspan="4" class="section-header">Kesimpulan</td></tr>
    <tr>
        <td colspan="4">
            {{ $risalah->kesimpulan }}
            <div class="signature-block">
                Jakarta, {{ \Carbon\Carbon::parse($risalah->tanggal)->translatedFormat('F Y') }}<br>
                Pimpinan Rapat<br><br><br>
                <span class="signature-name">{{ $risalah->pimpinan }}</span><br>
                Ka SPI
            </div>
        </td>
    </tr>
</table>

<div class="page-break"></div>

<!-- DAFTAR HADIR -->
<div class="lampiran-title">Lampiran : Daftar Hadir</div>

<!-- HEADER DAFTAR HADIR -->
<table class="main-table">
  <tr>
    <td class="logo-cell" rowspan="5">
      @if ($logo)<img src="{{ $logo }}">@endif
    </td>
    <td colspan="2" class="header-title">DAFTAR HADIR</td>
  </tr>
  <tr>
    <td class="info-label">Agenda / Kegiatan :</td>
    <td class="info-value">{{ $risalah->agenda }}</td>
  </tr>
  <tr>
    <td class="info-label">Hari / Tanggal :</td>
    <td class="info-value">{{ \Carbon\Carbon::parse($risalah->tanggal)->translatedFormat('l, d F Y') }}</td>
  </tr>
  <tr>
    <td class="info-label">Waktu :</td>
    <td class="info-value">{{ $risalah->waktu_mulai }} - Selesai</td>
  </tr>
  <tr>
    <td class="info-label">Tempat :</td>
    <td class="info-value">{{ $risalah->tempat }}</td>
  </tr>
</table>

<!-- TABEL PESERTA -->
<table class="table-peserta">
  <thead>
    <tr>
      <th width="30">No</th>
      <th>Nama</th>
      <th width="60">NP</th>
      <th>Jabatan</th>
      <th>Unit Kerja / Instansi</th>
      <th width="120">Tanda Tangan</th>
    </tr>
  </thead>
  <tbody>
    @forelse($presenceDetails as $detail)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td class="text-left">{{ $detail->nama }}</td>
        <td>{{ $detail->np }}</td>
        <td class="text-left">{{ $detail->jabatan }}</td>
        <td class="text-left">{{ $detail->asal_instansi }}</td>
        <td>
          @if ($detail->tanda_tangan)
            @php
              $ttdPath = public_path('uploads/' . $detail->tanda_tangan);
              $ttdBase64 = file_exists($ttdPath)
                  ? 'data:image/' . pathinfo($ttdPath, PATHINFO_EXTENSION) . ';base64,' . base64_encode(file_get_contents($ttdPath))
                  : null;
            @endphp
            @if ($ttdBase64)<img src="{{ $ttdBase64 }}" style="max-width: 100%; max-height:40px;">@endif
          @endif
        </td>
      </tr>
    @empty
      <tr><td colspan="6">Tidak ada data peserta.</td></tr>
    @endforelse
  </tbody>
</table>

</body>
</html> --}}

{{--
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Risalah Rapat</title>
    <style>
        * { font-family: Arial, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; }
        table, th, td { border: 1px solid black; padding: 6px; vertical-align: middle; }
        .page-break { page-break-before: always; }

        /* Header Risalah */
        .header-logo-cell { width: 100px; text-align: center; padding: 6px; }
        .header-logo-cell img { width: 70px; object-fit: contain; display: block; margin: 0 auto; }
        .header-title-cell { text-align: center; font-weight: bold; font-size: 14px; }

        /* Section abu-abu */
        .section-header { background: #cfc9a5; font-weight: bold; padding: 6px; height: 24px; }
        .section-spacer { background: #e0e0e0; height: 20px; }

        /* Checkbox */
        .checkbox { display: inline-block; width: 12px; height: 12px; border: 1px solid black; margin-right: 4px;
            vertical-align: middle; background: #f2f2f2; text-align: center; font-size: 11px; line-height: 12px; }
        .checkbox.checked::after { content: "X"; color: black; font-weight: bold; }

        /* Signature */
        .signature-block { margin-top: 40px; text-align: right; }
        .signature-name { text-decoration: underline; font-weight: bold; }

        /* Lampiran / Daftar Hadir */
        .lampiran-title { text-align: center; font-weight: bold; margin-bottom: 6px; }

        .main-table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid black;
            margin-bottom: 10px;
        }
        .main-table td,
        .main-table th {
            border: 1px solid black;
            padding: 6px;
            vertical-align: middle;
            font-size: 12px;
        }
        .logo-cell {
            width: 120px;
            text-align: center;
            padding: 10px;
        }
        .logo-cell img {
            width: 90px;
            height: 90px;
            object-fit: contain;
        }
        .header-title {
            text-align: center;
            font-weight: bold;
            padding: 6px;
            font-size: 16px;
            text-transform: uppercase;
        }
        .info-label {
            width: 25%;
            text-align: left;
            font-weight: bold;
            white-space: nowrap;
        }
        .info-value {
            width: 65%;
            text-align: left;
        }
        .table-peserta {
            width: 100%;
            border-collapse: collapse;
            margin-top: 6px;
        }
        .table-peserta th,
        .table-peserta td {
            border: 1px solid black;
            padding: 6px;
            text-align: center;
            font-size: 12px;
        }
        .table-peserta td.text-left {
            text-align: left;
        }
    </style>
</head>
<body>
@php
    $path = public_path('assets/logo.png');
    $logo = null;
    if (file_exists($path)) {
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $logo = 'data:image/' . $type . ';base64,' . base64_encode($data);
    }
@endphp

<table>
    <tr>
        <td rowspan="4" class="header-logo-cell">
            @if ($logo)<img src="{{ $logo }}">@endif
        </td>
        <td colspan="2" class="header-title-cell">RISALAH RAPAT</td>
    </tr>
    <tr><td>Hari/Tanggal</td><td>: {{ \Carbon\Carbon::parse($risalah->tanggal)->translatedFormat('F Y') }}</td></tr>
    <tr><td>Waktu</td><td>: {{ $risalah->waktu_mulai }} s.d Selesai</td></tr>
    <tr><td>Tempat</td><td>: {{ $risalah->tempat }}</td></tr>
</table>

<table>
    <tr><td>Agenda</td><td colspan="3">: {{ $risalah->agenda }}</td></tr>
    <tr><td>Pimpinan Rapat</td><td>: {{ $risalah->pimpinan }}</td><td>Pencatat Rapat</td><td>: {{ $risalah->pencatat }}</td></tr>
    <tr><td>Peserta Rapat</td><td colspan="3">: Daftar Hadir Terlampir</td></tr>
    <tr>
        <td>Jenis Rapat</td>
        <td colspan="3" style="padding:0;">
            <table style="width:100%; border:none;">
                <tr>
                    <td style="border:none;"><span class="checkbox {{ $risalah->jenis_rapat == 'Entry Meeting' ? 'checked' : '' }}"></span> Entry Meeting</td>
                    <td style="border:none;"><span class="checkbox {{ $risalah->jenis_rapat == 'Expose Meeting' ? 'checked' : '' }}"></span> Expose Meeting</td>
                    <td style="border:none;"><span class="checkbox {{ $risalah->jenis_rapat == 'Exit Meeting' ? 'checked' : '' }}"></span> Exit Meeting</td>
                    <td style="border:none;"><span class="checkbox {{ $risalah->jenis_rapat == 'Lainnya' ? 'checked' : '' }}"></span> Lainnya</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr><td colspan="4" class="section-spacer">&nbsp;</td></tr>
    <tr><td colspan="4" class="section-header">Penjelasan Rapat</td></tr>
    <tr>
        <td colspan="4">

            {!! $risalah->penjelasan !!}
        </td>
    </tr>
    <tr><td colspan="4" class="section-header">Kesimpulan</td></tr>
    <tr>
        <td colspan="4">

            {!! $risalah->kesimpulan !!}
            <div class="signature-block">
                Jakarta, {{ \Carbon\Carbon::parse($risalah->tanggal)->translatedFormat('F Y') }}<br>
                Pimpinan Rapat<br><br><br>
                <span class="signature-name">{{ $risalah->pimpinan }}</span><br>
                Ka SPI
            </div>
        </td>
    </tr>
</table>

<div class="page-break"></div>

<div class="lampiran-title">Lampiran : Daftar Hadir</div>

<table class="main-table">
    <tr>
        <td class="logo-cell" rowspan="5">
            @if ($logo)<img src="{{ $logo }}">@endif
        </td>
        <td colspan="2" class="header-title">DAFTAR HADIR</td>
    </tr>
    <tr>
        <td class="info-label">Agenda / Kegiatan :</td>
        <td class="info-value">{{ $risalah->agenda }}</td>
    </tr>
    <tr>
        <td class="info-label">Hari / Tanggal :</td>
        <td class="info-value">{{ \Carbon\Carbon::parse($risalah->tanggal)->translatedFormat('l, d F Y') }}</td>
    </tr>
    <tr>
        <td class="info-label">Waktu :</td>
        <td class="info-value">{{ $risalah->waktu_mulai }} - Selesai</td>
    </tr>
    <tr>
        <td class="info-label">Tempat :</td>
        <td class="info-value">{{ $risalah->tempat }}</td>
    </tr>
</table>

<table class="table-peserta">
    <thead>
        <tr>
            <th width="30">No</th>
            <th>Nama</th>
            <th width="60">NP</th>
            <th>Jabatan</th>
            <th>Unit Kerja / Instansi</th>
            <th width="120">Tanda Tangan</th>
        </tr>
    </thead>
    <tbody>
        @forelse($presenceDetails as $detail)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td class="text-left">{{ $detail->nama }}</td>
                <td>{{ $detail->np }}</td>
                <td class="text-left">{{ $detail->jabatan }}</td>
                <td class="text-left">{{ $detail->asal_instansi }}</td>
                <td>
                    @if ($detail->tanda_tangan)
                        @php
                            $ttdPath = public_path('uploads/' . $detail->tanda_tangan);
                            $ttdBase64 = file_exists($ttdPath)
                                ? 'data:image/' . pathinfo($ttdPath, PATHINFO_EXTENSION) . ';base64,' . base64_encode(file_get_contents($ttdPath))
                                : null;
                        @endphp
                        @if ($ttdBase64)<img src="{{ $ttdBase64 }}" style="max-width: 100%; max-height:40px;">@endif
                    @endif
                </td>
            </tr>
        @empty
            <tr><td colspan="6">Tidak ada data peserta.</td></tr>
        @endforelse
    </tbody>
</table>

</body>
</html> --}}


{{-- <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Risalah Rapat</title>
    <style>
        * { font-family: Arial, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; }
        table, th, td { border: 1px solid black; padding: 6px; vertical-align: middle; }
        .page-break { page-break-before: always; }

        /* Biar tabel & baris ga kepotong */
        thead { display: table-header-group; }
        tfoot { display: table-footer-group; }
        tr, td, th { page-break-inside: avoid; }

        .no-split { page-break-inside: avoid; }

        /* Header Risalah */
        .header-logo-cell { width: 100px; text-align: center; padding: 6px; }
        .header-logo-cell img { width: 70px; object-fit: contain; display: block; margin: 0 auto; }
        .header-title-cell { text-align: center; font-weight: bold; font-size: 14px; }

        /* Section abu-abu */
        .section-header { background: #cfc9a5; font-weight: bold; padding: 6px; height: 24px; }
        .section-spacer { background: #e0e0e0; height: 20px; }

        /* Checkbox */
        .checkbox { display: inline-block; width: 12px; height: 12px; border: 1px solid black; margin-right: 4px;
            vertical-align: middle; background: #f2f2f2; text-align: center; font-size: 11px; line-height: 12px; }
        .checkbox.checked::after { content: "X"; color: black; font-weight: bold; }

        /* Signature */
        .signature-block { margin-top: 40px; text-align: right; }
        .signature-name { text-decoration: underline; font-weight: bold; }

        /* Lampiran / Daftar Hadir */
        .lampiran-title { text-align: center; font-weight: bold; margin-bottom: 6px; }

        .main-table { width: 100%; border-collapse: collapse; border: 1px solid black; margin-bottom: 10px; }
        .main-table td, .main-table th { border: 1px solid black; padding: 6px; vertical-align: middle; font-size: 12px; }
        .logo-cell { width: 120px; text-align: center; padding: 10px; }
        .logo-cell img { width: 90px; height: 90px; object-fit: contain; }
        .header-title { text-align: center; font-weight: bold; padding: 6px; font-size: 16px; text-transform: uppercase; }
        .info-label { width: 25%; text-align: left; font-weight: bold; white-space: nowrap; }
        .info-value { width: 65%; text-align: left; }
        .table-peserta { width: 100%; border-collapse: collapse; margin-top: 6px; }
        .table-peserta th, .table-peserta td { border: 1px solid black; padding: 6px; text-align: center; font-size: 12px; }
        .table-peserta td.text-left { text-align: left; }
    </style>
</head>
<body>
@php
    $path = public_path('assets/logo.png');
    $logo = null;
    if (file_exists($path)) {
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $logo = 'data:image/' . $type . ';base64,' . base64_encode($data);
    }
@endphp

<!-- Header -->
<table>
    <tr>
        <td rowspan="4" class="header-logo-cell">
            @if ($logo)<img src="{{ $logo }}">@endif
        </td>
        <td colspan="2" class="header-title-cell">RISALAH RAPAT</td>
    </tr>
    <tr><td>Hari/Tanggal</td><td>: {{ \Carbon\Carbon::parse($risalah->tanggal)->translatedFormat('F Y') }}</td></tr>
    <tr><td>Waktu</td><td>: {{ $risalah->waktu_mulai }} s.d Selesai</td></tr>
    <tr><td>Tempat</td><td>: {{ $risalah->tempat }}</td></tr>
</table>

<!-- Agenda, Pimpinan, Peserta + Jenis Rapat (dijamin 1 blok) -->
<table class="no-split ">
    <tr><td>Agenda</td><td colspan="3">: {{ $risalah->agenda }}</td></tr>
    <tr><td>Pimpinan Rapat</td><td>: {{ $risalah->pimpinan }}</td><td>Pencatat Rapat</td><td>: {{ $risalah->pencatat }}</td></tr>
    <tr><td>Peserta Rapat</td><td colspan="3">: Daftar Hadir Terlampir</td></tr>
    <tr class="no-split">
        <td>Jenis Rapat</td>
        <td colspan="3" style="padding:0;">
            <table style="width:100%; border:none;">
                <tr>
                    <td style="border:none;"><span class="checkbox {{ $risalah->jenis_rapat == 'Entry Meeting' ? 'checked' : '' }}"></span> Entry Meeting</td>
                    <td style="border:none;"><span class="checkbox {{ $risalah->jenis_rapat == 'Expose Meeting' ? 'checked' : '' }}"></span> Expose Meeting</td>
                    <td style="border:none;"><span class="checkbox {{ $risalah->jenis_rapat == 'Exit Meeting' ? 'checked' : '' }}"></span> Exit Meeting</td>
                    <td style="border:none;"><span class="checkbox {{ $risalah->jenis_rapat == 'Lainnya' ? 'checked' : '' }}"></span> Lainnya</td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<!-- Penjelasan & Kesimpulan -->
<div class="no-split">
    <div class="section-header">Penjelasan Rapat</div>
    <div style="padding: 10px; border: 1px solid black; border-top: none;">
        {!! $risalah->penjelasan !!}
    </div>

    <div class="section-header">Kesimpulan</div>
    <div style="padding: 10px; border: 1px solid black; border-top: none;">
        {!! $risalah->kesimpulan !!}
        <div class="signature-block">
            Jakarta, {{ \Carbon\Carbon::parse($risalah->tanggal)->translatedFormat('F Y') }}<br>
            Pimpinan Rapat<br><br><br>
            <span class="signature-name">{{ $risalah->pimpinan }}</span><br>
            Ka SPI
        </div>
    </div>
</div>

<div class="page-break"></div>

<!-- Lampiran Daftar Hadir -->
<div class="no-split">
    <div class="lampiran-title">Lampiran : Daftar Hadir</div>

    <table class="main-table">
        <tr>
            <td class="logo-cell" rowspan="5">
                @if ($logo)<img src="{{ $logo }}">@endif
            </td>
            <td colspan="2" class="header-title">DAFTAR HADIR</td>
        </tr>
        <tr><td class="info-label">Agenda / Kegiatan :</td><td class="info-value">{{ $risalah->agenda }}</td></tr>
        <tr><td class="info-label">Hari / Tanggal :</td><td class="info-value">{{ \Carbon\Carbon::parse($risalah->tanggal)->translatedFormat('l, d F Y') }}</td></tr>
        <tr><td class="info-label">Waktu :</td><td class="info-value">{{ $risalah->waktu_mulai }} - Selesai</td></tr>
        <tr><td class="info-label">Tempat :</td><td class="info-value">{{ $risalah->tempat }}</td></tr>
    </table>

    <table class="table-peserta">
        <thead>
            <tr>
                <th width="30">No</th>
                <th>Nama</th>
                <th width="60">NP</th>
                <th>Jabatan</th>
                <th>Unit Kerja / Instansi</th>
                <th width="120">Tanda Tangan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($presenceDetails as $detail)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="text-left">{{ $detail->nama }}</td>
                    <td>{{ $detail->np }}</td>
                    <td class="text-left">{{ $detail->jabatan }}</td>
                    <td class="text-left">{{ $detail->asal_instansi }}</td>
                    <td>
                        @if ($detail->tanda_tangan)
                            @php
                                $ttdPath = public_path('uploads/' . $detail->tanda_tangan);
                                $ttdBase64 = file_exists($ttdPath)
                                    ? 'data:image/' . pathinfo($ttdPath, PATHINFO_EXTENSION) . ';base64,' . base64_encode(file_get_contents($ttdPath))
                                    : null;
                            @endphp
                            @if ($ttdBase64)<img src="{{ $ttdBase64 }}" style="max-width: 100%; max-height:40px;">@endif
                        @endif
                    </td>
                </tr>
            @empty
                <tr><td colspan="6">Tidak ada data peserta.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

</body>
</html> --}}


{{--
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Risalah Rapat</title>
    <style>
        * { font-family: Arial, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; }
        table, th, td { border: 1px solid black; padding: 6px; vertical-align: middle; }
        .page-break { page-break-before: always; }

        thead { display: table-header-group; }
        tfoot { display: table-footer-group; }
        tr, td, th { page-break-inside: avoid; }

        .no-split { page-break-inside: avoid; }

        .header-logo-cell { width: 100px; text-align: center; padding: 6px; }
        .header-logo-cell img { width: 70px; object-fit: contain; display: block; margin: 0 auto; }
        .header-title-cell { text-align: center; font-weight: bold; font-size: 14px; }

        /* Ubah CSS agar border bagian penjelasan dan kesimpulan terpisah dengan rapi */
        .section-header { background: #cfc9a5; font-weight: bold; padding: 6px; height: 24px; border: 1px solid black; border-bottom: none; }
        .section-content { padding: 10px; border: 1px solid black; }

        .checkbox { display: inline-block; width: 12px; height: 12px; border: 1px solid black; margin-right: 4px;
            vertical-align: middle; background: #f2f2f2; text-align: center; font-size: 11px; line-height: 12px; }
        .checkbox.checked::after { content: "X"; color: black; font-weight: bold; }

        .signature-block { margin-top: 40px; text-align: right; }
        .signature-name { text-decoration: underline; font-weight: bold; }

        .lampiran-title { text-align: center; font-weight: bold; margin-bottom: 6px; }

        .main-table { width: 100%; border-collapse: collapse; border: 1px solid black; margin-bottom: 10px; }
        .main-table td, .main-table th { border: 1px solid black; padding: 6px; vertical-align: middle; font-size: 12px; }
        .logo-cell { width: 120px; text-align: center; padding: 10px; }
        .logo-cell img { width: 90px; height: 90px; object-fit: contain; }
        .header-title { text-align: center; font-weight: bold; padding: 6px; font-size: 16px; text-transform: uppercase; }
        .info-label { width: 25%; text-align: left; font-weight: bold; white-space: nowrap; }
        .info-value { width: 65%; text-align: left; }
        .table-peserta { width: 100%; border-collapse: collapse; margin-top: 6px; }
        .table-peserta th, .table-peserta td { border: 1px solid black; padding: 6px; text-align: center; font-size: 12px; }
        .table-peserta td.text-left { text-align: left; }
    </style>
</head>
<body>
@php
    $path = public_path('assets/logo.png');
    $logo = null;
    if (file_exists($path)) {
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $logo = 'data:image/' . $type . ';base64,' . base64_encode($data);
    }
@endphp

<table>
    <tr>
        <td rowspan="4" class="header-logo-cell">
            @if ($logo)<img src="{{ $logo }}">@endif
        </td>
        <td colspan="2" class="header-title-cell">RISALAH RAPAT</td>
    </tr>
    <tr><td>Hari/Tanggal</td><td>: {{ \Carbon\Carbon::parse($risalah->tanggal)->translatedFormat('F Y') }}</td></tr>
    <tr><td>Waktu</td><td>: {{ $risalah->waktu_mulai }} s.d Selesai</td></tr>
    <tr><td>Tempat</td><td>: {{ $risalah->tempat }}</td></tr>
</table>

<table class="no-split ">
    <tr><td>Agenda</td><td colspan="3">: {{ $risalah->agenda }}</td></tr>
    <tr><td>Pimpinan Rapat</td><td>: {{ $risalah->pimpinan }}</td><td>Pencatat Rapat</td><td>: {{ $risalah->pencatat }}</td></tr>
    <tr><td>Peserta Rapat</td><td colspan="3">: Daftar Hadir Terlampir</td></tr>
    <tr class="no-split">
        <td>Jenis Rapat</td>
        <td colspan="3" style="padding:0;">
            <table style="width:100%; border:none;">
                <tr>
                    <td style="border:none;"><span class="checkbox {{ $risalah->jenis_rapat == 'Entry Meeting' ? 'checked' : '' }}"></span> Entry Meeting</td>
                    <td style="border:none;"><span class="checkbox {{ $risalah->jenis_rapat == 'Expose Meeting' ? 'checked' : '' }}"></span> Expose Meeting</td>
                    <td style="border:none;"><span class="checkbox {{ $risalah->jenis_rapat == 'Exit Meeting' ? 'checked' : '' }}"></span> Exit Meeting</td>
                    <td style="border:none;"><span class="checkbox {{ $risalah->jenis_rapat == 'Lainnya' ? 'checked' : '' }}"></span> Lainnya</td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<div class="no-split">
    <div class="section-header">Penjelasan Rapat</div>
    <div class="section-content">
        {!! $risalah->penjelasan !!}
    </div>

    <div class="section-header" style="margin-top: 20px;">Kesimpulan</div>
    <div class="section-content">
        {!! $risalah->kesimpulan !!}
        <div class="signature-block">
            Jakarta, {{ \Carbon\Carbon::parse($risalah->tanggal)->translatedFormat('F Y') }}<br>
            Pimpinan Rapat<br><br><br>
            <span class="signature-name">{{ $risalah->pimpinan }}</span><br>
            Ka SPI
        </div>
    </div>
</div>

<div class="page-break"></div>

<div class="no-split">
    <div class="lampiran-title">Lampiran : Daftar Hadir</div>

    <table class="main-table">
        <tr>
            <td class="logo-cell" rowspan="5">
                @if ($logo)<img src="{{ $logo }}">@endif
            </td>
            <td colspan="2" class="header-title">DAFTAR HADIR</td>
        </tr>
        <tr><td class="info-label">Agenda / Kegiatan :</td><td class="info-value">{{ $risalah->agenda }}</td></tr>
        <tr><td class="info-label">Hari / Tanggal :</td><td class="info-value">{{ \Carbon\Carbon::parse($risalah->tanggal)->translatedFormat('l, d F Y') }}</td></tr>
        <tr><td class="info-label">Waktu :</td><td class="info-value">{{ $risalah->waktu_mulai }} - Selesai</td></tr>
        <tr><td class="info-label">Tempat :</td><td class="info-value">{{ $risalah->tempat }}</td></tr>
    </table>

    <table class="table-peserta">
        <thead>
            <tr>
                <th width="30">No</th>
                <th>Nama</th>
                <th width="60">NP</th>
                <th>Jabatan</th>
                <th>Unit Kerja / Instansi</th>
                <th width="120">Tanda Tangan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($presenceDetails as $detail)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="text-left">{{ $detail->nama }}</td>
                    <td>{{ $detail->np }}</td>
                    <td class="text-left">{{ $detail->jabatan }}</td>
                    <td class="text-left">{{ $detail->asal_instansi }}</td>
                    <td>
                        @if ($detail->tanda_tangan)
                            @php
                                $ttdPath = public_path('uploads/' . $detail->tanda_tangan);
                                $ttdBase64 = file_exists($ttdPath)
                                    ? 'data:image/' . pathinfo($ttdPath, PATHINFO_EXTENSION) . ';base64,' . base64_encode(file_get_contents($ttdPath))
                                    : null;
                            @endphp
                            @if ($ttdBase64)<img src="{{ $ttdBase64 }}" style="max-width: 100%; max-height:40px;">@endif
                        @endif
                    </td>
                </tr>
            @empty
                <tr><td colspan="6">Tidak ada data peserta.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

</body>
</html> --}}

{{--
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Risalah Rapat</title>
    <style>
        * { font-family: Arial, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; }
        table, th, td { border: 1px solid black; padding: 6px; vertical-align: middle; }
        .page-break { page-break-before: always; }

        thead { display: table-header-group; }
        tfoot { display: table-footer-group; }
        tr, td, th { page-break-inside: avoid; }

        .no-split { page-break-inside: avoid; }

        .header-logo-cell { width: 100px; text-align: center; padding: 6px; }
        .header-logo-cell img { width: 70px; object-fit: contain; display: block; margin: 0 auto; }
        .header-title-cell { text-align: center; font-weight: bold; font-size: 14px; }

        /* Tetap pakai desain awal */
        .section-header {
            background: #cfc9a5;
            font-weight: bold;
            padding: 6px;
            height: 24px;
            border: 1px solid black;
            border-bottom: none;
        }
        .section-content {
            border: 1px solid black;
            padding: 10px;
        }

        .checkbox { display: inline-block; width: 12px; height: 12px; border: 1px solid black; margin-right: 4px;
            vertical-align: middle; background: #f2f2f2; text-align: center; font-size: 11px; line-height: 12px; }
        .checkbox.checked::after { content: "X"; color: black; font-weight: bold; }

        .signature-block { margin-top: 40px; text-align: right; }
        .signature-name { text-decoration: underline; font-weight: bold; }

        .lampiran-title { text-align: center; font-weight: bold; margin-bottom: 6px; }

        .main-table { width: 100%; border-collapse: collapse; border: 1px solid black; margin-bottom: 10px; }
        .main-table td, .main-table th { border: 1px solid black; padding: 6px; vertical-align: middle; font-size: 12px; }
        .logo-cell { width: 120px; text-align: center; padding: 10px; }
        .logo-cell img { width: 90px; height: 90px; object-fit: contain; }
        .header-title { text-align: center; font-weight: bold; padding: 6px; font-size: 16px; text-transform: uppercase; }
        .info-label { width: 25%; text-align: left; font-weight: bold; white-space: nowrap; }
        .info-value { width: 65%; text-align: left; }
        .table-peserta { width: 100%; border-collapse: collapse; margin-top: 6px; }
        .table-peserta th, .table-peserta td { border: 1px solid black; padding: 6px; text-align: center; font-size: 12px; }
        .table-peserta td.text-left { text-align: left; }
    </style>
</head>
<body>
@php
    $path = public_path('assets/logo.png');
    $logo = null;
    if (file_exists($path)) {
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $logo = 'data:image/' . $type . ';base64,' . base64_encode($data);
    }
@endphp

<table>
    <tr>
        <td rowspan="4" class="header-logo-cell">
            @if ($logo)<img src="{{ $logo }}">@endif
        </td>
        <td colspan="2" class="header-title-cell">RISALAH RAPAT</td>
    </tr>
    <tr><td>Hari/Tanggal</td><td>: {{ \Carbon\Carbon::parse($risalah->tanggal)->translatedFormat('F Y') }}</td></tr>
    <tr><td>Waktu</td><td>: {{ $risalah->waktu_mulai }} s.d Selesai</td></tr>
    <tr><td>Tempat</td><td>: {{ $risalah->tempat }}</td></tr>
</table>

<table class="no-split ">
    <tr><td>Agenda</td><td colspan="3">: {{ $risalah->agenda }}</td></tr>
    <tr><td>Pimpinan Rapat</td><td>: {{ $risalah->pimpinan }}</td><td>Pencatat Rapat</td><td>: {{ $risalah->pencatat }}</td></tr>
    <tr><td>Peserta Rapat</td><td colspan="3">: Daftar Hadir Terlampir</td></tr>
    <tr class="no-split">
        <td>Jenis Rapat</td>
        <td colspan="3" style="padding:0;">
            <table style="width:100%; border:none;">
                <tr>
                    <td style="border:none;"><span class="checkbox {{ $risalah->jenis_rapat == 'Entry Meeting' ? 'checked' : '' }}"></span> Entry Meeting</td>
                    <td style="border:none;"><span class="checkbox {{ $risalah->jenis_rapat == 'Expose Meeting' ? 'checked' : '' }}"></span> Expose Meeting</td>
                    <td style="border:none;"><span class="checkbox {{ $risalah->jenis_rapat == 'Exit Meeting' ? 'checked' : '' }}"></span> Exit Meeting</td>
                    <td style="border:none;"><span class="checkbox {{ $risalah->jenis_rapat == 'Lainnya' ? 'checked' : '' }}"></span> Lainnya</td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<!-- Penjelasan & Kesimpulan tetap desain awal, tapi jadi satu blok -->
<div class="no-split">
    <div class="section-header">Penjelasan Rapat & Kesimpulan</div>
    <div class="section-content">
        <strong>Penjelasan:</strong><br>
        {!! $risalah->penjelasan !!}
        <br><br>
        <strong>Kesimpulan:</strong><br>
        {!! $risalah->kesimpulan !!}
        <div class="signature-block">
            Jakarta, {{ \Carbon\Carbon::parse($risalah->tanggal)->translatedFormat('F Y') }}<br>
            Pimpinan Rapat<br><br><br>
            <span class="signature-name">{{ $risalah->pimpinan }}</span><br>
            Ka SPI
        </div>
    </div>
</div>

<div class="page-break"></div>

<div class="no-split">
    <div class="lampiran-title">Lampiran : Daftar Hadir</div>

    <table class="main-table">
        <tr>
            <td class="logo-cell" rowspan="5">
                @if ($logo)<img src="{{ $logo }}">@endif
            </td>
            <td colspan="2" class="header-title">DAFTAR HADIR</td>
        </tr>
        <tr><td class="info-label">Agenda / Kegiatan :</td><td class="info-value">{{ $risalah->agenda }}</td></tr>
        <tr><td class="info-label">Hari / Tanggal :</td><td class="info-value">{{ \Carbon\Carbon::parse($risalah->tanggal)->translatedFormat('l, d F Y') }}</td></tr>
        <tr><td class="info-label">Waktu :</td><td class="info-value">{{ $risalah->waktu_mulai }} - Selesai</td></tr>
        <tr><td class="info-label">Tempat :</td><td class="info-value">{{ $risalah->tempat }}</td></tr>
    </table>

    <table class="table-peserta">
        <thead>
            <tr>
                <th width="30">No</th>
                <th>Nama</th>
                <th width="60">NP</th>
                <th>Jabatan</th>
                <th>Unit Kerja / Instansi</th>
                <th width="120">Tanda Tangan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($presenceDetails as $detail)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="text-left">{{ $detail->nama }}</td>
                    <td>{{ $detail->np }}</td>
                    <td class="text-left">{{ $detail->jabatan }}</td>
                    <td class="text-left">{{ $detail->asal_instansi }}</td>
                    <td>
                        @if ($detail->tanda_tangan)
                            @php
                                $ttdPath = public_path('uploads/' . $detail->tanda_tangan);
                                $ttdBase64 = file_exists($ttdPath)
                                    ? 'data:image/' . pathinfo($ttdPath, PATHINFO_EXTENSION) . ';base64,' . base64_encode(file_get_contents($ttdPath))
                                    : null;
                            @endphp
                            @if ($ttdBase64)<img src="{{ $ttdBase64 }}" style="max-width: 100%; max-height:40px;">@endif
                        @endif
                    </td>
                </tr>
            @empty
                <tr><td colspan="6">Tidak ada data peserta.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

</body>
</html> --}}



<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Risalah Rapat</title>
    <style>
        * { font-family: Arial, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; }
        table, th, td { border: 1px solid black; padding: 6px; vertical-align: middle; }
        .page-break { page-break-before: always; }

        thead { display: table-header-group; }
        tfoot { display: table-footer-group; }
        tr, td, th { page-break-inside: avoid; }

        .no-split { page-break-inside: avoid; }

        /* Header */
        .header-logo-cell { width: 100px; text-align: center; padding: 6px; }
        .header-logo-cell img { width: 70px; object-fit: contain; display: block; margin: 0 auto; }
        .header-title-cell { text-align: center; font-weight: bold; font-size: 14px; }

        /* Section: Penjelasan + Kesimpulan */
        .section-header {
            background: #cfc9a5;
            font-weight: bold;
            padding: 6px;
            height: 24px;
            border: 1px solid black;
            border-bottom: none;
        }
        .section-content {
            border: 1px solid black;
            padding: 10px;
            border-top: none;   /* biar nyambung */
        }

        /* Checkbox */
        .checkbox { display: inline-block; width: 12px; height: 12px; border: 1px solid black; margin-right: 4px;
            vertical-align: middle; background: #f2f2f2; text-align: center; font-size: 11px; line-height: 12px; }
        .checkbox.checked::after { content: "X"; color: black; font-weight: bold; }

        /* Signature */
        .signature-block { margin-top: 40px; text-align: right; }
        .signature-name { text-decoration: underline; font-weight: bold; }

        /* Lampiran */
        .lampiran-title { text-align: center; font-weight: bold; margin-bottom: 6px; }

        .main-table { width: 100%; border-collapse: collapse; border: 1px solid black; margin-bottom: 10px; }
        .main-table td, .main-table th { border: 1px solid black; padding: 6px; vertical-align: middle; font-size: 12px; }
        .logo-cell { width: 120px; text-align: center; padding: 10px; }
        .logo-cell img { width: 90px; height: 90px; object-fit: contain; }
        .header-title { text-align: center; font-weight: bold; padding: 6px; font-size: 16px; text-transform: uppercase; }
        .info-label { width: 25%; text-align: left; font-weight: bold; white-space: nowrap; }
        .info-value { width: 65%; text-align: left; }
        .table-peserta { width: 100%; border-collapse: collapse; margin-top: 6px; }
        .table-peserta th, .table-peserta td { border: 1px solid black; padding: 6px; text-align: center; font-size: 12px; }
        .table-peserta td.text-left { text-align: left; }
    </style>
</head>
<body>
@php
    $path = public_path('assets/logo.png');
    $logo = null;
    if (file_exists($path)) {
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $logo = 'data:image/' . $type . ';base64,' . base64_encode($data);
    }
@endphp

<!-- HEADER -->
<table>
    <tr>
        <td rowspan="4" class="header-logo-cell">
            @if ($logo)<img src="{{ $logo }}">@endif
        </td>
        <td colspan="2" class="header-title-cell">RISALAH RAPAT</td>
    </tr>
    <tr><td>Hari/Tanggal</td><td>: {{ \Carbon\Carbon::parse($risalah->tanggal)->translatedFormat('l, d F Y') }}</td></tr>
    <tr><td>Waktu</td><td>: {{ $risalah->waktu_mulai }} s.d Selesai</td></tr>
    <tr><td>Tempat</td><td>: {{ $risalah->tempat }}</td></tr>
</table>

<!-- INFO RAPAT -->
<table class="no-split">
    <tr><td>Agenda</td><td colspan="3">: {{ $risalah->agenda }}</td></tr>
    <tr><td>Pimpinan Rapat</td><td>: {{ $risalah->pimpinan }}</td><td>Pencatat Rapat</td><td>: {{ $risalah->pencatat }}</td></tr>
    <tr><td>Peserta Rapat</td><td colspan="3">: Daftar Hadir Terlampir</td></tr>
    <tr class="no-split">
        <td>Jenis Rapat</td>
        <td colspan="3" style="padding:0;">
            <table style="width:100%; border:none;">
                <tr>
                    <td style="border:none;"><span class="checkbox {{ $risalah->jenis_rapat == 'Entry Meeting' ? 'checked' : '' }}"></span> Entry Meeting</td>
                    <td style="border:none;"><span class="checkbox {{ $risalah->jenis_rapat == 'Expose Meeting' ? 'checked' : '' }}"></span> Expose Meeting</td>
                    <td style="border:none;"><span class="checkbox {{ $risalah->jenis_rapat == 'Exit Meeting' ? 'checked' : '' }}"></span> Exit Meeting</td>
                    <td style="border:none;"><span class="checkbox {{ $risalah->jenis_rapat == 'Lainnya' ? 'checked' : '' }}"></span> Lainnya</td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<!-- PENJELASAN + KESIMPULAN -->
<div class="no-split">
    <div class="section-header">Penjelasan Rapat</div>
    <div class="section-content">
        {!! $risalah->penjelasan !!}
    </div>

    <div class="section-header" style="margin-top: 10px;">Kesimpulan</div>
    <div class="section-content">
        {!! $risalah->kesimpulan !!}
        <div class="signature-block">
            Jakarta, {{ \Carbon\Carbon::parse($risalah->tanggal)->translatedFormat('d F Y') }}<br>
            Pimpinan Rapat<br><br><br>
            <span class="signature-name">{{ $risalah->pimpinan }}</span><br>
            Ka SPI
        </div>
    </div>
</div>

<!-- PAGE BREAK -->
<div class="page-break"></div>

<!-- LAMPIRAN DAFTAR HADIR -->
<div class="no-split">
    <div class="lampiran-title">Lampiran : Daftar Hadir</div>

    <table class="main-table">
        <tr>
            <td class="logo-cell" rowspan="5">
                @if ($logo)<img src="{{ $logo }}">@endif
            </td>
            <td colspan="2" class="header-title">DAFTAR HADIR</td>
        </tr>
        <tr><td class="info-label">Agenda / Kegiatan :</td><td class="info-value">{{ $risalah->agenda }}</td></tr>
        <tr><td class="info-label">Hari / Tanggal :</td><td class="info-value">{{ \Carbon\Carbon::parse($risalah->tanggal)->translatedFormat('l, d F Y') }}</td></tr>
        <tr><td class="info-label">Waktu :</td><td class="info-value">{{ $risalah->waktu_mulai }} - Selesai</td></tr>
        <tr><td class="info-label">Tempat :</td><td class="info-value">{{ $risalah->tempat }}</td></tr>
    </table>

    <table class="table-peserta">
        <thead>
            <tr>
                <th width="30">No</th>
                <th>Nama</th>
                <th width="60">NP</th>
                <th>Jabatan</th>
                <th>Unit Kerja / Instansi</th>
                <th width="120">Tanda Tangan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($presenceDetails as $detail)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="text-left">{{ $detail->nama }}</td>
                    <td>{{ $detail->np }}</td>
                    <td class="text-left">{{ $detail->jabatan }}</td>
                    <td class="text-left">{{ $detail->asal_instansi }}</td>
                    <td>
                        @if ($detail->tanda_tangan)
                            @php
                                $ttdPath = public_path('uploads/' . $detail->tanda_tangan);
                                $ttdBase64 = file_exists($ttdPath)
                                    ? 'data:image/' . pathinfo($ttdPath, PATHINFO_EXTENSION) . ';base64,' . base64_encode(file_get_contents($ttdPath))
                                    : null;
                            @endphp
                            @if ($ttdBase64)<img src="{{ $ttdBase64 }}" style="max-width: 100%; max-height:40px;">@endif
                        @endif
                    </td>
                </tr>
            @empty
                <tr><td colspan="6">Tidak ada data peserta.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

</body>
</html>
