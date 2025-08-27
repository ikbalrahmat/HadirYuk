{{-- @extends('layouts.main')

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
@endsection --}}

{{--
@extends('layouts.main')

@section('content')
<div class="container my-4">
    <div class="bg-light p-4 rounded-4 shadow-sm">
        <h3 class="fw-bold text-dark mb-4">Edit Risalah</h3>

        <form method="POST" action="{{ route('risalah.update', $risalah->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="rapat_id" class="form-label">Pilih Rapat</label>
                <select name="rapat_id" id="rapat_id" class="form-control" required>
                    <option value="">-- Pilih Rapat --</option>
                    @foreach($rapats as $r)
                        <option value="{{ $r->id }}" {{ $risalah->rapat_id == $r->id ? 'selected' : '' }}>
                            {{ $r->nama_rapat }} ({{ $r->tanggal }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="presence_id" class="form-label">Pilih Absensi</label>
                <select name="presence_id" id="presence_id" class="form-control" required>
                    <option value="">-- Pilih Absensi --</option>
                    @foreach($presences as $p)
                        <option value="{{ $p->id }}" {{ $risalah->presence_id == $p->id ? 'selected' : '' }}>
                            {{ $p->nama_kegiatan }} ({{ $p->tgl_kegiatan }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Pimpinan Rapat</label>
                <input type="text" name="pimpinan" class="form-control" value="{{ old('pimpinan', $risalah->pimpinan) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Pencatat Rapat</label>
                <input type="text" name="pencatat" class="form-control" value="{{ old('pencatat', $risalah->pencatat) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Jenis Rapat</label><br>
                <label><input type="radio" name="jenis_rapat" value="Entry Meeting" {{ $risalah->jenis_rapat == 'Entry Meeting' ? 'checked' : '' }}> Entry Meeting</label>
                <label><input type="radio" name="jenis_rapat" value="Expose Meeting" {{ $risalah->jenis_rapat == 'Expose Meeting' ? 'checked' : '' }}> Expose Meeting</label>
                <label><input type="radio" name="jenis_rapat" value="Exit Meeting" {{ $risalah->jenis_rapat == 'Exit Meeting' ? 'checked' : '' }}> Exit Meeting</label>
                <label><input type="radio" name="jenis_rapat" value="Lainnya" {{ $risalah->jenis_rapat == 'Lainnya' ? 'checked' : '' }}> Lainnya</label>
            </div>

            <div class="mb-3">
                <label class="form-label">Penjelasan Rapat</label>
                <textarea name="penjelasan" class="form-control" id="penjelasan-editor" rows="5">{{ old('penjelasan', $risalah->penjelasan) }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Kesimpulan</label>
                <textarea name="kesimpulan" class="form-control" id="kesimpulan-editor" rows="5">{{ old('kesimpulan', $risalah->kesimpulan) }}</textarea>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('risalah.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>

@push('js')
<script>
    ClassicEditor
        .create( document.querySelector( '#penjelasan-editor' ) )
        .catch( error => {
            console.error( error );
        } );

    ClassicEditor
        .create( document.querySelector( '#kesimpulan-editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endpush
@endsection --}}

{{--
@extends('layouts.main')

@section('content')
<div class="max-w-4xl mx-auto my-6">
    <div class="bg-white p-6 rounded-2xl shadow-md">
        <h3 class="text-xl font-bold text-gray-800 mb-6">Edit Risalah</h3>

        <form method="POST" action="{{ route('risalah.update', $risalah->id) }}" class="space-y-5">
            @csrf
            @method('PUT')

            <!-- Pilih Rapat -->
            <div>
                <label for="rapat_id" class="block text-sm font-medium text-gray-700 mb-1">Pilih Rapat</label>
                <select name="rapat_id" id="rapat_id" class="w-full rounded-lg border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm" required>
                    <option value="">-- Pilih Rapat --</option>
                    @foreach($rapats as $r)
                        <option value="{{ $r->id }}" {{ $risalah->rapat_id == $r->id ? 'selected' : '' }}>
                            {{ $r->nama_rapat }} ({{ $r->tanggal }})
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Pilih Absensi -->
            <div>
                <label for="presence_id" class="block text-sm font-medium text-gray-700 mb-1">Pilih Absensi</label>
                <select name="presence_id" id="presence_id" class="w-full rounded-lg border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm" required>
                    <option value="">-- Pilih Absensi --</option>
                    @foreach($presences as $p)
                        <option value="{{ $p->id }}" {{ $risalah->presence_id == $p->id ? 'selected' : '' }}>
                            {{ $p->nama_kegiatan }} ({{ $p->tgl_kegiatan }})
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Pimpinan Rapat -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Pimpinan Rapat</label>
                <input type="text" name="pimpinan" value="{{ old('pimpinan', $risalah->pimpinan) }}" class="w-full rounded-lg border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm" required>
            </div>

            <!-- Pencatat Rapat -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Pencatat Rapat</label>
                <input type="text" name="pencatat" value="{{ old('pencatat', $risalah->pencatat) }}" class="w-full rounded-lg border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm" required>
            </div>

            <!-- Jenis Rapat -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Jenis Rapat</label>
                <div class="flex flex-wrap gap-4">
                    <label class="flex items-center gap-2">
                        <input type="radio" name="jenis_rapat" value="Entry Meeting" {{ $risalah->jenis_rapat == 'Entry Meeting' ? 'checked' : '' }} class="text-blue-600 focus:ring-blue-500">
                        <span class="text-sm text-gray-700">Entry Meeting</span>
                    </label>
                    <label class="flex items-center gap-2">
                        <input type="radio" name="jenis_rapat" value="Expose Meeting" {{ $risalah->jenis_rapat == 'Expose Meeting' ? 'checked' : '' }} class="text-blue-600 focus:ring-blue-500">
                        <span class="text-sm text-gray-700">Expose Meeting</span>
                    </label>
                    <label class="flex items-center gap-2">
                        <input type="radio" name="jenis_rapat" value="Exit Meeting" {{ $risalah->jenis_rapat == 'Exit Meeting' ? 'checked' : '' }} class="text-blue-600 focus:ring-blue-500">
                        <span class="text-sm text-gray-700">Exit Meeting</span>
                    </label>
                    <label class="flex items-center gap-2">
                        <input type="radio" name="jenis_rapat" value="Lainnya" {{ $risalah->jenis_rapat == 'Lainnya' ? 'checked' : '' }} class="text-blue-600 focus:ring-blue-500">
                        <span class="text-sm text-gray-700">Lainnya</span>
                    </label>
                </div>
            </div>

            <!-- Penjelasan -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Penjelasan Rapat</label>
                <textarea name="penjelasan" id="penjelasan-editor" rows="5" class="w-full rounded-lg border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm">{{ old('penjelasan', $risalah->penjelasan) }}</textarea>
            </div>

            <!-- Kesimpulan -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Kesimpulan</label>
                <textarea name="kesimpulan" id="kesimpulan-editor" rows="5" class="w-full rounded-lg border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm">{{ old('kesimpulan', $risalah->kesimpulan) }}</textarea>
            </div>

            <!-- Tombol -->
            <div class="flex justify-between items-center pt-4">
                <a href="{{ route('risalah.index') }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg shadow-sm hover:bg-gray-300 transition">Kembali</a>
                <button type="submit" class="px-5 py-2 bg-blue-600 text-white rounded-lg shadow-sm hover:bg-blue-700 transition">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>

@push('js')
<script>
    ClassicEditor
        .create( document.querySelector( '#penjelasan-editor' ) )
        .catch( error => {
            console.error( error );
        } );

    ClassicEditor
        .create( document.querySelector( '#kesimpulan-editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endpush
@endsection --}}


@extends('layouts.main')

@section('content')
<div class="max-w-3xl mx-auto my-8">
    <div class="bg-white shadow rounded-lg">
        <!-- Header -->
        <div class="px-6 py-4 border-b border-gray-200 flex items-center">
            <i class="bi bi-pencil-square text-blue-500 mr-2"></i>
            <h5 class="text-lg font-semibold text-gray-700">Edit Kegiatan</h5>
        </div>

        <!-- Body -->
        <div class="p-6">
            <form action="{{ route('presence.update', $presence->id) }}" method="POST" class="space-y-5">
                @csrf
                @method('PUT')

                <!-- Nama Kegiatan -->
                <div>
                    <label for="nama_kegiatan" class="block text-sm font-medium text-gray-700 mb-1">Nama Agenda / Kegiatan</label>
                    <input type="text" id="nama_kegiatan" name="nama_kegiatan"
                        value="{{ old('nama_kegiatan', $presence->nama_kegiatan) }}"
                        class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200">
                    @error('nama_kegiatan')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Row: Tanggal & Waktu -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="tgl_kegiatan" class="block text-sm font-medium text-gray-700 mb-1">Tanggal</label>
                        <input type="date" id="tgl_kegiatan" name="tgl_kegiatan"
                            value="{{ old('tgl_kegiatan', date('Y-m-d', strtotime($presence->tgl_kegiatan))) }}"
                            class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200">
                        @error('tgl_kegiatan')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="waktu_mulai" class="block text-sm font-medium text-gray-700 mb-1">Waktu Mulai</label>
                        <input type="time" id="waktu_mulai" name="waktu_mulai"
                            value="{{ old('waktu_mulai', date('H:i', strtotime($presence->tgl_kegiatan))) }}"
                            class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200">
                        @error('waktu_mulai')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Tempat -->
                <div>
                    <label for="tempat" class="block text-sm font-medium text-gray-700 mb-1">Tempat</label>
                    <input type="text" id="tempat" name="tempat"
                        value="{{ old('tempat', $presence->tempat ?? '') }}"
                        class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200">
                    @error('tempat')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-end gap-3 pt-4 border-t border-gray-200">
                    <a href="{{ route('presence.index') }}"
                        class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-100">
                        <i class="bi bi-x-circle mr-1"></i> Batal
                    </a>
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-lg bg-blue-600 text-white hover:bg-blue-700">
                        <i class="bi bi-save mr-1"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
