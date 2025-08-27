{{-- @extends('layouts.main')

@section('content')
<div class="container my-4">
    <div class="bg-light p-4 rounded-4 shadow-sm">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="fw-bold text-dark mb-0">Daftar Risalah</h3>
            <a href="{{ route('risalah.create') }}" class="btn btn-outline-primary rounded-pill px-4 shadow-sm">
                <i class="bi bi-journal-plus me-1"></i> Tambah Risalah Baru
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body bg-white rounded-3">
                <div class="table-responsive">
                    <table class="table table-borderless table-striped align-middle mb-0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Agenda Rapat</th>
                                <th>Pimpinan</th>
                                <th>Jenis Rapat</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($risalahs as $index => $r)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $r->agenda }}</td>
                                    <td>{{ $r->pimpinan }}</td>
                                    <td>{{ $r->jenis_rapat }}</td>
                                    <td>{{ \Carbon\Carbon::parse($r->tanggal)->format('d M Y') }}</td>
                                    <td>
                                        <a href="{{ route('risalah.export', $r->id) }}" class="btn btn-sm btn-danger">Export PDF</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">Belum ada risalah.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

{{--
@extends('layouts.main')

@section('content')
<div class="container my-4">
    <div class="bg-light p-4 rounded-4 shadow-sm">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="fw-bold text-dark mb-0">Daftar Risalah</h3>
            <a href="{{ route('risalah.create') }}" class="btn btn-outline-primary rounded-pill px-4 shadow-sm">
                <i class="bi bi-journal-plus me-1"></i> Tambah Risalah Baru
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body bg-white rounded-3">
                <div class="table-responsive">
                    <table class="table table-borderless table-striped align-middle mb-0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Agenda Rapat</th>
                                <th>Pimpinan</th>
                                <th>Jenis Rapat</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($risalahs as $index => $r)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $r->agenda }}</td>
                                    <td>{{ $r->pimpinan }}</td>
                                    <td>{{ $r->jenis_rapat }}</td>
                                    <td>{{ \Carbon\Carbon::parse($r->tanggal)->format('d M Y') }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-info btn-preview" data-id="{{ $r->id }}">Preview</button>
                                        <a href="{{ route('risalah.export', $r->id) }}" class="btn btn-sm btn-danger">Export PDF</a>
                                        <a href="{{ route('risalah.edit', $r->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('risalah.destroy', $r->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Yakin hapus risalah ini?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">Belum ada risalah.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Preview -->
<div class="modal fade" id="previewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content rounded-3">
            <div class="modal-header">
                <h5 class="modal-title">Preview Risalah</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="previewContent">
                Loading...
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
$(document).on('click', '.btn-preview', function() {
    let id = $(this).data('id');
    $.get("{{ url('/risalah') }}/" + id, function(data) {
        let html = `
            <p><b>Agenda:</b> ${data.agenda}</p>
            <p><b>Pimpinan:</b> ${data.pimpinan}</p>
            <p><b>Pencatat:</b> ${data.pencatat}</p>
            <p><b>Jenis Rapat:</b> ${data.jenis_rapat ?? '-'}</p>
            <p><b>Tanggal:</b> ${data.tanggal}</p>
            <p><b>Penjelasan:</b> ${data.penjelasan ?? '-'}</p>
            <p><b>Kesimpulan:</b> ${data.kesimpulan ?? '-'}</p>
        `;
        $('#previewContent').html(html);
        $('#previewModal').modal('show');
    });
});
</script>
@endpush --}}

{{-- @extends('layouts.main')

@section('content')
<div class="container my-4">
    <div class="bg-light p-4 rounded-4 shadow-sm">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="fw-bold text-dark mb-0">Daftar Risalah</h3>
            <a href="{{ route('risalah.create') }}" class="btn btn-outline-primary rounded-pill px-4 shadow-sm">
                <i class="bi bi-journal-plus me-1"></i> Tambah Risalah Baru
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body bg-white rounded-3">
                <div class="table-responsive">
                    <table class="table table-borderless table-striped align-middle mb-0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Agenda Rapat</th>
                                <th>Pimpinan</th>
                                <th>Jenis Rapat</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($risalahs as $index => $r)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $r->agenda }}</td>
                                    <td>{{ $r->pimpinan }}</td>
                                    <td>{{ $r->jenis_rapat }}</td>
                                    <td>{{ \Carbon\Carbon::parse($r->tanggal)->format('d M Y') }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#previewModal{{ $r->id }}">
                                            Preview
                                        </button>
                                        <a href="{{ route('risalah.edit', $r->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('risalah.destroy', $r->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus risalah ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                        <a href="{{ route('risalah.export', $r->id) }}" class="btn btn-sm btn-primary">Export PDF</a>
                                    </td>
                                </tr>
                                <!-- Modal Preview -->
                                <div class="modal fade" id="previewModal{{ $r->id }}" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-xl modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Preview Risalah: {{ $r->agenda }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body p-0" style="height: 80vh;">
                                                <iframe src="{{ route('risalah.preview', $r->id) }}" width="100%" height="100%" frameborder="0"></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Modal -->
                            @empty
                                <tr>
                                    <td colspan="6">Belum ada risalah.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

{{--
@extends('layouts.main')

@section('content')
<div class="container my-4">
    <div class="bg-light p-4 rounded-4 shadow-sm">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="fw-bold text-dark mb-0">Daftar Risalah</h3>
            <a href="{{ route('risalah.create') }}" class="btn btn-outline-primary rounded-pill px-4 shadow-sm">
                <i class="bi bi-journal-plus me-1"></i> Tambah Risalah Baru
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body bg-white rounded-3">
                <div class="table-responsive">
                    <table class="table table-borderless table-striped align-middle mb-0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Agenda Rapat</th>
                                <th>Pimpinan</th>
                                <th>Jenis Rapat</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($risalahs as $index => $r)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $r->undangan->agenda ?? 'Undangan Tidak Ditemukan' }}</td>
                                    <td>{{ $r->pimpinan }}</td>
                                    <td>{{ $r->jenis_rapat }}</td>
                                    <td>{{ $r->undangan ? \Carbon\Carbon::parse($r->undangan->tanggal)->format('d M Y') : '-' }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#previewModal{{ $r->id }}">
                                            Preview
                                        </button>
                                        <a href="{{ route('risalah.edit', $r->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('risalah.destroy', $r->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus risalah ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                        <a href="{{ route('risalah.export', $r->id) }}" class="btn btn-sm btn-primary">Export PDF</a>
                                    </td>
                                </tr>
                                <div class="modal fade" id="previewModal{{ $r->id }}" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-xl modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Preview Risalah: {{ $r->undangan->agenda ?? 'Undangan Tidak Ditemukan' }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body p-0" style="height: 80vh;">
                                                <iframe src="{{ route('risalah.preview', $r->id) }}" width="100%" height="100%" frameborder="0"></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <tr>
                                    <td colspan="6">Belum ada risalah.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

{{--
@extends('layouts.main')

@section('content')
<div class="space-y-6">
    <!-- HEADER -->
    <div class="flex items-center justify-between">
        <h3 class="text-xl font-semibold text-gray-800">Daftar Risalah</h3>
        <a href="{{ route('risalah.create') }}"
           class="inline-flex items-center gap-2 px-4 py-2 rounded-xl border border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-white shadow-sm transition">
            <i class="fa fa-book"></i> Tambah Risalah Baru
        </a>
    </div>

    <!-- ALERT SUCCESS -->
    @if(session('success'))
        <div class="p-3 rounded-lg bg-green-100 text-green-700 border border-green-300">
            {{ session('success') }}
        </div>
    @endif

    <!-- TABLE -->
    <div class="bg-white rounded-xl shadow overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left">
                <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                    <tr>
                        <th class="px-4 py-3">No</th>
                        <th class="px-4 py-3">Agenda Rapat</th>
                        <th class="px-4 py-3">Pimpinan</th>
                        <th class="px-4 py-3">Jenis Rapat</th>
                        <th class="px-4 py-3">Tanggal</th>
                        <th class="px-4 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($risalahs as $index => $r)
                        <tr>
                            <td class="px-4 py-3">{{ $index + 1 }}</td>
                            <td class="px-4 py-3">{{ $r->undangan->agenda ?? 'Undangan Tidak Ditemukan' }}</td>
                            <td class="px-4 py-3">{{ $r->pimpinan }}</td>
                            <td class="px-4 py-3">{{ $r->jenis_rapat }}</td>
                            <td class="px-4 py-3">{{ $r->undangan ? \Carbon\Carbon::parse($r->undangan->tanggal)->format('d M Y') : '-' }}</td>
                            <td class="px-4 py-3 space-x-2">
                                <!-- Preview Button -->
                                <button onclick="openModal('modal-{{ $r->id }}')"
                                    class="px-3 py-1 rounded-lg bg-blue-100 text-blue-700 hover:bg-blue-200 text-xs font-medium">
                                    Preview
                                </button>

                                <!-- Edit -->
                                <a href="{{ route('risalah.edit', $r->id) }}"
                                   class="px-3 py-1 rounded-lg bg-yellow-100 text-yellow-700 hover:bg-yellow-200 text-xs font-medium">
                                    Edit
                                </a>

                                <!-- Hapus -->
                                <form action="{{ route('risalah.destroy', $r->id) }}" method="POST" class="inline"
                                      onsubmit="return confirm('Yakin hapus risalah ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-3 py-1 rounded-lg bg-red-100 text-red-700 hover:bg-red-200 text-xs font-medium">
                                        Hapus
                                    </button>
                                </form>

                                <!-- Export -->
                                <a href="{{ route('risalah.export', $r->id) }}"
                                   class="px-3 py-1 rounded-lg bg-green-100 text-green-700 hover:bg-green-200 text-xs font-medium">
                                    Export PDF
                                </a>
                            </td>
                        </tr>

                        <!-- MODAL -->
                        <div id="modal-{{ $r->id }}" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                            <div class="bg-white w-11/12 lg:w-4/5 xl:w-3/4 h-[80vh] rounded-xl shadow-lg flex flex-col">
                                <!-- Header -->
                                <div class="flex justify-between items-center border-b px-4 py-2">
                                    <h5 class="font-semibold">Preview Risalah: {{ $r->undangan->agenda ?? '-' }}</h5>
                                    <button onclick="closeModal('modal-{{ $r->id }}')" class="text-gray-500 hover:text-gray-800">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                                <!-- Body -->
                                <div class="flex-grow">
                                    <iframe src="{{ route('risalah.preview', $r->id) }}"
                                            class="w-full h-full rounded-b-xl" frameborder="0"></iframe>
                                </div>
                            </div>
                        </div>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-6 text-center text-gray-500">Belum ada risalah.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@push('js')
<script>
    function openModal(id) {
        document.getElementById(id).classList.remove("hidden");
    }
    function closeModal(id) {
        document.getElementById(id).classList.add("hidden");
    }
</script>
@endpush
@endsection --}}


@extends('layouts.main')

@section('content')
<div class="bg-white rounded-xl shadow p-6">

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-3">
        <h3 class="text-xl font-bold text-blue-600">Daftar Risalah</h3>
        <a href="{{ route('risalah.create') }}"
           class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg shadow hover:bg-blue-700 transition">
            <i class="fa fa-book mr-2"></i> Tambah Risalah Baru
        </a>
    </div>

    {{-- Alert --}}
    @if(session('success'))
        <div class="bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded relative mb-4">
            <i class="fa fa-check-circle mr-2"></i> {{ session('success') }}
        </div>
    @endif

    {{-- Table --}}
    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-300 text-sm">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-4 py-2 border border-gray-300 w-12 text-center">No</th>
                    <th class="px-4 py-2 border border-gray-300">Agenda Rapat</th>
                    <th class="px-4 py-2 border border-gray-300">Pimpinan</th>
                    <th class="px-4 py-2 border border-gray-300">Jenis Rapat</th>
                    <th class="px-4 py-2 border border-gray-300">Tanggal</th>
                    <th class="px-4 py-2 border border-gray-300 text-center w-56">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($risalahs as $index => $r)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 border border-gray-300 text-center">{{ $index + 1 }}</td>
                    <td class="px-4 py-2 border border-gray-300 font-semibold">{{ $r->undangan->agenda ?? 'Undangan Tidak Ditemukan' }}</td>
                    <td class="px-4 py-2 border border-gray-300">{{ $r->pimpinan }}</td>
                    <td class="px-4 py-2 border border-gray-300">{{ $r->jenis_rapat }}</td>
                    <td class="px-4 py-2 border border-gray-300">
                        {{ $r->undangan ? \Carbon\Carbon::parse($r->undangan->tanggal)->translatedFormat('d F Y') : '-' }}
                    </td>
                    <td class="px-4 py-2 border border-gray-300">
                        <div class="flex justify-center space-x-2">
                            {{-- Preview --}}
                            <button onclick="openModal('modal-{{ $r->id }}')"
                                class="px-2 py-1 bg-blue-500 hover:bg-blue-600 text-white rounded text-xs" title="Preview">
                                <i class="fa fa-eye"></i>
                            </button>
                            {{-- Edit --}}
                            <a href="{{ route('risalah.edit', $r->id) }}"
                               class="px-2 py-1 bg-yellow-500 hover:bg-yellow-600 text-white rounded text-xs" title="Edit">
                                <i class="fa fa-pen"></i>
                            </a>
                            {{-- Hapus --}}
                            <form action="{{ route('risalah.destroy', $r->id) }}" method="POST" class="inline"
                                  onsubmit="return confirm('Yakin hapus risalah ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="px-2 py-1 bg-red-500 hover:bg-red-600 text-white rounded text-xs" title="Hapus">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                            {{-- Export --}}
                            <a href="{{ route('risalah.export', $r->id) }}"
                               class="px-2 py-1 bg-green-500 hover:bg-green-600 text-white rounded text-xs" title="Export PDF">
                                <i class="fa fa-file-pdf"></i>
                            </a>
                        </div>
                    </td>
                </tr>

                {{-- Modal Preview --}}
                <div id="modal-{{ $r->id }}" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                    <div class="bg-white w-11/12 lg:w-4/5 xl:w-3/4 h-[80vh] rounded-xl shadow-lg flex flex-col">
                        <div class="flex justify-between items-center border-b px-4 py-2">
                            <h5 class="font-semibold">Preview Risalah: {{ $r->undangan->agenda ?? '-' }}</h5>
                            <button onclick="closeModal('modal-{{ $r->id }}')" class="text-gray-500 hover:text-gray-800">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                        <div class="flex-grow">
                            <iframe src="{{ route('risalah.preview', $r->id) }}"
                                    class="w-full h-full rounded-b-xl" frameborder="0"></iframe>
                        </div>
                    </div>
                </div>
                @empty
                <tr>
                    <td colspan="6" class="px-4 py-3 text-center text-gray-500 border border-gray-300">
                        Belum ada risalah.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@push('js')
<script>
    function openModal(id) {
        document.getElementById(id).classList.remove("hidden");
    }
    function closeModal(id) {
        document.getElementById(id).classList.add("hidden");
    }
</script>
@endpush
@endsection
