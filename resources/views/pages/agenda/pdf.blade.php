{{-- <!DOCTYPE html>
<html>
<head>
    <title>Agenda Rapat</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; }
        .container { max-width: 800px; margin: auto; padding: 20px; }
        .header { text-align: center; margin-bottom: 30px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Agenda Rapat</h2>
            <h3>{{ $rapat->nama_rapat }}</h3>
            <p><strong>Tanggal:</strong> {{ $rapat->tanggal }}</p>
            <p><strong>Tempat:</strong> {{ $rapat->tempat }}</p>
            <p><strong>PIC:</strong> {{ $rapat->pic_rapat }}</p>
            <p><strong>Catatan:</strong> {{ $rapat->catatan }}</p>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Jam</th>
                    <th>Agenda</th>
                    <th>PIC</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rapat->agendaRapat as $agenda)
                <tr>
                    <td>{{ $agenda->jam }}</td>
                    <td>{{ $agenda->agenda }}</td>
                    <td>{{ $agenda->pic }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html> --}}
{{--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Agenda Rapat</title>
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

        .table-agenda {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .table-agenda th,
        .table-agenda td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        .table-agenda th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    @php
        // Menggunakan public_path() untuk mendapatkan jalur absolut ke aset
        $path = public_path('assets/logo.png');
        // Memeriksa apakah file logo ada
        if (file_exists($path)) {
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $logo = 'data:image/' . $type . ';base64,' . base64_encode($data);
        } else {
            $logo = null; // Atau berikan placeholder jika logo tidak ada
        }
    @endphp

    <table class="main-table">
        <tr>
            @if ($logo)
                <td class="logo-cell" rowspan="5">
                    <img src="{{ $logo }}">
                </td>
            @endif
            <td colspan="2" class="header-title">AGENDA RAPAT</td>
        </tr>
        <tr>
            <td class="info-label">Nama Rapat :</td>
            <td class="info-value">{{ $rapat->nama_rapat ?? '' }}</td>
        </tr>
        <tr>
            <td class="info-label">Tanggal :</td>
            <td class="info-value">{{ \Carbon\Carbon::parse($rapat->tanggal)->translatedFormat('l, d F Y') }}</td>
        </tr>
        <tr>
            <td class="info-label">Tempat :</td>
            <td class="info-value">{{ $rapat->tempat ?? '-' }}</td>
        </tr>
        <tr>
            <td class="info-label">PIC Rapat :</td>
            <td class="info-value">{{ $rapat->pic_rapat ?? '-' }}</td>
        </tr>
    </table>

    <table class="table-agenda">
        <thead>
            <tr>
                <th width="20">No</th>
                <th width="80">Jam</th>
                <th>Agenda</th>
                <th width="150">PIC</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rapat->agendaRapat as $agenda)
            <tr>
                <td style="text-align: center;">{{ $loop->iteration }}</td>
                <td>{{ $agenda->jam }}</td>
                <td>{{ $agenda->agenda }}</td>
                <td>{{ $agenda->pic }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @if ($rapat->catatan)
        <br>
        <p><strong>Catatan:</strong></p>
        <p>{{ $rapat->catatan }}</p>
    @endif

</body>
</html> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Agenda Rapat</title>
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

        .main-table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid black;
            margin-bottom: 20px;
            /* Tambahkan dua baris ini untuk membuat tabel rata tengah */
            margin-left: auto;
            margin-right: auto;
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

        .table-agenda {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            /* Tambahkan dua baris ini untuk membuat tabel rata tengah */
            margin-left: auto;
            margin-right: auto;
        }

        .table-agenda th,
        .table-agenda td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        .table-agenda th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    @php
        $path = public_path('assets/logo.png');
        if (file_exists($path)) {
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $logo = 'data:image/' . $type . ';base64,' . base64_encode($data);
        } else {
            $logo = null;
        }
    @endphp

    <table class="main-table">
        <tr>
            @if ($logo)
                <td class="logo-cell" rowspan="3">
                    <img src="{{ $logo }}">
                </td>
            @endif
            <td colspan="2" class="header-title">AGENDA RAPAT</td>
        </tr>
        <tr>
            <td class="info-label">Nama Rapat :</td>
            <td class="info-value">{{ $rapat->nama_rapat ?? '' }}</td>
        </tr>
        <tr>
            <td class="info-label">Tanggal :</td>
            <td class="info-value">{{ \Carbon\Carbon::parse($rapat->tanggal)->translatedFormat('l, d F Y') }}</td>
        </tr>
    </table>

    <table class="table-agenda">
        <thead>
            <tr>
                <th width="20">No</th>
                <th width="80">Jam</th>
                <th>Agenda</th>
                <th width="150">PIC</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rapat->agendaRapat as $agenda)
            <tr>
                <td style="text-align: center;">{{ $loop->iteration }}</td>
                <td>{{ $agenda->jam }}</td>
                <td>{{ $agenda->agenda }}</td>
                <td>{{ $agenda->pic }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @if ($rapat->catatan)
        <br>
        <p><strong>Catatan:</strong></p>
        <p>{{ $rapat->catatan }}</p>
    @endif

</body>
</html>
