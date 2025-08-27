{{-- @extends('layouts.main')

@section('content')
<div class="container py-5">
    <div class="bg-white p-4 rounded-4 shadow-sm">


        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
            <h3 class="fw-bold mb-0 text-primary">Daftar Rapat</h3>
            <a href="{{ route('agenda.create') }}" class="btn btn-success rounded-pill shadow-sm">
                <i class="bi bi-plus-circle me-2"></i> Tambah Rapat
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

        <div class="table-responsive">
            <table id="rapatTable" class="table table-bordered table-striped align-middle">
                <thead class="table-primary">
                    <tr>
                        <th style="width:50px;">No</th>
                        <th>Nama Rapat</th>
                        <th>Tanggal</th>
                        <th>Tempat</th>
                        <th>PIC Rapat</th>
                        <th>Catatan</th>
                        <th style="width:180px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($rapat as $index => $item)
                    <tr>
                        <td>{{ $rapat->firstItem() + $index }}</td>
                        <td class="fw-semibold">{{ $item->nama_rapat }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d F Y') }}</td>
                        <td>{{ $item->tempat }}</td>
                        <td>{{ $item->pic_rapat }}</td>
                        <td>{{ $item->catatan ?: '-' }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('agenda.show', $item->id) }}" class="btn btn-info btn-sm" title="Lihat Agenda">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('agenda.edit', $item->id) }}" class="btn btn-warning btn-sm" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('agenda.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus rapat ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted">Belum ada rapat</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>

@push('js')
<script>
    $(document).ready(function() {
        $('#rapatTable').DataTable({
            // Konfigurasi DataTables
            "pageLength": 5, // Default menampilkan 5 baris
            "lengthMenu": [ [5, 10, 25, 50, -1], [5, 10, 25, 50, "All"] ], // Opsi dropdown "Show entries"
            "language": {
                "lengthMenu": "Tampilkan _MENU_ entri",
                "zeroRecords": "Tidak ada data yang ditemukan",
                "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                "infoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                "infoFiltered": "(disaring dari _MAX_ total entri)",
                "search": "Cari:",
                "paginate": {
                    "previous": "Sebelumnya",
                    "next": "Selanjutnya"
                }
            }
        });
    });
</script>
@endpush
@endsection --}}


@extends('layouts.main')

@section('content')
<div class="bg-white rounded-xl shadow p-6">

    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-3">
        <h3 class="text-xl font-bold text-blue-600">Daftar Susunan Acara</h3>
        <a href="{{ route('agenda.create') }}"
           class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg shadow hover:bg-blue-700 transition">
            <i class="fa fa-plus-circle mr-2"></i> Tambah Rapat
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
        <table id="rapatTable" class="min-w-full border border-gray-200 divide-y divide-gray-200 text-sm">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-4 py-2 text-left w-12">No</th>
                    <th class="px-4 py-2 text-left">Nama Rapat</th>
                    <th class="px-4 py-2 text-left">Tanggal</th>
                    <th class="px-4 py-2 text-left">Tempat</th>
                    <th class="px-4 py-2 text-left">PIC Rapat</th>
                    <th class="px-4 py-2 text-left">Catatan</th>
                    <th class="px-4 py-2 text-center w-44">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($rapat as $index => $item)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2">{{ $rapat->firstItem() + $index }}</td>
                    <td class="px-4 py-2 font-semibold">{{ $item->nama_rapat }}</td>
                    <td class="px-4 py-2">{{ \Carbon\Carbon::parse($item->tanggal)->format('d F Y') }}</td>
                    <td class="px-4 py-2">{{ $item->tempat }}</td>
                    <td class="px-4 py-2">{{ $item->pic_rapat }}</td>
                    <td class="px-4 py-2">{{ $item->catatan ?: '-' }}</td>
                    <td class="px-4 py-2">
                        <div class="flex justify-center space-x-2">
                            <a href="{{ route('agenda.show', $item->id) }}"
                               class="px-2 py-1 bg-blue-500 hover:bg-blue-600 text-white rounded text-xs"
                               title="Lihat Agenda">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="{{ route('agenda.edit', $item->id) }}"
                               class="px-2 py-1 bg-yellow-500 hover:bg-yellow-600 text-white rounded text-xs"
                               title="Edit">
                                <i class="fa fa-pen"></i>
                            </a>
                            <form action="{{ route('agenda.destroy', $item->id) }}" method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus rapat ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="px-2 py-1 bg-red-500 hover:bg-red-600 text-white rounded text-xs"
                                        title="Hapus">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-4 py-3 text-center text-gray-500">Belum ada rapat</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

@push('js')
<script>
    $(document).ready(function() {
        $('#rapatTable').DataTable({
            "pageLength": 5,
            "lengthMenu": [[5, 10, 25, 50, -1],[5, 10, 25, 50, "All"]],
            "language": {
                "lengthMenu": "Tampilkan _MENU_ entri",
                "zeroRecords": "Tidak ada data ditemukan",
                "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                "infoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                "infoFiltered": "(disaring dari _MAX_ total entri)",
                "search": "Cari:",
                "paginate": {
                    "previous": "Sebelumnya",
                    "next": "Selanjutnya"
                }
            }
        });
    });
</script>
@endpush
@endsection
