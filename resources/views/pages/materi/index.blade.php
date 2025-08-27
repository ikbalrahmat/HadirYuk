{{-- @extends('layouts.main')

@section('content')
<div class="container py-5">


    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
        <h3 class="fw-bold mb-0">Daftar Materi Rapat</h3>
        <a href="{{ route('materi.create') }}" class="btn btn-success rounded-pill shadow-sm">
            <i class="bi bi-plus-circle me-2"></i> Tambah Materi
        </a>
    </div>


    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-triangle me-2"></i>{{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="bg-white p-4 rounded-4 shadow-sm">
        <div class="table-responsive">
            <table id="materiTable" class="table table-bordered table-striped align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th style="width:50px;">No</th>
                        <th>Nama Rapat</th>
                        <th>Tanggal Rapat</th>
                        <th>Judul Materi</th>
                        <th>Dokumen</th>
                        <th style="width:200px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($materis as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->rapat->nama_rapat ?? 'Rapat Tidak Ditemukan' }}</td>
                        <td>{{ $item->rapat->tanggal ? \Carbon\Carbon::parse($item->rapat->tanggal)->translatedFormat('d F Y') : '-' }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>
                            @if($item->file_path)
                                <a href="{{ \Storage::url($item->file_path) }}" target="_blank" class="text-decoration-none">
                                    <i class="bi bi-file-earmark-text me-1"></i> Lihat Dokumen
                                </a>
                            @else
                                <span class="text-muted fst-italic">Tidak ada dokumen</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('materi.download', $item->id) }}" class="btn btn-info btn-sm" title="Download">
                                    <i class="bi bi-download"></i>
                                </a>
                                <a href="{{ route('materi.edit', $item->id) }}" class="btn btn-warning btn-sm" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('materi.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus materi ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
@endpush

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script>
$(document).ready(function() {
    $('#materiTable').DataTable({
        "pageLength": 5,
        "lengthMenu": [5, 10, 25, 50, 100],
        "language": {
            "lengthMenu": "Tampilkan _MENU_ data per halaman",
            "zeroRecords": "Data tidak ditemukan",
            "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            "infoEmpty": "Tidak ada data tersedia",
            "infoFiltered": "(difilter dari total _MAX_ data)",
            "search": "Cari:",
            "paginate": {
                "first": "«",
                "last": "»",
                "next": "›",
                "previous": "‹"
            }
        }
    });
});
</script>
@endpush --}}

{{--
@extends('layouts.main')

@section('content')
<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
        <h3 class="fw-bold mb-0">Daftar Materi Rapat</h3>
        <a href="{{ route('materi.create') }}" class="btn btn-success rounded-pill shadow-sm">
            <i class="bi bi-plus-circle me-2"></i> Tambah Materi
        </a>
    </div>


    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-triangle me-2"></i>{{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif


    <div class="bg-white p-4 rounded-4 shadow-sm">
        <div class="table-responsive">
            <table id="materiTable" class="table table-bordered table-striped align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th style="width:50px;">No</th>
                        <th>Nama Rapat</th>
                        <th>Tanggal Rapat</th>
                        <th>Judul Materi</th>
                        <th>Dokumen</th>
                        <th style="width:200px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($materis as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $item->undangan->agenda ?? 'Undangan Tidak Ditemukan' }}</td>
                        <td>{{ $item->undangan ? \Carbon\Carbon::parse($item->undangan->tanggal)->translatedFormat('d F Y') : '-' }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>
                            @if($item->file_path)
                                <a href="{{ \Storage::url($item->file_path) }}" target="_blank" class="text-decoration-none">
                                    <i class="bi bi-file-earmark-text me-1"></i> Lihat Dokumen
                                </a>
                            @else
                                <span class="text-muted fst-italic">Tidak ada dokumen</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('materi.download', $item->id) }}" class="btn btn-info btn-sm" title="Download">
                                    <i class="bi bi-download"></i>
                                </a>
                                <a href="{{ route('materi.edit', $item->id) }}" class="btn btn-warning btn-sm" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('materi.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus materi ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
@endpush

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script>
$(document).ready(function() {
    $('#materiTable').DataTable({
        "pageLength": 5,
        "lengthMenu": [5, 10, 25, 50, 100],
        "language": {
            "lengthMenu": "Tampilkan _MENU_ data per halaman",
            "zeroRecords": "Data tidak ditemukan",
            "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            "infoEmpty": "Tidak ada data tersedia",
            "infoFiltered": "(difilter dari total _MAX_ data)",
            "search": "Cari:",
            "paginate": {
                "first": "«",
                "last": "»",
                "next": "›",
                "previous": "‹"
            }
        }
    });
});
</script>
@endpush --}}

{{-- @extends('layouts.main')

@section('content')
<div class="max-w-7xl mx-auto py-8 px-4">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
        <h3 class="text-xl font-bold text-gray-800">Daftar Materi Rapat</h3>
        <a href="{{ route('materi.create') }}"
           class="inline-flex items-center bg-green-600 hover:bg-green-700 text-white font-medium px-4 py-2 rounded-lg shadow transition">
            <i class="bi bi-plus-circle mr-2"></i> Tambah Materi
        </a>
    </div>

    @if(session('success'))
        <div class="flex items-center justify-between bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded-lg mb-4">
            <div class="flex items-center">
                <i class="bi bi-check-circle mr-2"></i> {{ session('success') }}
            </div>
            <button onclick="this.parentElement.remove()" class="text-green-600 hover:text-green-800">✕</button>
        </div>
    @endif
    @if(session('error'))
        <div class="flex items-center justify-between bg-red-100 border border-red-300 text-red-800 px-4 py-3 rounded-lg mb-4">
            <div class="flex items-center">
                <i class="bi bi-exclamation-triangle mr-2"></i> {{ session('error') }}
            </div>
            <button onclick="this.parentElement.remove()" class="text-red-600 hover:text-red-800">✕</button>
        </div>
    @endif

    <div class="bg-white shadow rounded-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table id="materiTable" class="min-w-full text-sm text-gray-700">
                <thead class="bg-gray-100 text-gray-700 font-semibold">
                    <tr>
                        <th class="px-4 py-3 text-left w-12">No</th>
                        <th class="px-4 py-3 text-left">Nama Rapat</th>
                        <th class="px-4 py-3 text-left">Tanggal Rapat</th>
                        <th class="px-4 py-3 text-left">Judul Materi</th>
                        <th class="px-4 py-3 text-left">Dokumen</th>
                        <th class="px-4 py-3 text-center w-48">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($materis as $item)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3">{{ $loop->iteration }}</td>
                        <td class="px-4 py-3">{{ $item->undangan->agenda ?? 'Undangan Tidak Ditemukan' }}</td>
                        <td class="px-4 py-3">
                            {{ $item->undangan ? \Carbon\Carbon::parse($item->undangan->tanggal)->translatedFormat('d F Y') : '-' }}
                        </td>
                        <td class="px-4 py-3">{{ $item->judul }}</td>
                        <td class="px-4 py-3">
                            @if($item->file_path)
                                <a href="{{ \Storage::url($item->file_path) }}" target="_blank" class="text-blue-600 hover:underline flex items-center">
                                    <i class="bi bi-file-earmark-text mr-1"></i> Lihat Dokumen
                                </a>
                            @else
                                <span class="italic text-gray-400">Tidak ada dokumen</span>
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center justify-center gap-2">
                                <a href="{{ route('materi.download', $item->id) }}"
                                   class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-lg shadow transition" title="Download">
                                    <i class="bi bi-download"></i>
                                </a>
                                <a href="{{ route('materi.edit', $item->id) }}"
                                   class="bg-yellow-500 hover:bg-yellow-600 text-white p-2 rounded-lg shadow transition" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('materi.destroy', $item->id) }}" method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus materi ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-lg shadow transition" title="Hapus">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $('#materiTable').DataTable({
        pageLength: 5,
        lengthMenu: [5, 10, 25, 50, 100],
        language: {
            lengthMenu: "Tampilkan _MENU_ data per halaman",
            zeroRecords: "Data tidak ditemukan",
            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            infoEmpty: "Tidak ada data tersedia",
            infoFiltered: "(difilter dari total _MAX_ data)",
            search: "Cari:",
            paginate: {
                first: "«",
                last: "»",
                next: "›",
                previous: "‹"
            }
        }
    });
});
</script>
@endpush --}}

@extends('layouts.main')

@section('content')
<div class="bg-white rounded-xl shadow p-6">


    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-3">
        <h3 class="text-xl font-bold text-blue-600">Daftar Materi Rapat</h3>
        <a href="{{ route('materi.create') }}"
           class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg shadow hover:bg-blue-700 transition">
            <i class="fa fa-plus-circle mr-2"></i> Tambah Materi
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded relative mb-4">
            <i class="fa fa-check-circle mr-2"></i> {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded relative mb-4">
            <i class="fa fa-exclamation-triangle mr-2"></i> {{ session('error') }}
        </div>
    @endif


    <div class="overflow-x-auto">
        <table id="materiTable" class="min-w-full border border-gray-300 text-sm">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-4 py-2 text-left w-12 border border-gray-300">No</th>
                    <th class="px-4 py-2 text-left border border-gray-300">Nama Rapat</th>
                    <th class="px-4 py-2 text-left border border-gray-300">Tanggal Rapat</th>
                    <th class="px-4 py-2 text-left border border-gray-300">Judul Materi</th>
                    <th class="px-4 py-2 text-left border border-gray-300">Dokumen</th>
                    <th class="px-4 py-2 text-center w-44 border border-gray-300">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($materis as $item)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 border border-gray-300 text-center">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2 border border-gray-300 font-semibold">{{ $item->undangan->agenda ?? 'Undangan Tidak Ditemukan' }}</td>
                    <td class="px-4 py-2 border border-gray-300">
                        {{ $item->undangan ? \Carbon\Carbon::parse($item->undangan->tanggal)->translatedFormat('d F Y') : '-' }}
                    </td>
                    <td class="px-4 py-2 border border-gray-300">{{ $item->judul }}</td>
                    <td class="px-4 py-2 border border-gray-300">
                        @if($item->file_path)
                            <a href="{{ Storage::url($item->file_path) }}" target="_blank"
                               class="text-blue-600 hover:underline flex items-center">
                                <i class="fa fa-file-alt mr-1"></i> Lihat Dokumen
                            </a>
                        @else
                            <span class="italic text-gray-400">Tidak ada dokumen</span>
                        @endif
                    </td>
                    <td class="px-4 py-2 border border-gray-300">
                        <div class="flex justify-center space-x-2">
                            <a href="{{ route('materi.download', $item->id) }}"
                               class="px-2 py-1 bg-blue-500 hover:bg-blue-600 text-white rounded text-xs" title="Download">
                                <i class="fa fa-download"></i>
                            </a>
                            <a href="{{ route('materi.edit', $item->id) }}"
                               class="px-2 py-1 bg-yellow-500 hover:bg-yellow-600 text-white rounded text-xs" title="Edit">
                                <i class="fa fa-pen"></i>
                            </a>
                            <form action="{{ route('materi.destroy', $item->id) }}" method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus materi ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="px-2 py-1 bg-red-500 hover:bg-red-600 text-white rounded text-xs" title="Hapus">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-4 py-3 text-center text-gray-500 border border-gray-300">Belum ada materi</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
