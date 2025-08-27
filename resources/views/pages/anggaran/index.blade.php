{{-- @extends('layouts.main')

@section('content')
<div class="container py-5">
    <div class="text-center">
        <h1 class="mb-4">Halaman Anggaran</h1>
        <div class="alert alert-info">
            Fitur ini masih dalam tahap pengembangan. Silakan kembali lagi nanti.
        </div>
    </div>
</div>
@endsection --}}

{{--
@extends('layouts.main')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4">Manajemen Anggaran</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            Daftar Anggaran
            <a href="{{ route('anggaran.create') }}" class="btn btn-primary">Tambah Anggaran</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="myTable">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Unit Kerja</th>
                            <th>Tahun Anggaran</th>
                            <th>Total Anggaran</th>
                            <th>Saldo Saat Ini</th>
                            <th>Sisa Anggaran</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($anggarans as $anggaran)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $anggaran->nama_unit_kerja }}</td>
                                <td>{{ $anggaran->tahun_anggaran }}</td>
                                <td>Rp {{ number_format($anggaran->total_anggaran, 0, ',', '.') }}</td>
                                <td>Rp {{ number_format($anggaran->saldo_saat_ini, 0, ',', '.') }}</td>
                                <td>Rp {{ number_format($anggaran->total_anggaran - $anggaran->saldo_saat_ini, 0, ',', '.') }}</td>
                                <td>
                                    <span class="badge {{ $anggaran->saldo_saat_ini > 0 ? 'bg-success' : 'bg-danger' }}">
                                        {{ $anggaran->status }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('anggaran.edit', $anggaran->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('anggaran.destroy', $anggaran->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus anggaran ini?')">Hapus</button>
                                    </form>
                                    <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#topupModal{{ $anggaran->id }}">Top-up</button>
                                </td>
                            </tr>

                            <div class="modal fade" id="topupModal{{ $anggaran->id }}" tabindex="-1" aria-labelledby="topupModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{ route('anggaran.topup', $anggaran->id) }}" method="POST">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="topupModalLabel">Top-up Anggaran {{ $anggaran->nama_unit_kerja }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="topup_amount" class="form-label">Jumlah Top-up</label>
                                                    <input type="number" class="form-control" id="topup_amount" name="topup_amount" required min="1">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection --}}

{{--
@extends('layouts.main')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Manajemen Anggaran</h2>


    @if(session('success'))
        <div class="mb-4 p-4 rounded-lg bg-green-100 text-green-700">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="mb-4 p-4 rounded-lg bg-red-100 text-red-700">
            {{ session('error') }}
        </div>
    @endif


    <div class="bg-white shadow-lg rounded-xl overflow-hidden">
        <div class="flex justify-between items-center px-6 py-4 border-b">
            <h3 class="font-semibold text-gray-700">Daftar Anggaran</h3>
            <a href="{{ route('anggaran.create') }}"
               class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg shadow">
                + Tambah Anggaran
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 text-sm">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="px-4 py-2 text-left">No.</th>
                        <th class="px-4 py-2 text-left">Nama Unit Kerja</th>
                        <th class="px-4 py-2 text-left">Saldo Saat Ini</th>
                        <th class="px-4 py-2 text-left">Total Anggaran</th>
                        <th class="px-4 py-2 text-left">Sisa Anggaran</th>
                        <th class="px-4 py-2 text-left">Penggunaan</th>
                        <th class="px-4 py-2 text-left">Status</th>
                        <th class="px-4 py-2 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($anggarans as $anggaran)
                        <tr>
                            <td class="px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2">{{ $anggaran->nama_unit_kerja }}</td>
                            <td class="px-4 py-2">{{ $anggaran->tahun_anggaran }}</td>
                            <td class="px-4 py-2">Rp {{ number_format($anggaran->total_anggaran, 0, ',', '.') }}</td>
                            <td class="px-4 py-2">Rp {{ number_format($anggaran->saldo_saat_ini, 0, ',', '.') }}</td>
                            <td class="px-4 py-2">Rp {{ number_format($anggaran->total_anggaran - $anggaran->saldo_saat_ini, 0, ',', '.') }}</td>
                            <td class="px-4 py-2">
                                <span class="px-2 py-1 text-xs font-medium rounded-full
                                    {{ $anggaran->saldo_saat_ini > 0 ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                    {{ $anggaran->status }}
                                </span>
                            </td>
                            <td class="px-4 py-2 flex flex-wrap gap-2 justify-center">
                                <a href="{{ route('anggaran.edit', $anggaran->id) }}"
                                   class="px-3 py-1 bg-yellow-400 hover:bg-yellow-500 text-white text-xs font-medium rounded-lg">
                                    Edit
                                </a>
                                <form action="{{ route('anggaran.destroy', $anggaran->id) }}" method="POST"
                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus anggaran ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="px-3 py-1 bg-red-500 hover:bg-red-600 text-white text-xs font-medium rounded-lg">
                                        Hapus
                                    </button>
                                </form>
                                <button type="button"
                                        onclick="openModal('modal-{{ $anggaran->id }}')"
                                        class="px-3 py-1 bg-blue-500 hover:bg-blue-600 text-white text-xs font-medium rounded-lg">
                                    Top-up
                                </button>
                            </td>
                        </tr>


                        <div id="modal-{{ $anggaran->id }}" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
                            <div class="bg-white rounded-lg shadow-lg w-full max-w-md">
                                <form action="{{ route('anggaran.topup', $anggaran->id) }}" method="POST">
                                    @csrf
                                    <div class="px-6 py-4 border-b flex justify-between items-center">
                                        <h5 class="font-semibold text-gray-800">Top-up Anggaran {{ $anggaran->nama_unit_kerja }}</h5>
                                        <button type="button" onclick="closeModal('modal-{{ $anggaran->id }}')" class="text-gray-500 hover:text-gray-700">&times;</button>
                                    </div>
                                    <div class="px-6 py-4">
                                        <label for="topup_amount" class="block text-sm font-medium text-gray-700">Jumlah Top-up</label>
                                        <input type="number" name="topup_amount" id="topup_amount"
                                               class="mt-2 w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                               required min="1">
                                    </div>
                                    <div class="px-6 py-4 border-t flex justify-end gap-2">
                                        <button type="button" onclick="closeModal('modal-{{ $anggaran->id }}')"
                                                class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 text-sm rounded-lg">
                                            Tutup
                                        </button>
                                        <button type="submit"
                                                class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm rounded-lg">
                                            Simpan
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


<script>
    function openModal(id) {
        document.getElementById(id).classList.remove('hidden');
    }
    function closeModal(id) {
        document.getElementById(id).classList.add('hidden');
    }
</script>
@endsection --}}


@extends('layouts.main')

@section('content')
<div class="bg-white rounded-xl shadow p-6">

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-3">
        <h3 class="text-xl font-bold text-blue-600">Manajemen Anggaran</h3>
        <a href="{{ route('anggaran.create') }}"
           class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg shadow hover:bg-blue-700 transition">
            <i class="fa fa-plus-circle mr-2"></i> Tambah Anggaran
        </a>
    </div>

    {{-- Table --}}
    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-300 text-sm">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-4 py-2 border border-gray-300 w-12 text-center">No</th>
                    <th class="px-4 py-2 border border-gray-300 text-left">Nama Unit Kerja</th>
                    <th class="px-4 py-2 border border-gray-300 text-left">Tahun Anggaran</th>
                    <th class="px-4 py-2 border border-gray-300 text-left">Total Anggaran</th>
                    <th class="px-4 py-2 border border-gray-300 text-left">Saldo Saat Ini</th>
                    <th class="px-4 py-2 border border-gray-300 text-left">Penggunaan</th>
                    <th class="px-4 py-2 border border-gray-300 text-left">Status</th>
                    <th class="px-4 py-2 border border-gray-300 text-center w-48">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($anggarans as $anggaran)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 border border-gray-300 text-center">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2 border border-gray-300 font-semibold">{{ $anggaran->nama_unit_kerja }}</td>
                    <td class="px-4 py-2 border border-gray-300">{{ $anggaran->tahun_anggaran }}</td>
                    <td class="px-4 py-2 border border-gray-300">Rp {{ number_format($anggaran->total_anggaran, 0, ',', '.') }}</td>
                    <td class="px-4 py-2 border border-gray-300">Rp {{ number_format($anggaran->saldo_saat_ini, 0, ',', '.') }}</td>
                    <td class="px-4 py-2 border border-gray-300">Rp {{ number_format($anggaran->total_anggaran - $anggaran->saldo_saat_ini, 0, ',', '.') }}</td>
                    <td class="px-4 py-2 border border-gray-300">
                        <span class="px-2 py-1 text-xs font-medium rounded-full
                            {{ $anggaran->saldo_saat_ini > 0 ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                            {{ $anggaran->status }}
                        </span>
                    </td>
                    <td class="px-4 py-2 border border-gray-300">
                        <div class="flex flex-wrap justify-center gap-2">
                            <a href="{{ route('anggaran.edit', $anggaran->id) }}"
                               class="px-2 py-1 bg-yellow-500 hover:bg-yellow-600 text-white text-xs rounded" title="Edit">
                                <i class="fa fa-pen"></i>
                            </a>
                            <form action="{{ route('anggaran.destroy', $anggaran->id) }}" method="POST"
                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus anggaran ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="px-2 py-1 bg-red-500 hover:bg-red-600 text-white text-xs rounded" title="Hapus">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                            <button type="button"
                                    onclick="openModal('modal-{{ $anggaran->id }}')"
                                    class="px-2 py-1 bg-blue-500 hover:bg-blue-600 text-white text-xs rounded" title="Top-up">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </td>
                </tr>

                {{-- Modal Top-up --}}
                <div id="modal-{{ $anggaran->id }}" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
                    <div class="bg-white rounded-lg shadow-lg w-full max-w-md">
                        <form action="{{ route('anggaran.topup', $anggaran->id) }}" method="POST">
                            @csrf
                            <div class="px-6 py-4 border-b flex justify-between items-center">
                                <h5 class="font-semibold text-gray-800">Top-up Anggaran {{ $anggaran->nama_unit_kerja }}</h5>
                                <button type="button" onclick="closeModal('modal-{{ $anggaran->id }}')" class="text-gray-500 hover:text-gray-700">&times;</button>
                            </div>
                            <div class="px-6 py-4">
                                <label for="topup_amount" class="block text-sm font-medium text-gray-700">Jumlah Top-up</label>
                                <input type="number" name="topup_amount" id="topup_amount"
                                       class="mt-2 w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                       required min="1">
                            </div>
                            <div class="px-6 py-4 border-t flex justify-end gap-2">
                                <button type="button" onclick="closeModal('modal-{{ $anggaran->id }}')"
                                        class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 text-sm rounded-lg">
                                    Tutup
                                </button>
                                <button type="submit"
                                        class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm rounded-lg">
                                    Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                @empty
                <tr>
                    <td colspan="8" class="px-4 py-3 text-center text-gray-500 border border-gray-300">Belum ada anggaran</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- Script Modal --}}
<script>
    function openModal(id) {
        document.getElementById(id).classList.remove('hidden');
    }
    function closeModal(id) {
        document.getElementById(id).classList.add('hidden');
    }
</script>
@endsection
