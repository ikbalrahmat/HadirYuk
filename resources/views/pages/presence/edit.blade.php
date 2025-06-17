{{-- @extends('layouts.main')

@section('content')
    <div class="container my-4">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h4 class="card-title">
                            Edit Agenda/Kegiatan
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
                <form action="{{ route('presence.update', $presence->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="nama_kegiatan">Agenda/Kegiatan</label>
                        <input type="text" class="form-control" name="nama_kegiatan" id="nama_kegiatan"
                            value="{{ old('nama_kegiatan', $presence->nama_kegiatan) }}">
                        @error('nama_kegiatan')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="tgl_kegiatan">Tanggal</label>
                        <input type="date" class="form-control" name="tgl_kegiatan" id="tgl_kegiatan"
                            value="{{ old('tgl_kegiatan', date('Y-m-d', strtotime($presence->tgl_kegiatan))) }}">
                        @error('tgl_kegiatan')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="waktu_mulai">Waktu</label>
                        <input type="time" class="form-control" name="waktu_mulai" id="waktu_mulai"
                            value="{{ old('waktu_mulai', date('H:i', strtotime($presence->tgl_kegiatan))) }}">
                        @error('waktu_mulai')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="tempat">Tempat</label>
                        <input type="text" class="form-control" name="tempat" id="tempat"
                            value="{{ old('tempat', $presence->tempat ?? '') }}">
                        @error('tempat')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection --}}


{{-- @extends('layouts.main')

@section('content')
    <div class="container my-5">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center">
                <h5 class="mb-0">
                    <i class="bi bi-pencil-square me-2"></i> Edit Agenda/Kegiatan
                </h5>
                <a href="{{ route('presence.index') }}" class="btn btn-outline-secondary btn-sm">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>

            <div class="card-body">
                <form action="{{ route('presence.update', $presence->id) }}" method="POST" class="row g-3">
                    @csrf
                    @method('put')

                    <div class="col-md-12 form-floating">
                        <input type="text" class="form-control @error('nama_kegiatan') is-invalid @enderror"
                            id="nama_kegiatan" name="nama_kegiatan"
                            placeholder="Nama Kegiatan"
                            value="{{ old('nama_kegiatan', $presence->nama_kegiatan) }}">
                        <label for="nama_kegiatan">Nama Agenda/Kegiatan</label>
                        @error('nama_kegiatan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 form-floating">
                        <input type="date" class="form-control @error('tgl_kegiatan') is-invalid @enderror"
                            id="tgl_kegiatan" name="tgl_kegiatan"
                            placeholder="Tanggal"
                            value="{{ old('tgl_kegiatan', date('Y-m-d', strtotime($presence->tgl_kegiatan))) }}">
                        <label for="tgl_kegiatan">Tanggal</label>
                        @error('tgl_kegiatan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 form-floating">
                        <input type="time" class="form-control @error('waktu_mulai') is-invalid @enderror"
                            id="waktu_mulai" name="waktu_mulai"
                            placeholder="Waktu Mulai"
                            value="{{ old('waktu_mulai', date('H:i', strtotime($presence->tgl_kegiatan))) }}">
                        <label for="waktu_mulai">Waktu Mulai</label>
                        @error('waktu_mulai')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12 form-floating">
                        <input type="text" class="form-control @error('tempat') is-invalid @enderror"
                            id="tempat" name="tempat"
                            placeholder="Tempat"
                            value="{{ old('tempat', $presence->tempat ?? '') }}">
                        <label for="tempat">Tempat</label>
                        @error('tempat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save me-1"></i> Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection --}}



{{-- @extends('layouts.main')

@section('content')
    <div class="container my-5">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white border-bottom">
                <h5 class="mb-0">
                    <i class="bi bi-pencil-square me-2"></i> Edit Agenda/Kegiatan
                </h5>
            </div>

            <div class="card-body">
                <form action="{{ route('presence.update', $presence->id) }}" method="POST" class="row g-3">
                    @csrf
                    @method('put')

                    <div class="col-md-12 form-floating">
                        <input type="text" class="form-control @error('nama_kegiatan') is-invalid @enderror"
                            id="nama_kegiatan" name="nama_kegiatan"
                            placeholder="Nama Kegiatan"
                            value="{{ old('nama_kegiatan', $presence->nama_kegiatan) }}">
                        <label for="nama_kegiatan">Nama Agenda/Kegiatan</label>
                        @error('nama_kegiatan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 form-floating">
                        <input type="date" class="form-control @error('tgl_kegiatan') is-invalid @enderror"
                            id="tgl_kegiatan" name="tgl_kegiatan"
                            placeholder="Tanggal"
                            value="{{ old('tgl_kegiatan', date('Y-m-d', strtotime($presence->tgl_kegiatan))) }}">
                        <label for="tgl_kegiatan">Tanggal</label>
                        @error('tgl_kegiatan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 form-floating">
                        <input type="time" class="form-control @error('waktu_mulai') is-invalid @enderror"
                            id="waktu_mulai" name="waktu_mulai"
                            placeholder="Waktu Mulai"
                            value="{{ old('waktu_mulai', date('H:i', strtotime($presence->tgl_kegiatan))) }}">
                        <label for="waktu_mulai">Waktu Mulai</label>
                        @error('waktu_mulai')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12 form-floating">
                        <input type="text" class="form-control @error('tempat') is-invalid @enderror"
                            id="tempat" name="tempat"
                            placeholder="Tempat"
                            value="{{ old('tempat', $presence->tempat ?? '') }}">
                        <label for="tempat">Tempat</label>
                        @error('tempat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="d-flex justify-content-end">
                        <a href="{{ route('presence.index') }}" class="btn btn-outline-secondary me-2">
                            <i class="bi bi-x-circle"></i> Batal
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save"></i> Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection --}}



{{-- @extends('layouts.main')

@section('content')
    <div class="container my-5">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">
                    <i class="bi bi-pencil-square me-2"></i> Edit Agenda/Kegiatan
                </h5>
            </div>

            <div class="card-body">
                <form action="{{ route('presence.update', $presence->id) }}" method="POST" class="row g-3">
                    @csrf
                    @method('PUT')

                    <div class="col-md-12">
                        <label for="nama_kegiatan" class="form-label">Agenda/Kegiatan</label>
                        <input type="text" class="form-control @error('nama_kegiatan') is-invalid @enderror"
                            id="nama_kegiatan" name="nama_kegiatan"
                            value="{{ old('nama_kegiatan', $presence->nama_kegiatan) }}">
                        @error('nama_kegiatan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="tgl_kegiatan" class="form-label">Tanggal</label>
                        <input type="date" class="form-control @error('tgl_kegiatan') is-invalid @enderror"
                            id="tgl_kegiatan" name="tgl_kegiatan"
                            value="{{ old('tgl_kegiatan', date('Y-m-d', strtotime($presence->tgl_kegiatan))) }}">
                        @error('tgl_kegiatan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="waktu_mulai" class="form-label">Waktu Mulai</label>
                        <input type="time" class="form-control @error('waktu_mulai') is-invalid @enderror"
                            id="waktu_mulai" name="waktu_mulai"
                            value="{{ old('waktu_mulai', date('H:i', strtotime($presence->tgl_kegiatan))) }}">
                        @error('waktu_mulai')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <label for="tempat" class="form-label">Tempat</label>
                        <input type="text" class="form-control @error('tempat') is-invalid @enderror"
                            id="tempat" name="tempat"
                            value="{{ old('tempat', $presence->tempat ?? '') }}">
                        @error('tempat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 d-flex justify-content-between mt-4">
                        <a href="{{ route('presence.index') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-x-circle me-1"></i> Batal
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save me-1"></i> Simpan Perubahan
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
                <h5 class="mb-0"><i class="bi bi-pencil-square me-2"></i> Edit Kegiatan</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('presence.update', $presence->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan"
                            placeholder="Nama Kegiatan"
                            value="{{ old('nama_kegiatan', $presence->nama_kegiatan) }}">
                        <label for="nama_kegiatan">Nama Agenda / Kegiatan</label>
                        @error('nama_kegiatan')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3 form-floating">
                            <input type="date" class="form-control" id="tgl_kegiatan" name="tgl_kegiatan"
                                placeholder="Tanggal"
                                value="{{ old('tgl_kegiatan', date('Y-m-d', strtotime($presence->tgl_kegiatan))) }}">
                            <label for="tgl_kegiatan">Tanggal</label>
                            @error('tgl_kegiatan')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3 form-floating">
                            <input type="time" class="form-control" id="waktu_mulai" name="waktu_mulai"
                                placeholder="Waktu Mulai"
                                value="{{ old('waktu_mulai', date('H:i', strtotime($presence->tgl_kegiatan))) }}">
                            <label for="waktu_mulai">Waktu Mulai</label>
                            @error('waktu_mulai')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="tempat" name="tempat"
                            placeholder="Tempat"
                            value="{{ old('tempat', $presence->tempat ?? '') }}">
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
                            <i class="bi bi-save"></i> Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
