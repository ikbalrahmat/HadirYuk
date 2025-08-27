{{-- @extends('layouts.main')

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
@endsection --}}


@extends('layouts.main')

@section('content')
<div class="max-w-4xl mx-auto my-8">
    <div class="bg-white shadow rounded-2xl overflow-hidden">
        <!-- Header -->
        <div class="px-6 py-4 border-b border-gray-200">
            <h5 class="text-lg font-semibold text-gray-700 flex items-center">
                <i class="bi bi-calendar-plus mr-2"></i> Tambah Kegiatan
            </h5>
        </div>

        <!-- Body -->
        <div class="p-6">
            <form action="{{ route('presence.store') }}" method="POST" class="space-y-5">
                @csrf

                <!-- Nama Kegiatan -->
                <div>
                    <label for="nama_kegiatan" class="block text-sm font-medium text-gray-700">Nama Agenda / Kegiatan</label>
                    <input type="text" id="nama_kegiatan" name="nama_kegiatan"
                        value="{{ old('nama_kegiatan') }}"
                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        placeholder="Masukkan nama kegiatan">
                    @error('nama_kegiatan')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tanggal & Waktu -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="tgl_kegiatan" class="block text-sm font-medium text-gray-700">Tanggal</label>
                        <input type="date" id="tgl_kegiatan" name="tgl_kegiatan"
                            value="{{ old('tgl_kegiatan') }}"
                            class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        @error('tgl_kegiatan')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="waktu_mulai" class="block text-sm font-medium text-gray-700">Waktu Mulai</label>
                        <input type="time" id="waktu_mulai" name="waktu_mulai"
                            value="{{ old('waktu_mulai') }}"
                            class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        @error('waktu_mulai')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Tempat -->
                <div>
                    <label for="tempat" class="block text-sm font-medium text-gray-700">Tempat</label>
                    <input type="text" id="tempat" name="tempat"
                        value="{{ old('tempat') }}"
                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        placeholder="Masukkan tempat kegiatan">
                    @error('tempat')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tombol -->
                <div class="flex justify-end space-x-3 pt-4 border-t border-gray-200">
                    <a href="{{ route('presence.index') }}"
                        class="px-4 py-2 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-100 flex items-center">
                        <i class="bi bi-x-circle mr-1"></i> Batal
                    </a>
                    <button type="submit"
                        class="px-4 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700 shadow flex items-center">
                        <i class="bi bi-save mr-1"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
