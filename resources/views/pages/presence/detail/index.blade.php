{{-- @extends('layouts.main')

@section('content')
    <div class="container my-4">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h4 class="card-title">
                            Detail Absen
                        </h4>
                    </div>
                    <div class="col text-end">
                        <button type="button" onclick="copyLink()" class="btn btn-warning">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-clipboard-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M10 1.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5zm-5 0A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5v1A1.5 1.5 0 0 1 9.5 4h-3A1.5 1.5 0 0 1 5 2.5zm-2 0h1v1A2.5 2.5 0 0 0 6.5 5h3A2.5 2.5 0 0 0 12 2.5v-1h1a2 2 0 0 1 2 2V14a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V3.5a2 2 0 0 1 2-2" />
                            </svg>
                            Copy Link
                        </button>
                        <a href="{{ route('presence-detail.export-pdf', $presence->id) }}" target="_blank"
                            class="btn btn-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-file-earmark-pdf-fill" viewBox="0 0 16 16">
                                <path
                                    d="M5.523 12.424q.21-.124.459-.238a8 8 0 0 1-.45.606c-.28.337-.498.516-.635.572l-.035.012a.3.3 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548m2.455-1.647q-.178.037-.356.078a21 21 0 0 0 .5-1.05 12 12 0 0 0 .51.858q-.326.048-.654.114m2.525.939a4 4 0 0 1-.435-.41q.344.007.612.054c.317.057.466.147.518.209a.1.1 0 0 1 .026.064.44.44 0 0 1-.06.2.3.3 0 0 1-.094.124.1.1 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256M8.278 6.97c-.04.244-.108.524-.2.829a5 5 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.5.5 0 0 1 .145-.04c.013.03.028.092.032.198q.008.183-.038.465z" />
                                <path fill-rule="evenodd"
                                    d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2m5.5 1.5v2a1 1 0 0 0 1 1h2zM4.165 13.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.7 11.7 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.86.86 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.84.84 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.8 5.8 0 0 0-1.335-.05 11 11 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.24 1.24 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a20 20 0 0 1-1.062 2.227 7.7 7.7 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103" />
                            </svg>
                            Export to PDF
                        </a>
                        <a href="{{ route('presence.index') }}" class="btn btn-secondary">
                            Kembali
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tr>
                        <td width="150">Agenda/Kegiatan</td>
                        <td width="20">:</td>
                        <td>{{ $presence->nama_kegiatan }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal</td>
                        <td>:</td>
                        <td>{{ date('d F Y', strtotime($presence->tgl_kegiatan)) }}</td>
                    </tr>
                    <tr>
                        <td>Waktu</td>
                        <td>:</td>
                        <td>{{ date('H:i', strtotime($presence->tgl_kegiatan)) }} - Sd Selesai</td>
                    </tr>
                    <tr>
                        <td>Tempat</td>
                        <td>:</td>
                        <td>{{ $presence->tempat }}</td>
                    </tr>
                </table>
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        function copyLink() {
            navigator.clipboard.writeText("{{ route('absen.index', $presence->slug) }}");
            alert('Link berhasil dicopy ke clipboard!');
        }
    </script>

    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        $(document).on('click', '.btn-delete', function(e) {
            e.preventDefault();
            let url = $(this).attr('href');

            if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                $.ajax({
                    type: 'DELETE',
                    url: url,
                    success: function(data) {
                        window.location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
            }
        })
    </script>
@endpush --}}



{{-- @extends('layouts.main')

@section('content')
    <div class="container my-4">
        <div class="bg-light p-4 rounded-4 shadow-sm">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="fw-bold text-dark mb-0">Detail Absen</h3>
                <div class="d-flex gap-2">
                    <button type="button" onclick="copyLink()" class="btn btn-warning rounded-pill shadow-sm">
                        <i class="bi bi-clipboard-fill me-1"></i> Copy Link
                    </button>
                    <a href="{{ route('presence-detail.export-pdf', $presence->id) }}" target="_blank"
                        class="btn btn-danger rounded-pill shadow-sm">
                        <i class="bi bi-file-earmark-pdf-fill me-1"></i> Export to PDF
                    </a>
                    <a href="{{ route('presence.index') }}" class="btn btn-secondary rounded-pill shadow-sm">
                        <i class="bi bi-arrow-left-circle me-1"></i> Kembali
                    </a>
                </div>
            </div>

            <div class="card border-0 shadow-sm rounded-4 mb-3">
                <div class="card-body bg-white rounded-3">
                    <table class="table table-borderless mb-0">
                        <tr>
                            <td width="180" class="fw-semibold">Agenda/Kegiatan</td>
                            <td width="20">:</td>
                            <td>{{ $presence->nama_kegiatan }}</td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">Tanggal</td>
                            <td>:</td>
                            <td>{{ date('d F Y', strtotime($presence->tgl_kegiatan)) }}</td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">Waktu</td>
                            <td>:</td>
                            <td>{{ date('H:i', strtotime($presence->tgl_kegiatan)) }} - Sd Selesai</td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">Tempat</td>
                            <td>:</td>
                            <td>{{ $presence->tempat }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body bg-white rounded-3">
                    <div class="table-responsive">
                        {{ $dataTable->table(['class' => 'table table-borderless table-striped align-middle mb-0']) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        function copyLink() {
            navigator.clipboard.writeText("{{ route('absen.index', $presence->slug) }}");
            alert('Link berhasil dicopy ke clipboard!');
        }
    </script>

    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        $(document).on('click', '.btn-delete', function(e) {
            e.preventDefault();
            let url = $(this).attr('href');

            if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                $.ajax({
                    type: 'DELETE',
                    url: url,
                    success: function(data) {
                        window.location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
            }
        });
    </script>
@endpush --}}


{{-- @extends('layouts.main')

@section('content')
    <div class="container my-4">
        <div class="bg-light p-4 rounded-4 shadow-sm">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="fw-bold text-dark mb-0">Detail Absen</h3>
                <div class="d-flex gap-2">
                    <button type="button" onclick="copyLink()" class="btn btn-warning rounded-pill shadow-sm">
                        <i class="bi bi-clipboard-fill me-1"></i> Copy Link
                    </button>
                    <a href="{{ route('presence-detail.export-pdf', $presence->id) }}" target="_blank"
                        class="btn btn-danger rounded-pill shadow-sm">
                        <i class="bi bi-file-earmark-pdf-fill me-1"></i> Export to PDF
                    </a>
                    <a href="{{ route('presence.index') }}" class="btn btn-secondary rounded-pill shadow-sm">
                        <i class="bi bi-arrow-left-circle me-1"></i> Kembali
                    </a>
                </div>
            </div>

            <div class="card border-0 shadow-sm rounded-4 mb-3">
                <div class="card-body bg-white rounded-3">
                    <table class="table table-borderless mb-0">
                        <tr>
                            <td width="180" class="fw-semibold">Agenda/Kegiatan</td>
                            <td width="20">:</td>
                            <td>{{ $presence->nama_kegiatan }}</td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">Tanggal</td>
                            <td>:</td>
                            <td>{{ date('d F Y', strtotime($presence->tgl_kegiatan)) }}</td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">Waktu</td>
                            <td>:</td>
                            <td>{{ date('H:i', strtotime($presence->tgl_kegiatan)) }} - Sd Selesai</td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">Tempat</td>
                            <td>:</td>
                            <td>{{ $presence->tempat }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body bg-white rounded-3">
                    <div class="table-responsive">
                        {{ $dataTable->table(['class' => 'table table-borderless table-striped align-middle mb-0']) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        function copyLink() {
            navigator.clipboard.writeText("{{ route('absen.index', $presence->slug) }}");
            alert('Link berhasil dicopy ke clipboard!');
        }
    </script>

    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('click', '.btn-delete', function (e) {
                e.preventDefault();
                let url = $(this).data('url');

                if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                    $.ajax({
                        type: 'DELETE',
                        url: url,
                        success: function (response) {
                            window.location.reload();
                        },
                        error: function (xhr) {
                            alert('Gagal menghapus data!');
                            console.error(xhr.responseText);
                        }
                    });
                }
            });
        });
    </script>
@endpush --}}


{{-- @extends('layouts.main')

@section('content')
    <div class="container my-4">
        <div class="bg-light p-4 rounded-4 shadow-sm">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="fw-bold text-dark mb-0">Detail Absen</h3>
                <div class="d-flex gap-2">
                    <button type="button" onclick="copyLink()" class="btn btn-warning rounded-pill shadow-sm">
                        <i class="bi bi-clipboard-fill me-1"></i> Copy Link
                    </button>
                    <a href="{{ route('presence-detail.export-pdf', $presence->id) }}" target="_blank"
                        class="btn btn-danger rounded-pill shadow-sm">
                        <i class="bi bi-file-earmark-pdf-fill me-1"></i> Export to PDF
                    </a>
                    <a href="{{ route('presence.index') }}" class="btn btn-secondary rounded-pill shadow-sm">
                        <i class="bi bi-arrow-left-circle me-1"></i> Kembali
                    </a>
                </div>
            </div>

            <div class="card border-0 shadow-sm rounded-4 mb-3">
                <div class="card-body bg-white rounded-3">
                    <table class="table table-borderless mb-0">
                        <tr>
                            <td width="180" class="fw-semibold">Agenda/Kegiatan</td>
                            <td width="20">:</td>
                            <td>{{ $presence->nama_kegiatan }}</td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">Tanggal</td>
                            <td>:</td>
                            <td>{{ date('d F Y', strtotime($presence->tgl_kegiatan)) }}</td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">Waktu</td>
                            <td>:</td>
                            <td>{{ date('H:i', strtotime($presence->tgl_kegiatan)) }} - Sd Selesai</td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">Tempat</td>
                            <td>:</td>
                            <td>{{ $presence->tempat }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body bg-white rounded-3">
                    <div class="table-responsive">
                        {{ $dataTable->table(['class' => 'table table-borderless table-striped align-middle mb-0']) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        function copyLink() {
            navigator.clipboard.writeText("{{ route('absen.index', $presence->slug) }}");
            alert('Link berhasil dicopy ke clipboard!');
        }
    </script>

    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('click', '.btn-delete', function (e) {
                e.preventDefault();
                let url = $(this).data('url');

                if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                    $.ajax({
                        type: 'DELETE',
                        url: url,
                        success: function (response) {
                            window.location.reload();
                        },
                        error: function (xhr) {
                            alert('Gagal menghapus data!');
                            console.error(xhr.responseText);
                        }
                    });
                }
            });
        });
    </script>
@endpush --}}


{{-- @extends('layouts.main')

@section('content')
    <div class="container my-4">
        <div class="bg-light p-4 rounded-4 shadow-sm">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="fw-bold text-dark mb-0">Detail Absen</h3>
                <div class="d-flex gap-2">
                    <button type="button" onclick="copyLink()" class="btn btn-warning rounded-pill shadow-sm">
                        <i class="bi bi-clipboard-fill me-1"></i> Copy Link
                    </button>
                    <a href="{{ route('presence.qrcode.download', $presence->slug) }}" class="btn btn-success rounded-pill shadow-sm">
                        <i class="bi bi-qr-code me-1"></i> Download QR
                    </a>
                    <a href="{{ route('presence-detail.export-pdf', $presence->id) }}" target="_blank"
                        class="btn btn-danger rounded-pill shadow-sm">
                        <i class="bi bi-file-earmark-pdf-fill me-1"></i> Export to PDF
                    </a>
                    <a href="{{ route('presence.index') }}" class="btn btn-secondary rounded-pill shadow-sm">
                        <i class="bi bi-arrow-left-circle me-1"></i> Kembali
                    </a>
                </div>
            </div>

            <div class="card border-0 shadow-sm rounded-4 mb-3">
                <div class="card-body bg-white rounded-3">
                    <table class="table table-borderless mb-0">
                        <tr>
                            <td width="180" class="fw-semibold">Agenda/Kegiatan</td>
                            <td width="20">:</td>
                            <td>{{ $presence->nama_kegiatan }}</td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">Tanggal</td>
                            <td>:</td>
                            <td>{{ date('d F Y', strtotime($presence->tgl_kegiatan)) }}</td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">Waktu</td>
                            <td>:</td>
                            <td>{{ date('H:i', strtotime($presence->tgl_kegiatan)) }} - s.d Selesai</td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">Tempat</td>
                            <td>:</td>
                            <td>{{ $presence->tempat }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="card border-0 shadow-sm rounded-4 mb-3">
                <div class="card-body bg-white rounded-3 text-center">
                    <h5 class="mb-3 text-dark fw-semibold">QR Code Link Absen</h5>

                    <div class="mb-3">
                        {!! QrCode::size(150)->generate(route('absen.index', $presence->slug)) !!}
                    </div>

                    <div class="d-flex justify-content-center gap-2 flex-wrap">
                        <button onclick="copyLink()" class="btn btn-outline-secondary rounded-pill shadow-sm">
                            <i class="bi bi-clipboard me-1"></i> Copy Link
                        </button>

                        <a href="{{ route('presence.qrcode.download', $presence->slug) }}" class="btn btn-outline-success rounded-pill shadow-sm">
                            <i class="bi bi-download me-1"></i> Download QR
                        </a>
                    </div>

                    <small class="text-muted d-block mt-3">Scan QR Code untuk buka halaman absen</small>
                </div>
            </div>

            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body bg-white rounded-3">
                    <div class="table-responsive">
                        {{ $dataTable->table(['class' => 'table table-borderless table-striped align-middle mb-0']) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        function copyLink() {
            navigator.clipboard.writeText("{{ route('absen.index', $presence->slug) }}");
            alert('Link berhasil dicopy ke clipboard!');
        }
    </script>

    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('click', '.btn-delete', function (e) {
                e.preventDefault();
                let url = $(this).data('url');

                if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                    $.ajax({
                        type: 'DELETE',
                        url: url,
                        success: function (response) {
                            window.location.reload();
                        },
                        error: function (xhr) {
                            alert('Gagal menghapus data!');
                            console.error(xhr.responseText);
                        }
                    });
                }
            });
        });
    </script>
@endpush --}}


{{-- @extends('layouts.main')

@section('content')
<div class="container my-4">
    <div class="bg-light p-4 rounded-4 shadow-sm">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="fw-bold text-dark mb-0">Detail Absen</h3>
            <div class="d-flex gap-2">
                <button type="button" onclick="copyLink()" class="btn btn-warning rounded-pill shadow-sm">
                    <i class="bi bi-clipboard-fill me-1"></i> Copy Link
                </button>
                <a href="{{ route('presence.qrcode.download', $presence->slug) }}" class="btn btn-success rounded-pill shadow-sm">
                    <i class="bi bi-qr-code me-1"></i> Download QR
                </a>
                <a href="{{ route('presence-detail.export-pdf', $presence->id) }}" target="_blank"
                    class="btn btn-danger rounded-pill shadow-sm">
                    <i class="bi bi-file-earmark-pdf-fill me-1"></i> Export to PDF
                </a>
                <a href="{{ route('presence.index') }}" class="btn btn-secondary rounded-pill shadow-sm">
                    <i class="bi bi-arrow-left-circle me-1"></i> Kembali
                </a>
            </div>
        </div>

        <div class="card border-0 shadow-sm rounded-4 mb-3">
            <div class="card-body bg-white rounded-3">
                <table class="table table-borderless mb-0">
                    <tr>
                        <td width="180" class="fw-semibold">Agenda/Kegiatan</td>
                        <td width="20">:</td>
                        <td>{{ $presence->nama_kegiatan }}</td>
                    </tr>
                    <tr>
                        <td class="fw-semibold">Tanggal</td>
                        <td>:</td>
                        <td>{{ date('d F Y', strtotime($presence->tgl_kegiatan)) }}</td>
                    </tr>
                    <tr>
                        <td class="fw-semibold">Waktu</td>
                        <td>:</td>
                        <td>{{ date('H:i', strtotime($presence->tgl_kegiatan)) }} - s.d Selesai</td>
                    </tr>
                    <tr>
                        <td class="fw-semibold">Tempat</td>
                        <td>:</td>
                        <td>{{ $presence->tempat }}</td>
                    </tr>
                </table>
            </div>
        </div>


        <div class="card border-0 shadow-sm rounded-4 mb-3">
            <div class="card-body bg-white rounded-3">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if (is_null($presence->bukti_kegiatan))
                    <form action="{{ route('presence.upload.bukti', $presence->id) }}" method="POST" enctype="multipart/form-data" class="mb-3">
                        @csrf
                        <div class="mb-2">
                            <label for="bukti_kegiatan" class="form-label fw-semibold">Upload Bukti Kegiatan (Gambar)</label>
                            <input type="file" name="bukti_kegiatan" id="bukti_kegiatan" accept="image/*" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </form>
                @else
                    <div class="mb-3">
                        <p class="fw-semibold mb-1">Bukti Kegiatan:</p>
                        <img src="{{ asset('storage/bukti/' . $presence->bukti_kegiatan) }}" alt="Bukti Kegiatan" class="img-fluid rounded shadow-sm" style="max-height: 300px;">
                    </div>
                @endif
            </div>
        </div>


        <div class="card border-0 shadow-sm rounded-4 mb-3">
            <div class="card-body bg-white rounded-3 text-center">
                <h5 class="mb-3 text-dark fw-semibold">QR Code Link Absen</h5>

                <div class="mb-3">
                    {!! QrCode::size(150)->generate(route('absen.index', $presence->slug)) !!}
                </div>

                <div class="d-flex justify-content-center gap-2 flex-wrap">
                    <button onclick="copyLink()" class="btn btn-outline-secondary rounded-pill shadow-sm">
                        <i class="bi bi-clipboard me-1"></i> Copy Link
                    </button>
                    <a href="{{ route('presence.qrcode.download', $presence->slug) }}" class="btn btn-outline-success rounded-pill shadow-sm">
                        <i class="bi bi-download me-1"></i> Download QR
                    </a>
                </div>

                <small class="text-muted d-block mt-3">Scan QR Code untuk buka halaman absen</small>
            </div>
        </div>

        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body bg-white rounded-3">
                <div class="table-responsive">
                    {{ $dataTable->table(['class' => 'table table-borderless table-striped align-middle mb-0']) }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    function copyLink() {
        navigator.clipboard.writeText("{{ route('absen.index', $presence->slug) }}");
        alert('Link berhasil dicopy ke clipboard!');
    }
</script>

{{ $dataTable->scripts(attributes: ['type' => 'module']) }}

<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('click', '.btn-delete', function (e) {
            e.preventDefault();
            let url = $(this).data('url');

            if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                $.ajax({
                    type: 'DELETE',
                    url: url,
                    success: function () {
                        window.location.reload();
                    },
                    error: function (xhr) {
                        alert('Gagal menghapus data!');
                        console.error(xhr.responseText);
                    }
                });
            }
        });
    });
</script>
@endpush --}}



{{-- @extends('layouts.main')

@section('content')
<div class="container my-4">
    <div class="bg-light p-4 rounded-4 shadow-sm">
        <!-- Header & Tombol -->
        <div class="d-flex flex-wrap justify-content-between align-items-start gap-3 mb-3">
            <h3 class="fw-bold text-dark mb-0">Detail Absen</h3>
            <div class="d-flex flex-wrap gap-2 justify-content-end">
                <button type="button" onclick="copyLink()" class="btn btn-warning rounded-pill shadow-sm">
                    <i class="bi bi-clipboard-fill me-1"></i> Copy Link
                </button>
                <a href="{{ route('presence.qrcode.download', $presence->slug) }}" class="btn btn-success rounded-pill shadow-sm">
                    <i class="bi bi-qr-code me-1"></i> Download QR
                </a>
                <a href="{{ route('presence-detail.export-pdf', $presence->id) }}" target="_blank"
                    class="btn btn-danger rounded-pill shadow-sm">
                    <i class="bi bi-file-earmark-pdf-fill me-1"></i> Export to PDF
                </a>
                <a href="{{ route('presence.index') }}" class="btn btn-secondary rounded-pill shadow-sm">
                    <i class="bi bi-arrow-left-circle me-1"></i> Kembali
                </a>
            </div>
        </div>

        <!-- Info Kegiatan -->
        <div class="card border-0 shadow-sm rounded-4 mb-3">
            <div class="card-body bg-white rounded-3">
                <table class="table table-borderless mb-0">
                    <tr>
                        <td width="180" class="fw-semibold">Agenda/Kegiatan</td>
                        <td width="20">:</td>
                        <td>{{ $presence->nama_kegiatan }}</td>
                    </tr>
                    <tr>
                        <td class="fw-semibold">Tanggal</td>
                        <td>:</td>
                        <td>{{ date('d F Y', strtotime($presence->tgl_kegiatan)) }}</td>
                    </tr>
                    <tr>
                        <td class="fw-semibold">Waktu</td>
                        <td>:</td>
                        <td>{{ date('H:i', strtotime($presence->tgl_kegiatan)) }} - s.d Selesai</td>
                    </tr>
                    <tr>
                        <td class="fw-semibold">Tempat</td>
                        <td>:</td>
                        <td>{{ $presence->tempat }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- Upload Bukti -->
        <div class="card border-0 shadow-sm rounded-4 mb-3">
            <div class="card-body bg-white rounded-3">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if (is_null($presence->bukti_kegiatan))
                    <form action="{{ route('presence.upload.bukti', $presence->id) }}" method="POST" enctype="multipart/form-data" class="mb-3">
                        @csrf
                        <div class="mb-2">
                            <label for="bukti_kegiatan" class="form-label fw-semibold">Upload Bukti Kegiatan (Gambar)</label>
                            <input type="file" name="bukti_kegiatan" id="bukti_kegiatan" accept="image/*" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </form>
                @else

                    <div class="mb-3">
                        <p class="fw-semibold mb-1">Bukti Kegiatan:</p>
                        <img src="{{ asset('storage/bukti/' . $presence->bukti_kegiatan) }}" alt="Bukti Kegiatan"
                            class="img-fluid rounded shadow-sm mb-2" style="max-height: 300px;">

                        <div class="d-flex gap-2">
                            <form action="{{ route('presence.delete.bukti', $presence->id) }}" method="POST" onsubmit="return confirm('Yakin hapus bukti ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus Bukti</button>
                            </form>

                            <form action="{{ route('presence.upload.bukti', $presence->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="bukti_kegiatan" accept="image/*" class="form-control form-control-sm" required>
                                <button type="submit" class="btn btn-primary btn-sm mt-1">Ganti Bukti</button>
                            </form>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <!-- QR Code -->
        <div class="card border-0 shadow-sm rounded-4 mb-3">
            <div class="card-body bg-white rounded-3 text-center">
                <h5 class="mb-3 text-dark fw-semibold">QR Code Link Absen</h5>

                <div class="mb-3">
                    {!! QrCode::size(150)->generate(route('absen.index', $presence->slug)) !!}
                </div>

                <div class="d-flex justify-content-center gap-2 flex-wrap">
                    <button onclick="copyLink()" class="btn btn-outline-secondary rounded-pill shadow-sm">
                        <i class="bi bi-clipboard me-1"></i> Copy Link
                    </button>
                    <a href="{{ route('presence.qrcode.download', $presence->slug) }}" class="btn btn-outline-success rounded-pill shadow-sm">
                        <i class="bi bi-download me-1"></i> Download QR
                    </a>
                </div>

                <small class="text-muted d-block mt-3">Scan QR Code untuk buka halaman absen</small>
            </div>
        </div>

        <!-- DataTable Peserta -->
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body bg-white rounded-3">
                <div class="table-responsive">
                    {{ $dataTable->table(['class' => 'table table-borderless table-striped align-middle mb-0']) }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    function copyLink() {
        navigator.clipboard.writeText("{{ route('absen.index', $presence->slug) }}");
        alert('Link berhasil dicopy ke clipboard!');
    }
</script>

{{ $dataTable->scripts(attributes: ['type' => 'module']) }}

<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('click', '.btn-delete', function (e) {
            e.preventDefault();
            let url = $(this).data('url');

            if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                $.ajax({
                    type: 'DELETE',
                    url: url,
                    success: function () {
                        window.location.reload();
                    },
                    error: function (xhr) {
                        alert('Gagal menghapus data!');
                        console.error(xhr.responseText);
                    }
                });
            }
        });
    });
</script>
@endpush --}}


{{-- @extends('layouts.main')

@section('content')
<div class="container my-4">
    <div class="bg-light p-4 rounded-4 shadow-sm">

        <!-- Header & Tombol -->
        <div class="d-flex flex-wrap justify-content-between align-items-start gap-3 mb-3">
            <h3 class="fw-bold text-dark mb-0">Detail Absen</h3>
            <div class="d-flex flex-wrap gap-2 justify-content-end">
                <button type="button" onclick="copyLink()" class="btn btn-warning rounded-pill shadow-sm">
                    <i class="bi bi-clipboard-fill me-1"></i> Copy Link
                </button>
                <a href="{{ route('presence.qrcode.download', $presence->slug) }}" class="btn btn-success rounded-pill shadow-sm">
                    <i class="bi bi-qr-code me-1"></i> Download QR
                </a>
                <a href="{{ route('presence-detail.export-pdf', $presence->id) }}" target="_blank"
                   class="btn btn-danger rounded-pill shadow-sm">
                    <i class="bi bi-file-earmark-pdf-fill me-1"></i> Export to PDF
                </a>
                <a href="{{ route('presence.index') }}" class="btn btn-secondary rounded-pill shadow-sm">
                    <i class="bi bi-arrow-left-circle me-1"></i> Kembali
                </a>
            </div>
        </div>

        <!-- Info Kegiatan -->
        <div class="card border-0 shadow-sm rounded-4 mb-3">
            <div class="card-body bg-white rounded-3">
                <table class="table table-borderless mb-0">
                    <tr>
                        <td width="180" class="fw-semibold">Agenda/Kegiatan</td>
                        <td width="20">:</td>
                        <td>{{ $presence->nama_kegiatan }}</td>
                    </tr>
                    <tr>
                        <td class="fw-semibold">Tanggal</td>
                        <td>:</td>
                        <td>{{ date('d F Y', strtotime($presence->tgl_kegiatan)) }}</td>
                    </tr>
                    <tr>
                        <td class="fw-semibold">Waktu</td>
                        <td>:</td>
                        <td>{{ date('H:i', strtotime($presence->tgl_kegiatan)) }} - s.d Selesai</td>
                    </tr>
                    <tr>
                        <td class="fw-semibold">Tempat</td>
                        <td>:</td>
                        <td>{{ $presence->tempat }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- Upload Bukti -->
        <div class="card border-0 shadow-sm rounded-4 mb-3">
            <div class="card-body bg-white rounded-3">

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if (is_null($presence->bukti_kegiatan))
                    <form action="{{ route('presence.upload.bukti', $presence->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="bukti_kegiatan" class="form-label fw-semibold">Upload Bukti Kegiatan (Gambar)</label>
                        <div class="d-flex gap-2 flex-column flex-sm-row">
                            <input type="file" name="bukti_kegiatan" id="bukti_kegiatan" accept="image/*" class="form-control" required>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-upload me-1"></i> Upload
                            </button>
                        </div>
                    </form>
                @else
                    <h5 class="fw-bold text-dark mb-3">Bukti Kegiatan</h5>

                    <div class="text-center mb-3">
                        <img src="{{ asset('storage/bukti/' . $presence->bukti_kegiatan) }}"
                             alt="Bukti Kegiatan"
                             class="img-thumbnail shadow-sm"
                             style="max-height: 320px; max-width: 100%; object-fit: contain;">
                    </div>

                    <div class="d-flex flex-column flex-md-row gap-2 justify-content-center">
                        <!-- Form Hapus -->
                        <form action="{{ route('presence.delete.bukti', $presence->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus gambar ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger w-100">
                                <i class="bi bi-trash-fill me-1"></i> Hapus Bukti
                            </button>
                        </form>

                        <!-- Form Ganti -->
                        <form action="{{ route('presence.upload.bukti', $presence->id) }}" method="POST" enctype="multipart/form-data" class="d-flex flex-column flex-sm-row gap-2 w-100">
                            @csrf
                            <input type="file" name="bukti_kegiatan" accept="image/*" class="form-control" required>
                            <button type="submit" class="btn btn-outline-primary">
                                <i class="bi bi-arrow-repeat me-1"></i> Ganti Bukti
                            </button>
                        </form>
                    </div>
                @endif

            </div>
        </div>

        <!-- DataTable Peserta -->
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body bg-white rounded-3">
                <div class="table-responsive">
                    {{ $dataTable->table(['class' => 'table table-borderless table-striped align-middle mb-0']) }}
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@push('js')
<script>
    function copyLink() {
        navigator.clipboard.writeText("{{ route('absen.index', $presence->slug) }}");
        alert('Link berhasil dicopy ke clipboard!');
    }
</script>

{{ $dataTable->scripts(attributes: ['type' => 'module']) }}

<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('click', '.btn-delete', function (e) {
            e.preventDefault();
            let url = $(this).data('url');

            if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                $.ajax({
                    type: 'DELETE',
                    url: url,
                    success: function () {
                        window.location.reload();
                    },
                    error: function (xhr) {
                        alert('Gagal menghapus data!');
                        console.error(xhr.responseText);
                    }
                });
            }
        });
    });
</script>
@endpush --}}



@extends('layouts.main')

@section('content')
<div class="container my-4">
    <div class="bg-light p-4 rounded-4 shadow-sm">

        <!-- Header & Tombol -->
        <div class="d-flex flex-wrap justify-content-between align-items-start gap-3 mb-3">
            <h3 class="fw-bold text-dark mb-0">Detail Absen</h3>
            <div class="d-flex flex-wrap gap-2 justify-content-end">

                <!-- Dropdown Bagikan -->
                <div class="dropdown">
                    <button class="btn btn-warning dropdown-toggle rounded-pill shadow-sm" type="button" id="dropdownShare"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-share-fill me-1"></i> Bagikan
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownShare">
                        <li>
                            <button class="dropdown-item" onclick="copyLink()">
                                <i class="bi bi-clipboard me-2"></i> Salin Link
                            </button>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('presence.qrcode.download', $presence->slug) }}">
                                <i class="bi bi-qr-code me-2"></i> Download QR
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item"
                               href="https://wa.me/?text={{ urlencode(route('absen.index', $presence->slug)) }}"
                               target="_blank">
                                <i class="bi bi-whatsapp me-2"></i> Bagikan ke WhatsApp
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Tombol PDF & Kembali -->
                <a href="{{ route('presence-detail.export-pdf', $presence->id) }}" target="_blank"
                   class="btn btn-danger rounded-pill shadow-sm">
                    <i class="bi bi-file-earmark-pdf-fill me-1"></i> Export PDF
                </a>
                <a href="{{ route('presence.index') }}" class="btn btn-secondary rounded-pill shadow-sm">
                    <i class="bi bi-arrow-left-circle me-1"></i> Kembali
                </a>
            </div>
        </div>

        <!-- Info Kegiatan -->
        <div class="card border-0 shadow-sm rounded-4 mb-3">
            <div class="card-body bg-white rounded-3">
                <table class="table table-borderless mb-0">
                    <tr>
                        <td width="180" class="fw-semibold">Agenda/Kegiatan</td>
                        <td width="20">:</td>
                        <td>{{ $presence->nama_kegiatan }}</td>
                    </tr>
                    <tr>
                        <td class="fw-semibold">Tanggal</td>
                        <td>:</td>
                        <td>{{ date('d F Y', strtotime($presence->tgl_kegiatan)) }}</td>
                    </tr>
                    <tr>
                        <td class="fw-semibold">Waktu</td>
                        <td>:</td>
                        <td>{{ date('H:i', strtotime($presence->tgl_kegiatan)) }} - s.d Selesai</td>
                    </tr>
                    <tr>
                        <td class="fw-semibold">Tempat</td>
                        <td>:</td>
                        <td>{{ $presence->tempat }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- Upload Bukti -->
        <div class="card border-0 shadow-sm rounded-4 mb-3">
            <div class="card-body bg-white rounded-3">

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if (is_null($presence->bukti_kegiatan))
                    <form action="{{ route('presence.upload.bukti', $presence->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="bukti_kegiatan" class="form-label fw-semibold">Upload Bukti Kegiatan (Gambar)</label>
                        <div class="d-flex gap-2 flex-column flex-sm-row">
                            <input type="file" name="bukti_kegiatan" id="bukti_kegiatan" accept="image/*" class="form-control" required>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-upload me-1"></i> Upload
                            </button>
                        </div>
                    </form>
                @else
                    <h5 class="fw-bold text-dark mb-3">Bukti Kegiatan</h5>

                    <div class="text-center mb-3">
                        <img src="{{ asset('storage/bukti/' . $presence->bukti_kegiatan) }}"
                             alt="Bukti Kegiatan"
                             class="img-thumbnail shadow-sm"
                             style="max-height: 320px; max-width: 100%; object-fit: contain;">
                    </div>

                    {{-- <div class="d-flex flex-column flex-md-row gap-2 justify-content-center">
                        <!-- Form Hapus -->
                        <form action="{{ route('presence.delete.bukti', $presence->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus gambar ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger w-100">
                                <i class="bi bi-trash-fill me-1"></i> Hapus
                            </button>
                        </form>

                        <!-- Form Ganti -->
                        <form action="{{ route('presence.upload.bukti', $presence->id) }}" method="POST" enctype="multipart/form-data" class="d-flex flex-column flex-sm-row gap-2 w-100">
                            @csrf
                            <input type="file" name="bukti_kegiatan" accept="image/*" class="form-control" required>
                            <button type="submit" class="btn btn-outline-primary">
                                <i class="bi bi-arrow-repeat me-1"></i> Upload
                            </button>
                        </form>
                    </div> --}}

                    <div class="d-flex flex-column flex-md-row gap-2 justify-content-center align-items-center">

    {{-- Tombol Hapus (Lebar pendek, tinggi seragam) --}}
    <form action="{{ route('presence.delete.bukti', $presence->id) }}" method="POST"
          onsubmit="return confirm('Yakin ingin hapus gambar ini?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-outline-danger d-flex align-items-center px-3"
                style="height: 38px;">
            <i class="bi bi-trash-fill me-1"></i> Hapus
        </button>
    </form>

    {{-- Upload Form (Lebar penuh, rapi, tinggi seragam) --}}
    <form action="{{ route('presence.upload.bukti', $presence->id) }}" method="POST"
          enctype="multipart/form-data" class="d-flex gap-2 w-100 align-items-center">
        @csrf
        <input type="file" name="bukti_kegiatan" accept="image/*"
               class="form-control" style="height: 38px;" required>
        <button type="submit" class="btn btn-outline-primary d-flex align-items-center justify-content-center px-3"
                style="height: 38px;">
            <i class="bi bi-upload me-1"></i> Upload
        </button>
    </form>

</div>

                @endif

            </div>
        </div>

        <!-- DataTable Peserta -->
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body bg-white rounded-3">
                <div class="table-responsive">
                    {{ $dataTable->table(['class' => 'table table-borderless table-striped align-middle mb-0']) }}
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@push('js')
<script>
    function copyLink() {
        navigator.clipboard.writeText("{{ route('absen.index', $presence->slug) }}");
        alert('Link berhasil disalin ke clipboard!');
    }
</script>

{{ $dataTable->scripts(attributes: ['type' => 'module']) }}

<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('click', '.btn-delete', function (e) {
            e.preventDefault();
            let url = $(this).data('url');

            if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                $.ajax({
                    type: 'DELETE',
                    url: url,
                    success: function () {
                        window.location.reload();
                    },
                    error: function (xhr) {
                        alert('Gagal menghapus data!');
                        console.error(xhr.responseText);
                    }
                });
            }
        });
    });
</script>
@endpush
