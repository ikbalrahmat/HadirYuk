{{-- @extends('layouts.main')

@section('content')
<div class="container py-5">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Tambah Rapat Baru</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('rapat.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama_rapat" class="form-label">Nama Rapat</label>
                    <input type="text" class="form-control" id="nama_rapat" name="nama_rapat" required>
                </div>
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                </div>
                <div class="mb-3">
                    <label for="tempat" class="form-label">Tempat</label>
                    <input type="text" class="form-control" id="tempat" name="tempat" required>
                </div>
                <div class="mb-3">
                    <label for="pic_rapat" class="form-label">PIC Rapat</label>
                    <input type="text" class="form-control" id="pic_rapat" name="pic_rapat" required>
                </div>
                <div class="mb-3">
                    <label for="catatan" class="form-label">Catatan</label>
                    <textarea class="form-control" id="catatan" name="catatan" rows="3"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Simpan Rapat</button>
                <a href="{{ route('rapat.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection --}}

{{-- @extends('layouts.main')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">Tambah Agenda Rapat</h1>
        <a href="{{ route('agenda.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left me-2"></i> Kembali
        </a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi kesalahan!</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('agenda.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_rapat" class="form-label">Nama Rapat</label>
            <input type="text" class="form-control" id="nama_rapat" name="nama_rapat" required>
        </div>
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
        </div>
        <div class="mb-3">
            <label for="tempat" class="form-label">Tempat</label>
            <input type="text" class="form-control" id="tempat" name="tempat" required>
        </div>
        <div class="mb-3">
            <label for="pic_rapat" class="form-label">PIC Rapat</label>
            <input type="text" class="form-control" id="pic_rapat" name="pic_rapat" required>
        </div>
        <div class="mb-3">
            <label for="catatan" class="form-label">Catatan</label>
            <textarea class="form-control" id="catatan" name="catatan" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-success">
            <i class="bi bi-save me-2"></i> Simpan Rapat
        </button>
        <a href="{{ route('agenda.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection --}}

{{--
@extends('layouts.main')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">Tambah Agenda Rapat</h1>
        <a href="{{ route('agenda.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left me-2"></i> Kembali
        </a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi kesalahan!</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('agenda.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="undangan_id" class="form-label">Pilih Undangan Rapat</label>
            <select class="form-select" id="undangan_id">
                <option value="">-- Pilih Undangan --</option>
                @foreach($undangan as $item)
                    <option value="{{ $item->id }}"
                            data-nama-rapat="{{ $item->agenda }}"
                            data-tanggal="{{ $item->tanggal }}"
                            data-tempat="{{ $item->tempat_link }}">
                        {{ $item->agenda }} - {{ \Carbon\Carbon::parse($item->tanggal)->format('d F Y') }}
                    </option>
                @endforeach
            </select>
        </div>


        <input type="hidden" id="nama_rapat" name="nama_rapat">
        <input type="hidden" id="tanggal" name="tanggal">
        <input type="hidden" id="tempat" name="tempat">

        <div class="mb-3">
            <label for="pic_rapat" class="form-label">PIC Rapat</label>
            <input type="text" class="form-control" name="pic_rapat" required>
        </div>

        <div class="mb-3">
            <label for="catatan" class="form-label">Catatan</label>
            <textarea class="form-control" name="catatan" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-success">
            <i class="bi bi-save me-2"></i> Simpan Rapat
        </button>
        <a href="{{ route('agenda.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>

@push('js')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const undanganDropdown = document.getElementById('undangan_id');
    const namaRapatInput = document.getElementById('nama_rapat');
    const tanggalInput = document.getElementById('tanggal');
    const tempatInput = document.getElementById('tempat');

    undanganDropdown.addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];

        // Ambil data dari atribut `data-*`
        const namaRapat = selectedOption.getAttribute('data-nama-rapat');
        const tanggal = selectedOption.getAttribute('data-tanggal');
        const tempat = selectedOption.getAttribute('data-tempat');

        // Isi nilai input yang tersembunyi
        namaRapatInput.value = namaRapat;
        tanggalInput.value = tanggal;
        tempatInput.value = tempat;
    });
});
</script>
@endpush
@endsection --}}

{{--
@extends('layouts.main')

@section('content')
<div class="max-w-4xl mx-auto py-8">

    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Tambah Agenda Rapat</h1>
        <a href="{{ route('agenda.index') }}"
           class="inline-flex items-center px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-lg shadow">
            <i class="bi bi-arrow-left mr-2"></i> Kembali
        </a>
    </div>


    @if ($errors->any())
        <div class="mb-6 p-4 rounded-lg bg-red-50 border border-red-300 text-red-700">
            <strong class="block mb-2">Terjadi kesalahan!</strong>
            <ul class="list-disc list-inside space-y-1 text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('agenda.store') }}" method="POST" class="bg-white p-6 rounded-xl shadow">
        @csrf


        <div class="mb-4">
            <label for="undangan_id" class="block text-sm font-medium text-gray-700 mb-1">Pilih Undangan Rapat</label>
            <select id="undangan_id"
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    required>
                <option value="">-- Pilih Undangan --</option>
                @foreach($undangan as $item)
                    <option value="{{ $item->id }}"
                            data-nama-rapat="{{ $item->agenda }}"
                            data-tanggal="{{ $item->tanggal }}"
                            data-tempat="{{ $item->tempat_link }}">
                        {{ $item->agenda }} - {{ \Carbon\Carbon::parse($item->tanggal)->format('d F Y') }}
                    </option>
                @endforeach
            </select>
        </div>


        <input type="hidden" id="nama_rapat" name="nama_rapat">
        <input type="hidden" id="tanggal" name="tanggal">
        <input type="hidden" id="tempat" name="tempat">


        <div class="mb-4">
            <label for="pic_rapat" class="block text-sm font-medium text-gray-700 mb-1">PIC Rapat</label>
            <input type="text" id="pic_rapat" name="pic_rapat"
                   class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                   required>
        </div>


        <div class="mb-6">
            <label for="catatan" class="block text-sm font-medium text-gray-700 mb-1">Catatan</label>
            <textarea id="catatan" name="catatan" rows="3"
                      class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"></textarea>
        </div>

        <div class="flex gap-3">
            <button type="submit"
                    class="inline-flex items-center px-5 py-2.5 bg-green-600 hover:bg-green-700 text-white rounded-lg shadow">
                <i class="bi bi-save mr-2"></i> Simpan Rapat
            </button>
            <a href="{{ route('agenda.index') }}"
               class="inline-flex items-center px-5 py-2.5 bg-gray-400 hover:bg-gray-500 text-white rounded-lg shadow">
                Batal
            </a>
        </div>
    </form>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const undanganDropdown = document.getElementById('undangan_id');
    const namaRapatInput = document.getElementById('nama_rapat');
    const tanggalInput = document.getElementById('tanggal');
    const tempatInput = document.getElementById('tempat');

    undanganDropdown.addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];

        namaRapatInput.value = selectedOption.getAttribute('data-nama-rapat') || '';
        tanggalInput.value = selectedOption.getAttribute('data-tanggal') || '';
        tempatInput.value = selectedOption.getAttribute('data-tempat') || '';
    });
});
</script>
@endpush
@endsection --}}

{{--
@extends('layouts.main')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">Tambah Agenda Rapat</h1>
        <a href="{{ route('agenda.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left me-2"></i> Kembali
        </a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi kesalahan!</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('agenda.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="undangan_id" class="form-label">Pilih Undangan Rapat</label>
            <select class="form-select" id="undangan_id" name="undangan_id" required>
                <option value="">-- Pilih Undangan --</option>
                @foreach($undangan as $item)
                    <option value="{{ $item->id }}"
                            data-nama-rapat="{{ $item->agenda }}"
                            data-tanggal="{{ $item->tanggal }}"
                            data-tempat="{{ $item->tempat_link }}">
                        {{ $item->agenda }} - {{ \Carbon\Carbon::parse($item->tanggal)->format('d F Y') }}
                    </option>
                @endforeach
            </select>
        </div>


        <input type="hidden" id="nama_rapat" name="nama_rapat" required>
        <input type="hidden" id="tanggal" name="tanggal" required>
        <input type="hidden" id="tempat" name="tempat" required>

        <div class="mb-3">
            <label for="pic_rapat" class="form-label">PIC Rapat</label>
            <input type="text" class="form-control" id="pic_rapat" name="pic_rapat" required>
        </div>

        <div class="mb-3">
            <label for="catatan" class="form-label">Catatan</label>
            <textarea class="form-control" id="catatan" name="catatan" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-success me-2">
            <i class="bi bi-save me-2"></i> Simpan Rapat
        </button>
        <a href="{{ route('agenda.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>

@push('js')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const undanganDropdown = document.getElementById('undangan_id');
    const namaRapatInput   = document.getElementById('nama_rapat');
    const tanggalInput     = document.getElementById('tanggal');
    const tempatInput      = document.getElementById('tempat');

    undanganDropdown.addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];

        if (selectedOption.value !== "") {
            namaRapatInput.value = selectedOption.getAttribute('data-nama-rapat') || '';
            tanggalInput.value   = selectedOption.getAttribute('data-tanggal') || '';
            tempatInput.value    = selectedOption.getAttribute('data-tempat') || '';
        } else {
            namaRapatInput.value = '';
            tanggalInput.value   = '';
            tempatInput.value    = '';
        }
    });
});
</script>
@endpush
@endsection --}}


@extends('layouts.main')

@section('content')
<div class="max-w-4xl mx-auto py-8">

    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Tambah Agenda Rapat</h1>
        <a href="{{ route('agenda.index') }}"
           class="inline-flex items-center px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-lg shadow">
            <i class="bi bi-arrow-left mr-2"></i> Kembali
        </a>
    </div>

    @if ($errors->any())
        <div class="mb-6 p-4 rounded-lg bg-red-50 border border-red-300 text-red-700">
            <strong class="block mb-2">Terjadi kesalahan!</strong>
            <ul class="list-disc list-inside space-y-1 text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('agenda.store') }}" method="POST" class="bg-white p-6 rounded-xl shadow">
        @csrf

        {{-- Dropdown Undangan --}}
        <div class="mb-4">
            <label for="undangan_id" class="block text-sm font-medium text-gray-700 mb-1">Pilih Undangan Rapat</label>
            <select id="undangan_id" name="undangan_id"
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    required>
                <option value="">-- Pilih Undangan --</option>
                @foreach($undangan as $item)
                    <option value="{{ $item->id }}"
                            data-nama-rapat="{{ $item->agenda }}"
                            data-tanggal="{{ $item->tanggal }}"
                            data-tempat="{{ $item->tempat_link }}">
                        {{ $item->agenda }} - {{ \Carbon\Carbon::parse($item->tanggal)->format('d F Y') }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Hidden Input (wajib ada biar validasi nggak error) --}}
        <input type="hidden" id="nama_rapat" name="nama_rapat">
        <input type="hidden" id="tanggal" name="tanggal">
        <input type="hidden" id="tempat" name="tempat">

        {{-- PIC --}}
        <div class="mb-4">
            <label for="pic_rapat" class="block text-sm font-medium text-gray-700 mb-1">PIC Rapat</label>
            <input type="text" id="pic_rapat" name="pic_rapat"
                   class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                   required>
        </div>

        {{-- Catatan --}}
        <div class="mb-6">
            <label for="catatan" class="block text-sm font-medium text-gray-700 mb-1">Catatan</label>
            <textarea id="catatan" name="catatan" rows="3"
                      class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"></textarea>
        </div>

        <div class="flex gap-3">
            <button type="submit"
                    class="inline-flex items-center px-5 py-2.5 bg-green-600 hover:bg-green-700 text-white rounded-lg shadow">
                <i class="bi bi-save mr-2"></i> Simpan Rapat
            </button>
            <a href="{{ route('agenda.index') }}"
               class="inline-flex items-center px-5 py-2.5 bg-gray-400 hover:bg-gray-500 text-white rounded-lg shadow">
                Batal
            </a>
        </div>
    </form>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const undanganDropdown = document.getElementById('undangan_id');
    const namaRapatInput = document.getElementById('nama_rapat');
    const tanggalInput = document.getElementById('tanggal');
    const tempatInput = document.getElementById('tempat');

    undanganDropdown.addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];

        if (selectedOption.value !== "") {
            namaRapatInput.value = selectedOption.getAttribute('data-nama-rapat') || '';
            tanggalInput.value = selectedOption.getAttribute('data-tanggal') || '';
            tempatInput.value = selectedOption.getAttribute('data-tempat') || '';
        } else {
            namaRapatInput.value = '';
            tanggalInput.value = '';
            tempatInput.value = '';
        }
    });
});
</script>
@endpush
@endsection
