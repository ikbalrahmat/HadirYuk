{{-- @extends('layouts.main')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4">Daftar Pemesanan Konsumsi</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif


    @if(!Auth::user()->hasAnyRole(['yanum_karawang', 'yanum_jakarta']))
    <a href="{{ route('konsumsi.create') }}" class="btn btn-primary mb-3">Ajukan Pemesanan</a>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="myTable">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>No. NDE</th>
                            <th>Unit Kerja</th>
                            <th>Agenda Rapat</th>
                            <th>Tanggal & Jam</th>
                            <th>Total Biaya</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($konsumsis as $konsumsi)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $konsumsi->nomor_surat_nde }}</td>
                                <td>{{ $konsumsi->unit_kerja }}</td>
                                <td>{{ $konsumsi->agenda_rapat }}</td>
                                <td>{{ $konsumsi->tanggal_rapat->format('d-m-Y') }} <br> {{ $konsumsi->jam_rapat }}</td>
                                <td>
                                    @if ($konsumsi->total_biaya)
                                        Rp {{ number_format($konsumsi->total_biaya, 0, ',', '.') }}
                                    @else
                                        <span class="text-danger">Belum Dikonfirmasi</span>
                                    @endif
                                </td>
                                <td><span class="badge bg-primary">{{ $konsumsi->status }}</span></td>
                                <td>
                                    @if(Auth::user()->hasAnyRole(['yanum_karawang', 'yanum_jakarta']))

                                        <a href="{{ route('konsumsi.edit', $konsumsi->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <a href="{{ route('konsumsi.export.pdf', $konsumsi->id) }}" class="btn btn-sm btn-info">Ekspor PDF</a>
                                    @else

                                        <a href="{{ route('konsumsi.show', $konsumsi->id) }}" class="btn btn-sm btn-info">Lihat</a>
                                    @endif
                                    <form action="{{ route('konsumsi.destroy', $konsumsi->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection --}}


{{-- @extends('layouts.main')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4">Daftar Pemesanan Konsumsi</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(!Auth::user()->hasAnyRole(['yanum_karawang', 'yanum_jakarta', 'admin']))
    <a href="{{ route('konsumsi.create') }}" class="btn btn-primary mb-3">Ajukan Pemesanan</a>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="myTable">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>No. NDE</th>
                            <th>Unit Kerja</th>
                            <th>Agenda Rapat</th>
                            <th>Tanggal & Jam</th>
                            <th>Total Biaya</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($konsumsis as $konsumsi)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $konsumsi->nomor_surat_nde }}</td>
                                <td>{{ $konsumsi->unit_kerja }}</td>
                                <td>{{ $konsumsi->agenda_rapat }}</td>
                                <td>{{ $konsumsi->tanggal_rapat->format('d-m-Y') }} <br> {{ $konsumsi->jam_rapat }}</td>
                                <td>
                                    @if ($konsumsi->total_biaya)
                                        Rp {{ number_format($konsumsi->total_biaya, 0, ',', '.') }}
                                    @else
                                        <span class="text-danger">Belum Dikonfirmasi</span>
                                    @endif
                                </td>
                                <td>
                                    @php
                                        $badgeClass = match($konsumsi->status) {
                                            'Disetujui' => 'bg-success',
                                            'Selesai' => 'bg-secondary',
                                            'Ditolak' => 'bg-danger',
                                            default => 'bg-primary'
                                        };
                                    @endphp
                                    <span class="badge {{ $badgeClass }}">{{ $konsumsi->status }}</span>
                                </td>
                                <td>
                                    @if(Auth::user()->hasAnyRole(['yanum_karawang', 'yanum_jakarta', 'admin']))
                                        <a href="{{ route('konsumsi.edit', $konsumsi->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <a href="{{ route('konsumsi.export.pdf', $konsumsi->id) }}" class="btn btn-sm btn-info">Ekspor PDF</a>
                                    @else
                                        <a href="{{ route('konsumsi.show', $konsumsi->id) }}" class="btn btn-sm btn-info">Lihat</a>
                                    @endif
                                    <form action="{{ route('konsumsi.destroy', $konsumsi->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
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
<div class="container-fluid">
    <h2 class="mb-4">Daftar Pemesanan Konsumsi</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif


    @if(!Auth::user()->hasAnyRole(['yanum_karawang', 'yanum_jakarta', 'admin']))
    <a href="{{ route('konsumsi.create') }}" class="btn btn-primary mb-3">Ajukan Pemesanan</a>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="myTable">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>No. NDE</th>
                            <th>Unit Kerja</th>
                            <th>Agenda Rapat</th>
                            <th>Tanggal & Jam</th>
                            <th>Total Biaya</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($konsumsis as $konsumsi)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $konsumsi->nomor_surat_nde }}</td>
                                <td>{{ $konsumsi->unit_kerja }}</td>
                                <td>{{ $konsumsi->agenda_rapat }}</td>
                                <td>{{ optional($konsumsi->tanggal_rapat)->format('d-m-Y') ?? '-' }} <br> {{ $konsumsi->jam_rapat }}</td>
                                <td>
                                    @if ($konsumsi->total_biaya || $konsumsi->total_biaya === 0)
                                        Rp {{ number_format($konsumsi->total_biaya, 0, ',', '.') }}
                                    @else
                                        <span class="text-danger">Belum Dikonfirmasi</span>
                                    @endif
                                </td>
                                <td>
                                    @if($konsumsi->status == 'Menunggu')
                                        <span class="badge bg-warning text-dark">Menunggu</span>
                                    @elseif($konsumsi->status == 'Disetujui')
                                        <span class="badge bg-success">Disetujui</span>
                                    @elseif($konsumsi->status == 'Selesai')
                                        <span class="badge bg-primary">Selesai</span>
                                    @else
                                        <span class="badge bg-secondary">{{ $konsumsi->status }}</span>
                                    @endif
                                </td>
                                <td>
                                    @if(Auth::user()->hasAnyRole(['yanum_karawang', 'yanum_jakarta', 'admin']))
                                        <a href="{{ route('konsumsi.edit', $konsumsi->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <a href="{{ route('konsumsi.export.pdf', $konsumsi->id) }}" class="btn btn-sm btn-info">Ekspor PDF</a>
                                    @else
                                        <a href="{{ route('konsumsi.show', $konsumsi->id) }}" class="btn btn-sm btn-info">Lihat</a>
                                        @if($konsumsi->status == 'Menunggu')
                                            <form action="{{ route('konsumsi.destroy', $konsumsi->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                            </form>
                                        @endif
                                    @endif
                                </td>
                            </tr>
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
<div class="max-w-7xl mx-auto px-4 py-6">
    <h2 class="text-2xl font-bold mb-6">Daftar Pemesanan Konsumsi</h2>


    @if(session('success'))
        <div class="mb-4 rounded-md bg-green-100 border border-green-300 text-green-800 px-4 py-2">
            {{ session('success') }}
        </div>
    @endif


    @if(session('error'))
        <div class="mb-4 rounded-md bg-red-100 border border-red-300 text-red-800 px-4 py-2">
            {{ session('error') }}
        </div>
    @endif

    @if(!Auth::user()->hasAnyRole(['yanum_karawang', 'yanum_jakarta', 'admin']))
    <a href="{{ route('konsumsi.create') }}"
       class="inline-block mb-4 bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md shadow-sm text-sm font-medium">
       Ajukan Pemesanan
    </a>
    @endif

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 text-sm">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left font-semibold text-gray-700">No.</th>
                        <th class="px-4 py-3 text-left font-semibold text-gray-700">No. NDE</th>
                        <th class="px-4 py-3 text-left font-semibold text-gray-700">Unit Kerja</th>
                        <th class="px-4 py-3 text-left font-semibold text-gray-700">Agenda Rapat</th>
                        <th class="px-4 py-3 text-left font-semibold text-gray-700">Tanggal & Jam</th>
                        <th class="px-4 py-3 text-left font-semibold text-gray-700">Total Biaya</th>
                        <th class="px-4 py-3 text-left font-semibold text-gray-700">Status</th>
                        <th class="px-4 py-3 text-left font-semibold text-gray-700">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($konsumsis as $konsumsi)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3">{{ $loop->iteration }}</td>
                            <td class="px-4 py-3">{{ $konsumsi->nomor_surat_nde }}</td>
                            <td class="px-4 py-3">{{ $konsumsi->unit_kerja }}</td>
                            <td class="px-4 py-3">{{ $konsumsi->agenda_rapat }}</td>
                            <td class="px-4 py-3">
                                {{ optional($konsumsi->tanggal_rapat)->format('d-m-Y') ?? '-' }} <br>
                                <span class="text-gray-600 text-xs">{{ $konsumsi->jam_rapat }}</span>
                            </td>
                            <td class="px-4 py-3">
                                @if ($konsumsi->total_biaya || $konsumsi->total_biaya === 0)
                                    Rp {{ number_format($konsumsi->total_biaya, 0, ',', '.') }}
                                @else
                                    <span class="text-red-500">Belum Dikonfirmasi</span>
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                @if($konsumsi->status == 'Menunggu')
                                    <span class="px-2 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">Menunggu</span>
                                @elseif($konsumsi->status == 'Disetujui')
                                    <span class="px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">Disetujui</span>
                                @elseif($konsumsi->status == 'Selesai')
                                    <span class="px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">Selesai</span>
                                @else
                                    <span class="px-2 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800">{{ $konsumsi->status }}</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 space-x-2">
                                @if(Auth::user()->hasAnyRole(['yanum_karawang', 'yanum_jakarta', 'admin']))
                                    <a href="{{ route('konsumsi.edit', $konsumsi->id) }}"
                                       class="inline-block bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded-md text-xs font-medium">
                                       Edit
                                    </a>
                                    <a href="{{ route('konsumsi.export.pdf', $konsumsi->id) }}"
                                       class="inline-block bg-indigo-500 hover:bg-indigo-600 text-white px-3 py-1 rounded-md text-xs font-medium">
                                       Ekspor PDF
                                    </a>
                                @else
                                    <a href="{{ route('konsumsi.show', $konsumsi->id) }}"
                                       class="inline-block bg-indigo-500 hover:bg-indigo-600 text-white px-3 py-1 rounded-md text-xs font-medium">
                                       Lihat
                                    </a>
                                    @if($konsumsi->status == 'Menunggu')
                                        <form action="{{ route('konsumsi.destroy', $konsumsi->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    onclick="return confirm('Yakin ingin menghapus?')"
                                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md text-xs font-medium">
                                                Hapus
                                            </button>
                                        </form>
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection --}}


@extends('layouts.main')

@section('content')
<div class="bg-white rounded-xl shadow p-6">

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-3">
        <h3 class="text-xl font-bold text-blue-600">Daftar Pemesanan Konsumsi</h3>
        @if(!Auth::user()->hasAnyRole(['yanum_karawang', 'yanum_jakarta', 'admin']))
            <a href="{{ route('konsumsi.create') }}"
               class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg shadow hover:bg-blue-700 transition">
               <i class="fa fa-plus-circle mr-2"></i> Ajukan Pemesanan
            </a>
        @endif
    </div>

    {{-- Table --}}
    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-300 text-sm">
            <thead class="bg-blue-600 text-white text-xs uppercase">
                <tr>
                    <th class="px-4 py-2 border border-gray-300 w-12 text-center">No</th>
                    <th class="px-4 py-2 border border-gray-300 text-left">No. NDE</th>
                    <th class="px-4 py-2 border border-gray-300 text-left">Unit Kerja</th>
                    <th class="px-4 py-2 border border-gray-300 text-left">Agenda Rapat</th>
                    <th class="px-4 py-2 border border-gray-300 text-left">Tanggal & Jam</th>
                    <th class="px-4 py-2 border border-gray-300 text-left">Total Biaya</th>
                    <th class="px-4 py-2 border border-gray-300 text-left">Status</th>
                    <th class="px-4 py-2 border border-gray-300 text-center w-48">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($konsumsis as $konsumsi)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border border-gray-300 text-center">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2 border border-gray-300">{{ $konsumsi->nomor_surat_nde }}</td>
                        <td class="px-4 py-2 border border-gray-300 font-semibold">{{ $konsumsi->unit_kerja }}</td>
                        <td class="px-4 py-2 border border-gray-300">{{ $konsumsi->agenda_rapat }}</td>
                        <td class="px-4 py-2 border border-gray-300">
                            {{ optional($konsumsi->tanggal_rapat)->format('d-m-Y') ?? '-' }} <br>
                            <span class="text-gray-600 text-xs">{{ $konsumsi->jam_rapat }}</span>
                        </td>
                        <td class="px-4 py-2 border border-gray-300">
                            @if ($konsumsi->total_biaya || $konsumsi->total_biaya === 0)
                                Rp {{ number_format($konsumsi->total_biaya, 0, ',', '.') }}
                            @else
                                <span class="text-red-500 italic">Belum Dikonfirmasi</span>
                            @endif
                        </td>
                        <td class="px-4 py-2 border border-gray-300">
                            @php
                                $statusColors = [
                                    'Menunggu' => 'bg-yellow-100 text-yellow-800',
                                    'Disetujui' => 'bg-green-100 text-green-800',
                                    'Selesai' => 'bg-blue-100 text-blue-800'
                                ];
                            @endphp
                            <span class="px-2 py-1 rounded-full text-xs font-medium {{ $statusColors[$konsumsi->status] ?? 'bg-gray-100 text-gray-800' }}">
                                {{ $konsumsi->status }}
                            </span>
                        </td>
                        <td class="px-4 py-2 border border-gray-300">
                            <div class="flex flex-wrap justify-center gap-2">
                                @if(Auth::user()->hasAnyRole(['yanum_karawang', 'yanum_jakarta', 'admin']))
                                    <a href="{{ route('konsumsi.edit', $konsumsi->id) }}"
                                       class="px-2 py-1 bg-yellow-500 hover:bg-yellow-600 text-white text-xs rounded" title="Edit">
                                       <i class="fa fa-pen"></i>
                                    </a>
                                    <a href="{{ route('konsumsi.export.pdf', $konsumsi->id) }}"
                                       class="px-2 py-1 bg-indigo-500 hover:bg-indigo-600 text-white text-xs rounded" title="Ekspor PDF">
                                       <i class="fa fa-file-pdf"></i>
                                    </a>
                                @else
                                    <a href="{{ route('konsumsi.show', $konsumsi->id) }}"
                                       class="px-2 py-1 bg-blue-500 hover:bg-blue-600 text-white text-xs rounded" title="Lihat">
                                       <i class="fa fa-eye"></i>
                                    </a>
                                    @if($konsumsi->status == 'Menunggu')
                                        <form action="{{ route('konsumsi.destroy', $konsumsi->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    onclick="return confirm('Yakin ingin menghapus?')"
                                                    class="px-2 py-1 bg-red-500 hover:bg-red-600 text-white text-xs rounded" title="Hapus">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    @endif
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="px-4 py-3 text-center text-gray-500 border border-gray-300">Belum ada pemesanan</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
