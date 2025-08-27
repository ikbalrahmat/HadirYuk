{{-- @extends('layouts.main')

@section('content')
<div class="container my-4">
    <div class="bg-light p-4 rounded-4 shadow-sm">
        <h3 class="fw-bold text-dark mb-4">Tambah Risalah Baru</h3>

        <form method="POST" action="{{ route('risalah.store') }}">
            @csrf

            <div class="mb-3">
                <label for="rapat_id" class="form-label">Pilih Rapat</label>
                <select name="rapat_id" id="rapat_id" class="form-control" required>
                    <option value="">-- Pilih Rapat --</option>
                    @foreach($rapats as $r)
                        <option value="{{ $r->id }}">{{ $r->nama_rapat }} ({{ $r->tanggal }})</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="presence_id" class="form-label">Pilih Absensi</label>
                <select name="presence_id" id="presence_id" class="form-control" required>
                    <option value="">-- Pilih Absensi --</option>
                    @foreach($presences as $p)
                        <option value="{{ $p->id }}">{{ $p->nama_kegiatan }} ({{ $p->tgl_kegiatan }})</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Pimpinan Rapat</label>
                <input type="text" name="pimpinan" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Pencatat Rapat</label>
                <input type="text" name="pencatat" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Jenis Rapat</label><br>
                <label><input type="radio" name="jenis_rapat" value="Entry Meeting"> Entry Meeting</label>
                <label><input type="radio" name="jenis_rapat" value="Expose Meeting"> Expose Meeting</label>
                <label><input type="radio" name="jenis_rapat" value="Exit Meeting"> Exit Meeting</label>
                <label><input type="radio" name="jenis_rapat" value="Lainnya"> Lainnya</label>
            </div>

            <div class="mb-3">
                <label class="form-label">Penjelasan Rapat</label>
                <textarea name="penjelasan" class="form-control" rows="5"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Kesimpulan</label>
                <textarea name="kesimpulan" class="form-control" rows="5"></textarea>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('risalah.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan Risalah</button>
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
        <h3 class="fw-bold text-dark mb-4">Tambah Risalah Baru</h3>

        <form method="POST" action="{{ route('risalah.store') }}">
            @csrf

            <div class="mb-3">
                <label for="rapat_id" class="form-label">Pilih Rapat</label>
                <select name="rapat_id" id="rapat_id" class="form-control" required>
                    <option value="">-- Pilih Rapat --</option>
                    @foreach($rapats as $r)
                        <option value="{{ $r->id }}">{{ $r->nama_rapat }} ({{ $r->tanggal }})</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="presence_id" class="form-label">Pilih Absensi</label>
                <select name="presence_id" id="presence_id" class="form-control" required>
                    <option value="">-- Pilih Absensi --</option>
                    @foreach($presences as $p)
                        <option value="{{ $p->id }}">{{ $p->nama_kegiatan }} ({{ $p->tgl_kegiatan }})</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Pimpinan Rapat</label>
                <input type="text" name="pimpinan" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Pencatat Rapat</label>
                <input type="text" name="pencatat" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Jenis Rapat</label><br>
                <label><input type="radio" name="jenis_rapat" value="Entry Meeting"> Entry Meeting</label>
                <label><input type="radio" name="jenis_rapat" value="Expose Meeting"> Expose Meeting</label>
                <label><input type="radio" name="jenis_rapat" value="Exit Meeting"> Exit Meeting</label>
                <label><input type="radio" name="jenis_rapat" value="Lainnya"> Lainnya</label>
            </div>

            <div class="mb-3">
                <label class="form-label">Penjelasan Rapat</label>
                <textarea name="penjelasan" class="form-control" id="penjelasan-editor" rows="5"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Kesimpulan</label>
                <textarea name="kesimpulan" class="form-control" id="kesimpulan-editor" rows="5"></textarea>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('risalah.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan Risalah</button>
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
        <h3 class="fw-bold text-dark mb-4">Tambah Risalah Baru</h3>

        <form method="POST" action="{{ route('risalah.store') }}">
            @csrf

            <div class="mb-3">
                <label for="undangan_id" class="form-label">Pilih Undangan Rapat</label>
                <select name="undangan_id" id="undangan_id" class="form-control" required>
                    <option value="">-- Pilih Undangan --</option>

                    @foreach($undangans as $undangan)

                        <option value="{{ $undangan->id }}"
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
                        <option value="{{ $p->id }}">{{ $p->nama_kegiatan }} ({{ $p->tgl_kegiatan }})</option>
                    @endforeach
                </select>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Agenda Rapat</label>
                    <input type="text" id="agenda" class="form-control" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Tanggal Rapat</label>
                    <input type="date" id="tanggal" class="form-control" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Waktu Mulai</label>
                    <input type="time" id="waktu_mulai" class="form-control" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Waktu Selesai</label>
-}}
                    <input type="time" id="waktu_selesai" class="form-control" readonly>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Tempat Rapat</label>
                <input type="text" id="tempat" class="form-control" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Pimpinan Rapat</label>
                <input type="text" name="pimpinan" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Pencatat Rapat</label>
                <input type="text" name="pencatat" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Jenis Rapat</label><br>
                <label><input type="radio" name="jenis_rapat" value="Entry Meeting"> Entry Meeting</label>
                <label><input type="radio" name="jenis_rapat" value="Expose Meeting"> Expose Meeting</label>
                <label><input type="radio" name="jenis_rapat" value="Exit Meeting"> Exit Meeting</label>
                <label><input type="radio" name="jenis_rapat" value="Lainnya"> Lainnya</label>
            </div>

            <div class="mb-3">
                <label class="form-label">Penjelasan Rapat</label>
                <textarea name="penjelasan" class="form-control" id="penjelasan-editor" rows="5"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Kesimpulan</label>
                <textarea name="kesimpulan" class="form-control" id="kesimpulan-editor" rows="5"></textarea>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('risalah.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan Risalah</button>
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
        document.getElementById('waktu_mulai').value = selectedOption.getAttribute('data-jam'); // PERBAIKAN: Ganti data-waktumulai ke data-jam
        document.getElementById('tempat').value = selectedOption.getAttribute('data-tempat-link'); // PERBAIKAN: Ganti data-tempat ke data-tempat-link
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
@endsection
 --}}


 @extends('layouts.main')

@section('content')
<div class="container mx-auto px-4 my-6">
    <div class="bg-white p-6 rounded-2xl shadow border border-gray-200">
        <h3 class="text-xl font-bold text-gray-800 mb-6">Tambah Risalah Baru</h3>

        <form method="POST" action="{{ route('risalah.store') }}" class="space-y-5">
            @csrf

            <!-- Pilih Undangan -->
            <div>
                <label for="undangan_id" class="block text-sm font-medium text-gray-700 mb-1">Pilih Undangan Rapat</label>
                <select name="undangan_id" id="undangan_id" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 text-sm" required>
                    <option value="">-- Pilih Undangan --</option>
                    @foreach($undangans as $undangan)
                        <option value="{{ $undangan->id }}"
                                data-agenda="{{ $undangan->agenda }}"
                                data-tanggal="{{ $undangan->tanggal }}"
                                data-jam="{{ $undangan->jam }}"
                                data-tempat-link="{{ $undangan->tempat_link }}">
                            {{ $undangan->agenda }} ({{ \Carbon\Carbon::parse($undangan->tanggal)->format('d M Y') }})
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Pilih Absensi -->
            <div>
                <label for="presence_id" class="block text-sm font-medium text-gray-700 mb-1">Pilih Absensi</label>
                <select name="presence_id" id="presence_id" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 text-sm" required>
                    <option value="">-- Pilih Absensi --</option>
                    @foreach($presences as $p)
                        <option value="{{ $p->id }}">{{ $p->nama_kegiatan }} ({{ $p->tgl_kegiatan }})</option>
                    @endforeach
                </select>
            </div>

            <!-- Info Undangan -->
            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Agenda Rapat</label>
                    <input type="text" id="agenda" class="w-full border-gray-300 rounded-lg shadow-sm text-sm" readonly>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Rapat</label>
                    <input type="date" id="tanggal" class="w-full border-gray-300 rounded-lg shadow-sm text-sm" readonly>
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Waktu Mulai</label>
                    <input type="time" id="waktu_mulai" class="w-full border-gray-300 rounded-lg shadow-sm text-sm" readonly>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Waktu Selesai</label>
                    <input type="time" id="waktu_selesai" class="w-full border-gray-300 rounded-lg shadow-sm text-sm" readonly>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Tempat Rapat</label>
                <input type="text" id="tempat" class="w-full border-gray-300 rounded-lg shadow-sm text-sm" readonly>
            </div>

            <!-- Input Lain -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Pimpinan Rapat</label>
                <input type="text" name="pimpinan" class="w-full border-gray-300 rounded-lg shadow-sm text-sm" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Pencatat Rapat</label>
                <input type="text" name="pencatat" class="w-full border-gray-300 rounded-lg shadow-sm text-sm" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Jenis Rapat</label>
                <div class="flex flex-wrap gap-4 text-sm text-gray-700">
                    <label><input type="radio" name="jenis_rapat" value="Entry Meeting" class="mr-1"> Entry Meeting</label>
                    <label><input type="radio" name="jenis_rapat" value="Expose Meeting" class="mr-1"> Expose Meeting</label>
                    <label><input type="radio" name="jenis_rapat" value="Exit Meeting" class="mr-1"> Exit Meeting</label>
                    <label><input type="radio" name="jenis_rapat" value="Lainnya" class="mr-1"> Lainnya</label>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Penjelasan Rapat</label>
                <textarea name="penjelasan" id="penjelasan-editor" rows="5" class="w-full border-gray-300 rounded-lg shadow-sm text-sm"></textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Kesimpulan</label>
                <textarea name="kesimpulan" id="kesimpulan-editor" rows="5" class="w-full border-gray-300 rounded-lg shadow-sm text-sm"></textarea>
            </div>

            <!-- Tombol -->
            <div class="flex justify-between">
                <a href="{{ route('risalah.index') }}" class="px-4 py-2 rounded-lg bg-gray-200 text-gray-700 text-sm font-medium hover:bg-gray-300">Kembali</a>
                <button type="submit" class="px-4 py-2 rounded-lg bg-blue-600 text-white text-sm font-medium hover:bg-blue-700">Simpan Risalah</button>
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
    ClassicEditor.create(document.querySelector('#penjelasan-editor')).catch(console.error);
    ClassicEditor.create(document.querySelector('#kesimpulan-editor')).catch(console.error);
</script>
@endsection
