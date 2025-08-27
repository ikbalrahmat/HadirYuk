{{-- @extends('layouts.main')

@section('content')
<div class="container py-5">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Edit Materi Rapat</h5>
        </div>
        <div class="card-body">
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('materi.update', $materi->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="rapat_id" class="form-label">Pilih Rapat</label>
                    <select class="form-control" id="rapat_id" name="rapat_id" required>
                        <option value="">-- Pilih Rapat --</option>
                        @foreach($rapats as $rapat)
                            <option value="{{ $rapat->id }}" {{ (old('rapat_id', $materi->rapat_id) == $rapat->id) ? 'selected' : '' }}>
                                {{ $rapat->nama_rapat }} ({{ \Carbon\Carbon::parse($rapat->tanggal)->translatedFormat('d F Y') }})
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul Materi</label>
                    <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul', $materi->judul) }}" required>
                </div>
                <div class="mb-3">
                    <label for="file_materi" class="form-label">Upload Dokumen Materi (Biarkan kosong jika tidak diubah)</label>
                    <input type="file" class="form-control" id="file_materi" name="file_materi">
                    <small class="form-text text-muted">Format: PDF, DOC, DOCX, PPT, PPTX, XLS, XLSX (Max: 10MB)</small>
                    @if($materi->file_path)
                        <p class="mt-2">Dokumen saat ini: <a href="{{ \Storage::url($materi->file_path) }}" target="_blank">{{ basename($materi->file_path) }}</a></p>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Update Materi</button>
                <a href="{{ route('materi.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection --}}

{{--
@extends('layouts.main')

@section('content')
<div class="container py-5">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Edit Materi Rapat</h5>
        </div>
        <div class="card-body">
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('materi.update', $materi->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="undangan_id" class="form-label">Pilih Undangan Rapat</label>
                    <select class="form-control" id="undangan_id" name="undangan_id" required>
                        <option value="">-- Pilih Undangan --</option>
                        @foreach($undangans as $undangan)
                            <option value="{{ $undangan->id }}" {{ (old('undangan_id', $materi->undangan_id) == $undangan->id) ? 'selected' : '' }}>
                                {{ $undangan->agenda }} ({{ \Carbon\Carbon::parse($undangan->tanggal)->translatedFormat('d F Y') }})
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul Materi</label>
                    <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul', $materi->judul) }}" required>
                </div>
                <div class="mb-3">
                    <label for="file_materi" class="form-label">Upload Dokumen Materi (Biarkan kosong jika tidak diubah)</label>
                    <input type="file" class="form-control" id="file_materi" name="file_materi">
                    <small class="form-text text-muted">Format: PDF, DOC, DOCX, PPT, PPTX, XLS, XLSX (Max: 10MB)</small>
                    @if($materi->file_path)
                        <p class="mt-2">Dokumen saat ini: <a href="{{ \Storage::url($materi->file_path) }}" target="_blank">{{ basename($materi->file_path) }}</a></p>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Update Materi</button>
                <a href="{{ route('materi.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection --}}


@extends('layouts.main')

@section('content')
<div class="bg-white rounded-xl shadow p-6 max-w-3xl mx-auto">

    <h3 class="text-xl font-bold text-blue-600 mb-6">Edit Materi Rapat</h3>

    @if(session('error'))
        <div class="bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded mb-4">
            <ul class="list-disc ml-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('materi.update', $materi->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf
        @method('PUT')

        <div>
            <label for="undangan_id" class="block font-medium text-gray-700 mb-1">Pilih Undangan Rapat</label>
            <select id="undangan_id" name="undangan_id" required
                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500">
                <option value="">-- Pilih Undangan --</option>
                @foreach($undangans as $undangan)
                    <option value="{{ $undangan->id }}" {{ (old('undangan_id', $materi->undangan_id) == $undangan->id) ? 'selected' : '' }}>
                        {{ $undangan->agenda }} ({{ \Carbon\Carbon::parse($undangan->tanggal)->translatedFormat('d F Y') }})
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="judul" class="block font-medium text-gray-700 mb-1">Judul Materi</label>
            <input type="text" id="judul" name="judul" value="{{ old('judul', $materi->judul) }}" required
                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500">
        </div>

        <div>
            <label for="file_materi" class="block font-medium text-gray-700 mb-1">Upload Dokumen Materi (Opsional)</label>
            <input type="file" id="file_materi" name="file_materi"
                class="w-full border border-gray-300 rounded-lg px-3 py-2 bg-white">
            <p class="text-sm text-gray-500 mt-1">Format: PDF, DOC, DOCX, PPT, PPTX, XLS, XLSX (Max: 10MB)</p>
            @if($materi->file_path)
                <p class="mt-2 text-sm">Dokumen saat ini:
                    <a href="{{ \Storage::url($materi->file_path) }}" target="_blank" class="text-blue-600 hover:underline">
                        {{ basename($materi->file_path) }}
                    </a>
                </p>
            @endif
        </div>

        <div class="flex gap-3">
            <button type="submit"
                class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg shadow">
                Update Materi
            </button>
            <a href="{{ route('materi.index') }}"
               class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-lg shadow">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
