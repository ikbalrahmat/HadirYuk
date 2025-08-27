{{-- @extends('layouts.main')

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
                        <option value="{{ $r->id }}" {{ $r->id == $risalah->rapat_id ? 'selected' : '' }}>
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
                        <option value="{{ $p->id }}" {{ $p->id == $risalah->presence_id ? 'selected' : '' }}>
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
                <textarea name="penjelasan" class="form-control" rows="5">{{ old('penjelasan', $risalah->penjelasan) }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Kesimpulan</label>
                <textarea name="kesimpulan" class="form-control" rows="5">{{ old('kesimpulan', $risalah->kesimpulan) }}</textarea>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('risalah.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Update Risalah</button>
            </div>
        </form>
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
                        <option value="{{ $r->id }}" {{ $r->id == $risalah->rapat_id ? 'selected' : '' }}>
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
                        <option value="{{ $p->id }}" {{ $p->id == $risalah->presence_id ? 'selected' : '' }}>
                            {{ $p->nama_kegiatan }} ({{ $p->tgl_kegiatan }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Pimpinan Rapat</label>
                <input type="text" name="pimpinan" class="form-control"
                       value="{{ old('pimpinan', $risalah->pimpinan) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Pencatat Rapat</label>
                <input type="text" name="pencatat" class="form-control"
                       value="{{ old('pencatat', $risalah->pencatat) }}" required>
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
                <button type="submit" class="btn btn-primary">Update Risalah</button>
            </div>
        </form>
    </div>
</div>

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
                <label for="undangan_id" class="form-label">Pilih Undangan Rapat</label>
                <select name="undangan_id" id="undangan_id" class="form-control" required>
                    <option value="">-- Pilih Undangan --</option>
                    @foreach($undangans as $undangan)

                        <option value="{{ $undangan->id }}" {{ $undangan->id == $risalah->undangan_id ? 'selected' : '' }}
                                data-agenda="{{ $undangan->agenda }}"
                                data-tanggal="{{ $undangan->tanggal }}"
                                data-jam="{{ $undangan->jam }}"
                                data-tempat-link="{{ $undangan->tempat_link }}">
                            {{ $undangan->agenda }} ({{ \Carbon\Carbon::parse($undangan->tanggal)->format('d M Y') }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="presence_id" class="form-label">Pilih Absensi</label>
                <select name="presence_id" id="presence_id" class="form-control" required>
                    <option value="">-- Pilih Absensi --</option>
                    @foreach($presences as $p)
                        <option value="{{ $p->id }}" {{ $p->id == $risalah->presence_id ? 'selected' : '' }}>
                            {{ $p->nama_kegiatan }} ({{ $p->tgl_kegiatan }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Agenda Rapat</label>
                    <input type="text" id="agenda" class="form-control" value="{{ $risalah->agenda }}" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Tanggal Rapat</label>
                    <input type="date" id="tanggal" class="form-control" value="{{ $risalah->tanggal }}" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Waktu Mulai</label>
                    <input type="time" id="waktu_mulai" class="form-control" value="{{ $risalah->waktu_mulai }}" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Waktu Selesai</label>
                    <input type="time" id="waktu_selesai" class="form-control" value="{{ $risalah->waktu_selesai }}" readonly>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Tempat Rapat</label>
                <input type="text" id="tempat" class="form-control" value="{{ $risalah->tempat }}" readonly>
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
                <button type="submit" class="btn btn-primary">Update Risalah</button>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById('undangan_id').addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex];
        // PERBAIKAN: Gunakan data-attribute yang benar
        document.getElementById('agenda').value = selectedOption.getAttribute('data-agenda');
        document.getElementById('tanggal').value = selectedOption.getAttribute('data-tanggal');
        document.getElementById('waktu_mulai').value = selectedOption.getAttribute('data-jam');
        document.getElementById('tempat').value = selectedOption.getAttribute('data-tempat-link');
    });
</script>
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#penjelasan-editor' ) )
        .catch( error => {
            console.error( error );
        });

    ClassicEditor
        .create( document.querySelector( '#kesimpulan-editor' ) )
        .catch( error => {
            console.error( error );
        });
</script>
@endsection --}}


@extends('layouts.main')

@section('content')
<div class="max-w-5xl mx-auto my-6">
    <div class="bg-white p-6 rounded-2xl shadow">
        <h3 class="text-xl font-bold text-gray-800 mb-6">Edit Risalah</h3>

        <form method="POST" action="{{ route('risalah.update', $risalah->id) }}" class="space-y-5">
            @csrf
            @method('PUT')

            <!-- Undangan -->
            <div>
                <label for="undangan_id" class="block text-sm font-medium text-gray-700 mb-1">Pilih Undangan Rapat</label>
                <select name="undangan_id" id="undangan_id"
                        class="w-full border rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
                    <option value="">-- Pilih Undangan --</option>
                    @foreach($undangans as $undangan)
                        <option value="{{ $undangan->id }}" {{ $undangan->id == $risalah->undangan_id ? 'selected' : '' }}
                                data-agenda="{{ $undangan->agenda }}"
                                data-tanggal="{{ $undangan->tanggal }}"
                                data-jam="{{ $undangan->jam }}"
                                data-tempat-link="{{ $undangan->tempat_link }}">
                            {{ $undangan->agenda }} ({{ \Carbon\Carbon::parse($undangan->tanggal)->format('d M Y') }})
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Absensi -->
            <div>
                <label for="presence_id" class="block text-sm font-medium text-gray-700 mb-1">Pilih Absensi</label>
                <select name="presence_id" id="presence_id"
                        class="w-full border rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
                    <option value="">-- Pilih Absensi --</option>
                    @foreach($presences as $p)
                        <option value="{{ $p->id }}" {{ $p->id == $risalah->presence_id ? 'selected' : '' }}>
                            {{ $p->nama_kegiatan }} ({{ $p->tgl_kegiatan }})
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Agenda & Tanggal -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Agenda Rapat</label>
                    <input type="text" id="agenda" value="{{ $risalah->agenda }}" readonly
                           class="w-full border rounded-lg px-3 py-2 text-sm bg-gray-100">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Rapat</label>
                    <input type="date" id="tanggal" value="{{ $risalah->tanggal }}" readonly
                           class="w-full border rounded-lg px-3 py-2 text-sm bg-gray-100">
                </div>
            </div>

            <!-- Waktu -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Waktu Mulai</label>
                    <input type="time" id="waktu_mulai" value="{{ $risalah->waktu_mulai }}" readonly
                           class="w-full border rounded-lg px-3 py-2 text-sm bg-gray-100">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Waktu Selesai</label>
                    <input type="time" id="waktu_selesai" value="{{ $risalah->waktu_selesai }}" readonly
                           class="w-full border rounded-lg px-3 py-2 text-sm bg-gray-100">
                </div>
            </div>

            <!-- Tempat -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Tempat Rapat</label>
                <input type="text" id="tempat" value="{{ $risalah->tempat }}" readonly
                       class="w-full border rounded-lg px-3 py-2 text-sm bg-gray-100">
            </div>

            <!-- Pimpinan -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Pimpinan Rapat</label>
                <input type="text" name="pimpinan" value="{{ old('pimpinan', $risalah->pimpinan) }}" required
                       class="w-full border rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <!-- Pencatat -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Pencatat Rapat</label>
                <input type="text" name="pencatat" value="{{ old('pencatat', $risalah->pencatat) }}" required
                       class="w-full border rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <!-- Jenis Rapat -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Jenis Rapat</label>
                <div class="flex flex-wrap gap-4 text-sm">
                    <label class="flex items-center gap-2">
                        <input type="radio" name="jenis_rapat" value="Entry Meeting"
                               class="text-blue-600 border-gray-300 focus:ring-blue-500"
                               {{ $risalah->jenis_rapat == 'Entry Meeting' ? 'checked' : '' }}>
                        Entry Meeting
                    </label>
                    <label class="flex items-center gap-2">
                        <input type="radio" name="jenis_rapat" value="Expose Meeting"
                               class="text-blue-600 border-gray-300 focus:ring-blue-500"
                               {{ $risalah->jenis_rapat == 'Expose Meeting' ? 'checked' : '' }}>
                        Expose Meeting
                    </label>
                    <label class="flex items-center gap-2">
                        <input type="radio" name="jenis_rapat" value="Exit Meeting"
                               class="text-blue-600 border-gray-300 focus:ring-blue-500"
                               {{ $risalah->jenis_rapat == 'Exit Meeting' ? 'checked' : '' }}>
                        Exit Meeting
                    </label>
                    <label class="flex items-center gap-2">
                        <input type="radio" name="jenis_rapat" value="Lainnya"
                               class="text-blue-600 border-gray-300 focus:ring-blue-500"
                               {{ $risalah->jenis_rapat == 'Lainnya' ? 'checked' : '' }}>
                        Lainnya
                    </label>
                </div>
            </div>

            <!-- Penjelasan -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Penjelasan Rapat</label>
                <textarea name="penjelasan" id="penjelasan-editor" rows="5"
                          class="w-full border rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">{{ old('penjelasan', $risalah->penjelasan) }}</textarea>
            </div>

            <!-- Kesimpulan -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Kesimpulan</label>
                <textarea name="kesimpulan" id="kesimpulan-editor" rows="5"
                          class="w-full border rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">{{ old('kesimpulan', $risalah->kesimpulan) }}</textarea>
            </div>

            <!-- Buttons -->
            <div class="flex justify-between items-center pt-4">
                <a href="{{ route('risalah.index') }}"
                   class="px-4 py-2 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-100">
                    Kembali
                </a>
                <button type="submit"
                        class="px-4 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700">
                    Update Risalah
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById('undangan_id').addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex];
        document.getElementById('agenda').value = selectedOption.getAttribute('data-agenda');
        document.getElementById('tanggal').value = selectedOption.getAttribute('data-tanggal');
        document.getElementById('waktu_mulai').value = selectedOption.getAttribute('data-jam');
        document.getElementById('tempat').value = selectedOption.getAttribute('data-tempat-link');
    });
</script>

<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
<script>
    ClassicEditor.create(document.querySelector('#penjelasan-editor')).catch(error => console.error(error));
    ClassicEditor.create(document.querySelector('#kesimpulan-editor')).catch(error => console.error(error));
</script>
@endsection
