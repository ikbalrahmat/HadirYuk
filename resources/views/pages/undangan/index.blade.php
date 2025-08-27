{{-- @extends('layouts.main')

@section('content')
<div class="container py-5">
    <div class="bg-white p-4 rounded-4 shadow-sm">


        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold mb-0">Daftar Undangan Rapat</h3>
            <a href="{{ route('undangan.create') }}" class="btn btn-success rounded-pill shadow-sm">
                <i class="bi bi-plus-circle me-2"></i> Tambah Undangan
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
            <table id="undanganTable" class="table table-bordered table-hover align-middle">
                <thead class="table-primary">
                    <tr>
                        <th style="width: 50px;">No</th>
                        <th>Waktu Rapat</th>
                        <th>Kepada</th>
                        <th>Pengirim</th>
                        <th>Tempat / Link</th>
                        <th>Agenda</th>
                        <th style="width: 150px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($undanganWithId as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            <div class="fw-semibold">{{ $item->tanggal }}</div>
                            <small class="text-muted">{{ $item->jam }}</small>
                        </td>
                        <td>{{ $item->kepada }}</td>
                        <td>{{ $item->pengirim }}</td>
                        <td>{{ $item->tempat_link }}</td>
                        <td>{{ Str::limit($item->agenda, 40) }}</td>
                        <td>
                            <div class="d-flex justify-content-center gap-2">
                                <button type="button"
                                    class="btn btn-info btn-sm view-undangan"
                                    data-id="{{ $item->id }}" title="Lihat">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <a href="{{ route('undangan.edit', $item->id) }}"
                                   class="btn btn-warning btn-sm" title="Edit">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('undangan.destroy', $item->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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
                        <td colspan="7" class="text-muted">Belum ada undangan rapat</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>


<div class="modal fade" id="previewUndanganModal" tabindex="-1" aria-labelledby="previewUndanganModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content rounded-4">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="previewUndanganModalLabel">📄 Preview Undangan Rapat</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="undangan-preview-content">
                <div class="text-center text-muted">Memuat konten...</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>


@push('js')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const previewModal = new bootstrap.Modal(document.getElementById('previewUndanganModal'));
    const undanganButtons = document.querySelectorAll('.view-undangan');
    const previewContent = document.getElementById('undangan-preview-content');

    undanganButtons.forEach(button => {
        button.addEventListener('click', function() {
            const undanganId = this.getAttribute('data-id');
            previewContent.innerHTML = '<div class="text-center text-muted">Memuat konten...</div>';
            fetch(`/undangan/${undanganId}/preview`)
                .then(response => response.text())
                .then(html => {
                    previewContent.innerHTML = html;
                    previewModal.show();
                })
                .catch(error => {
                    previewContent.innerHTML = '<p class="text-danger">Gagal memuat preview undangan.</p>';
                });
        });
    });

    if (window.jQuery && $.fn.DataTable) {
;
        $('#undanganTable').DataTable({
            pageLength: 5,
            lengthMenu: [5, 10, 25, 50],
            language: {
                lengthMenu: "Show _MENU_ entries",
                zeroRecords: "No data available",
                info: "Showing _START_ to _END_ of _TOTAL_ results",
                infoEmpty: "Showing 0 to 0 of 0 results",
                infoFiltered: "(filtered from _MAX_ total results)",
                search: "Search:"
            }
        });

    }
});
</script>
@endpush
@endsection --}}

{{--

@extends('layouts.main')

@section('content')
<div class="container py-5">
    <div class="bg-white p-4 rounded-4 shadow-sm">


        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold mb-0">Daftar Undangan Rapat</h3>
            <a href="{{ route('undangan.create') }}" class="btn btn-success rounded-pill shadow-sm">
                <i class="bi bi-plus-circle me-2"></i> Tambah Undangan
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
            <table id="undanganTable" class="table table-bordered table-hover align-middle">
                <thead class="table-primary">
                    <tr>
                        <th style="width: 50px;">No</th>
                        <th>Waktu Rapat</th>
                        <th>Kepada</th>
                        <th>Pengirim</th>
                        <th>Tempat / Link</th>
                        <th>Agenda</th>
                        <th style="width: 150px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="modal fade" id="previewUndanganModal" tabindex="-1" aria-labelledby="previewUndanganModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content rounded-4">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="previewUndanganModalLabel">📄 Preview Undangan Rapat</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="undangan-preview-content">
                <div class="text-center text-muted">Memuat konten...</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>


@push('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const previewModal = new bootstrap.Modal(document.getElementById('previewUndanganModal'));
    const previewContent = document.getElementById('undangan-preview-content');

    // Inisialisasi DataTables dengan AJAX
    const table = $('#undanganTable').DataTable({
        pageLength: 5,
        lengthMenu: [5, 10, 25, 50],
        language: {
            lengthMenu: "Show _MENU_ entries",
            zeroRecords: "No data available",
            info: "Showing _START_ to _END_ of _TOTAL_ results",
            infoEmpty: "Showing 0 to 0 of 0 results",
            infoFiltered: "(filtered from _MAX_ total results)",
            search: "Search:"
        },
        ajax: '{{ route('undangan.data') }}', // Panggil rute API yang baru
        columns: [
            {
                "data": null,
                "orderable": false,
                "searchable": false,
                "render": function (data, type, row, meta) {
                    return meta.row + 1;
                }
            },
            {
                "data": null,
                "render": function (data, type, row) {
                    const formattedDate = moment(row.tanggal).format('DD MMMM YYYY');
                    const formattedTime = row.jam.substring(0, 5) + ' WIB';
                    return `<div class="fw-semibold">${formattedDate}</div><small class="text-muted">${formattedTime}</small>`;
                }
            },
            { "data": "kepada" },
            { "data": "pengirim" },
            { "data": "tempat_link" },
            { "data": "agenda" },
            {
                "data": "id",
                "orderable": false,
                "searchable": false,
                "render": function (data) {
                    const editUrl = `{{ url('undangan') }}/${data}/edit`;
                    const deleteUrl = `{{ url('undangan') }}/${data}`;
                    return `
                        <div class="d-flex justify-content-center gap-2">
                            <button type="button" class="btn btn-info btn-sm view-undangan" data-id="${data}" title="Lihat">
                                <i class="bi bi-eye"></i>
                            </button>
                            <a href="${editUrl}" class="btn btn-warning btn-sm" title="Edit">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="${deleteUrl}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    `;
                }
            }
        ]
    });

    // Event listener untuk tombol 'Lihat'
    $('#undanganTable').on('click', '.view-undangan', function() {
        const undanganId = $(this).data('id');
        previewContent.innerHTML = '<div class="text-center text-muted">Memuat konten...</div>';
        fetch(`/undangan/${undanganId}/preview`)
            .then(response => response.text())
            .then(html => {
                previewContent.innerHTML = html;
                previewModal.show();
            })
            .catch(error => {
                previewContent.innerHTML = '<p class="text-danger">Gagal memuat preview undangan.</p>';
            });
    });
});
</script>
@endpush
@endsection --}}

{{--
@extends('layouts.main')

@section('content')
<div class="p-6">
    <div class="bg-white p-6 rounded-2xl shadow">

        <div class="flex justify-between items-center mb-6">
            <h3 class="text-xl font-bold text-gray-800">Daftar Undangan Rapat</h3>
            <a href="{{ route('undangan.create') }}" class="inline-flex items-center px-4 py-2 bg-green-600 text-white text-sm font-medium rounded-lg shadow hover:bg-green-700 transition">
                <i class="fa fa-plus-circle mr-2"></i> Tambah Undangan
            </a>
        </div>

        @if(session('success'))
            <div class="flex items-center p-3 mb-4 text-sm text-green-800 bg-green-100 border border-green-300 rounded-lg">
                <i class="fa fa-check-circle mr-2"></i>{{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="flex items-center p-3 mb-4 text-sm text-red-800 bg-red-100 border border-red-300 rounded-lg">
                <i class="fa fa-exclamation-triangle mr-2"></i>{{ session('error') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table id="undanganTable" class="w-full text-sm text-left text-gray-600 border border-gray-200 rounded-lg">
                <thead class="bg-blue-100 text-gray-700">
                    <tr>
                        <th class="px-4 py-2 text-center w-12">No</th>
                        <th class="px-4 py-2">Waktu Rapat</th>
                        <th class="px-4 py-2">Kepada</th>
                        <th class="px-4 py-2">Pengirim</th>
                        <th class="px-4 py-2">Tempat / Link</th>
                        <th class="px-4 py-2">Agenda</th>
                        <th class="px-4 py-2 text-center w-40">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="previewUndanganModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 items-center justify-center z-50">
    <div class="bg-white rounded-2xl shadow-lg w-full max-w-3xl">
        <div class="flex justify-between items-center bg-blue-600 text-white px-4 py-3 rounded-t-2xl">
            <h5 class="font-semibold">📄 Preview Undangan Rapat</h5>
            <button type="button" class="text-white" onclick="closePreviewModal()">
                <i class="fa fa-times"></i>
            </button>
        </div>
        <div id="undangan-preview-content" class="p-6">
            <div class="text-center text-gray-400">Memuat konten...</div>
        </div>
        <div class="flex justify-end px-4 py-3 bg-gray-50 rounded-b-2xl">
            <button type="button" onclick="closePreviewModal()" class="px-4 py-2 bg-gray-500 text-white text-sm rounded-lg hover:bg-gray-600 transition">
                Tutup
            </button>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const previewModal = document.getElementById('previewUndanganModal');
    const previewContent = document.getElementById('undangan-preview-content');

    function openPreviewModal() {
        previewModal.classList.remove('hidden');
    }
    window.closePreviewModal = function () {
        previewModal.classList.add('hidden');
    }

    const table = $('#undanganTable').DataTable({
        pageLength: 5,
        lengthMenu: [5, 10, 25, 50],
        language: {
            lengthMenu: "Tampilkan _MENU_ data",
            zeroRecords: "Data tidak tersedia",
            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            infoEmpty: "Menampilkan 0 sampai 0 dari 0 data",
            infoFiltered: "(disaring dari _MAX_ total data)",
            search: "Cari:"
        },
        ajax: '{{ route('undangan.data') }}',
        columns: [
            {
                data: null,
                orderable: false,
                searchable: false,
                render: function (data, type, row, meta) {
                    return meta.row + 1;
                }
            },
            {
                data: null,
                render: function (data, type, row) {
                    const formattedDate = moment(row.tanggal).format('DD MMMM YYYY');
                    const formattedTime = row.jam.substring(0, 5) + ' WIB';
                    return `<div class="font-semibold">${formattedDate}</div><div class="text-xs text-gray-500">${formattedTime}</div>`;
                }
            },
            { data: "kepada" },
            { data: "pengirim" },
            { data: "tempat_link" },
            { data: "agenda" },
            {
                data: "id",
                orderable: false,
                searchable: false,
                render: function (data) {
                    const editUrl = `{{ url('undangan') }}/${data}/edit`;
                    const deleteUrl = `{{ url('undangan') }}/${data}`;
                    return `
                        <div class="flex justify-center gap-2">
                            <button type="button" class="px-2 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 view-undangan" data-id="${data}" title="Lihat">
                                <i class="fa fa-eye"></i>
                            </button>
                            <a href="${editUrl}" class="px-2 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600" title="Edit">
                                <i class="fa fa-pencil-alt"></i>
                            </a>
                            <form action="${deleteUrl}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-2 py-1 bg-red-600 text-white rounded hover:bg-red-700" title="Hapus">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    `;
                }
            }
        ]
    });

    $('#undanganTable').on('click', '.view-undangan', function() {
        const undanganId = $(this).data('id');
        previewContent.innerHTML = '<div class="text-center text-gray-400">Memuat konten...</div>';
        fetch(`/undangan/${undanganId}/preview`)
            .then(response => response.text())
            .then(html => {
                previewContent.innerHTML = html;
                openPreviewModal();
            })
            .catch(() => {
                previewContent.innerHTML = '<p class="text-red-500">Gagal memuat preview undangan.</p>';
            });
    });
});
</script>
@endpush --}}

{{--
@extends('layouts.main')

@section('content')
<div class="p-6">
    <div class="bg-white p-6 rounded-2xl shadow">

        <div class="flex justify-between items-center mb-6">
            <h3 class="text-xl font-bold text-gray-800">Daftar Undangan Rapat</h3>
            <a href="{{ route('undangan.create') }}" class="inline-flex items-center px-4 py-2 bg-green-600 text-white text-sm font-medium rounded-lg shadow hover:bg-green-700 transition">
                <i class="fa fa-plus-circle mr-2"></i> Tambah Undangan
            </a>
        </div>

        @if(session('success'))
            <div class="flex items-center p-3 mb-4 text-sm text-green-800 bg-green-100 border border-green-300 rounded-lg">
                <i class="fa fa-check-circle mr-2"></i>{{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="flex items-center p-3 mb-4 text-sm text-red-800 bg-red-100 border border-red-300 rounded-lg">
                <i class="fa fa-exclamation-triangle mr-2"></i>{{ session('error') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table id="undanganTable" class="w-full text-sm text-left text-gray-600 border border-gray-200 rounded-lg">
                <thead class="bg-blue-100 text-gray-700">
                    <tr>
                        <th class="px-4 py-2 text-center w-12">No</th>
                        <th class="px-4 py-2">Waktu Rapat</th>
                        <th class="px-4 py-2">Kepada</th>
                        <th class="px-4 py-2">Pengirim</th>
                        <th class="px-4 py-2">Tempat / Link</th>
                        <th class="px-4 py-2">Agenda</th>
                        <th class="px-4 py-2 text-center w-40">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                </tbody>
            </table>
        </div>
    </div>
</div>


<div id="previewUndanganModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 items-center justify-center z-50">
    <div class="bg-white rounded-2xl shadow-lg w-full max-w-3xl">
        <div class="flex justify-between items-center bg-blue-600 text-white px-4 py-3 rounded-t-2xl">
            <h5 class="font-semibold">📄 Preview Undangan Rapat</h5>
            <button type="button" class="text-white" onclick="closePreviewModal()">
                <i class="fa fa-times"></i>
            </button>
        </div>
        <div id="undangan-preview-content" class="p-6">
            <div class="text-center text-gray-400">Memuat konten...</div>
        </div>
        <div class="flex justify-end px-4 py-3 bg-gray-50 rounded-b-2xl">
            <button type="button" onclick="closePreviewModal()" class="px-4 py-2 bg-gray-500 text-white text-sm rounded-lg hover:bg-gray-600 transition">
                Tutup
            </button>
        </div>
    </div>
</div>
@endsection

@push('js')
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<!-- Moment.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const previewModal = document.getElementById('previewUndanganModal');
    const previewContent = document.getElementById('undangan-preview-content');

    function openPreviewModal() {
        previewModal.classList.remove('hidden');
    }
    window.closePreviewModal = function () {
        previewModal.classList.add('hidden');
    }

    const table = $('#undanganTable').DataTable({
        pageLength: 5,
        lengthMenu: [5, 10, 25, 50],
        language: {
            lengthMenu: "Tampilkan _MENU_ data",
            zeroRecords: "Data tidak tersedia",
            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            infoEmpty: "Menampilkan 0 sampai 0 dari 0 data",
            infoFiltered: "(disaring dari _MAX_ total data)",
            search: "Cari:"
        },
        ajax: '{{ route('undangan.data') }}',
        columns: [
            {
                data: null,
                orderable: false,
                searchable: false,
                render: function (data, type, row, meta) {
                    return meta.row + 1;
                }
            },
            {
                data: null,
                render: function (data, type, row) {
                    const formattedDate = moment(row.tanggal).format('DD MMMM YYYY');
                    const formattedTime = row.jam.substring(0, 5) + ' WIB';
                    return `<div class="font-semibold">${formattedDate}</div><div class="text-xs text-gray-500">${formattedTime}</div>`;
                }
            },
            { data: "kepada" },
            { data: "pengirim" },
            { data: "tempat_link" },
            { data: "agenda" },
            {
                data: "id",
                orderable: false,
                searchable: false,
                render: function (data) {
                    const editUrl = `{{ url('undangan') }}/${data}/edit`;
                    const deleteUrl = `{{ url('undangan') }}/${data}`;
                    return `
                        <div class="flex justify-center gap-2">
                            <button type="button" class="px-2 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 view-undangan" data-id="${data}" title="Lihat">
                                <i class="fa fa-eye"></i>
                            </button>
                            <a href="${editUrl}" class="px-2 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600" title="Edit">
                                <i class="fa fa-pencil-alt"></i>
                            </a>
                            <form action="${deleteUrl}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-2 py-1 bg-red-600 text-white rounded hover:bg-red-700" title="Hapus">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    `;
                }
            }
        ]
    });

    $('#undanganTable').on('click', '.view-undangan', function() {
        const undanganId = $(this).data('id');
        previewContent.innerHTML = '<div class="text-center text-gray-400">Memuat konten...</div>';
        fetch(`/undangan/${undanganId}/preview`)
            .then(response => response.text())
            .then(html => {
                previewContent.innerHTML = html;
                openPreviewModal();
            })
            .catch(() => {
                previewContent.innerHTML = '<p class="text-red-500">Gagal memuat preview undangan.</p>';
            });
    });
});
</script>
@endpush --}}


{{--
@extends('layouts.main')

@section('content')
<div class="p-6">
    <div class="bg-white p-6 rounded-2xl shadow">

        <div class="flex justify-between items-center mb-6">
            <h3 class="text-xl font-bold text-gray-800">Daftar Undangan Rapat</h3>
            <a href="{{ route('undangan.create') }}" class="inline-flex items-center px-4 py-2 bg-green-600 text-white text-sm font-medium rounded-lg shadow hover:bg-green-700 transition">
                <i class="fa fa-plus-circle mr-2"></i> Tambah Undangan
            </a>
        </div>

        @if(session('success'))
            <div class="flex items-center p-3 mb-4 text-sm text-green-800 bg-green-100 border border-green-300 rounded-lg">
                <i class="fa fa-check-circle mr-2"></i>{{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="flex items-center p-3 mb-4 text-sm text-red-800 bg-red-100 border border-red-300 rounded-lg">
                <i class="fa fa-exclamation-triangle mr-2"></i>{{ session('error') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table id="undanganTable" class="w-full text-sm text-left text-gray-600 border border-gray-200 rounded-lg">
                <thead class="bg-blue-600 text-white">
                    <tr>
                        <th class="px-4 py-2 text-center w-12">No</th>
                        <th class="px-4 py-2">Waktu Rapat</th>
                        <th class="px-4 py-2">Kepada</th>
                        <th class="px-4 py-2">Pengirim</th>
                        <th class="px-4 py-2">Tempat / Link</th>
                        <th class="px-4 py-2">Agenda</th>
                        <th class="px-4 py-2 text-center w-40">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y"></tbody>
            </table>
        </div>
    </div>
</div>


<div id="previewUndanganModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-2xl shadow-lg w-full max-w-2xl">
        <div class="flex justify-between items-center bg-blue-600 text-white px-4 py-3 rounded-t-2xl">
            <h5 class="font-semibold">📄 Preview Undangan Rapat</h5>
            <button type="button" class="text-white" onclick="closePreviewModal()">
                <i class="fa fa-times"></i>
            </button>
        </div>
        <div id="undangan-preview-content">
            <div class="text-center text-gray-400">Memuat konten...</div>
        </div>
        <div class="flex justify-end px-4 py-3 bg-gray-50 rounded-b-2xl">
            <button type="button" onclick="closePreviewModal()" class="px-4 py-2 bg-gray-500 text-white text-sm rounded-lg hover:bg-gray-600 transition">
                Tutup
            </button>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const previewModal = document.getElementById('previewUndanganModal');
    const previewContent = document.getElementById('undangan-preview-content');

    function openPreviewModal() {
        previewModal.classList.remove('hidden');
    }
    window.closePreviewModal = function () {
        previewModal.classList.add('hidden');
    }

    // DataTables
    const table = $('#undanganTable').DataTable({
        pageLength: 10,
        lengthMenu: [5, 10, 25, 50],
        language: {
            lengthMenu: "Tampilkan _MENU_ data",
            zeroRecords: "Data tidak tersedia",
            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            infoEmpty: "Menampilkan 0 sampai 0 dari 0 data",
            infoFiltered: "(disaring dari _MAX_ total data)",
            search: "Cari:"
        },
        ajax: '{{ route('undangan.data') }}',
        columns: [
            {
                data: null,
                orderable: false,
                searchable: false,
                render: function (data, type, row, meta) {
                    return meta.row + 1;
                }
            },
            {
                data: null,
                render: function (data, type, row) {
                    const formattedDate = moment(row.tanggal).format('DD MMMM YYYY');
                    const formattedTime = row.jam.substring(0, 5) + ' WIB';
                    return `<div class="font-semibold">${formattedDate}</div><div class="text-xs text-gray-200">${formattedTime}</div>`;
                }
            },
            { data: "kepada" },
            { data: "pengirim" },
            { data: "tempat_link" },
            { data: "agenda" },
            {
                data: "id",
                orderable: false,
                searchable: false,
                render: function (data) {
                    const editUrl = `{{ url('undangan') }}/${data}/edit`;
                    const deleteUrl = `{{ url('undangan') }}/${data}`;
                    return `
                        <div class="flex justify-center gap-2">
                            <button type="button" class="px-2 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 view-undangan" data-id="${data}" title="Lihat">
                                <i class="fa fa-eye"></i>
                            </button>
                            <a href="${editUrl}" class="px-2 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600" title="Edit">
                                <i class="fa fa-pencil-alt"></i>
                            </a>
                            <form action="${deleteUrl}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-2 py-1 bg-red-600 text-white rounded hover:bg-red-700" title="Hapus">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    `;
                }
            }
        ]
    });

    // Event Preview
    $('#undanganTable').on('click', '.view-undangan', function() {
        const undanganId = $(this).data('id');
        previewContent.innerHTML = '<div class="text-center text-gray-400">Memuat konten...</div>';
        fetch(`/undangan/${undanganId}/preview`)
            .then(response => response.text())
            .then(html => {
                previewContent.innerHTML = html;
                openPreviewModal();
            })
            .catch(() => {
                previewContent.innerHTML = '<p class="text-red-500">Gagal memuat preview undangan.</p>';
            });
    });
});
</script>
@endpush --}}

{{--
@extends('layouts.main')

@section('content')
<div class="p-6">
    <div class="bg-white p-6 rounded-2xl shadow">

        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-3 mb-6">
            <h3 class="text-xl font-bold text-gray-800">Daftar Undangan Rapat</h3>
            <a href="{{ route('undangan.create') }}" class="inline-flex items-center px-4 py-2 bg-green-600 text-white text-sm font-medium rounded-lg shadow hover:bg-green-700 transition">
                <i class="fa fa-plus-circle mr-2"></i> Tambah Undangan
            </a>
        </div>


        @if(session('success'))
            <div class="flex items-center p-3 mb-4 text-sm text-green-800 bg-green-100 border border-green-300 rounded-lg">
                <i class="fa fa-check-circle mr-2"></i>{{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="flex items-center p-3 mb-4 text-sm text-red-800 bg-red-100 border border-red-300 rounded-lg">
                <i class="fa fa-exclamation-triangle mr-2"></i>{{ session('error') }}
            </div>
        @endif


        <div id="undanganTable_wrapper">
            <div class="flex flex-col md:flex-row justify-between items-center gap-3 mb-4">
                <div class="flex items-center gap-2" id="undanganTable_length">
                    <label for="per_page" class="text-sm text-gray-800">Show</label>
                    <select name="per_page" id="per_page" class="text-sm border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        <option value="5">5</option>
                        <option value="10" selected>10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                    </select>
                    <label class="text-sm text-gray-800">entries</label>
                </div>

                <div class="flex w-full md:w-auto">
                    <input type="text" id="undanganTable_search" placeholder="Cari..." class="flex-grow md:flex-none border-gray-300 rounded-l-lg text-sm px-3 py-2">
                    <button type="button" class="px-3 py-2 border border-gray-300 rounded-r-lg bg-gray-50 hover:bg-gray-100">
                        <i class="fa fa-search text-gray-600"></i>
                    </button>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table id="undanganTable" class="w-full text-sm text-left text-gray-600 border border-gray-200 rounded-lg">
                    <thead class="bg-blue-600 text-white">
                        <tr>
                            <th class="px-4 py-2 text-center w-12">No</th>
                            <th class="px-4 py-2">Waktu Rapat</th>
                            <th class="px-4 py-2">Kepada</th>
                            <th class="px-4 py-2">Pengirim</th>
                            <th class="px-4 py-2">Tempat / Link</th>
                            <th class="px-4 py-2">Agenda</th>
                            <th class="px-4 py-2 text-center w-40">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y"></tbody>
                </table>
            </div>

            <div class="mt-4 flex justify-between items-center" id="undanganTable_paginate">
                <div class="text-sm text-gray-700" id="undanganTable_info"></div>
                <div class="flex" id="custom-pagination-controls">
                    <button type="button" id="prevPage" class="px-3 py-1 text-gray-600 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100">Previous</button>
                    <div id="pageNumbers" class="flex"></div>
                    <button type="button" id="nextPage" class="px-3 py-1 text-gray-600 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100">Next</button>
                </div>
            </div>
        </div>
    </div>
</div>


<div id="previewUndanganModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-2xl shadow-lg w-full max-w-2xl">
        <div class="flex justify-between items-center bg-blue-600 text-white px-4 py-3 rounded-t-2xl">
            <h5 class="font-semibold">📄 Preview Undangan Rapat</h5>
            <button type="button" class="text-white" onclick="closePreviewModal()">
                <i class="fa fa-times"></i>
            </button>
        </div>
        <div id="undangan-preview-content">
            <div class="text-center text-gray-400">Memuat konten...</div>
        </div>
        <div class="flex justify-end px-4 py-3 bg-gray-50 rounded-b-2xl">
            <button type="button" onclick="closePreviewModal()" class="px-4 py-2 bg-gray-500 text-white text-sm rounded-lg hover:bg-gray-600 transition">
                Tutup
            </button>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const previewModal = document.getElementById('previewUndanganModal');
        const previewContent = document.getElementById('undangan-preview-content');
        const tableBody = document.querySelector('#undanganTable tbody');
        const perPageSelect = document.getElementById('per_page');
        const searchInput = document.getElementById('undanganTable_search');
        const paginationInfo = document.getElementById('undanganTable_info');
        const prevPageBtn = document.getElementById('prevPage');
        const nextPageBtn = document.getElementById('nextPage');
        const pageNumbersContainer = document.getElementById('pageNumbers');

        let data = [];
        let currentPage = 1;
        let perPage = parseInt(perPageSelect.value);

        function openPreviewModal() {
            previewModal.classList.remove('hidden');
        }

        window.closePreviewModal = function () {
            previewModal.classList.add('hidden');
        }

        function renderTable() {
            const start = (currentPage - 1) * perPage;
            const end = start + perPage;
            const paginatedData = data.slice(start, end);

            tableBody.innerHTML = '';
            if (paginatedData.length === 0) {
                tableBody.innerHTML = `<tr><td colspan="7" class="text-center py-4">Data tidak tersedia</td></tr>`;
                paginationInfo.textContent = 'Showing 0 to 0 of 0 results';
                pageNumbersContainer.innerHTML = '';
                prevPageBtn.disabled = true;
                nextPageBtn.disabled = true;
                return;
            }

            paginatedData.forEach((row, index) => {
                const formattedDate = moment(row.tanggal).format('DD MMMM YYYY');
                const formattedTime = row.jam.substring(0, 5) + ' WIB';

                const editUrl = `{{ url('undangan') }}/${row.id}/edit`;
                const deleteUrl = `{{ url('undangan') }}/${row.id}`;

                tableBody.innerHTML += `
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-4 py-2 text-center">${start + index + 1}</td>
                        <td class="px-4 py-2">
                            <div class="font-semibold">${formattedDate}</div>
                            <div class="text-xs text-gray-500">${formattedTime}</div>
                        </td>
                        <td class="px-4 py-2">${row.kepada}</td>
                        <td class="px-4 py-2">${row.pengirim}</td>
                        <td class="px-4 py-2">${row.tempat_link}</td>
                        <td class="px-4 py-2">${row.agenda}</td>
                        <td class="px-4 py-2 text-center">
                            <div class="flex justify-center gap-2">
                                <button type="button" class="p-2 text-blue-600 hover:bg-blue-100 rounded-full view-undangan" data-id="${row.id}" title="Lihat">
                                    <i class="fa fa-eye"></i>
                                </button>
                                <a href="${editUrl}" class="p-2 text-yellow-600 hover:bg-yellow-100 rounded-full" title="Edit">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                                <form action="${deleteUrl}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 text-red-600 hover:bg-red-100 rounded-full" title="Hapus">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                `;
            });

            const totalPages = Math.ceil(data.length / perPage);
            paginationInfo.textContent = `Showing ${start + 1} to ${Math.min(end, data.length)} of ${data.length} results`;

            renderPagination(totalPages);
        }

        function renderPagination(totalPages) {
            pageNumbersContainer.innerHTML = '';

            prevPageBtn.disabled = currentPage === 1;
            nextPageBtn.disabled = currentPage === totalPages;

            for (let i = 1; i <= totalPages; i++) {
                const button = document.createElement('button');
                button.textContent = i;
                button.classList.add('px-3', 'py-1', 'text-sm', 'border', 'border-gray-300', 'hover:bg-gray-100', 'font-medium');
                if (i === currentPage) {
                    button.classList.add('bg-blue-600', 'text-white', 'border-blue-600');
                    button.classList.remove('bg-white', 'text-gray-600', 'hover:bg-gray-100');
                } else {
                    button.classList.add('bg-white', 'text-gray-600');
                }
                button.addEventListener('click', () => {
                    currentPage = i;
                    renderTable();
                });
                pageNumbersContainer.appendChild(button);
            }

            // Apply specific rounding to first and last number
            pageNumbersContainer.firstElementChild.classList.add('rounded-l-lg');
            pageNumbersContainer.lastElementChild.classList.add('rounded-r-lg');
        }

        function filterData() {
            const searchTerm = searchInput.value.toLowerCase();
            const filteredData = data.filter(item => {
                return Object.values(item).some(value =>
                    String(value).toLowerCase().includes(searchTerm)
                );
            });
            return filteredData;
        }

        // Fetch data initially
        fetch('{{ route('undangan.data') }}')
            .then(response => response.json())
            .then(responseData => {
                data = responseData.data;
                renderTable();
            })
            .catch(error => {
                console.error('Error fetching data:', error);
                tableBody.innerHTML = `<tr><td colspan="7" class="text-center py-4 text-red-500">Gagal memuat data.</td></tr>`;
            });

        // Event Listeners
        perPageSelect.addEventListener('change', (e) => {
            perPage = parseInt(e.target.value);
            currentPage = 1;
            renderTable();
        });

        searchInput.addEventListener('keyup', () => {
            const filteredData = filterData();
            data = filteredData;
            currentPage = 1;
            renderTable();
        });

        prevPageBtn.addEventListener('click', () => {
            if (currentPage > 1) {
                currentPage--;
                renderTable();
            }
        });

        nextPageBtn.addEventListener('click', () => {
            const totalPages = Math.ceil(data.length / perPage);
            if (currentPage < totalPages) {
                currentPage++;
                renderTable();
            }
        });

        // Event for Preview Modal
        document.querySelector('#undanganTable tbody').addEventListener('click', function(e) {
            const button = e.target.closest('.view-undangan');
            if (button) {
                const undanganId = button.dataset.id;
                previewContent.innerHTML = '<div class="text-center text-gray-400">Memuat konten...</div>';
                fetch(`/undangan/${undanganId}/preview`)
                    .then(response => response.text())
                    .then(html => {
                        previewContent.innerHTML = html;
                        openPreviewModal();
                    })
                    .catch(() => {
                        previewContent.innerHTML = '<p class="text-red-500">Gagal memuat preview undangan.</p>';
                    });
            }
        });

    });
</script>
@endpush --}}

{{--
@extends('layouts.main')

@section('content')
<div class="p-6">
    <div class="bg-white p-6 rounded-2xl shadow">

        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-3 mb-6">
            <h3 class="text-xl font-bold text-gray-800">Daftar Undangan Rapat</h3>
            <a href="{{ route('undangan.create') }}" class="inline-flex items-center px-4 py-2 bg-green-600 text-white text-sm font-medium rounded-lg shadow hover:bg-green-700 transition">
                <i class="fa fa-plus-circle mr-2"></i> Tambah Undangan
            </a>
        </div>

        @if(session('success'))
            <div class="flex items-center p-3 mb-4 text-sm text-green-800 bg-green-100 border border-green-300 rounded-lg">
                <i class="fa fa-check-circle mr-2"></i>{{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="flex items-center p-3 mb-4 text-sm text-red-800 bg-red-100 border border-red-300 rounded-lg">
                <i class="fa fa-exclamation-triangle mr-2"></i>{{ session('error') }}
            </div>
        @endif

        <div id="undanganTable_wrapper">
            <div class="flex flex-col md:flex-row justify-between items-center gap-3 mb-4">
                <div class="flex items-center gap-2" id="undanganTable_length">
                    <label for="per_page" class="text-sm text-gray-800">Show</label>
                    <select name="per_page" id="per_page" class="text-sm border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        <option value="5">5</option>
                        <option value="10" selected>10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                    </select>
                    <label class="text-sm text-gray-800">entries</label>
                </div>

                <div class="flex w-full md:w-auto">
                    <input type="text" id="undanganTable_search" placeholder="Cari..." class="flex-grow md:flex-none border-gray-300 rounded-l-lg text-sm px-3 py-2">
                    <button type="button" class="px-3 py-2 border border-gray-300 rounded-r-lg bg-gray-50 hover:bg-gray-100">
                        <i class="fa fa-search text-gray-600"></i>
                    </button>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table id="undanganTable" class="w-full text-sm text-left text-gray-600 border border-gray-200 rounded-lg">
                    <thead class="bg-blue-600 text-white">
                        <tr>
                            <th class="px-4 py-2 text-center w-12">No</th>
                            <th class="px-4 py-2">Waktu Rapat</th>
                            <th class="px-4 py-2">Kepada</th>
                            <th class="px-4 py-2">Pengirim</th>
                            <th class="px-4 py-2">Tempat / Link</th>
                            <th class="px-4 py-2">Agenda</th>
                            <th class="px-4 py-2 text-center w-40">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y"></tbody>
                </table>
            </div>

            <div class="mt-4 flex justify-between items-center" id="undanganTable_paginate">
                <div class="text-sm text-gray-700" id="undanganTable_info"></div>
                <div class="flex items-center gap-1" id="custom-pagination-controls">
                    <button type="button" id="firstPage" class="px-3 py-1 text-gray-600 bg-white border border-gray-300 rounded hover:bg-gray-100">«</button>
                    <button type="button" id="prevPage" class="px-3 py-1 text-gray-600 bg-white border border-gray-300 rounded hover:bg-gray-100">‹</button>
                    <div id="pageNumbers" class="flex"></div>
                    <button type="button" id="nextPage" class="px-3 py-1 text-gray-600 bg-white border border-gray-300 rounded hover:bg-gray-100">›</button>
                    <button type="button" id="lastPage" class="px-3 py-1 text-gray-600 bg-white border border-gray-300 rounded hover:bg-gray-100">»</button>
                </div>
            </div>
        </div>
    </div>
</div>


<div id="previewUndanganModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-2xl shadow-lg w-full max-w-2xl">
        <div class="flex justify-between items-center bg-blue-600 text-white px-4 py-3 rounded-t-2xl">
            <h5 class="font-semibold">📄 Preview Undangan Rapat</h5>
            <button type="button" class="text-white" onclick="closePreviewModal()">
                <i class="fa fa-times"></i>
            </button>
        </div>
        <div id="undangan-preview-content">
            <div class="text-center text-gray-400">Memuat konten...</div>
        </div>
        <div class="flex justify-end px-4 py-3 bg-gray-50 rounded-b-2xl">
            <button type="button" onclick="closePreviewModal()" class="px-4 py-2 bg-gray-500 text-white text-sm rounded-lg hover:bg-gray-600 transition">
                Tutup
            </button>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const previewModal = document.getElementById('previewUndanganModal');
        const previewContent = document.getElementById('undangan-preview-content');
        const tableBody = document.querySelector('#undanganTable tbody');
        const perPageSelect = document.getElementById('per_page');
        const searchInput = document.getElementById('undanganTable_search');
        const paginationInfo = document.getElementById('undanganTable_info');
        const firstPageBtn = document.getElementById('firstPage');
        const prevPageBtn = document.getElementById('prevPage');
        const nextPageBtn = document.getElementById('nextPage');
        const lastPageBtn = document.getElementById('lastPage');
        const pageNumbersContainer = document.getElementById('pageNumbers');

        let originalData = [];
        let filteredData = [];
        let currentPage = 1;
        let perPage = parseInt(perPageSelect.value);

        function openPreviewModal() {
            previewModal.classList.remove('hidden');
        }
        window.closePreviewModal = function () {
            previewModal.classList.add('hidden');
        }

        function renderTable() {
            const start = (currentPage - 1) * perPage;
            const end = start + perPage;
            const paginatedData = filteredData.slice(start, end);

            tableBody.innerHTML = '';
            if (paginatedData.length === 0) {
                tableBody.innerHTML = `<tr><td colspan="7" class="text-center py-4">Data tidak tersedia</td></tr>`;
                paginationInfo.textContent = 'Showing 0 to 0 of 0 results';
                pageNumbersContainer.innerHTML = '';
                disableNavButtons();
                return;
            }

            paginatedData.forEach((row, index) => {
                const formattedDate = moment(row.tanggal).format('DD MMMM YYYY');
                const formattedTime = row.jam.substring(0, 5) + ' WIB';

                const editUrl = `{{ url('undangan') }}/${row.id}/edit`;
                const deleteUrl = `{{ url('undangan') }}/${row.id}`;

                tableBody.innerHTML += `
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-4 py-2 text-center">${start + index + 1}</td>
                        <td class="px-4 py-2">
                            <div class="font-semibold">${formattedDate}</div>
                            <div class="text-xs text-gray-500">${formattedTime}</div>
                        </td>
                        <td class="px-4 py-2">${row.kepada}</td>
                        <td class="px-4 py-2">${row.pengirim}</td>
                        <td class="px-4 py-2">${row.tempat_link}</td>
                        <td class="px-4 py-2">${row.agenda}</td>
                        <td class="px-4 py-2 text-center">
                            <div class="flex justify-center gap-2">
                                <button type="button" class="p-2 text-blue-600 hover:bg-blue-100 rounded-full view-undangan" data-id="${row.id}" title="Lihat">
                                    <i class="fa fa-eye"></i>
                                </button>
                                <a href="${editUrl}" class="p-2 text-yellow-600 hover:bg-yellow-100 rounded-full" title="Edit">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                                <form action="${deleteUrl}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 text-red-600 hover:bg-red-100 rounded-full" title="Hapus">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                `;
            });

            const totalPages = Math.ceil(filteredData.length / perPage);
            paginationInfo.textContent = `Showing ${start + 1} to ${Math.min(end, filteredData.length)} of ${filteredData.length} results`;

            renderPagination(totalPages);
        }

        function renderPagination(totalPages) {
            pageNumbersContainer.innerHTML = '';
            disableNavButtons();

            for (let i = 1; i <= totalPages; i++) {
                const button = document.createElement('button');
                button.textContent = i;
                button.classList.add('px-3', 'py-1', 'text-sm', 'border', 'border-gray-300', 'hover:bg-gray-100', 'font-medium');
                if (i === currentPage) {
                    button.classList.add('bg-blue-600', 'text-white', 'border-blue-600');
                } else {
                    button.classList.add('bg-white', 'text-gray-600');
                }
                button.addEventListener('click', () => {
                    currentPage = i;
                    renderTable();
                });
                pageNumbersContainer.appendChild(button);
            }
        }

        function disableNavButtons() {
            const totalPages = Math.ceil(filteredData.length / perPage);
            firstPageBtn.disabled = currentPage === 1;
            prevPageBtn.disabled = currentPage === 1;
            nextPageBtn.disabled = currentPage === totalPages || totalPages === 0;
            lastPageBtn.disabled = currentPage === totalPages || totalPages === 0;
        }

        function applySearch() {
            const searchTerm = searchInput.value.toLowerCase();
            filteredData = originalData.filter(item => {
                return Object.values(item).some(value =>
                    String(value).toLowerCase().includes(searchTerm)
                );
            });
            currentPage = 1;
            renderTable();
        }

        // Fetch data initially
        fetch('{{ route('undangan.data') }}')
            .then(response => response.json())
            .then(responseData => {
                originalData = responseData.data;
                filteredData = [...originalData];
                renderTable();
            })
            .catch(error => {
                console.error('Error fetching data:', error);
                tableBody.innerHTML = `<tr><td colspan="7" class="text-center py-4 text-red-500">Gagal memuat data.</td></tr>`;
            });

        // Event Listeners
        perPageSelect.addEventListener('change', (e) => {
            perPage = parseInt(e.target.value);
            currentPage = 1;
            renderTable();
        });
        searchInput.addEventListener('keyup', applySearch);

        firstPageBtn.addEventListener('click', () => { currentPage = 1; renderTable(); });
        prevPageBtn.addEventListener('click', () => { if (currentPage > 1) { currentPage--; renderTable(); } });
        nextPageBtn.addEventListener('click', () => { const totalPages = Math.ceil(filteredData.length / perPage); if (currentPage < totalPages) { currentPage++; renderTable(); } });
        lastPageBtn.addEventListener('click', () => { currentPage = Math.ceil(filteredData.length / perPage); renderTable(); });

        // Preview Modal
        document.querySelector('#undanganTable tbody').addEventListener('click', function(e) {
            const button = e.target.closest('.view-undangan');
            if (button) {
                const undanganId = button.dataset.id;
                previewContent.innerHTML = '<div class="text-center text-gray-400">Memuat konten...</div>';
                fetch(`/undangan/${undanganId}/preview`)
                    .then(response => response.text())
                    .then(html => {
                        previewContent.innerHTML = html;
                        openPreviewModal();
                    })
                    .catch(() => {
                        previewContent.innerHTML = '<p class="text-red-500">Gagal memuat preview undangan.</p>';
                    });
            }
        });
    });
</script>
@endpush --}}

{{--
@extends('layouts.main')

@section('content')
<div class="p-6">
    <div class="bg-white p-6 rounded-2xl shadow">

        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-3 mb-6">
            <h3 class="text-xl font-bold text-gray-800">Daftar Undangan Rapat</h3>
            <a href="{{ route('undangan.create') }}" class="inline-flex items-center px-4 py-2 bg-green-600 text-white text-sm font-medium rounded-lg shadow hover:bg-green-700 transition">
                <i class="fa fa-plus-circle mr-2"></i> Tambah Undangan
            </a>
        </div>

        @if(session('success'))
        <div class="flex items-center p-3 mb-4 text-sm text-green-800 bg-green-100 border border-green-300 rounded-lg">
            <i class="fa fa-check-circle mr-2"></i>{{ session('success') }}
        </div>
        @endif
        @if(session('error'))
        <div class="flex items-center p-3 mb-4 text-sm text-red-800 bg-red-100 border border-red-300 rounded-lg">
            <i class="fa fa-exclamation-triangle mr-2"></i>{{ session('error') }}
        </div>
        @endif

        <div class="flex flex-col md:flex-row justify-between items-center gap-3 mb-4">
            <div class="flex items-center gap-2">
                <label for="per_page" class="text-sm text-gray-800">Tampilkan</label>
                <select name="per_page" id="per_page" class="text-sm border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option value="5">5</option>
                    <option value="10" selected>10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                </select>
                <label class="text-sm text-gray-800">data</label>
            </div>

            <div class="flex w-full md:w-auto">
                <input type="text" id="undanganTable_search" placeholder="Cari..." class="flex-grow md:flex-none border-gray-300 rounded-l-lg text-sm px-3 py-2">
                <button type="button" class="px-3 py-2 border border-gray-300 rounded-r-lg bg-gray-50 hover:bg-gray-100">
                    <i class="fa fa-search text-gray-600"></i>
                </button>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table id="undanganTable" class="w-full text-sm text-left text-gray-600 border border-gray-200 rounded-lg">
                <thead class="bg-blue-600 text-white">
                    <tr>
                        <th class="px-4 py-2 text-center w-12 border-b border-r border-gray-300">No</th>
                        <th class="px-4 py-2 border-b border-r border-gray-300">Waktu Rapat</th>
                        <th class="px-4 py-2 border-b border-r border-gray-300">Kepada</th>
                        <th class="px-4 py-2 border-b border-r border-gray-300">Pengirim</th>
                        <th class="px-4 py-2 border-b border-r border-gray-300">Tempat / Link</th>
                        <th class="px-4 py-2 border-b border-r border-gray-300">Agenda</th>
                        <th class="px-4 py-2 text-center w-40 border-b border-gray-300">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200"></tbody>
            </table>
        </div>

        <div class="mt-4 flex flex-col md:flex-row justify-between items-center gap-2">
            <div class="text-sm text-gray-700" id="undanganTable_info"></div>
            <div class="flex items-center space-x-1" id="custom-pagination-controls">
                <button type="button" id="firstPageBtn" class="px-3 py-1 text-gray-600 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 disabled:bg-gray-200 disabled:text-gray-400">«</button>
                <button type="button" id="prevPageBtn" class="px-3 py-1 text-gray-600 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 disabled:bg-gray-200 disabled:text-gray-400">‹</button>
                <div id="pageNumbers" class="flex items-center space-x-1"></div>
                <button type="button" id="nextPageBtn" class="px-3 py-1 text-gray-600 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 disabled:bg-gray-200 disabled:text-gray-400">›</button>
                <button type="button" id="lastPageBtn" class="px-3 py-1 text-gray-600 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 disabled:bg-gray-200 disabled:text-gray-400">»</button>
            </div>
        </div>
    </div>
</div>

<div id="previewUndanganModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-2xl shadow-lg w-full max-w-2xl">
        <div class="flex justify-between items-center bg-blue-600 text-white px-4 py-3 rounded-t-2xl">
            <h5 class="font-semibold">📄 Preview Undangan Rapat</h5>
            <button type="button" class="text-white" onclick="closePreviewModal()">
                <i class="fa fa-times"></i>
            </button>
        </div>
        <div id="undangan-preview-content">
            <div class="p-6 text-center text-gray-400">Memuat konten...</div>
        </div>
        <div class="flex justify-end px-4 py-3 bg-gray-50 rounded-b-2xl">
            <button type="button" onclick="closePreviewModal()" class="px-4 py-2 bg-gray-500 text-white text-sm rounded-lg hover:bg-gray-600 transition">
                Tutup
            </button>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const previewModal = document.getElementById('previewUndanganModal');
        const previewContent = document.getElementById('undangan-preview-content');
        const tableBody = document.querySelector('#undanganTable tbody');
        const perPageSelect = document.getElementById('per_page');
        const searchInput = document.getElementById('undanganTable_search');
        const paginationInfo = document.getElementById('undanganTable_info');
        const firstPageBtn = document.getElementById('firstPageBtn');
        const prevPageBtn = document.getElementById('prevPageBtn');
        const nextPageBtn = document.getElementById('nextPageBtn');
        const lastPageBtn = document.getElementById('lastPageBtn');
        const pageNumbersContainer = document.getElementById('pageNumbers');

        let data = [];
        let currentPage = 1;
        let perPage = parseInt(perPageSelect.value);

        function openPreviewModal() {
            previewModal.classList.remove('hidden');
        }

        window.closePreviewModal = function () {
            previewModal.classList.add('hidden');
        }

        function renderTable() {
            const start = (currentPage - 1) * perPage;
            const end = start + perPage;
            const paginatedData = data.slice(start, end);

            tableBody.innerHTML = '';
            if (paginatedData.length === 0) {
                tableBody.innerHTML = `<tr><td colspan="7" class="text-center py-4 border-t border-gray-200">Data tidak tersedia</td></tr>`;
                paginationInfo.textContent = 'Menampilkan 0 sampai 0 dari 0 data';
                pageNumbersContainer.innerHTML = '';
                firstPageBtn.disabled = true;
                prevPageBtn.disabled = true;
                nextPageBtn.disabled = true;
                lastPageBtn.disabled = true;
                return;
            }

            paginatedData.forEach((row, index) => {
                const formattedDate = moment(row.tanggal).format('DD MMMM YYYY');
                const formattedTime = row.jam.substring(0, 5) + ' WIB';

                const editUrl = `{{ url('undangan') }}/${row.id}/edit`;
                const deleteUrl = `{{ url('undangan') }}/${row.id}`;

                tableBody.innerHTML += `
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 text-center border-r border-gray-200">${start + index + 1}</td>
                        <td class="px-4 py-2 border-r border-gray-200">
                            <div class="font-semibold">${formattedDate}</div>
                            <div class="text-xs text-gray-500">${formattedTime}</div>
                        </td>
                        <td class="px-4 py-2 border-r border-gray-200">${row.kepada}</td>
                        <td class="px-4 py-2 border-r border-gray-200">${row.pengirim}</td>
                        <td class="px-4 py-2 border-r border-gray-200">${row.tempat_link}</td>
                        <td class="px-4 py-2 border-r border-gray-200">${row.agenda}</td>
                        <td class="px-4 py-2 text-center">
                            <div class="flex justify-center gap-2">
                                <button type="button" class="p-2 text-blue-600 hover:bg-blue-100 rounded-full view-undangan" data-id="${row.id}" title="Lihat">
                                    <i class="fa fa-eye"></i>
                                </button>
                                <a href="${editUrl}" class="p-2 text-yellow-600 hover:bg-yellow-100 rounded-full" title="Edit">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                                <form action="${deleteUrl}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 text-red-600 hover:bg-red-100 rounded-full" title="Hapus">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                `;
            });

            const totalPages = Math.ceil(data.length / perPage);
            paginationInfo.textContent = `Menampilkan ${start + 1} sampai ${Math.min(end, data.length)} dari ${data.length} data`;
            renderPagination(totalPages);
        }

        function renderPagination(totalPages) {
            pageNumbersContainer.innerHTML = '';

            firstPageBtn.disabled = currentPage === 1;
            prevPageBtn.disabled = currentPage === 1;
            nextPageBtn.disabled = currentPage === totalPages;
            lastPageBtn.disabled = currentPage === totalPages;

            const maxPagesToShow = 3;
            let startPage = Math.max(1, currentPage - 1);
            let endPage = Math.min(totalPages, startPage + maxPagesToShow - 1);

            if (endPage - startPage + 1 < maxPagesToShow) {
                startPage = Math.max(1, endPage - maxPagesToShow + 1);
            }

            for (let i = startPage; i <= endPage; i++) {
                const button = document.createElement('button');
                button.textContent = i;
                button.classList.add('px-3', 'py-1', 'text-sm', 'border', 'border-gray-300', 'hover:bg-gray-100', 'font-medium', 'rounded-lg');
                if (i === currentPage) {
                    button.classList.add('bg-blue-600', 'text-white', 'border-blue-600');
                    button.classList.remove('bg-white', 'text-gray-600', 'hover:bg-gray-100');
                } else {
                    button.classList.add('bg-white', 'text-gray-600');
                }
                button.addEventListener('click', () => {
                    currentPage = i;
                    renderTable();
                });
                pageNumbersContainer.appendChild(button);
            }
        }

        function filterData() {
            const searchTerm = searchInput.value.toLowerCase();
            if (searchTerm === '') {
                return originalData;
            }
            return originalData.filter(item => {
                return Object.values(item).some(value =>
                    String(value).toLowerCase().includes(searchTerm)
                );
            });
        }

        let originalData = [];
        fetch('{{ route('undangan.data') }}')
            .then(response => response.json())
            .then(responseData => {
                originalData = responseData.data;
                data = [...originalData];
                renderTable();
            })
            .catch(error => {
                console.error('Error fetching data:', error);
                tableBody.innerHTML = `<tr><td colspan="7" class="text-center py-4 text-red-500">Gagal memuat data.</td></tr>`;
            });

        perPageSelect.addEventListener('change', (e) => {
            perPage = parseInt(e.target.value);
            currentPage = 1;
            renderTable();
        });

        searchInput.addEventListener('input', () => {
            data = filterData();
            currentPage = 1;
            renderTable();
        });

        firstPageBtn.addEventListener('click', () => {
            if (currentPage !== 1) {
                currentPage = 1;
                renderTable();
            }
        });

        prevPageBtn.addEventListener('click', () => {
            if (currentPage > 1) {
                currentPage--;
                renderTable();
            }
        });

        nextPageBtn.addEventListener('click', () => {
            const totalPages = Math.ceil(data.length / perPage);
            if (currentPage < totalPages) {
                currentPage++;
                renderTable();
            }
        });

        lastPageBtn.addEventListener('click', () => {
            const totalPages = Math.ceil(data.length / perPage);
            if (currentPage !== totalPages) {
                currentPage = totalPages;
                renderTable();
            }
        });

        document.querySelector('#undanganTable tbody').addEventListener('click', function(e) {
            const button = e.target.closest('.view-undangan');
            if (button) {
                const undanganId = button.dataset.id;
                previewContent.innerHTML = '<div class="p-6 text-center text-gray-400">Memuat konten...</div>';
                fetch(`/undangan/${undanganId}/preview`)
                    .then(response => response.text())
                    .then(html => {
                        previewContent.innerHTML = html;
                        openPreviewModal();
                    })
                    .catch(() => {
                        previewContent.innerHTML = '<p class="p-6 text-red-500">Gagal memuat preview undangan.</p>';
                    });
            }
        });
    });
</script>
@endpush --}}


@extends('layouts.main')

@section('content')
<div class="p-6">
    <div class="bg-white p-6 rounded-2xl shadow">

        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-3 mb-6">
            <h3 class="text-xl font-bold text-gray-800">Daftar Undangan Rapat</h3>
            <a href="{{ route('undangan.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg shadow hover:bg-blue-700 transition">
                <i class="fa fa-plus-circle mr-2"></i> Tambah Undangan
            </a>
        </div>

        @if(session('success'))
            <div class="flex items-center p-3 mb-4 text-sm text-green-800 bg-green-100 border border-green-300 rounded-lg">
                <i class="fa fa-check-circle mr-2"></i>{{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="flex items-center p-3 mb-4 text-sm text-red-800 bg-red-100 border border-red-300 rounded-lg">
                <i class="fa fa-exclamation-triangle mr-2"></i>{{ session('error') }}
            </div>
        @endif

        <div id="undanganTable_wrapper">
            <div class="flex flex-col md:flex-row justify-between items-center gap-3 mb-4">
                <div class="flex items-center gap-2" id="undanganTable_length">
                    <label for="per_page" class="text-sm text-gray-800">Show</label>
                    <select name="per_page" id="per_page" class="text-sm border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        <option value="5">5</option>
                        <option value="10" selected>10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                    </select>
                    <label class="text-sm text-gray-800">entries</label>
                </div>

                <div class="flex w-full md:w-auto">
                    <input type="text" id="undanganTable_search" placeholder="Cari..." class="flex-grow md:flex-none border-gray-300 rounded-l-lg text-sm px-3 py-2">
                    <button type="button" class="px-3 py-2 border border-gray-300 rounded-r-lg bg-gray-50 hover:bg-gray-100">
                        <i class="fa fa-search text-gray-600"></i>
                    </button>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table id="undanganTable" class="w-full text-sm text-left text-gray-600 border border-gray-300 border-collapse">
                    <thead class="bg-blue-600 text-white">
                        <tr>
                            <th class="px-4 py-2 text-center w-12 border border-gray-300">No</th>
                            <th class="px-4 py-2 border border-gray-300">Waktu Rapat</th>
                            <th class="px-4 py-2 border border-gray-300">Kepada</th>
                            <th class="px-4 py-2 border border-gray-300">Pengirim</th>
                            <th class="px-4 py-2 border border-gray-300">Tempat / Link</th>
                            <th class="px-4 py-2 border border-gray-300">Agenda</th>
                            <th class="px-4 py-2 text-center w-40 border border-gray-300">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y"></tbody>
                </table>
            </div>

            <div class="mt-4 flex justify-between items-center" id="undanganTable_paginate">
                <div class="text-sm text-gray-700" id="undanganTable_info"></div>
                <div class="flex items-center gap-1" id="custom-pagination-controls">
                    <button type="button" id="firstPage" class="px-3 py-1 text-gray-600 bg-white border border-gray-300 rounded hover:bg-gray-100">«</button>
                    <button type="button" id="prevPage" class="px-3 py-1 text-gray-600 bg-white border border-gray-300 rounded hover:bg-gray-100">‹</button>
                    <div id="pageNumbers" class="flex"></div>
                    <button type="button" id="nextPage" class="px-3 py-1 text-gray-600 bg-white border border-gray-300 rounded hover:bg-gray-100">›</button>
                    <button type="button" id="lastPage" class="px-3 py-1 text-gray-600 bg-white border border-gray-300 rounded hover:bg-gray-100">»</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="previewUndanganModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-2xl shadow-lg w-full max-w-2xl">
        <div class="flex justify-between items-center bg-blue-600 text-white px-4 py-3 rounded-t-2xl">
            <h5 class="font-semibold">Preview Undangan Rapat</h5>
            <button type="button" class="text-white" onclick="closePreviewModal()">
                <i class="fa fa-times"></i>
            </button>
        </div>
        <div id="undangan-preview-content">
            <div class="text-center text-gray-400">Memuat konten...</div>
        </div>
        <div class="flex justify-end px-4 py-3 bg-gray-50 rounded-b-2xl">
            <button type="button" onclick="closePreviewModal()" class="px-4 py-2 bg-gray-500 text-white text-sm rounded-lg hover:bg-gray-600 transition">
                Tutup
            </button>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const previewModal = document.getElementById('previewUndanganModal');
        const previewContent = document.getElementById('undangan-preview-content');
        const tableBody = document.querySelector('#undanganTable tbody');
        const perPageSelect = document.getElementById('per_page');
        const searchInput = document.getElementById('undanganTable_search');
        const paginationInfo = document.getElementById('undanganTable_info');
        const firstPageBtn = document.getElementById('firstPage');
        const prevPageBtn = document.getElementById('prevPage');
        const nextPageBtn = document.getElementById('nextPage');
        const lastPageBtn = document.getElementById('lastPage');
        const pageNumbersContainer = document.getElementById('pageNumbers');

        let originalData = [];
        let filteredData = [];
        let currentPage = 1;
        let perPage = parseInt(perPageSelect.value);

        function openPreviewModal() {
            previewModal.classList.remove('hidden');
        }
        window.closePreviewModal = function () {
            previewModal.classList.add('hidden');
        }

        function renderTable() {
            const start = (currentPage - 1) * perPage;
            const end = start + perPage;
            const paginatedData = filteredData.slice(start, end);

            tableBody.innerHTML = '';
            if (paginatedData.length === 0) {
                tableBody.innerHTML = `<tr><td colspan="7" class="text-center py-4 border border-gray-300">Data tidak tersedia</td></tr>`;
                paginationInfo.textContent = 'Showing 0 to 0 of 0 results';
                pageNumbersContainer.innerHTML = '';
                disableNavButtons();
                return;
            }

            paginatedData.forEach((row, index) => {
                const formattedDate = moment(row.tanggal).format('DD MMMM YYYY');
                const formattedTime = row.jam.substring(0, 5) + ' WIB';

                const editUrl = `{{ url('undangan') }}/${row.id}/edit`;
                const deleteUrl = `{{ url('undangan') }}/${row.id}`;

                tableBody.innerHTML += `
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 text-center border border-gray-300">${start + index + 1}</td>
                        <td class="px-4 py-2 border border-gray-300">
                            <div class="font-semibold">${formattedDate}</div>
                            <div class="text-xs text-gray-500">${formattedTime}</div>
                        </td>
                        <td class="px-4 py-2 border border-gray-300">${row.kepada}</td>
                        <td class="px-4 py-2 border border-gray-300">${row.pengirim}</td>
                        <td class="px-4 py-2 border border-gray-300">${row.tempat_link}</td>
                        <td class="px-4 py-2 border border-gray-300">${row.agenda}</td>
                        <td class="px-4 py-2 text-center border border-gray-300">
                            <div class="flex justify-center gap-2">
                                <button type="button" class="p-2 text-blue-600 hover:bg-blue-100 rounded-full view-undangan" data-id="${row.id}" title="Lihat">
                                    <i class="fa fa-eye"></i>
                                </button>
                                <a href="${editUrl}" class="p-2 text-yellow-600 hover:bg-yellow-100 rounded-full" title="Edit">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                                <form action="${deleteUrl}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 text-red-600 hover:bg-red-100 rounded-full" title="Hapus">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                `;
            });

            const totalPages = Math.ceil(filteredData.length / perPage);
            paginationInfo.textContent = `Showing ${start + 1} to ${Math.min(end, filteredData.length)} of ${filteredData.length} results`;

            renderPagination(totalPages);
        }

        function renderPagination(totalPages) {
            pageNumbersContainer.innerHTML = '';
            disableNavButtons();

            for (let i = 1; i <= totalPages; i++) {
                const button = document.createElement('button');
                button.textContent = i;
                button.classList.add('px-3', 'py-1', 'text-sm', 'border', 'border-gray-300', 'hover:bg-gray-100', 'font-medium');
                if (i === currentPage) {
                    button.classList.add('bg-blue-600', 'text-white', 'border-blue-600');
                } else {
                    button.classList.add('bg-white', 'text-gray-600');
                }
                button.addEventListener('click', () => {
                    currentPage = i;
                    renderTable();
                });
                pageNumbersContainer.appendChild(button);
            }
        }

        function disableNavButtons() {
            const totalPages = Math.ceil(filteredData.length / perPage);
            firstPageBtn.disabled = currentPage === 1;
            prevPageBtn.disabled = currentPage === 1;
            nextPageBtn.disabled = currentPage === totalPages || totalPages === 0;
            lastPageBtn.disabled = currentPage === totalPages || totalPages === 0;
        }

        function applySearch() {
            const searchTerm = searchInput.value.toLowerCase();
            filteredData = originalData.filter(item => {
                return Object.values(item).some(value =>
                    String(value).toLowerCase().includes(searchTerm)
                );
            });
            currentPage = 1;
            renderTable();
        }

        fetch('{{ route('undangan.data') }}')
            .then(response => response.json())
            .then(responseData => {
                originalData = responseData.data;
                filteredData = [...originalData];
                renderTable();
            })
            .catch(error => {
                console.error('Error fetching data:', error);
                tableBody.innerHTML = `<tr><td colspan="7" class="text-center py-4 text-red-500 border border-gray-300">Gagal memuat data.</td></tr>`;
            });

        perPageSelect.addEventListener('change', (e) => {
            perPage = parseInt(e.target.value);
            currentPage = 1;
            renderTable();
        });
        searchInput.addEventListener('keyup', applySearch);

        firstPageBtn.addEventListener('click', () => { currentPage = 1; renderTable(); });
        prevPageBtn.addEventListener('click', () => { if (currentPage > 1) { currentPage--; renderTable(); } });
        nextPageBtn.addEventListener('click', () => { const totalPages = Math.ceil(filteredData.length / perPage); if (currentPage < totalPages) { currentPage++; renderTable(); } });
        lastPageBtn.addEventListener('click', () => { currentPage = Math.ceil(filteredData.length / perPage); renderTable(); });

        document.querySelector('#undanganTable tbody').addEventListener('click', function(e) {
            const button = e.target.closest('.view-undangan');
            if (button) {
                const undanganId = button.dataset.id;
                previewContent.innerHTML = '<div class="text-center text-gray-400">Memuat konten...</div>';
                fetch(`/undangan/${undanganId}/preview`)
                    .then(response => response.text())
                    .then(html => {
                        previewContent.innerHTML = html;
                        openPreviewModal();
                    })
                    .catch(() => {
                        previewContent.innerHTML = '<p class="text-red-500">Gagal memuat preview undangan.</p>';
                    });
            }
        });
    });
</script>
@endpush
