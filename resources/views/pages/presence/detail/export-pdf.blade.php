{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
</head>

<style>
    .text-center {
        text-align: center;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .mb-2 {
        margin-bottom: 20px;
    }

    .table table,
    .table th,
    .table td {
        border: 1px solid black;
        padding: 10px 4px;
    }
</style>

<body>

    <h1 class="text-center">{{ env('APP_NAME') }}</h1>

    <table class="mb-2">
        <tr>
            <td width="150">Nama Kegiatan</td>
            <td width="20">:</td>
            <td>{{ $presence->nama_kegiatan }}</td>
        </tr>
        <tr>
            <td>Tanggal Kegiatan</td>
            <td>:</td>
            <td>{{ date('d F Y', strtotime($presence->tgl_kegiatan)) }}</td>
        </tr>
        <tr>
            <td>Waktu Mulai</td>
            <td>:</td>
            <td>{{ date('H:i', strtotime($presence->tgl_kegiatan)) }}</td>
        </tr>
    </table>

    <table class="table">
        <thead>
            <tr>
                <th width="50">No.</th>
                <th width="120">Tanggal</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Asal Instansi</th>
                <th width="120">Tanda Tangan</th>
            </tr>
        </thead>
        <tbody>
            @if ($presenceDetails->isEmpty())
                <tr>
                    <td colspan="6" class="text-center">Tidak ada data</td>
                </tr>
            @endif
            @foreach ($presenceDetails as $detail)
                <tr>
                    <td class="text-center">
                        {{ $loop->iteration }}
                    </td>
                    <td class="text-center">
                        {{ date('d/m/Y H:i', strtotime($presence->created_at)) }}
                    </td>
                    <td>{{ $detail->nama }}</td>
                    <td>{{ $detail->jabatan }}</td>
                    <td>{{ $detail->asal_instansi }}</td>
                    <td class="text-center">
                        @if ($detail->tanda_tangan)
                            @php
                                $path = public_path('uploads/' . $detail->tanda_tangan);
                                $type = pathinfo($path, PATHINFO_EXTENSION);
                                $data = file_get_contents($path);
                                $img = 'data:image/' . $type . ';base64,' . base64_encode($data);
                            @endphp
                            <img src="{{ $img }}" alt="Absen" style="max-width: 100%;max-height:40px;">
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html> --}}



{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
</head>

<style>
    .text-center {
        text-align: center;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .mb-2 {
        margin-bottom: 20px;
    }

    .table table,
    .table th,
    .table td {
        border: 1px solid black;
        padding: 10px 4px;
    }
</style>

<body>

    <h1 class="text-center">{{ env('APP_NAME') }}</h1>

    <table class="mb-2">
        <tr>
            <td width="150">Nama Kegiatan</td>
            <td width="20">:</td>
            <td>{{ $presence->nama_kegiatan }}</td>
        </tr>
        <tr>
            <td>Tanggal Kegiatan</td>
            <td>:</td>
            <td>{{ date('d F Y', strtotime($presence->tgl_kegiatan)) }}</td>
        </tr>
        <tr>
            <td>Waktu Mulai</td>
            <td>:</td>
            <td>{{ date('H:i', strtotime($presence->tgl_kegiatan)) }}</td>
        </tr>
    </table>

    <table class="table">
        <thead>
            <tr>
                <th width="50">No.</th>
                <th>Nama</th>
                <th>NP</th>
                <th>Jabatan</th>
                <th>Asal Instansi</th>
                <th width="120">Tanda Tangan</th>
            </tr>
        </thead>
        <tbody>
            @if ($presenceDetails->isEmpty())
                <tr>
                    <td colspan="6" class="text-center">Tidak ada data</td>
                </tr>
            @endif
            @foreach ($presenceDetails as $detail)
                <tr>
                    <td class="text-center">
                        {{ $loop->iteration }}
                    </td>
                    <td>{{ $detail->nama }}</td>
                    <td>{{ $detail->np }}</td>
                    <td>{{ $detail->jabatan }}</td>
                    <td>{{ $detail->asal_instansi }}</td>
                    <td class="text-center">
                        @if ($detail->tanda_tangan)
                            @php
                                $path = public_path('uploads/' . $detail->tanda_tangan);
                                $type = pathinfo($path, PATHINFO_EXTENSION);
                                $data = file_get_contents($path);
                                $img = 'data:image/' . $type . ';base64,' . base64_encode($data);
                            @endphp
                            <img src="{{ $img }}" alt="Tanda Tangan" style="max-width: 100%; max-height:40px;">
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html> --}}


{{-- <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Daftar Hadir</title>
  <style>
    * {
      box-sizing: border-box;
      font-family: Arial, sans-serif;
      font-size: 15px;
    }

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
      padding: 10px;
    }

    .logo-cell img {
      width: 120px;
      height: 80px;
      object-fit: contain;
    }

    .header-title {
      text-align: center;
      font-weight: bold;
      padding: 6px;
      border-bottom: 1px solid black;
    }

    .info-label {
      width: 30%;
      text-align: left;
    }

    .info-separator {
      width: 5%;
      text-align: center;
      color: #2563eb;
      border-right: 2px solid black;
    }

    .info-value {
      width: 65%;
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

  <!-- HEADER -->
  <table class="main-table">
    <tr>
      <td class="logo-cell" rowspan="5">
        <img src="{{ public_path('logo/peruri.png') }}" alt="Logo PERURI dengan bintang ungu">
      </td>
      <td colspan="3" class="header-title">DAFTAR HADIR</td>
    </tr>
    <tr>
      <td class="info-label">Nama Kegiatan</td>
      <td class="info-separator">:</td>
      <td class="info-value">{{ $presence->nama_kegiatan ?? '' }}</td>
    </tr>
    <tr>
      <td class="info-label">Hari/Tanggal</td>
      <td class="info-separator">:</td>
      <td class="info-value">{{ \Carbon\Carbon::parse($presence->tgl_kegiatan)->translatedFormat('l, d F Y') }}</td>
    </tr>
    <tr>
      <td class="info-label">Waktu</td>
      <td class="info-separator">:</td>
      <td class="info-value">{{ date('H:i', strtotime($presence->tgl_kegiatan)) }} - Selesai</td>
    </tr>
    <tr>
      <td class="info-label">Tempat</td>
      <td class="info-separator">:</td>
      <td class="info-value">{{ $presence->tempat ?? '-' }}</td>
    </tr>
  </table>

  <!-- TABEL PESERTA -->
  <table class="table-peserta">
    <thead>
      <tr>
        <th width="50">No.</th>
        <th>Nama</th>
        <th>NP</th>
        <th>Jabatan</th>
        <th>Asal Instansi</th>
        <th width="120">Tanda Tangan</th>
      </tr>
    </thead>
    <tbody>
      @if ($presenceDetails->isEmpty())
        <tr>
          <td colspan="6">Tidak ada data</td>
        </tr>
      @endif

      @foreach ($presenceDetails as $detail)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td class="text-left">{{ $detail->nama }}</td>
          <td>{{ $detail->np }}</td>
          <td class="text-left">{{ $detail->jabatan }}</td>
          <td class="text-left">{{ $detail->asal_instansi }}</td>
          <td>
            @if ($detail->tanda_tangan)
              @php
                $path = public_path('uploads/' . $detail->tanda_tangan);
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                $img = 'data:image/' . $type . ';base64,' . base64_encode($data);
              @endphp
              <img src="{{ $img }}" alt="Tanda Tangan" style="max-width: 100%; max-height:40px;">
            @endif
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

</body>

</html> --}}



{{-- <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Daftar Hadir</title>
  <style>
    * {
      box-sizing: border-box;
      font-family: Arial, sans-serif;
      font-size: 15px;
    }

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
      padding: 10px;
    }

    .logo-cell img {
      width: 120px;
      height: 80px;
      object-fit: contain;
    }

    .header-title {
      text-align: center;
      font-weight: bold;
      padding: 6px;
      border-bottom: 1px solid black;
    }

    .info-label {
      width: 30%;
      text-align: left;
    }

    .info-separator {
      width: 5%;
      text-align: center;
      color: #2563eb;
      border-right: 2px solid black;
    }

    .info-value {
      width: 65%;
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

  <!-- HEADER -->
  <table class="main-table">
    <tr>
      <td class="logo-cell" rowspan="5">
        <img src="{{ public_path('assets/logo.png') }}" >
      </td>
      <td colspan="3" class="header-title">DAFTAR HADIR</td>
    </tr>
    <tr>
      <td class="info-label">Nama Kegiatan</td>
      <td class="info-separator">:</td>
      <td class="info-value">{{ $presence->nama_kegiatan ?? '' }}</td>
    </tr>
    <tr>
      <td class="info-label">Hari/Tanggal</td>
      <td class="info-separator">:</td>
      <td class="info-value">{{ \Carbon\Carbon::parse($presence->tgl_kegiatan)->translatedFormat('l, d F Y') }}</td>
    </tr>
    <tr>
      <td class="info-label">Waktu</td>
      <td class="info-separator">:</td>
      <td class="info-value">{{ date('H:i', strtotime($presence->tgl_kegiatan)) }} - Selesai</td>
    </tr>
    <tr>
      <td class="info-label">Tempat</td>
      <td class="info-separator">:</td>
      <td class="info-value">{{ $presence->tempat ?? '-' }}</td>
    </tr>
  </table>

  <!-- TABEL PESERTA -->
  <table class="table-peserta">
    <thead>
      <tr>
        <th width="50">No.</th>
        <th>Nama</th>
        <th>NP</th>
        <th>Jabatan</th>
        <th>Asal Instansi</th>
        <th width="120">Tanda Tangan</th>
      </tr>
    </thead>
    <tbody>
      @if ($presenceDetails->isEmpty())
        <tr>
          <td colspan="6">Tidak ada data</td>
        </tr>
      @endif

      @foreach ($presenceDetails as $detail)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td class="text-left">{{ $detail->nama }}</td>
          <td>{{ $detail->np }}</td>
          <td class="text-left">{{ $detail->jabatan }}</td>
          <td class="text-left">{{ $detail->asal_instansi }}</td>
          <td>
            @if ($detail->tanda_tangan)
              @php
                $path = public_path('uploads/' . $detail->tanda_tangan);
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                $img = 'data:image/' . $type . ';base64,' . base64_encode($data);
              @endphp
              <img src="{{ $img }}" alt="Tanda Tangan" style="max-width: 100%; max-height:40px;">
            @endif
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

</body>

</html> --}}



{{-- <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Daftar Hadir</title>
  <style>
    * {
      box-sizing: border-box;
      font-family: Arial, sans-serif;
      font-size: 15px;
    }

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
      padding: 10px;
    }

    .logo-cell img {
      width: 120px;
      height: 80px;
      object-fit: contain;
    }

    .header-title {
      text-align: center;
      font-weight: bold;
      padding: 6px;
      border-bottom: 1px solid black;
    }

    .info-label {
      width: 30%;
      text-align: left;
    }

    .info-separator {
      width: 5%;
      text-align: center;
      color: #2563eb;
      border-right: 2px solid black;
    }

    .info-value {
      width: 65%;
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

  <!-- HEADER -->
  <table class="main-table">
    <tr>
      <td class="logo-cell" rowspan="5">
        <img src="{{ public_path('assets/logo.png') }}" style="width: 120px; height: 80px; object-fit: contain;">
      </td>
      <td colspan="3" class="header-title">DAFTAR HADIR</td>
    </tr>
    <tr>
      <td class="info-label">Nama Kegiatan</td>
      <td class="info-separator">:</td>
      <td class="info-value">{{ $presence->nama_kegiatan ?? '' }}</td>
    </tr>
    <tr>
      <td class="info-label">Hari/Tanggal</td>
      <td class="info-separator">:</td>
      <td class="info-value">{{ \Carbon\Carbon::parse($presence->tgl_kegiatan)->translatedFormat('l, d F Y') }}</td>
    </tr>
    <tr>
      <td class="info-label">Waktu</td>
      <td class="info-separator">:</td>
      <td class="info-value">{{ date('H:i', strtotime($presence->tgl_kegiatan)) }} - Selesai</td>
    </tr>
    <tr>
      <td class="info-label">Tempat</td>
      <td class="info-separator">:</td>
      <td class="info-value">{{ $presence->tempat ?? '-' }}</td>
    </tr>
  </table>

  <!-- TABEL PESERTA -->
  <table class="table-peserta">
    <thead>
      <tr>
        <th width="50">No.</th>
        <th>Nama</th>
        <th>NP</th>
        <th>Jabatan</th>
        <th>Asal Instansi</th>
        <th width="120">Tanda Tangan</th>
      </tr>
    </thead>
    <tbody>
      @if ($presenceDetails->isEmpty())
        <tr>
          <td colspan="6">Tidak ada data</td>
        </tr>
      @endif

      @foreach ($presenceDetails as $detail)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td class="text-left">{{ $detail->nama }}</td>
          <td>{{ $detail->np }}</td>
          <td class="text-left">{{ $detail->jabatan }}</td>
          <td class="text-left">{{ $detail->asal_instansi }}</td>
          <td>
            @if ($detail->tanda_tangan)
              @php
                $path = public_path('uploads/' . $detail->tanda_tangan);
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                $img = 'data:image/' . $type . ';base64,' . base64_encode($data);
              @endphp
              <img src="{{ $img }}" style="max-width: 100%; max-height:40px;">
            @endif
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

</body>

</html> --}}



{{-- <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Daftar Hadir</title>
  <style>
    * {
      box-sizing: border-box;
      font-family: Arial, sans-serif;
      font-size: 15px;
    }

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
      padding: 10px;
    }

    .logo-cell img {
      width: 120px;
      height: 80px;
      object-fit: contain;
    }

    .header-title {
      text-align: center;
      font-weight: bold;
      padding: 6px;
      border-bottom: 1px solid black;
    }

    .info-label {
      width: 30%;
      text-align: left;
    }

    .info-separator {
      width: 5%;
      text-align: center;
      color: #2563eb;
      border-right: 2px solid black;
    }

    .info-value {
      width: 65%;
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
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $logo = 'data:image/' . $type . ';base64,' . base64_encode($data);
  @endphp

  <!-- HEADER -->
  <table class="main-table">
    <tr>
      <td class="logo-cell" rowspan="5">
        <img src="{{ $logo }}">
      </td>
      <td colspan="3" class="header-title">DAFTAR HADIR</td>
    </tr>
    <tr>
      <td class="info-label">Nama Kegiatan</td>
      <td class="info-separator">:</td>
      <td class="info-value">{{ $presence->nama_kegiatan ?? '' }}</td>
    </tr>
    <tr>
      <td class="info-label">Hari/Tanggal</td>
      <td class="info-separator">:</td>
      <td class="info-value">{{ \Carbon\Carbon::parse($presence->tgl_kegiatan)->translatedFormat('l, d F Y') }}</td>
    </tr>
    <tr>
      <td class="info-label">Waktu</td>
      <td class="info-separator">:</td>
      <td class="info-value">{{ date('H:i', strtotime($presence->tgl_kegiatan)) }} - Selesai</td>
    </tr>
    <tr>
      <td class="info-label">Tempat</td>
      <td class="info-separator">:</td>
      <td class="info-value">{{ $presence->tempat ?? '-' }}</td>
    </tr>
  </table>

  <!-- TABEL PESERTA -->
  <table class="table-peserta">
    <thead>
      <tr>
        <th width="50">No.</th>
        <th>Nama</th>
        <th>NP</th>
        <th>Jabatan</th>
        <th>Asal Instansi</th>
        <th width="120">Tanda Tangan</th>
      </tr>
    </thead>
    <tbody>
      @if ($presenceDetails->isEmpty())
        <tr>
          <td colspan="6">Tidak ada data</td>
        </tr>
      @endif

      @foreach ($presenceDetails as $detail)
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
                $ttdType = pathinfo($ttdPath, PATHINFO_EXTENSION);
                $ttdData = file_get_contents($ttdPath);
                $ttdBase64 = 'data:image/' . $ttdType . ';base64,' . base64_encode($ttdData);
              @endphp
              <img src="{{ $ttdBase64 }}" style="max-width: 100%; max-height:40px;">
            @endif
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

</body>

</html> --}}



{{-- <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Daftar Hadir</title>
  <style>
    * {
      box-sizing: border-box;
      font-family: Arial, sans-serif;
      font-size: 15px;
    }

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
      padding: 20px 20px 20px 20px;
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
    }

    .info-label {
      width: 15%;
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
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $logo = 'data:image/' . $type . ';base64,' . base64_encode($data);
  @endphp

  <!-- HEADER -->
  <table class="main-table">
    <tr>
      <td class="logo-cell" rowspan="5">
        <img src="{{ $logo }}" >
      </td>
      <td colspan="2" class="header-title">DAFTAR HADIR</td>
    </tr>
    <tr>
      <td class="info-label">Agenda/Kegiatan :</td>
      <td class="info-value">{{ $presence->nama_kegiatan ?? '' }}</td>
    </tr>
    <tr>
      <td class="info-label">Hari/Tanggal :</td>
      <td class="info-value">{{ \Carbon\Carbon::parse($presence->tgl_kegiatan)->translatedFormat('l, d F Y') }}</td>
    </tr>
    <tr>
      <td class="info-label">Waktu :</td>
      <td class="info-value">{{ date('H:i', strtotime($presence->tgl_kegiatan)) }} - Selesai</td>
    </tr>
    <tr>
      <td class="info-label">Tempat :</td>
      <td class="info-value">{{ $presence->tempat ?? '-' }}</td>
    </tr>
  </table>

  <!-- TABEL PESERTA -->
  <table class="table-peserta">
    <thead>
      <tr>
        <th width="50">No</th>
        <th>Nama</th>
        <th>NP</th>
        <th>Jabatan</th>
        <th>Unit Kerja/Instansi</th>
        <th width="120">Tanda Tangan</th>
      </tr>
    </thead>
    <tbody>
      @if ($presenceDetails->isEmpty())
        <tr>
          <td colspan="6">Tidak ada data</td>
        </tr>
      @endif

      @foreach ($presenceDetails as $detail)
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
                $ttdType = pathinfo($ttdPath, PATHINFO_EXTENSION);
                $ttdData = file_get_contents($ttdPath);
                $ttdBase64 = 'data:image/' . $ttdType . ';base64,' . base64_encode($ttdData);
              @endphp
              <img src="{{ $ttdBase64 }}" style="max-width: 100%; max-height:40px;">
            @endif
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

</body>

</html> --}}


{{-- <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Daftar Hadir</title>
  <style>
    * {
      box-sizing: border-box;
      font-family: Arial, sans-serif;
      font-size: 15px;
    }

    /* Atur halaman menjadi A4 potrait saat print atau PDF */
    @page {
      size: A4 portrait;
      margin: 1cm;
    }

    @media print {
      body {
        -webkit-print-color-adjust: exact;
      }
    }

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
      font-size: 22px; /* Ukuran huruf diperbesar */
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
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $logo = 'data:image/' . $type . ';base64,' . base64_encode($data);
  @endphp

  <!-- HEADER -->
  <table class="main-table">
    <tr>
      <td class="logo-cell" rowspan="5">
        <img src="{{ $logo }}">
      </td>
      <td colspan="2" class="header-title">DAFTAR HADIR</td>
    </tr>
    <tr>
      <td class="info-label">Agenda / Kegiatan :</td>
      <td class="info-value">{{ $presence->nama_kegiatan ?? '' }}</td>
    </tr>
    <tr>
      <td class="info-label">Hari / Tanggal :</td>
      <td class="info-value">{{ \Carbon\Carbon::parse($presence->tgl_kegiatan)->translatedFormat('l, d F Y') }}</td>
    </tr>
    <tr>
      <td class="info-label">Waktu :</td>
      <td class="info-value">{{ date('H:i', strtotime($presence->tgl_kegiatan)) }} - s.d Selesai</td>
    </tr>
    <tr>
      <td class="info-label">Tempat :</td>
      <td class="info-value">{{ $presence->tempat ?? '-' }}</td>
    </tr>
  </table>

  <!-- TABEL PESERTA -->
  <table class="table-peserta">
    <thead>
      <tr>
        <th width="20">No</th>
        <th>Nama</th>
        <th width="30">NP</th>
        <th>Jabatan</th>
        <th>Unit Kerja / Instansi</th>
        <th width="120">Tanda Tangan</th>
      </tr>
    </thead>
    <tbody>
      @if ($presenceDetails->isEmpty())
        <tr>
          <td colspan="6">Tidak ada data</td>
        </tr>
      @endif

      @foreach ($presenceDetails as $detail)
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
                $ttdType = pathinfo($ttdPath, PATHINFO_EXTENSION);
                $ttdData = file_get_contents($ttdPath);
                $ttdBase64 = 'data:image/' . $ttdType . ';base64,' . base64_encode($ttdData);
              @endphp
              <img src="{{ $ttdBase64 }}" style="max-width: 100%; max-height:40px;">
            @endif
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

</body>

</html> --}}


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Daftar Hadir</title>
  <style>
    * {
      box-sizing: border-box;
      font-family: Arial, sans-serif;
      font-size: 15px;
    }

    @page {
      size: A4 portrait;
      margin: 1cm;
    }

    @media print {
      body {
        -webkit-print-color-adjust: exact;
      }
    }

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

    .bukti-container {
      margin-top: 30px;
      text-align: center;
    }

    .bukti-container h4 {
      margin-bottom: 10px;
    }

    .bukti-container img {
      max-width: 100%;
      max-height: 600px;
    }
  </style>
</head>
<body>

  @php
    $path = public_path('assets/logo.png');
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $logo = 'data:image/' . $type . ';base64,' . base64_encode($data);
  @endphp

  <!-- HEADER -->
  <table class="main-table">
    <tr>
      <td class="logo-cell" rowspan="5">
        <img src="{{ $logo }}">
      </td>
      <td colspan="2" class="header-title">DAFTAR HADIR</td>
    </tr>
    <tr>
      <td class="info-label">Agenda / Kegiatan :</td>
      <td class="info-value">{{ $presence->nama_kegiatan ?? '' }}</td>
    </tr>
    <tr>
      <td class="info-label">Hari / Tanggal :</td>
      <td class="info-value">{{ \Carbon\Carbon::parse($presence->tgl_kegiatan)->translatedFormat('l, d F Y') }}</td>
    </tr>
    <tr>
      <td class="info-label">Waktu :</td>
      <td class="info-value">{{ date('H:i', strtotime($presence->tgl_kegiatan)) }} - s.d Selesai</td>
    </tr>
    <tr>
      <td class="info-label">Tempat :</td>
      <td class="info-value">{{ $presence->tempat ?? '-' }}</td>
    </tr>
  </table>

  <!-- TABEL PESERTA -->
  <table class="table-peserta">
    <thead>
      <tr>
        <th width="20">No</th>
        <th>Nama</th>
        <th width="30">NP</th>
        <th>Jabatan</th>
        <th>Unit Kerja / Instansi</th>
        <th width="120">Tanda Tangan</th>
      </tr>
    </thead>
    <tbody>
      @if ($presenceDetails->isEmpty())
        <tr>
          <td colspan="6">Tidak ada data</td>
        </tr>
      @endif

      @foreach ($presenceDetails as $detail)
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
                $ttdType = pathinfo($ttdPath, PATHINFO_EXTENSION);
                $ttdData = file_get_contents($ttdPath);
                $ttdBase64 = 'data:image/' . $ttdType . ';base64,' . base64_encode($ttdData);
              @endphp
              <img src="{{ $ttdBase64 }}" style="max-width: 100%; max-height:40px;">
            @endif
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

  <!-- GAMBAR BUKTI KEGIATAN -->
  @if ($buktiPath && file_exists($buktiPath))
    @php
      $buktiType = pathinfo($buktiPath, PATHINFO_EXTENSION);
      $buktiData = file_get_contents($buktiPath);
      $buktiBase64 = 'data:image/' . $buktiType . ';base64,' . base64_encode($buktiData);
    @endphp
    <div class="bukti-container">
      <h4>Bukti Kegiatan</h4>
      <img src="{{ $buktiBase64 }}">
    </div>
  @endif

</body>
</html>
