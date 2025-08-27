{{-- @extends('layouts.main')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4">Update Pemesanan Konsumsi</h2>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('konsumsi.update', $konsumsi->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="total_biaya" class="form-label">Total Biaya</label>
                    <input type="number" class="form-control" id="total_biaya" name="total_biaya" value="{{ old('total_biaya', $konsumsi->total_biaya) }}" required min="0">
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" id="status" name="status">
                        <option value="Menunggu" {{ $konsumsi->status == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                        <option value="Disetujui" {{ $konsumsi->status == 'Disetujui' ? 'selected' : '' }}>Disetujui</option>
                        <option value="Selesai" {{ $konsumsi->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('konsumsi.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection --}}

{{-- @extends('layouts.main')

@section('content')
<div class="container py-4">
    <div class="bg-white p-4 rounded-4 shadow-sm">
        <h3 class="fw-bold mb-4">Edit Pemesanan Konsumsi</h3>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (Auth::user()->hasRole(['admin', 'yanum_karawang', 'yanum_jakarta']))
        <form action="{{ route('konsumsi.update', $konsumsi->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="nomor_surat_nde" class="form-label">Nomor Surat NDE</label>
                    <input type="text" name="nomor_surat_nde" id="nomor_surat_nde" class="form-control" value="{{ $konsumsi->nomor_surat_nde }}" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="tahun_anggaran_rapat" class="form-label">Tahun Anggaran Rapat</label>
                    <input type="number" name="tahun_anggaran_rapat" id="tahun_anggaran_rapat" class="form-control" value="{{ $konsumsi->tahun_anggaran_rapat }}" readonly>
                </div>
            </div>

            <div class="mb-3">
                <label for="agenda_rapat" class="form-label">Agenda Rapat</label>
                <input type="text" name="agenda_rapat" id="agenda_rapat" class="form-control" value="{{ $konsumsi->agenda_rapat }}" readonly>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="tanggal_rapat" class="form-label">Tanggal Rapat</label>
                    <input type="date" name="tanggal_rapat" id="tanggal_rapat" class="form-control" value="{{ $konsumsi->tanggal_rapat }}" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="jam_rapat" class="form-label">Jam Rapat</label>
                    <input type="time" name="jam_rapat" id="jam_rapat" class="form-control" value="{{ $konsumsi->jam_rapat }}" readonly>
                </div>
            </div>

            <div class="mb-3">
                <label for="unit_kerja" class="form-label">Unit Kerja</label>
                <input type="text" name="unit_kerja" id="unit_kerja" class="form-control" value="{{ $konsumsi->unit_kerja }}" readonly>
            </div>

            <div class="mb-3">
                <label for="unggah_dokumen_nde" class="form-label">Dokumen NDE</label>
                @if ($konsumsi->unggah_dokumen_nde)
                    <a href="{{ asset('storage/' . $konsumsi->unggah_dokumen_nde) }}" target="_blank" class="btn btn-sm btn-primary d-block">Lihat Dokumen</a>
                @else
                    <p>Tidak ada dokumen yang diunggah.</p>
                @endif
            </div>

            <hr>
            <h5>Menu Konsumsi</h5>
            @foreach (json_decode($konsumsi->menu_konsumsi, true) as $menuItem)
                <div class="row mb-2">
                    <div class="col-md-5">
                        <input type="text" class="form-control" value="{{ $menuItem['menu'] }}" readonly>
                    </div>
                    <div class="col-md-5">
                        <input type="text" class="form-control" value="{{ $menuItem['jumlah'] }} Pcs" readonly>
                    </div>
                </div>
            @endforeach
            <hr>

            <div class="mb-3">
                <label for="distribusi_tujuan" class="form-label">Distribusi Tujuan</label>
                <textarea name="distribusi_tujuan" id="distribusi_tujuan" class="form-control" rows="3" readonly>{{ $konsumsi->distribusi_tujuan }}</textarea>
            </div>

            <div class="mb-3">
                <label for="catatan" class="form-label">Catatan</label>
                <textarea name="catatan" id="catatan" class="form-control" rows="3" readonly>{{ $konsumsi->catatan }}</textarea>
            </div>

            <hr>
            <h5 class="mt-4">Persetujuan & Biaya</h5>
            <div class="mb-3">
                <label for="total_biaya" class="form-label">Total Biaya</label>
                <input type="number" name="total_biaya" class="form-control" value="{{ $konsumsi->total_biaya ?? 0 }}" required>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="Menunggu" {{ $konsumsi->status == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                    <option value="Disetujui" {{ $konsumsi->status == 'Disetujui' ? 'selected' : '' }}>Disetujui</option>
                    <option value="Selesai" {{ $konsumsi->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
            </div>

            <div class="d-flex justify-content-end mt-4">
                <button type="submit" class="btn btn-primary rounded-pill shadow-sm px-4">
                    <i class="bi bi-save me-1"></i> Update Pemesanan
                </button>
            </div>

        </form>
        @else
        <div class="alert alert-danger">
            <h4 class="alert-heading">Akses Ditolak!</h4>
            <p>Anda tidak memiliki hak akses untuk mengubah pemesanan ini.</p>
        </div>
        @endif
    </div>
</div>
@endsection --}}

{{--
@extends('layouts.main')

@section('content')
<div class="container py-4">
    <div class="bg-white p-4 rounded-4 shadow-sm">
        <h3 class="fw-bold mb-4">Edit Pemesanan Konsumsi</h3>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if (Auth::user()->hasRole(['admin', 'yanum_karawang', 'yanum_jakarta']))
        <form action="{{ route('konsumsi.update', $konsumsi->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nomor Surat NDE</label>
                    <input type="text" class="form-control" value="{{ $konsumsi->nomor_surat_nde }}" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Tahun Anggaran Rapat</label>
                    <input type="number" class="form-control" value="{{ $konsumsi->tahun_anggaran_rapat }}" readonly>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Agenda Rapat</label>
                <input type="text" class="form-control" value="{{ $konsumsi->agenda_rapat }}" readonly>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Tanggal Rapat</label>
                    <input type="date" class="form-control" value="{{ $konsumsi->tanggal_rapat ? $konsumsi->tanggal_rapat->format('Y-m-d') : '' }}" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Jam Rapat</label>
                    <input type="time" class="form-control" value="{{ $konsumsi->jam_rapat }}" readonly>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Unit Kerja</label>
                <input type="text" class="form-control" value="{{ $konsumsi->unit_kerja }}" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Dokumen NDE</label>
                @if ($konsumsi->unggah_dokumen_nde)
                    <a href="{{ asset('storage/' . $konsumsi->unggah_dokumen_nde) }}" target="_blank" class="btn btn-sm btn-primary d-block">Lihat Dokumen</a>
                @else
                    <p>Tidak ada dokumen yang diunggah.</p>
                @endif
            </div>

            <hr>
            <h5>Menu Konsumsi</h5>
            @foreach ($konsumsi->menu_konsumsi as $menuItem)
                <div class="row mb-2">
                    <div class="col-md-6">
                        <input type="text" class="form-control" value="{{ $menuItem['menu'] }} - {{ $menuItem['detail'] ?? '' }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" value="{{ $menuItem['jumlah'] }} Pcs" readonly>
                    </div>
                </div>
            @endforeach
            <hr>

            <div class="mb-3">
                <label class="form-label">Distribusi Tujuan</label>
                <textarea class="form-control" rows="3" readonly>{{ $konsumsi->distribusi_tujuan }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Catatan</label>
                <textarea class="form-control" rows="3" readonly>{{ $konsumsi->catatan }}</textarea>
            </div>

            <hr>
            <h5 class="mt-4">Persetujuan & Biaya</h5>
            <div class="mb-3">
                <label for="total_biaya" class="form-label">Total Biaya (Rp)</label>
                <input type="number" name="total_biaya" id="total_biaya" class="form-control" value="{{ old('total_biaya', $konsumsi->total_biaya ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="Menunggu" {{ $konsumsi->status == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                    <option value="Disetujui" {{ $konsumsi->status == 'Disetujui' ? 'selected' : '' }}>Disetujui</option>
                    <option value="Selesai" {{ $konsumsi->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                    <option value="Ditolak" {{ $konsumsi->status == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                </select>
            </div>

            <div class="d-flex justify-content-end mt-4">
                <button type="submit" class="btn btn-primary rounded-pill shadow-sm px-4">
                    <i class="bi bi-save me-1"></i> Update Pemesanan
                </button>
            </div>

        </form>
        @else
        <div class="alert alert-danger">
            <h4 class="alert-heading">Akses Ditolak!</h4>
            <p>Anda tidak memiliki hak akses untuk mengubah pemesanan ini.</p>
        </div>
        @endif
    </div>
</div>
@endsection --}}


@extends('layouts.main')

@section('content')
<div class="max-w-5xl mx-auto px-4 py-6">
    <div class="bg-white p-6 rounded-2xl shadow">
        <h3 class="text-xl font-bold mb-6">Edit Pemesanan Konsumsi</h3>

        @if(session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-md">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="mb-4 p-3 bg-red-100 text-red-700 rounded-md">{{ session('error') }}</div>
        @endif

        @if (Auth::user()->hasRole(['admin', 'yanum_karawang', 'yanum_jakarta']))
        <form action="{{ route('konsumsi.update', $konsumsi->id) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            {{-- Data Rapat --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Nomor Surat NDE</label>
                    <input type="text" value="{{ $konsumsi->nomor_surat_nde }}" readonly
                        class="mt-1 block w-full rounded-md border-gray-300 bg-gray-100 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Tahun Anggaran Rapat</label>
                    <input type="number" value="{{ $konsumsi->tahun_anggaran_rapat }}" readonly
                        class="mt-1 block w-full rounded-md border-gray-300 bg-gray-100 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Agenda Rapat</label>
                <input type="text" value="{{ $konsumsi->agenda_rapat }}" readonly
                    class="mt-1 block w-full rounded-md border-gray-300 bg-gray-100 shadow-sm">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Tanggal Rapat</label>
                    <input type="date" value="{{ $konsumsi->tanggal_rapat ? $konsumsi->tanggal_rapat->format('Y-m-d') : '' }}" readonly
                        class="mt-1 block w-full rounded-md border-gray-300 bg-gray-100 shadow-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Jam Rapat</label>
                    <input type="time" value="{{ $konsumsi->jam_rapat }}" readonly
                        class="mt-1 block w-full rounded-md border-gray-300 bg-gray-100 shadow-sm">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Unit Kerja</label>
                <input type="text" value="{{ $konsumsi->unit_kerja }}" readonly
                    class="mt-1 block w-full rounded-md border-gray-300 bg-gray-100 shadow-sm">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Dokumen NDE</label>
                @if ($konsumsi->unggah_dokumen_nde)
                    <a href="{{ asset('storage/' . $konsumsi->unggah_dokumen_nde) }}" target="_blank"
                       class="inline-block px-3 py-2 text-sm text-white bg-blue-600 rounded-md hover:bg-blue-700">
                        Lihat Dokumen
                    </a>
                @else
                    <p class="text-gray-500">Tidak ada dokumen yang diunggah.</p>
                @endif
            </div>

            {{-- Menu Konsumsi --}}
            <hr class="my-6 border-gray-200">
            <h5 class="font-semibold text-lg">Menu Konsumsi</h5>
            <div class="space-y-2">
                @foreach ($konsumsi->menu_konsumsi as $menuItem)
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <input type="text" value="{{ $menuItem['menu'] }} - {{ $menuItem['detail'] ?? '' }}" readonly
                            class="w-full rounded-md border-gray-300 bg-gray-100 shadow-sm">
                        <input type="text" value="{{ $menuItem['jumlah'] }} Pcs" readonly
                            class="w-full rounded-md border-gray-300 bg-gray-100 shadow-sm">
                    </div>
                @endforeach
            </div>

            {{-- Distribusi & Catatan --}}
            <hr class="my-6 border-gray-200">
            <div>
                <label class="block text-sm font-medium text-gray-700">Distribusi Tujuan</label>
                <textarea rows="3" readonly
                    class="mt-1 block w-full rounded-md border-gray-300 bg-gray-100 shadow-sm">{{ $konsumsi->distribusi_tujuan }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Catatan</label>
                <textarea rows="3" readonly
                    class="mt-1 block w-full rounded-md border-gray-300 bg-gray-100 shadow-sm">{{ $konsumsi->catatan }}</textarea>
            </div>

            {{-- Persetujuan & Biaya --}}
            <hr class="my-6 border-gray-200">
            <h5 class="font-semibold text-lg">Persetujuan & Biaya</h5>
            <div>
                <label for="total_biaya" class="block text-sm font-medium text-gray-700">Total Biaya (Rp)</label>
                <input type="number" name="total_biaya" id="total_biaya"
                    value="{{ old('total_biaya', $konsumsi->total_biaya ?? '') }}" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
            </div>

            <div>
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <select name="status" id="status" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                    <option value="Menunggu" {{ $konsumsi->status == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                    <option value="Disetujui" {{ $konsumsi->status == 'Disetujui' ? 'selected' : '' }}>Disetujui</option>
                    <option value="Selesai" {{ $konsumsi->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                    <option value="Ditolak" {{ $konsumsi->status == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                </select>
            </div>

            <div class="flex justify-end mt-6">
                <button type="submit"
                    class="px-5 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
                    Update Pemesanan
                </button>
            </div>
        </form>
        @else
        <div class="p-4 bg-red-100 text-red-700 rounded-md">
            <h4 class="font-bold">Akses Ditolak!</h4>
            <p>Anda tidak memiliki hak akses untuk mengubah pemesanan ini.</p>
        </div>
        @endif
    </div>
</div>
@endsection
