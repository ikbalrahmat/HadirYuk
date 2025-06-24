{{-- <!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">
</head>

<body>

    <div class="container my-5">
        <div class="card mb-4">
            <div class="card-body">
                <h4 class="text-center">{{ env('APP_NAME') }}</h4>
                <table class="table table-borderless">
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
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Form Absensi</h5>
                    </div>
                    <div class="card-body">
                        <form id="form-absen" action="{{ route('absen.save', $presence->id) }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama">
                                @error('nama')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="jabatan">Jabatan</label>
                                <input type="text" class="form-control" id="jabatan" name="jabatan">
                                @error('jabatan')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="asal_instansi">Asal Instansi</label>
                                <input type="text" class="form-control" id="asal_instansi" name="asal_instansi">
                                @error('asal_instansi')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="tanda_tangan">Tanda Tangan</label>
                                <div class="d-block form-control mb-2">
                                    <canvas id="signature-pad" class="signature-pad"></canvas>
                                </div>
                                <textarea name="signature" id="signature64" class="d-none"></textarea>
                                @error('signature')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <button type="button" id="clear" class="btn btn-sm btn-secondary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0" />
                                    </svg>
                                    Clear
                                </button>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Daftar Kehadiran</h5>
                    </div>
                    <div class="card-body">
                        {{ $dataTable->table() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/signature.min.js') }}"></script>


    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>

    <script>
        $(function() {
            // set signature pad width
            let sig = $('#signature-pad').parent().width();
            $('#signature-pad').attr('width', sig);

            // Set canvas color
            let signaturePad = new SignaturePad(document.getElementById('signature-pad'), {
                backgroundColor: 'rgb(255, 255, 255, 0)',
                penColor: 'rgb(0, 0, 0)',
            });

            // Fill signature to textarea
            $('canvas').on('mouseup touchend', function() {
                $('#signature64').val(signaturePad.toDataURL());
            });

            // clear signature
            $('#clear').on('click', function(e) {
                e.preventDefault();
                signaturePad.clear();
                $('#signature64').val('');
            });

            // Submit form
            $('#form-absen').on('submit', function() {
                $(this).find('button[type="submit"]').attr('disabled', 'disabled');
            });
        });
    </script>

    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
</body>

</html> --}}



{{-- <!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">
</head>

<body>

    <div class="container my-5">
        <div class="card mb-4">
            <div class="card-body">
                <h4 class="text-center">{{ env('APP_NAME') }}</h4>
                <table class="table table-borderless">
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
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Form Absensi</h5>
                    </div>
                    <div class="card-body">
                        <form id="form-absen" action="{{ route('absen.save', $presence->id) }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama">
                                @error('nama')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="np">Nomor Pegawai (NP)</label>
                                <input type="text" class="form-control" id="np" name="np">
                                @error('np')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="jabatan">Jabatan</label>
                                <input type="text" class="form-control" id="jabatan" name="jabatan">
                                @error('jabatan')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="asal_instansi">Asal Instansi</label>
                                <input type="text" class="form-control" id="asal_instansi" name="asal_instansi">
                                @error('asal_instansi')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="tanda_tangan">Tanda Tangan</label>
                                <div class="d-block form-control mb-2">
                                    <canvas id="signature-pad" class="signature-pad"></canvas>
                                </div>
                                <textarea name="signature" id="signature64" class="d-none"></textarea>
                                @error('signature')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <button type="button" id="clear" class="btn btn-sm btn-secondary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0" />
                                    </svg>
                                    Clear
                                </button>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Daftar Kehadiran</h5>
                    </div>
                    <div class="card-body">
                        {{ $dataTable->table() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/signature.min.js') }}"></script>

    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>

    <script>
        $(function () {
            let sig = $('#signature-pad').parent().width();
            $('#signature-pad').attr('width', sig);

            let signaturePad = new SignaturePad(document.getElementById('signature-pad'), {
                backgroundColor: 'rgb(255, 255, 255, 0)',
                penColor: 'rgb(0, 0, 0)',
            });

            $('canvas').on('mouseup touchend', function () {
                $('#signature64').val(signaturePad.toDataURL());
            });

            $('#clear').on('click', function (e) {
                e.preventDefault();
                signaturePad.clear();
                $('#signature64').val('');
            });

            $('#form-absen').on('submit', function () {
                $(this).find('button[type="submit"]').attr('disabled', 'disabled');
            });
        });
    </script>

    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
</body>

</html> --}}



{{-- <!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">
</head>

<body>

    <div class="container my-5">
        <div class="card mb-4">
            <div class="card-body">
                <h4 class="text-center">DAFTAR HADIR</h4>
                <table class="table table-borderless">
                    <tr>
                        <td width="150">Agenda/Kegiatan</td>
                        <td width="20">:</td>
                        <td>{{ $presence->nama_kegiatan }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal </td>
                        <td>:</td>
                        <td>{{ \Carbon\Carbon::parse($presence->tgl_kegiatan)->translatedFormat('l, d F Y') }}</td>
                    </tr>
                    <tr>
                        <td>Waktu </td>
                        <td>:</td>
                        <td>{{ \Carbon\Carbon::parse($presence->tgl_kegiatan)->format('H:i') }} - s.d Selesai</td>
                    </tr>
                    <tr>
                        <td>Tempat </td>
                        <td>:</td>
                        <td>{{ $presence->tempat }}</td> <!-- Pastikan kolom 'tempat' tersedia di tabel -->
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Form Absensi</h5>
                    </div>
                    <div class="card-body">
                        <form id="form-absen" action="{{ route('absen.save', $presence->id) }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama">
                                @error('nama')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="np">Nomor Pegawai (NP)</label>
                                <input type="text" class="form-control" id="np" name="np">
                                @error('np')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="jabatan">Jabatan</label>
                                <input type="text" class="form-control" id="jabatan" name="jabatan">
                                @error('jabatan')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="asal_instansi">Unit Kerja/Instansi</label>
                                <input type="text" class="form-control" id="asal_instansi" name="asal_instansi">
                                @error('asal_instansi')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="tanda_tangan">Tanda Tangan</label>
                                <div class="d-block form-control mb-2">
                                    <canvas id="signature-pad" class="signature-pad"></canvas>
                                </div>
                                <textarea name="signature" id="signature64" class="d-none"></textarea>
                                @error('signature')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <button type="button" id="clear" class="btn btn-sm btn-secondary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0" />
                                    </svg>
                                    Clear
                                </button>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Daftar Kehadiran</h5>
                    </div>
                    <div class="card-body">
                        {{ $dataTable->table() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/signature.min.js') }}"></script>

    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>

    <script>
        $(function () {
            let sig = $('#signature-pad').parent().width();
            $('#signature-pad').attr('width', sig);

            let signaturePad = new SignaturePad(document.getElementById('signature-pad'), {
                backgroundColor: 'rgb(255, 255, 255, 0)',
                penColor: 'rgb(0, 0, 255)',
            });

            $('canvas').on('mouseup touchend', function () {
                $('#signature64').val(signaturePad.toDataURL());
            });

            $('#clear').on('click', function (e) {
                e.preventDefault();
                signaturePad.clear();
                $('#signature64').val('');
            });

            $('#form-absen').on('submit', function () {
                $(this).find('button[type="submit"]').attr('disabled', 'disabled');
            });
        });
    </script>

    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
</body>

</html> --}}



{{-- <!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ env('APP_NAME') }}</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">
  <style>
    canvas.signature-pad {
      width: 100%;
      height: 150px;
      border: 1px solid #ced4da;
    }
  </style>
</head>

<body>
  <div class="container my-5">
    <div class="card mb-4">
      <div class="card-body">
        <h4 class="text-center">DAFTAR HADIR</h4>
        <table class="table table-borderless">
          <tr>
            <td width="150">Agenda/Kegiatan</td>
            <td width="20">:</td>
            <td>{{ $presence->nama_kegiatan }}</td>
          </tr>
          <tr>
            <td>Tanggal</td>
            <td>:</td>
            <td>{{ \Carbon\Carbon::parse($presence->tgl_kegiatan)->translatedFormat('l, d F Y') }}</td>
          </tr>
          <tr>
            <td>Waktu</td>
            <td>:</td>
            <td>{{ \Carbon\Carbon::parse($presence->tgl_kegiatan)->format('H:i') }} - s.d Selesai</td>
          </tr>
          <tr>
            <td>Tempat</td>
            <td>:</td>
            <td>{{ $presence->tempat }}</td>
          </tr>
        </table>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title">Form Absensi</h5>
          </div>
          <div class="card-body">
            <form id="form-absen" action="{{ route('absen.save', $presence->id) }}" method="post">
              @csrf
              <div class="mb-3">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama">
                @error('nama')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>

              <div class="mb-3">
                <label for="np">Nomor Pegawai (NP)</label>
                <input type="text" class="form-control" id="np" name="np">
                @error('np')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>

              <div class="mb-3">
                <label for="jabatan">Jabatan</label>
                <input type="text" class="form-control" id="jabatan" name="jabatan">
                @error('jabatan')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>

              <div class="mb-3">
                <label for="asal_instansi">Unit Kerja/Instansi</label>
                <input type="text" class="form-control" id="asal_instansi" name="asal_instansi">
                @error('asal_instansi')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>

              <div class="mb-3">
                <label for="tanda_tangan">Tanda Tangan</label>
                <div class="d-block form-control mb-2">
                  <canvas id="signature-pad" class="signature-pad"></canvas>
                </div>
                <textarea name="signature" id="signature64" class="d-none"></textarea>
                @error('signature')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                <button type="button" id="clear" class="btn btn-sm btn-secondary">Clear</button>
              </div>

              <button type="submit" class="btn btn-primary w-100">Submit</button>
            </form>
          </div>
        </div>
      </div>

      <div class="col-lg-8 col-md-6">
        <button class="btn btn-outline-primary mb-3 w-100" type="button" id="toggle-table">
          Lihat Daftar Kehadiran
        </button>

        <div class="card d-none" id="table-container">
          <div class="card-header">
            <h5 class="card-title">Daftar Kehadiran</h5>
          </div>
          <div class="card-body">
            {{ $dataTable->table() }}
          </div>
        </div>
      </div>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="{{ asset('js/signature.min.js') }}"></script>
  <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>

  <script>
    $(function () {
      let sigWidth = $('#signature-pad').parent().width();
      $('#signature-pad').attr('width', sigWidth);

      let signaturePad = new SignaturePad(document.getElementById('signature-pad'), {
        backgroundColor: 'rgba(255,255,255,0)',
        penColor: 'rgb(0,0,255)'
      });

      $('canvas').on('mouseup touchend', function () {
        $('#signature64').val(signaturePad.toDataURL());
      });

      $('#clear').on('click', function (e) {
        e.preventDefault();
        signaturePad.clear();
        $('#signature64').val('');
      });

      $('#form-absen').on('submit', function () {
        $(this).find('button[type="submit"]').attr('disabled', true);
      });

      $('#toggle-table').on('click', function () {
        $('#table-container').toggleClass('d-none');
        const isVisible = !$('#table-container').hasClass('d-none');
        $(this).text(isVisible ? 'Sembunyikan Daftar Kehadiran' : 'Lihat Daftar Kehadiran');
      });
    });
  </script>

  {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
</body>

</html> --}}



{{-- <!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ env('APP_NAME') }}</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">
  <style>
    body {
      background-color: #f9fafb;
    }

    .card {
      border: none;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
    }

    .form-floating > label {
      color: #6c757d;
    }

    canvas.signature-pad {
      width: 100%;
      height: 150px;
      border: 1px solid #ced4da;
      border-radius: 4px;
    }

    .table-container table {
      font-size: 14px;
    }
  </style>
</head>

<body>
  <div class="container py-5">
    <!-- Detail Agenda -->
    <div class="card mb-4">
      <div class="card-body">
        <h4 class="text-center fw-semibold">Daftar Hadir</h4>
        <table class="table table-sm table-borderless">
          <tbody>
            <tr><td width="180">Agenda/Kegiatan</td><td>: {{ $presence->nama_kegiatan }}</td></tr>
            <tr><td>Tanggal</td><td>: {{ \Carbon\Carbon::parse($presence->tgl_kegiatan)->translatedFormat('l, d F Y') }}</td></tr>
            <tr><td>Waktu</td><td>: {{ \Carbon\Carbon::parse($presence->tgl_kegiatan)->format('H:i') }} - Selesai</td></tr>
            <tr><td>Tempat</td><td>: {{ $presence->tempat }}</td></tr>
          </tbody>
        </table>
      </div>
    </div>

    <div class="row g-4">
      <!-- Form Absensi -->
      <div class="col-lg-4">
        <div class="card">
          <div class="card-body">
            <h5 class="mb-3">Form Absensi</h5>
            <form id="form-absen" action="{{ route('absen.save', $presence->id) }}" method="post">
              @csrf

              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
                <label for="nama">Nama</label>
              </div>
              @error('nama')<div class="text-danger small">{{ $message }}</div>@enderror

              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="np" name="np" placeholder="Nomor Pegawai">
                <label for="np">Nomor Pegawai (NP)</label>
              </div>
              @error('np')<div class="text-danger small">{{ $message }}</div>@enderror

              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan">
                <label for="jabatan">Jabatan</label>
              </div>
              @error('jabatan')<div class="text-danger small">{{ $message }}</div>@enderror

              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="asal_instansi" name="asal_instansi" placeholder="Instansi">
                <label for="asal_instansi">Unit Kerja/Instansi</label>
              </div>
              @error('asal_instansi')<div class="text-danger small">{{ $message }}</div>@enderror

              <div class="mb-3">
                <label class="form-label">Tanda Tangan</label>
                <div class="form-control p-0 mb-2">
                  <canvas id="signature-pad" class="signature-pad"></canvas>
                </div>
                <textarea name="signature" id="signature64" class="d-none"></textarea>
                <button type="button" id="clear" class="btn btn-sm btn-outline-secondary">Clear</button>
                @error('signature')<div class="text-danger small">{{ $message }}</div>@enderror
              </div>

              <button type="submit" class="btn btn-primary w-100">Submit</button>
            </form>
          </div>
        </div>
      </div>

      <!-- Tabel Kehadiran -->
      <div class="col-lg-8">
        <button class="btn btn-outline-dark w-100 mb-3" id="toggle-table">Lihat Daftar Kehadiran</button>

        <div class="card d-none" id="table-container">
          <div class="card-body table-container">
            <h6 class="mb-3 fw-semibold">Daftar Kehadiran</h6>
            <div class="table-responsive">
              <table class="table table-striped table-hover table-bordered mb-0">
                {{ $dataTable->table() }}
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="{{ asset('js/signature.min.js') }}"></script>
  <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>

  <script>
    $(function () {
      const sigPadEl = document.getElementById('signature-pad');
      const signaturePad = new SignaturePad(sigPadEl, {
        backgroundColor: 'rgba(255,255,255,0)',
        penColor: 'rgb(0,0,255)'
      });

      sigPadEl.width = $('#signature-pad').parent().width();

      $('canvas').on('mouseup touchend', function () {
        $('#signature64').val(signaturePad.toDataURL());
      });

      $('#clear').click(function () {
        signaturePad.clear();
        $('#signature64').val('');
      });

      $('#toggle-table').click(function () {
        $('#table-container').toggleClass('d-none');
        $(this).text($('#table-container').hasClass('d-none') ? 'Lihat Daftar Kehadiran' : 'Sembunyikan Daftar Kehadiran');
      });

      $('#form-absen').submit(function () {
        $(this).find('button[type="submit"]').attr('disabled', true);
      });
    });
  </script>

  {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
</body>

</html> --}}


{{-- <!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ env('APP_NAME') }}</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">
  <style>
    body {
      background-color: #f5f7fa;
      font-family: 'Segoe UI', sans-serif;
    }

    .card {
      border-radius: 1rem;
      border: none;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }

    .form-label {
      font-weight: 500;
      color: #333;
    }

    canvas.signature-pad {
      width: 100%;
      height: 150px;
      border: 1px solid #ced4da;
      border-radius: 6px;
    }

    .btn-primary {
      border-radius: 30px;
    }

    .btn-outline-dark {
      border-radius: 30px;
    }

    .table td,
    .table th {
      vertical-align: middle;
    }
  </style>
</head>

<body>
  <div class="container py-5">
    <!-- Header Info -->
    <div class="card p-4 mb-4">
      <h4 class="fw-bold text-center">Daftar Hadir Kegiatan</h4>
      <table class="table table-borderless mt-3">
        <tr><td width="160">Agenda</td><td>: {{ $presence->nama_kegiatan }}</td></tr>
        <tr><td>Tanggal</td><td>: {{ \Carbon\Carbon::parse($presence->tgl_kegiatan)->translatedFormat('l, d F Y') }}</td></tr>
        <tr><td>Waktu</td><td>: {{ \Carbon\Carbon::parse($presence->tgl_kegiatan)->format('H:i') }} - s.d Selesai</td></tr>
        <tr><td>Tempat</td><td>: {{ $presence->tempat }}</td></tr>
      </table>
    </div>

    <div class="row g-4">
      <!-- Form Absensi -->
      <div class="col-md-5">
        <div class="card p-4">
          <h5 class="mb-4 fw-semibold">Isi Data Kehadiran</h5>
          <form id="form-absen" action="{{ route('absen.save', $presence->id) }}" method="POST">
            @csrf

            <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama">
              @error('nama')<div class="text-danger small">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
              <label for="np" class="form-label">Nomor Pegawai (NP)</label>
              <input type="text" class="form-control" id="np" name="np">
              @error('np')<div class="text-danger small">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
              <label for="jabatan" class="form-label">Jabatan</label>
              <input type="text" class="form-control" id="jabatan" name="jabatan">
              @error('jabatan')<div class="text-danger small">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
              <label for="asal_instansi" class="form-label">Unit Kerja/Instansi</label>
              <input type="text" class="form-control" id="asal_instansi" name="asal_instansi">
              @error('asal_instansi')<div class="text-danger small">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
              <label class="form-label">Tanda Tangan</label>
              <div class="form-control p-0 mb-2">
                <canvas id="signature-pad" class="signature-pad"></canvas>
              </div>
              <textarea name="signature" id="signature64" class="d-none"></textarea>
              @error('signature')<div class="text-danger small">{{ $message }}</div>@enderror
              <button type="button" class="btn btn-sm btn-outline-secondary" id="clear">Clear Tanda Tangan</button>
            </div>

            <button type="submit" class="btn btn-primary w-100 mt-3">Submit Kehadiran</button>
          </form>
        </div>
      </div>

      <!-- Tabel Kehadiran -->
      <div class="col-md-7">
        <button class="btn btn-outline-dark w-100 mb-3" id="toggle-table">Lihat Daftar Kehadiran</button>

        <div class="card p-3 d-none" id="table-container">
          <h6 class="fw-semibold mb-3">Daftar Kehadiran</h6>
          <div class="table-responsive">
                        {{ $dataTable->table(['class' => 'table table-borderless table-striped align-middle mb-0']) }}
                    </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="{{ asset('js/signature.min.js') }}"></script>
  <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>

  <script>
    $(function () {
      let sigWidth = $('#signature-pad').parent().width();
      $('#signature-pad').attr('width', sigWidth);

      let signaturePad = new SignaturePad(document.getElementById('signature-pad'), {
        backgroundColor: 'rgba(255,255,255,0)',
        penColor: 'rgb(0,0,255)'
      });

      $('canvas').on('mouseup touchend', function () {
        $('#signature64').val(signaturePad.toDataURL());
      });

      $('#clear').on('click', function (e) {
        e.preventDefault();
        signaturePad.clear();
        $('#signature64').val('');
      });

      $('#toggle-table').on('click', function () {
        $('#table-container').toggleClass('d-none');
        $(this).text($('#table-container').hasClass('d-none') ? 'Lihat Daftar Kehadiran' : 'Sembunyikan Daftar Kehadiran');
      });

      $('#form-absen').on('submit', function () {
        $(this).find('button[type="submit"]').attr('disabled', true);
      });
    });
  </script>

  {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
</body>

</html> --}}




{{-- <!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ env('APP_NAME') }}</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">
  <style>
    body {
      background-color: #f5f7fa;
      font-family: 'Segoe UI', sans-serif;
    }

    .card {
      border-radius: 1rem;
      border: none;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
      transition: 0.3s ease;
    }

    .card:hover {
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
    }

    .form-label {
      font-weight: 500;
      color: #333;
    }

    canvas.signature-pad {
      width: 100%;
      height: 150px;
      border: 1px solid #ced4da;
      border-radius: 6px;
    }

    .btn-primary,
    .btn-outline-dark {
      border-radius: 30px;
    }

    .table td,
    .table th {
      vertical-align: middle;
    }

    input.form-control {
      border-radius: 10px;
      border-color: #dcdcdc;
    }

    #toggle-table {
      border-radius: 10px;
    }
  </style>
</head>

<body>
  <div class="container py-5">
    <!-- Header Info -->
    <div class="card p-4 mb-4">
      <div class="d-flex align-items-center mb-3">
        <img src="/path/to/logo-bumn.png" alt="Logo BUMN" style="height: 50px;" class="me-3">
        <img src="/path/to/logo-peruri.png" alt="Logo PERURI" style="height: 50px;" class="me-3">
        <h4 class="fw-bold mb-0">Daftar Hadir Kegiatan</h4>
      </div>
      <table class="table table-borderless mt-2">
        <tr><td width="160">Agenda</td><td>: {{ $presence->nama_kegiatan }}</td></tr>
        <tr><td>Tanggal</td><td>: {{ \Carbon\Carbon::parse($presence->tgl_kegiatan)->translatedFormat('l, d F Y') }}</td></tr>
        <tr><td>Waktu</td><td>: {{ \Carbon\Carbon::parse($presence->tgl_kegiatan)->format('H:i') }} - s.d Selesai</td></tr>
        <tr><td>Tempat</td><td>: {{ $presence->tempat }}</td></tr>
      </table>
    </div>

    <div class="row g-4">
      <!-- Form Kehadiran -->
      <div class="col-12">
        <div class="card p-4">
          <h5 class="mb-4 fw-semibold">Isi Data Kehadiran</h5>
          <form id="form-absen" action="{{ route('absen.save', $presence->id) }}" method="POST">
            @csrf

            <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama">
              @error('nama')<div class="text-danger small">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
              <label for="np" class="form-label">Nomor Pegawai (NP)</label>
              <input type="text" class="form-control" id="np" name="np">
              @error('np')<div class="text-danger small">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
              <label for="jabatan" class="form-label">Jabatan</label>
              <input type="text" class="form-control" id="jabatan" name="jabatan">
              @error('jabatan')<div class="text-danger small">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
              <label for="asal_instansi" class="form-label">Unit Kerja/Instansi</label>
              <input type="text" class="form-control" id="asal_instansi" name="asal_instansi">
              @error('asal_instansi')<div class="text-danger small">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
              <label class="form-label">Tanda Tangan</label>
              <div class="form-control p-0 mb-2">
                <canvas id="signature-pad" class="signature-pad"></canvas>
              </div>
              <textarea name="signature" id="signature64" class="d-none"></textarea>
              @error('signature')<div class="text-danger small">{{ $message }}</div>@enderror
              <button type="button" class="btn btn-sm btn-outline-secondary" id="clear">Clear Tanda Tangan</button>
            </div>

            <button type="submit" class="btn btn-primary w-100 mt-3">Submit Kehadiran</button>
          </form>
        </div>
      </div>

      <!-- Tabel Kehadiran -->
      <div class="col-12">
        <div class="card p-3">
          <button class="btn btn-outline-dark w-100 mb-3" id="toggle-table">Lihat Daftar Kehadiran</button>
          <div class="d-none" id="table-container">
            <h6 class="fw-semibold mb-3">Daftar Kehadiran</h6>
            <div class="table-responsive">
              {{ $dataTable->table(['class' => 'table table-borderless table-striped align-middle mb-0']) }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="{{ asset('js/signature.min.js') }}"></script>
  <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>

  <script>
    $(function () {
      let sigWidth = $('#signature-pad').parent().width();
      $('#signature-pad').attr('width', sigWidth);

      let signaturePad = new SignaturePad(document.getElementById('signature-pad'), {
        backgroundColor: 'rgba(255,255,255,0)',
        penColor: 'rgb(0,0,255)'
      });

      $('canvas').on('mouseup touchend', function () {
        $('#signature64').val(signaturePad.toDataURL());
      });

      $('#clear').on('click', function (e) {
        e.preventDefault();
        signaturePad.clear();
        $('#signature64').val('');
      });

      $('#toggle-table').on('click', function () {
        $('#table-container').toggleClass('d-none');
        $(this).text($('#table-container').hasClass('d-none') ? 'Lihat Daftar Kehadiran' : 'Sembunyikan Daftar Kehadiran');
      });

      $('#form-absen').on('submit', function () {
        $(this).find('button[type="submit"]').attr('disabled', true);
      });
    });
  </script>

  {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
</body>

</html> --}}



{{-- <!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ env('APP_NAME') }}</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">

  <style>
    body {
      background-color: #f5f7fa;
      font-family: 'Segoe UI', sans-serif;
    }

    .card {
      border-radius: 1rem;
      border: none;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
      transition: 0.3s ease;
    }

    .card:hover {
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
    }

    .form-label {
      font-weight: 500;
      color: #333;
    }

    canvas.signature-pad {
      width: 100%;
      height: 150px;
      border: 1px solid #ced4da;
      border-radius: 6px;
    }

    .btn-primary,
    .btn-outline-dark {
      border-radius: 30px;
    }

    .table td,
    .table th {
      vertical-align: middle;
    }

    input.form-control {
      border-radius: 10px;
      border-color: #dcdcdc;
    }

    #toggle-table {
      border-radius: 10px;
    }

    .header-logo {
      height: 50px;
      width: auto;
      object-fit: contain;
    }

    @media (max-width: 768px) {
      .header-logo {
        height: 40px;
      }

      h4.fw-bold {
        font-size: 1rem;
      }
    }
  </style>
</head>

<body>
  <div class="container py-5">
    <!-- Header Info -->
    <div class="card p-4 mb-4">
      <div class="d-flex justify-content-between align-items-center mb-3 position-relative">
        <img src="{{ asset('assets/bumn.png') }}" alt="Logo BUMN" class="header-logo">
        <h4 class="fw-bold position-absolute start-50 translate-middle-x text-center">Daftar Hadir Kegiatan</h4>
        <img src="{{ asset('assets/logo.png') }}" alt="Logo PERURI" class="header-logo">
      </div>
      <table class="table table-borderless mt-2">
        <tr><td width="160">Agenda</td><td>: {{ $presence->nama_kegiatan }}</td></tr>
        <tr><td>Tanggal</td><td>: {{ \Carbon\Carbon::parse($presence->tgl_kegiatan)->translatedFormat('l, d F Y') }}</td></tr>
        <tr><td>Waktu</td><td>: {{ \Carbon\Carbon::parse($presence->tgl_kegiatan)->format('H:i') }} - s.d Selesai</td></tr>
        <tr><td>Tempat</td><td>: {{ $presence->tempat }}</td></tr>
      </table>
    </div>

    <div class="row g-4">
      <!-- Form Kehadiran -->
      <div class="col-12">
        <div class="card p-4">
          <h5 class="mb-4 fw-semibold">Isi Data Kehadiran</h5>

          @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
          @endif

          <form id="form-absen" action="{{ route('absen.save', $presence->id) }}" method="POST">
            @csrf

            <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama">
              @error('nama')<div class="text-danger small">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
              <label for="np" class="form-label">Nomor Pegawai (NP)</label>
              <input type="text" class="form-control" id="np" name="np">
              @error('np')<div class="text-danger small">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
              <label for="jabatan" class="form-label">Jabatan</label>
              <input type="text" class="form-control" id="jabatan" name="jabatan">
              @error('jabatan')<div class="text-danger small">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
              <label for="asal_instansi" class="form-label">Unit Kerja/Instansi</label>
              <input type="text" class="form-control" id="asal_instansi" name="asal_instansi">
              @error('asal_instansi')<div class="text-danger small">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
              <label class="form-label">Tanda Tangan</label>
              <div class="form-control p-0 mb-2">
                <canvas id="signature-pad" class="signature-pad"></canvas>
              </div>
              <textarea name="signature" id="signature64" class="d-none"></textarea>
              @error('signature')<div class="text-danger small">{{ $message }}</div>@enderror
              <button type="button" class="btn btn-sm btn-outline-secondary" id="clear">Clear Tanda Tangan</button>
            </div>

            <button type="submit" class="btn btn-primary w-100 mt-3">Submit Kehadiran</button>
          </form>
        </div>
      </div>

      <!-- Tabel Kehadiran -->
      <div class="col-12">
        <div class="card p-3">
          <button class="btn btn-outline-dark w-100 mb-3" id="toggle-table">Lihat Daftar Kehadiran</button>
          <div class="d-none" id="table-container">
            <h6 class="fw-semibold mb-3">Daftar Kehadiran</h6>
            <div class="table-responsive">
              {{ $dataTable->table(['class' => 'table table-borderless table-striped align-middle mb-0']) }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="{{ asset('js/signature.min.js') }}"></script>
  <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>

  <script>
    $(function () {
      let sigWidth = $('#signature-pad').parent().width();
      $('#signature-pad').attr('width', sigWidth);

      let signaturePad = new SignaturePad(document.getElementById('signature-pad'), {
        backgroundColor: 'rgba(255,255,255,0)',
        penColor: 'rgb(0,0,255)'
      });

      $('canvas').on('mouseup touchend', function () {
        $('#signature64').val(signaturePad.toDataURL());
      });

      $('#clear').on('click', function (e) {
        e.preventDefault();
        signaturePad.clear();
        $('#signature64').val('');
      });

      $('#toggle-table').on('click', function () {
        $('#table-container').toggleClass('d-none');
        $(this).text($('#table-container').hasClass('d-none') ? 'Lihat Daftar Kehadiran' : 'Sembunyikan Daftar Kehadiran');
      });

      $('#form-absen').on('submit', function () {
        $(this).find('button[type="submit"]').attr('disabled', true);
      });
    });
  </script>

  {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
</body>

</html> --}}


{{-- <!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ env('APP_NAME') }}</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">

  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Segoe UI', sans-serif;
    }

    .content-wrapper {
      max-width: 860px;
      margin: 0 auto;
    }

    .card {
      border-radius: 12px;
      border: none;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.04);
    }

    .form-label {
      font-weight: 500;
      color: #333;
    }

    .signature-pad {
      width: 100%;
      height: 160px;
      border: 1px solid #ced4da;
      border-radius: 8px;
      background-color: #fff;
    }

    .header-logo {
      height: 48px;
      object-fit: contain;
    }

    .btn-primary,
    .btn-outline-dark {
      border-radius: 6px;
    }

    .table th,
    .table td {
      vertical-align: middle;
    }

    @media (max-width: 768px) {
      .header-logo {
        height: 40px;
      }

      h4.fw-bold {
        font-size: 1.1rem;
      }
    }
  </style>
</head>

<body>
  <div class="container py-5 content-wrapper">
    <!-- Header Info -->
    <div class="card p-4 mb-4">
      <div class="d-flex justify-content-between align-items-center mb-3 position-relative">
        <img src="{{ asset('assets/bumn.png') }}" alt="Logo BUMN" class="header-logo">
        <h4 class="fw-bold position-absolute start-50 translate-middle-x text-center">Daftar Hadir Kegiatan</h4>
        <img src="{{ asset('assets/logo.png') }}" alt="Logo PERURI" class="header-logo">
      </div>
      <table class="table table-borderless mt-2 mb-0">
        <tr><td width="160">Agenda</td><td>: {{ $presence->nama_kegiatan }}</td></tr>
        <tr><td>Tanggal</td><td>: {{ \Carbon\Carbon::parse($presence->tgl_kegiatan)->translatedFormat('l, d F Y') }}</td></tr>
        <tr><td>Waktu</td><td>: {{ \Carbon\Carbon::parse($presence->tgl_kegiatan)->format('H:i') }} - s.d Selesai</td></tr>
        <tr><td>Tempat</td><td>: {{ $presence->tempat }}</td></tr>
      </table>
    </div>

    <div class="row g-4">
      <!-- Form Kehadiran -->
      <div class="col-12">
        <div class="card p-4">
          <h5 class="fw-semibold mb-3">Isi Form Kehadiran</h5>

          @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
          @endif

          <form id="form-absen" action="{{ route('absen.save', $presence->id) }}" method="POST">
            @csrf

            <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama lengkap">
              @error('nama')<div class="text-danger small">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
              <label for="np" class="form-label">Nomor Pegawai (NP)</label>
              <input type="text" class="form-control" id="np" name="np" placeholder="Masukkan NP">
              @error('np')<div class="text-danger small">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
              <label for="jabatan" class="form-label">Jabatan</label>
              <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Masukkan jabatan">
              @error('jabatan')<div class="text-danger small">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
              <label for="asal_instansi" class="form-label">Unit Kerja / Instansi</label>
              <input type="text" class="form-control" id="asal_instansi" name="asal_instansi" placeholder="Masukkan unit kerja">
              @error('asal_instansi')<div class="text-danger small">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
              <label class="form-label">Tanda Tangan</label>
              <div class="form-control p-0 mb-2">
                <canvas id="signature-pad" class="signature-pad"></canvas>
              </div>
              <textarea name="signature" id="signature64" class="d-none"></textarea>
              @error('signature')<div class="text-danger small">{{ $message }}</div>@enderror
              <button type="button" class="btn btn-sm btn-outline-secondary" id="clear">Bersihkan Tanda Tangan</button>
            </div>

            <button type="submit" class="btn btn-primary w-100 mt-3">Submit Kehadiran</button>
          </form>
        </div>
      </div>

      <!-- Tabel Kehadiran -->
      <div class="col-12">
        <div class="card p-3">
          <button class="btn btn-outline-dark w-100 mb-3" id="toggle-table">Lihat Daftar Kehadiran</button>
          <div class="d-none" id="table-container">
            <h6 class="fw-semibold mb-3">Daftar Kehadiran</h6>
            <div class="table-responsive">
              {{ $dataTable->table(['class' => 'table table-striped align-middle mb-0']) }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="{{ asset('js/signature.min.js') }}"></script>
  <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>

  <script>
    $(function () {
      let sigWidth = $('#signature-pad').parent().width();
      $('#signature-pad').attr('width', sigWidth);

      let signaturePad = new SignaturePad(document.getElementById('signature-pad'), {
        backgroundColor: 'rgba(255,255,255,0)',
        penColor: 'rgb(0,0,255)'
      });

      $('canvas').on('mouseup touchend', function () {
        $('#signature64').val(signaturePad.toDataURL());
      });

      $('#clear').on('click', function (e) {
        e.preventDefault();
        signaturePad.clear();
        $('#signature64').val('');
      });

      $('#toggle-table').on('click', function () {
        $('#table-container').toggleClass('d-none');
        $(this).text($('#table-container').hasClass('d-none') ? 'Lihat Daftar Kehadiran' : 'Sembunyikan Daftar Kehadiran');
      });

      $('#form-absen').on('submit', function () {
        $(this).find('button[type="submit"]').attr('disabled', true);
      });
    });
  </script>

  {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
</body>

</html> --}}


{{-- <!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ env('APP_NAME') }}</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">

  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Segoe UI', sans-serif;
    }

    .content-wrapper {
      max-width: 860px;
      margin: 0 auto;
    }

    .card {
      border-radius: 12px;
      border: none;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.04);
    }

    .form-label {
      font-weight: 500;
      color: #333;
    }

    .signature-pad {
      width: 100%;
      height: 160px;
      border: 1px solid #ced4da;
      border-radius: 8px;
      background-color: #fff;
    }

    .header-logo {
      height: 48px;
      object-fit: contain;
    }

    .btn-primary,
    .btn-outline-dark {
      border-radius: 6px;
    }

    .table th,
    .table td {
      vertical-align: middle;
      font-size: 0.95rem;
    }

    @media (max-width: 768px) {
      .header-logo {
        height: 40px;
      }

      h4.fw-bold {
        font-size: 1.1rem;
      }
    }
  </style>
</head>

<body>
  <div class="container py-5 content-wrapper">
    <!-- Header Info -->
    <div class="card p-4 mb-4">
      <div class="d-flex justify-content-between align-items-center mb-3 position-relative">
        <img src="{{ asset('assets/bumn.png') }}" alt="Logo BUMN" class="header-logo">
        <h4 class="fw-bold position-absolute start-50 translate-middle-x text-center">DAFTAR HADIR KEGIATAN</h4>
        <img src="{{ asset('assets/logo.png') }}" alt="Logo PERURI" class="header-logo">
      </div>
      <table class="table table-borderless mt-2 mb-0">
        <tr><td width="160">Agenda</td><td>: {{ $presence->nama_kegiatan }}</td></tr>
        <tr><td>Tanggal</td><td>: {{ \Carbon\Carbon::parse($presence->tgl_kegiatan)->translatedFormat('l, d F Y') }}</td></tr>
        <tr><td>Waktu</td><td>: {{ \Carbon\Carbon::parse($presence->tgl_kegiatan)->format('H:i') }} - s.d Selesai</td></tr>
        <tr><td>Tempat</td><td>: {{ $presence->tempat }}</td></tr>
      </table>
    </div>

    <div class="row g-4">
      <!-- Form Kehadiran -->
      <div class="col-12">
        <div class="card p-4">
          <h5 class="fw-semibold mb-3 text-center">Form Kehadiran</h5>

          @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
          @endif

          <form id="form-absen" action="{{ route('absen.save', $presence->id) }}" method="POST">
            @csrf

            <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama lengkap">
              @error('nama')<div class="text-danger small">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
              <label for="np" class="form-label">Nomor Pegawai (NP)</label>
              <input type="text" class="form-control" id="np" name="np" placeholder="Masukkan NP">
              @error('np')<div class="text-danger small">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
              <label for="jabatan" class="form-label">Jabatan</label>
              <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Masukkan jabatan">
              @error('jabatan')<div class="text-danger small">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
              <label for="asal_instansi" class="form-label">Unit Kerja / Instansi</label>
              <input type="text" class="form-control" id="asal_instansi" name="asal_instansi" placeholder="Masukkan unit kerja">
              @error('asal_instansi')<div class="text-danger small">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
              <label class="form-label">Tanda Tangan</label>
              <div class="form-control p-0 mb-2">
                <canvas id="signature-pad" class="signature-pad"></canvas>
              </div>
              <textarea name="signature" id="signature64" class="d-none"></textarea>
              @error('signature')<div class="text-danger small">{{ $message }}</div>@enderror
              <button type="button" class="btn btn-sm btn-outline-secondary" id="clear">Hapus</button>
            </div>

            <button type="submit" class="btn btn-primary w-100 mt-3">Submit</button>
          </form>
        </div>
      </div>

      <!-- Tabel Kehadiran -->
      <div class="col-12">
        <div class="card p-3">
          <button class="btn btn-outline-dark w-100 mb-3" id="toggle-table">Lihat Daftar Kehadiran</button>
          <div class="d-none" id="table-container">
            <h6 class="fw-semibold mb-3">Daftar Kehadiran</h6>
            <div class="table-responsive">
              {{ $dataTable->table(['class' => 'table table-striped align-middle mb-0']) }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="{{ asset('js/signature.min.js') }}"></script>
  <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>

  <script>
    $(function () {
      let sigWidth = $('#signature-pad').parent().width();
      $('#signature-pad').attr('width', sigWidth);

      let signaturePad = new SignaturePad(document.getElementById('signature-pad'), {
        backgroundColor: 'rgba(255,255,255,0)',
        penColor: 'rgb(0,0,255)'
      });

      $('canvas').on('mouseup touchend', function () {
        $('#signature64').val(signaturePad.toDataURL());
      });

      $('#clear').on('click', function (e) {
        e.preventDefault();
        signaturePad.clear();
        $('#signature64').val('');
      });

      $('#toggle-table').on('click', function () {
        $('#table-container').toggleClass('d-none');
        $(this).text($('#table-container').hasClass('d-none') ? 'Lihat Daftar Kehadiran' : 'Sembunyikan Daftar Kehadiran');
      });

      $('#form-absen').on('submit', function () {
        $(this).find('button[type="submit"]').attr('disabled', true);
      });
    });
  </script>

  {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
</body>

</html> --}}



{{-- <!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ env('APP_NAME') }}</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">

  <style>
    body {
      background-color: #eef2f7;
      font-family: 'Segoe UI', sans-serif;
    }

    .content-wrapper {
      max-width: 860px;
      margin: 0 auto;
    }

    .card {
      border-radius: 14px;
      border: none;
      background-color: #fff;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }

    .card-header-title {
      font-weight: 600;
      color: #333;
      font-size: 1.25rem;
    }

    .form-label {
      font-weight: 600;
      color: #34495e;
    }

    .form-control {
      border-radius: 8px;
    }

    .btn-primary {
      border-radius: 8px;
      background-color: #2e86de;
      border: none;
    }

    .btn-primary:hover {
      background-color: #2161b2;
    }

    .btn-outline-dark {
      border-radius: 8px;
    }

    .signature-pad {
      width: 100%;
      height: 160px;
      border: 2px dashed #ccc;
      border-radius: 10px;
      background-color: #fcfcfc;
    }

    .table th,
    .table td {
      vertical-align: middle;
      font-size: 0.93rem;
    }

    .alert-success {
      border-radius: 8px;
      background-color: #d1f2eb;
      color: #117a65;
      font-weight: 500;
      border: 1px solid #a3e4d7;
    }

    .header-logo {
      height: 48px;
      object-fit: contain;
    }

    @media (max-width: 768px) {
      .header-logo {
        height: 40px;
      }

      h4.fw-bold {
        font-size: 1.1rem;
      }
    }
  </style>
</head>

<body>
  <div class="container py-5 content-wrapper">
    <!-- Header Info -->
    <div class="card p-4 mb-4">
      <div class="border-bottom pb-3 mb-3">
        <div class="d-flex justify-content-between align-items-center">
          <img src="{{ asset('assets/bumn.png') }}" alt="Logo BUMN" class="header-logo">
          <h4 class="fw-bold text-center">DAFTAR HADIR KEGIATAN</h4>
          <img src="{{ asset('assets/logo.png') }}" alt="Logo PERURI" class="header-logo">
        </div>
      </div>
      <table class="table table-borderless mt-2 mb-0">
        <tr><td width="160">Agenda</td><td>: {{ $presence->nama_kegiatan }}</td></tr>
        <tr><td>Tanggal</td><td>: {{ \Carbon\Carbon::parse($presence->tgl_kegiatan)->translatedFormat('l, d F Y') }}</td></tr>
        <tr><td>Waktu</td><td>: {{ \Carbon\Carbon::parse($presence->tgl_kegiatan)->format('H:i') }} - s.d Selesai</td></tr>
        <tr><td>Tempat</td><td>: {{ $presence->tempat }}</td></tr>
      </table>
    </div>

    <div class="row g-4">
      <!-- Form Kehadiran -->
      <div class="col-12">
        <div class="card p-4">
          @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
          @endif

          <form id="form-absen" action="{{ route('absen.save', $presence->id) }}" method="POST">
            @csrf

            <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama lengkap">
              @error('nama')<div class="text-danger small">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
              <label for="np" class="form-label">Nomor Pegawai (NP)</label>
              <input type="text" class="form-control" id="np" name="np" placeholder="Masukkan NP">
              @error('np')<div class="text-danger small">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
              <label for="jabatan" class="form-label">Jabatan</label>
              <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Masukkan jabatan">
              @error('jabatan')<div class="text-danger small">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
              <label for="asal_instansi" class="form-label">Unit Kerja / Instansi</label>
              <input type="text" class="form-control" id="asal_instansi" name="asal_instansi" placeholder="Masukkan unit kerja">
              @error('asal_instansi')<div class="text-danger small">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
              <label class="form-label">Tanda Tangan</label>
              <div class="form-control p-0 mb-2">
                <canvas id="signature-pad" class="signature-pad"></canvas>
              </div>
              <textarea name="signature" id="signature64" class="d-none"></textarea>
              @error('signature')<div class="text-danger small">{{ $message }}</div>@enderror
              <button type="button" class="btn btn-sm btn-outline-secondary mt-2" id="clear">Hapus</button>
            </div>

            <button type="submit" class="btn btn-primary w-100 mt-3">
              Submit
            </button>
          </form>
        </div>
      </div>

      <!-- Tabel Kehadiran -->
      <div class="col-12">
        <div class="card p-3">
          <button class="btn btn-outline-dark w-100 mb-3" id="toggle-table">Lihat Daftar Kehadiran</button>
          <div class="d-none" id="table-container">
            <h6 class="fw-semibold mb-3">Daftar Kehadiran</h6>
            <div class="table-responsive">
              {{ $dataTable->table(['class' => 'table table-striped align-middle mb-0']) }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="{{ asset('js/signature.min.js') }}"></script>
  <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>

  <script>
    $(function () {
      let sigWidth = $('#signature-pad').parent().width();
      $('#signature-pad').attr('width', sigWidth);

      let signaturePad = new SignaturePad(document.getElementById('signature-pad'), {
        backgroundColor: 'rgba(255,255,255,0)',
        penColor: 'rgb(0,0,255)'
      });

      $('canvas').on('mouseup touchend', function () {
        $('#signature64').val(signaturePad.toDataURL());
      });

      $('#clear').on('click', function (e) {
        e.preventDefault();
        signaturePad.clear();
        $('#signature64').val('');
      });

      $('#toggle-table').on('click', function () {
        $('#table-container').toggleClass('d-none');
        $(this).text($('#table-container').hasClass('d-none') ? 'Lihat Daftar Kehadiran' : 'Sembunyikan Daftar Kehadiran');
      });

      $('#form-absen').on('submit', function () {
        $(this).find('button[type="submit"]').attr('disabled', true).text('Menyimpan...');
      });
    });
  </script>

  {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
</body>
</html> --}}


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ env('APP_NAME') }}</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">

  <style>
    body {
      background: linear-gradient(to bottom, #f5f7fa, #e2ecf8);
      font-family: 'Segoe UI', sans-serif;
      color: #34495e;
    }

    .content-wrapper {
      max-width: 860px;
      margin: 0 auto;
    }

    .card {
      border-radius: 14px;
      border: none;
      background-color: #ffffff;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }

    .form-label {
      font-weight: 600;
      color: #2c3e50;
    }

    .form-control {
      border-radius: 8px;
    }

    .btn-primary {
      border-radius: 8px;
      background-color: #2e86de;
      border: none;
    }

    .btn-primary:hover {
      background-color: #2161b2;
    }

    .btn-outline-dark {
      border-radius: 8px;
    }

    .signature-pad {
      width: 100%;
      height: 160px;
      border: 2px dashed #ccc;
      border-radius: 10px;
      background-color: #fefefe;
    }

    .table th,
    .table td {
      vertical-align: middle;
      font-size: 0.93rem;
    }

    .alert-success {
      border-radius: 8px;
      background-color: #d1f2eb;
      color: #117a65;
      font-weight: 500;
      border: 1px solid #a3e4d7;
    }

    .header-logo {
      height: 48px;
      object-fit: contain;
    }

    .title-divider {
      border-bottom: 2px solid #dee2e6;
      margin-bottom: 1rem;
      padding-bottom: 1rem;
    }

    @media (max-width: 768px) {
      .header-logo {
        height: 40px;
      }

      h4.fw-bold {
        font-size: 1.1rem;
      }
    }
  </style>
</head>

<body>
  <div class="container py-5 content-wrapper">
    <!-- Header Info -->
    <div class="card p-4 mb-4">
      <div class="d-flex justify-content-between align-items-center title-divider">
        <img src="{{ asset('assets/bumn.png') }}" alt="Logo BUMN" class="header-logo">
        <h4 class="fw-bold text-center">DAFTAR HADIR KEGIATAN</h4>
        <img src="{{ asset('assets/logo.png') }}" alt="Logo PERURI" class="header-logo">
      </div>
      <table class="table table-borderless mt-2 mb-0">
        <tr><td width="160">Agenda</td><td>: {{ $presence->nama_kegiatan }}</td></tr>
        <tr><td>Tanggal</td><td>: {{ \Carbon\Carbon::parse($presence->tgl_kegiatan)->translatedFormat('l, d F Y') }}</td></tr>
        <tr><td>Waktu</td><td>: {{ \Carbon\Carbon::parse($presence->tgl_kegiatan)->format('H:i') }} - s.d Selesai</td></tr>
        <tr><td>Tempat</td><td>: {{ $presence->tempat }}</td></tr>
      </table>
    </div>

    <div class="row g-4">
      <!-- Form Kehadiran -->
      <div class="col-12">
        <div class="card p-4">
          @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
          @endif

          <form id="form-absen" action="{{ route('absen.save', $presence->id) }}" method="POST">
            @csrf

            <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama lengkap">
              @error('nama')<div class="text-danger small">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
              <label for="np" class="form-label">Nomor Pegawai (NP)</label>
              <input type="text" class="form-control" id="np" name="np" placeholder="Masukkan NP">
              @error('np')<div class="text-danger small">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
              <label for="jabatan" class="form-label">Jabatan</label>
              <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Masukkan jabatan">
              @error('jabatan')<div class="text-danger small">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
              <label for="asal_instansi" class="form-label">Unit Kerja / Instansi</label>
              <input type="text" class="form-control" id="asal_instansi" name="asal_instansi" placeholder="Masukkan unit kerja">
              @error('asal_instansi')<div class="text-danger small">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
              <label class="form-label">Tanda Tangan</label>
              <div class="form-control p-0 mb-2">
                <canvas id="signature-pad" class="signature-pad"></canvas>
              </div>
              <textarea name="signature" id="signature64" class="d-none"></textarea>
              @error('signature')<div class="text-danger small">{{ $message }}</div>@enderror
              <button type="button" class="btn btn-sm btn-outline-secondary mt-2" id="clear">Hapus</button>
            </div>

            <button type="submit" class="btn btn-primary w-100 mt-3">
              Submit
            </button>
          </form>
        </div>
      </div>

      <!-- Tabel Kehadiran -->
      <div class="col-12">
        <div class="card p-3">
          <button class="btn btn-outline-dark w-100 mb-3" id="toggle-table">Lihat Daftar Kehadiran</button>
          <div class="d-none" id="table-container">
            <h6 class="fw-semibold mb-3">Daftar Kehadiran</h6>
            <div class="table-responsive">
              {{ $dataTable->table(['class' => 'table table-striped align-middle mb-0']) }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="{{ asset('js/signature.min.js') }}"></script>
  <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>

  <script>
    $(function () {
      let sigWidth = $('#signature-pad').parent().width();
      $('#signature-pad').attr('width', sigWidth);

      let signaturePad = new SignaturePad(document.getElementById('signature-pad'), {
        backgroundColor: 'rgba(255,255,255,0)',
        penColor: 'rgb(0,0,255)'
      });

      $('canvas').on('mouseup touchend', function () {
        $('#signature64').val(signaturePad.toDataURL());
      });

      $('#clear').on('click', function (e) {
        e.preventDefault();
        signaturePad.clear();
        $('#signature64').val('');
      });

      $('#toggle-table').on('click', function () {
        $('#table-container').toggleClass('d-none');
        $(this).text($('#table-container').hasClass('d-none') ? 'Lihat Daftar Kehadiran' : 'Sembunyikan Daftar Kehadiran');
      });

      $('#form-absen').on('submit', function () {
        $(this).find('button[type="submit"]').attr('disabled', true).text('Menyimpan...');
      });
    });
  </script>

  {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
</body>

</html>
