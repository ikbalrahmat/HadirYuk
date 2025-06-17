{{-- @extends('layouts.main')

@section('content')
    <div class="container my-4">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h4 class="card-title">
                            Tambah Agenda/Kegiatan
                        </h4>
                    </div>
                    <div class="col text-end">
                        <a href="{{ route('presence.index') }}" class="btn btn-secondary">
                            Kembali
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('presence.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="nama_kegiatan">Nama Agenda/Kegiatan</label>
                        <input type="text" class="form-control" name="nama_kegiatan" id="nama_kegiatan"
                            value="{{ old('nama_kegiatan') }}">
                        @error('nama_kegiatan')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="tgl_kegiatan">Tanggal</label>
                        <input type="date" class="form-control" name="tgl_kegiatan" id="tgl_kegiatan"
                            value="{{ old('tgl_kegiatan') }}">
                        @error('tgl_kegiatan')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="waktu_mulai">Waktu</label>
                        <input type="time" class="form-control" name="waktu_mulai" id="waktu_mulai"
                            value="{{ old('waktu_mulai') }}">
                        @error('waktu_mulai')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Simpan
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection --}}


{{--
@extends('layouts.main')

@section('content')
    <div class="container my-4">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h4 class="card-title">
                            Tambah Kegiatan
                        </h4>
                    </div>
                    <div class="col text-end">
                        <a href="{{ route('presence.index') }}" class="btn btn-secondary">
                            Kembali
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('presence.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="nama_kegiatan">Nama Agenda/Kegiatan</label>
                        <input type="text" class="form-control" name="nama_kegiatan" id="nama_kegiatan"
                            value="{{ old('nama_kegiatan') }}">
                        @error('nama_kegiatan')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tgl_kegiatan">Tanggal</label>
                        <input type="date" class="form-control" name="tgl_kegiatan" id="tgl_kegiatan"
                            value="{{ old('tgl_kegiatan') }}">
                        @error('tgl_kegiatan')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="waktu_mulai">Waktu</label>
                        <input type="time" class="form-control" name="waktu_mulai" id="waktu_mulai"
                            value="{{ old('waktu_mulai') }}">
                        @error('waktu_mulai')
                            <div class="text-danger small">{{ $message }} - s.d Selesai</div>
                        @enderror
                    </div>

                    <!-- Tambahan Form Tempat -->
                    <div class="mb-3">
                        <label for="tempat">Tempat</label>
                        <input type="text" class="form-control" name="tempat" id="tempat"
                            value="{{ old('tempat') }}">
                        @error('tempat')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary" onclick="this.disabled = true; this.form.submit();">
                        Simpan
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection --}}



{{-- @extends('layouts.main')

@section('content')
    <div class="container my-4">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">
                    <i class="bi bi-calendar-plus me-2"></i> Tambah Kegiatan
                </h5>
                <a href="{{ route('presence.index') }}" class="btn btn-light btn-sm">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>

            <div class="card-body">
                <form action="{{ route('presence.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="nama_kegiatan" class="form-label">
                            <i class="bi bi-card-text me-1"></i> Nama Agenda/Kegiatan
                        </label>
                        <input type="text" class="form-control" name="nama_kegiatan" id="nama_kegiatan"
                               placeholder="Contoh: Rapat Evaluasi Bulanan"
                               value="{{ old('nama_kegiatan') }}">
                        @error('nama_kegiatan')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="tgl_kegiatan" class="form-label">
                                <i class="bi bi-calendar-date me-1"></i> Tanggal
                            </label>
                            <input type="date" class="form-control" name="tgl_kegiatan" id="tgl_kegiatan"
                                   value="{{ old('tgl_kegiatan') }}">
                            @error('tgl_kegiatan')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="waktu_mulai" class="form-label">
                                <i class="bi bi-clock me-1"></i> Waktu Mulai
                            </label>
                            <input type="time" class="form-control" name="waktu_mulai" id="waktu_mulai"
                                   value="{{ old('waktu_mulai') }}">
                            @error('waktu_mulai')
                                <div class="text-danger small">{{ $message }} - s.d selesai</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="tempat" class="form-label">
                            <i class="bi bi-geo-alt me-1"></i> Tempat
                        </label>
                        <input type="text" class="form-control" name="tempat" id="tempat"
                               placeholder="Contoh: Ruang Meeting 2 Lantai 3"
                               value="{{ old('tempat') }}">
                        @error('tempat')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary px-4"
                                onclick="this.disabled = true; this.innerText='Menyimpan...'; this.form.submit();">
                            <i class="bi bi-save me-1"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection --}}


@extends('layouts.main')

@section('content')
    <div class="container my-5">
        <div class="card shadow border-0">
            <div class="card-header bg-white border-bottom">
                <h5 class="mb-0"><i class="bi bi-calendar-plus me-2"></i> Tambah Kegiatan</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('presence.store') }}" method="POST">
                    @csrf

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" placeholder="Nama Kegiatan" value="{{ old('nama_kegiatan') }}">
                        <label for="nama_kegiatan">Nama Agenda / Kegiatan</label>
                        @error('nama_kegiatan')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3 form-floating">
                            <input type="date" class="form-control" id="tgl_kegiatan" name="tgl_kegiatan" placeholder="Tanggal" value="{{ old('tgl_kegiatan') }}">
                            <label for="tgl_kegiatan">Tanggal</label>
                            @error('tgl_kegiatan')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3 form-floating">
                            <input type="time" class="form-control" id="waktu_mulai" name="waktu_mulai" placeholder="Waktu Mulai" value="{{ old('waktu_mulai') }}">
                            <label for="waktu_mulai">Waktu Mulai</label>
                            @error('waktu_mulai')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="tempat" name="tempat" placeholder="Tempat" value="{{ old('tempat') }}">
                        <label for="tempat">Tempat</label>
                        @error('tempat')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end">
                        <a href="{{ route('presence.index') }}" class="btn btn-outline-secondary me-2">
                            <i class="bi bi-x-circle"></i> Batal
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
