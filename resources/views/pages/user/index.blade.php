{{-- @extends('layouts.main')

@section('content')
<div class="container my-4">
  <div class="bg-light p-4 rounded-4 shadow-sm">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-start flex-wrap gap-3 mb-3">
      <h3 class="fw-bold text-dark mb-0">Daftar User</h3>
      <a href="{{ route('user.create') }}" class="btn btn-primary rounded-pill shadow-sm">
        <i class="bi bi-plus-circle me-1"></i> Tambah User
      </a>
    </div>

    <!-- Flash -->
    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Tabel User -->
    <div class="card border-0 shadow-sm rounded-4">
      <div class="card-body bg-white rounded-3">
        <div class="table-responsive">
          <table class="table table-borderless table-striped align-middle mb-0">
            <thead class="table-light">
              <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Akses Halaman</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse($users as $user)
              <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ implode(', ', $user->getRoleNames()->toArray()) }}</td>
                <td>
                  @if($user->hasRole('user'))
                    <ul class="mb-0 ps-3">
                      @foreach($user->getPermissionNames() as $perm)
                        <li>{{ ucfirst(str_replace('akses.', '', $perm)) }}</li>
                      @endforeach
                    </ul>
                  @else
                    <em>Semua akses</em>
                  @endif
                </td>
                <td class="d-flex flex-wrap gap-2">
                  <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-warning rounded-pill">
                    <i class="bi bi-pencil-square me-1"></i> Edit
                  </a>
                  <form action="{{ route('user.destroy', $user->id) }}" method="POST"
                        onsubmit="return confirm('Yakin ingin hapus user ini?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger rounded-pill">
                      <i class="bi bi-trash-fill me-1"></i> Hapus
                    </button>
                  </form>
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="5" class="text-center text-muted">Belum ada user.</td>
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

{{-- @extends('layouts.main')

@section('content')
<div class="container my-4">
    <div class="bg-light p-4 rounded-4 shadow-sm">

        <div class="d-flex justify-content-between align-items-start flex-wrap gap-3 mb-3">
            <h3 class="fw-bold text-dark mb-0">Daftar User</h3>
            <a href="{{ route('user.create') }}" class="btn btn-primary rounded-pill shadow-sm">
                <i class="bi bi-plus-circle me-1"></i> Tambah User
            </a>
        </div>

        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body bg-white rounded-3">
                <div class="table-responsive">
                    <table class="table table-borderless table-striped align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Unit Kerja</th> <th>Role</th>
                                <th>Akses Halaman</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->unit_kerja }}</td> <td>{{ implode(', ', $user->getRoleNames()->toArray()) }}</td>
                                <td>
                                    @if($user->hasRole('user'))
                                    <ul class="mb-0 ps-3">
                                        @foreach($user->getPermissionNames() as $perm)
                                        <li>{{ ucfirst(str_replace('akses.', '', $perm)) }}</li>
                                        @endforeach
                                    </ul>
                                    @else
                                    <em>Semua akses</em>
                                    @endif
                                </td>
                                <td class="d-flex flex-wrap gap-2">
                                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-warning rounded-pill">
                                        <i class="bi bi-pencil-square me-1"></i> Edit
                                    </a>
                                    <form action="{{ route('user.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus user ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger rounded-pill">
                                            <i class="bi bi-trash-fill me-1"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">Belum ada user.</td>
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

        <div class="d-flex justify-content-between align-items-start flex-wrap gap-3 mb-3">
            <h3 class="fw-bold text-dark mb-0">Daftar User</h3>
            <a href="{{ route('user.create') }}" class="btn btn-primary rounded-pill shadow-sm">
                <i class="bi bi-plus-circle me-1"></i> Tambah User
            </a>
        </div>

        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body bg-white rounded-3">
                <div class="table-responsive">
                    <table class="table table-borderless table-striped align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Unit Kerja</th>
                                <th>Role</th>
                                <th>Akses Halaman</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->unit_kerja }}</td>
                                <td>{{ implode(', ', $user->getRoleNames()->toArray()) }}</td>
                                <td>
                                    @if($user->hasRole('admin'))
                                        <em>Semua akses</em>
                                    @else
                                        @if($user->getPermissionNames()->isEmpty())
                                            <em>Tidak ada akses</em>
                                        @else
                                            <ul class="mb-0 ps-3">
                                                @foreach($user->getPermissionNames() as $perm)
                                                    <li>{{ ucfirst(str_replace('akses.', '', $perm)) }}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    @endif
                                </td>
                                <td class="d-flex flex-wrap gap-2">
                                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-warning rounded-pill">
                                        <i class="bi bi-pencil-square me-1"></i> Edit
                                    </a>
                                    <form action="{{ route('user.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus user ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger rounded-pill">
                                            <i class="bi bi-trash-fill me-1"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">Belum ada user.</td>
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

        <div class="d-flex justify-content-between align-items-start flex-wrap gap-3 mb-3">
            <h3 class="fw-bold text-dark mb-0">Daftar User</h3>
            <a href="{{ route('user.create') }}" class="btn btn-primary rounded-pill shadow-sm">
                <i class="bi bi-plus-circle me-1"></i> Tambah User
            </a>
        </div>

        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body bg-white rounded-3">
                <div class="table-responsive">

                    <table class="table table-borderless table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Unit Kerja</th>
                                <th>Role</th>
                                <th>Akses Halaman</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->unit_kerja }}</td>
                                <td>

                                    @if($user->hasRole('admin'))
                                        <span class="badge text-bg-primary">Admin</span>
                                    @else
                                        <span class="badge text-bg-secondary">User</span>
                                    @endif
                                </td>
                                <td>
                                    @if($user->hasRole('admin'))
                                        <span class="text-success fw-bold">Semua akses</span>
                                    @else
                                        @if($user->getPermissionNames()->isEmpty())
                                            <span class="text-danger">Tidak ada akses</span>
                                        @else
                                            <ul class="mb-0 ps-3">
                                                @foreach($user->getPermissionNames() as $perm)

                                                    <li>{{ ucfirst(str_replace(['akses.', 'create.', 'update.', 'delete.', 'export.'], '', $perm)) }}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    @endif
                                </td>
                                <td>

                                    <div class="d-flex flex-nowrap gap-2">
                                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-outline-warning rounded-circle">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <form action="{{ route('user.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus user ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-outline-danger rounded-circle">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">Belum ada user.</td>
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

        <div class="d-flex justify-content-between align-items-start flex-wrap gap-3 mb-3">
            <h3 class="fw-bold text-dark mb-0">Daftar User</h3>
            <a href="{{ route('user.create') }}" class="btn btn-primary rounded-pill shadow-sm">
                <i class="bi bi-plus-circle me-1"></i> Tambah User
            </a>
        </div>

        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif


        <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
            <div class="d-flex align-items-center gap-2">
                <label for="per_page" class="mb-0">Entries per page:</label>
                <form id="perPageForm" method="GET" class="mb-0">
                    <input type="hidden" name="search" value="{{ request('search') }}">
                    <select name="per_page" id="per_page" class="form-select form-select-sm" onchange="document.getElementById('perPageForm').submit()">
                        @foreach([5, 10, 25, 50, 100] as $size)
                            <option value="{{ $size }}" {{ request('per_page', 5) == $size ? 'selected' : '' }}>{{ $size }}</option>
                        @endforeach
                    </select>
                </form>
            </div>

            <form method="GET" class="d-flex mb-0" style="max-width:250px;">
                <input type="hidden" name="per_page" value="{{ request('per_page', 5) }}">
                <input type="text" name="search" value="{{ request('search') }}" class="form-control form-control-sm" placeholder="Cari user...">
                <button type="submit" class="btn btn-sm btn-outline-secondary ms-1">
                    <i class="bi bi-search"></i>
                </button>
            </form>
        </div>

        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body bg-white rounded-3">
                <div class="table-responsive">
                    <table class="table table-borderless table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Unit Kerja</th>
                                <th>Role</th>
                                <th>Akses Halaman</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->unit_kerja }}</td>
                                <td>
                                    @if($user->hasRole('admin'))
                                        <span class="badge text-bg-primary">Admin</span>
                                    @else
                                        <span class="badge text-bg-secondary">User</span>
                                    @endif
                                </td>
                                <td>
                                    @if($user->hasRole('admin'))
                                        <span class="text-success fw-bold">Semua akses</span>
                                    @else
                                        @if($user->getPermissionNames()->isEmpty())
                                            <span class="text-danger">Tidak ada akses</span>
                                        @else
                                            <ul class="mb-0 ps-3">
                                                @foreach($user->getPermissionNames() as $perm)
                                                    <li>{{ ucfirst(str_replace(['akses.', 'create.', 'update.', 'delete.', 'export.'], '', $perm)) }}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex flex-nowrap gap-2">
                                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-outline-warning rounded-circle">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <form action="{{ route('user.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus user ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-outline-danger rounded-circle">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">Belum ada user.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-3">
                    {{ $users->links('pagination::bootstrap-5') }}
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


        <div class="d-flex justify-content-between align-items-start flex-wrap gap-3 mb-3">
            <h3 class="fw-bold text-dark mb-0">Daftar User</h3>
            <a href="{{ route('user.create') }}" class="btn btn-primary rounded-pill shadow-sm">
                <i class="bi bi-plus-circle me-1"></i> Tambah User
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
            <div class="d-flex align-items-center gap-2">
                <label for="per_page" class="mb-0">Entri per halaman:</label>
                <form id="perPageForm" method="GET" class="mb-0">
                    <input type="hidden" name="search" value="{{ request('search') }}">
                    <select name="per_page" id="per_page" class="form-select form-select-sm" onchange="document.getElementById('perPageForm').submit()">
                        @foreach([5, 10, 25, 50, 100] as $size)
                            <option value="{{ $size }}" {{ request('per_page', 5) == $size ? 'selected' : '' }}>{{ $size }}</option>
                        @endforeach
                    </select>
                </form>
            </div>

            <form method="GET" class="d-flex mb-0" style="max-width:250px;">
                <input type="hidden" name="per_page" value="{{ request('per_page', 5) }}">
                <input type="text" name="search" value="{{ request('search') }}" class="form-control form-control-sm" placeholder="Cari user...">
                <button type="submit" class="btn btn-sm btn-outline-secondary ms-1">
                    <i class="bi bi-search"></i>
                </button>
            </form>
        </div>


        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body bg-white rounded-3">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle mb-0">
                        <thead class="table-primary text-center">
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Unit Kerja</th>
                                <th>Role</th>
                                <th>Akses Halaman</th>
                                <th style="width: 120px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->unit_kerja }}</td>
                                <td>
                                    @if($user->hasRole('admin'))
                                        <span class="badge bg-primary">Admin</span>
                                    @else
                                        <span class="badge bg-secondary">User</span>
                                    @endif
                                </td>
                                <td>
                                    @if($user->hasRole('admin'))
                                        <span class="text-success fw-bold">Semua akses</span>
                                    @else
                                        @if($user->getPermissionNames()->isEmpty())
                                            <span class="text-danger">Tidak ada akses</span>
                                        @else
                                            <ul class="mb-0 ps-3">
                                                @foreach($user->getPermissionNames() as $perm)
                                                    <li>{{ ucfirst(str_replace(['akses.', 'create.', 'update.', 'delete.', 'export.'], '', $perm)) }}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-outline-warning rounded-circle" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <form action="{{ route('user.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus user ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-outline-danger rounded-circle" title="Hapus">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">Belum ada user.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>



                    <div>
                        {{ $users->links('pagination::bootstrap-5') }}
                    </div>

            </div>
        </div>

    </div>
</div>
@endsection --}}

{{--
@extends('layouts.main')

@section('content')
<div class="p-6">
    <div class="bg-white p-6 rounded-2xl shadow">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-3 mb-6">
            <h3 class="text-xl font-bold text-gray-800">Daftar User</h3>
            <a href="{{ route('user.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg shadow hover:bg-blue-700 transition">
                <i class="fa fa-plus-circle mr-2"></i> Tambah User
            </a>
        </div>

        @if(session('success'))
        <div class="mb-4 p-4 rounded-lg bg-green-100 border border-green-300 text-green-700 flex items-center justify-between">
            <span><i class="fa fa-check-circle mr-2"></i>{{ session('success') }}</span>
            <button onclick="this.parentElement.remove()" class="text-green-700 hover:text-green-900">&times;</button>
        </div>
        @endif

        <div class="flex flex-col md:flex-row justify-between items-center gap-3 mb-4">
            <div class="flex items-center gap-2">
                <form id="perPageForm" method="GET" class="flex items-center gap-2">
                    <label for="per_page" class="text-sm text-gray-600">Entri per halaman:</label>
                    <input type="hidden" name="search" value="{{ request('search') }}">
                    <select name="per_page" id="per_page" class="text-sm border-gray-300 rounded-lg" onchange="this.form.submit()">
                        @foreach([5, 10, 25, 50, 100] as $size)
                        <option value="{{ $size }}" {{ request('per_page', 5) == $size ? 'selected' : '' }}>{{ $size }}</option>
                        @endforeach
                    </select>
                </form>
            </div>

            <form method="GET" class="flex w-full md:w-auto">
                <input type="hidden" name="per_page" value="{{ request('per_page', 5) }}">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari user..." class="flex-grow md:flex-none border-gray-300 rounded-l-lg text-sm px-3 py-2">
                <button type="submit" class="px-3 py-2 border border-gray-300 rounded-r-lg bg-gray-50 hover:bg-gray-100">
                    <i class="fa fa-search text-gray-600"></i>
                </button>
            </form>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full text-sm border border-gray-200 rounded-lg">
                <thead class="bg-blue-600 text-white text-center">
                    <tr>
                        <th class="px-4 py-2">Nama</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Unit Kerja</th>
                        <th class="px-4 py-2">Role</th>
                        <th class="px-4 py-2">Akses Halaman</th>
                        <th class="px-4 py-2 w-28">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $user->name }}</td>
                        <td class="px-4 py-2">{{ $user->email }}</td>
                        <td class="px-4 py-2">{{ $user->unit_kerja }}</td>
                        <td class="px-4 py-2">
                            @if($user->hasRole('admin'))
                            <span class="px-2 py-1 text-xs bg-blue-100 text-blue-700 rounded">Admin</span>
                            @else
                            <span class="px-2 py-1 text-xs bg-gray-200 text-gray-700 rounded">User</span>
                            @endif
                        </td>
                        <td class="px-4 py-2">
                            @if($user->hasRole('admin'))
                            <span class="text-green-600 font-semibold">Semua akses</span>
                            @else
                                @if($user->getPermissionNames()->isEmpty())
                                <span class="text-red-600">Tidak ada akses</span>
                                @else
                                <ul class="list-disc list-inside text-gray-600">
                                    @foreach($user->getPermissionNames() as $perm)
                                    <li>{{ ucfirst(str_replace(['akses.', 'create.', 'update.', 'delete.', 'export.'], '', $perm)) }}</li>
                                    @endforeach
                                </ul>
                                @endif
                            @endif
                        </td>
                        <td class="px-4 py-2 text-center">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('user.edit', $user->id) }}" class="p-2 text-yellow-600 hover:bg-yellow-100 rounded-full" title="Edit">
                                    <i class="fa fa-pen"></i>
                                </a>
                                <form action="{{ route('user.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus user ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="p-2 text-red-600 hover:bg-red-100 rounded-full" title="Hapus">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-gray-500 py-4">Belum ada user.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $users->links('pagination::tailwind') }}
        </div>
    </div>
</div>
@endsection --}}

{{--
@extends('layouts.main')

@section('content')
<div class="p-6">
    <div class="bg-white p-6 rounded-2xl shadow">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-3 mb-6">
            <h3 class="text-xl font-bold text-gray-800">Daftar User</h3>
            <a href="{{ route('user.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg shadow hover:bg-blue-700 transition">
                <i class="fa fa-plus-circle mr-2"></i> Tambah User
            </a>
        </div>

        @if(session('success'))
        <div class="mb-4 p-4 rounded-lg bg-green-100 border border-green-300 text-green-700 flex items-center justify-between">
            <span><i class="fa fa-check-circle mr-2"></i>{{ session('success') }}</span>
            <button onclick="this.parentElement.remove()" class="text-green-700 hover:text-green-900">&times;</button>
        </div>
        @endif

        <div class="flex flex-col md:flex-row justify-between items-center gap-3 mb-4">
            <div class="flex items-center gap-2">
                <form id="perPageForm" method="GET" class="flex items-center gap-2">
                    <label for="per_page" class="text-sm text-gray-800">Show</label>
                    <input type="hidden" name="search" value="{{ request('search') }}">
                    <select name="per_page" id="per_page" class="text-sm border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" onchange="this.form.submit()">
                        @foreach([5, 10, 25, 50, 100] as $size)
                        <option value="{{ $size }}" {{ request('per_page', 10) == $size ? 'selected' : '' }}>{{ $size }}</option>
                        @endforeach
                    </select>
                    <label class="text-sm text-gray-800">entries</label>
                </form>
            </div>

            <form method="GET" class="flex w-full md:w-auto">
                <input type="hidden" name="per_page" value="{{ request('per_page', 10) }}">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari user..." class="flex-grow md:flex-none border-gray-300 rounded-l-lg text-sm px-3 py-2">
                <button type="submit" class="px-3 py-2 border border-gray-300 rounded-r-lg bg-gray-50 hover:bg-gray-100">
                    <i class="fa fa-search text-gray-600"></i>
                </button>
            </form>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full text-sm border border-gray-200 rounded-lg">
                <thead class="bg-blue-600 text-white text-center">
                    <tr>
                        <th class="px-4 py-2">Nama</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Unit Kerja</th>
                        <th class="px-4 py-2">Role</th>
                        <th class="px-4 py-2">Akses Halaman</th>
                        <th class="px-4 py-2 w-28">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $user->name }}</td>
                        <td class="px-4 py-2">{{ $user->email }}</td>
                        <td class="px-4 py-2">{{ $user->unit_kerja }}</td>
                        <td class="px-4 py-2">
                            @if($user->hasRole('admin'))
                            <span class="px-2 py-1 text-xs bg-blue-100 text-blue-700 rounded">Admin</span>
                            @else
                            <span class="px-2 py-1 text-xs bg-gray-200 text-gray-700 rounded">User</span>
                            @endif
                        </td>
                        <td class="px-4 py-2">
                            @if($user->hasRole('admin'))
                            <span class="text-green-600 font-semibold">Semua akses</span>
                            @else
                                @if($user->getPermissionNames()->isEmpty())
                                <span class="text-red-600">Tidak ada akses</span>
                                @else
                                <ul class="list-disc list-inside text-gray-600">
                                    @foreach($user->getPermissionNames() as $perm)
                                    <li>{{ ucfirst(str_replace(['akses.', 'create.', 'update.', 'delete.', 'export.'], '', $perm)) }}</li>
                                    @endforeach
                                </ul>
                                @endif
                            @endif
                        </td>
                        <td class="px-4 py-2 text-center">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('user.edit', $user->id) }}" class="p-2 text-yellow-600 hover:bg-yellow-100 rounded-full" title="Edit">
                                    <i class="fa fa-pen"></i>
                                </a>
                                <form action="{{ route('user.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus user ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="p-2 text-red-600 hover:bg-red-100 rounded-full" title="Hapus">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-gray-500 py-4">Belum ada user.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $users->links('pagination::tailwind') }}
        </div>
    </div>
</div>
@endsection --}}


@extends('layouts.main')

@section('content')
<div class="p-6">
    <div class="bg-white p-6 rounded-2xl shadow">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-3 mb-6">
            <h3 class="text-xl font-bold text-gray-800">Daftar User</h3>
            <a href="{{ route('user.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg shadow hover:bg-blue-700 transition">
                <i class="fa fa-plus-circle mr-2"></i> Tambah User
            </a>
        </div>

        @if(session('success'))
        <div class="flex items-center p-3 mb-4 text-sm text-green-800 bg-green-100 border border-green-300 rounded-lg">
            <i class="fa fa-check-circle mr-2"></i>{{ session('success') }}
        </div>
        @endif

        <div class="flex flex-col md:flex-row justify-between items-center gap-3 mb-4">
            <div class="flex items-center gap-2">
                <form id="perPageForm" method="GET" class="flex items-center gap-2">
                    <label for="per_page" class="text-sm text-gray-800">Show</label>
                    <input type="hidden" name="search" value="{{ request('search') }}">
                    <select name="per_page" id="per_page" class="text-sm border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" onchange="this.form.submit()">
                        @foreach([5, 10, 25, 50, 100] as $size)
                        <option value="{{ $size }}" {{ request('per_page', 10) == $size ? 'selected' : '' }}>{{ $size }}</option>
                        @endforeach
                    </select>
                    <label class="text-sm text-gray-800">entries</label>
                </form>
            </div>

            <form method="GET" class="flex w-full md:w-auto">
                <input type="hidden" name="per_page" value="{{ request('per_page', 10) }}">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari user..." class="flex-grow md:flex-none border-gray-300 rounded-l-lg text-sm px-3 py-2">
                <button type="submit" class="px-3 py-2 border border-gray-300 rounded-r-lg bg-gray-50 hover:bg-gray-100">
                    <i class="fa fa-search text-gray-600"></i>
                </button>
            </form>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-600 border border-gray-300 border-collapse">
                <thead class="bg-blue-600 text-white text-center">
                    <tr>
                        <th class="px-4 py-2 border border-gray-300">Nama</th>
                        <th class="px-4 py-2 border border-gray-300">Email</th>
                        <th class="px-4 py-2 border border-gray-300">Unit Kerja</th>
                        <th class="px-4 py-2 border border-gray-300">Role</th>
                        <th class="px-4 py-2 border border-gray-300">Akses Halaman</th>
                        <th class="px-4 py-2 border border-gray-300 w-28">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border border-gray-300">{{ $user->name }}</td>
                        <td class="px-4 py-2 border border-gray-300">{{ $user->email }}</td>
                        <td class="px-4 py-2 border border-gray-300">{{ $user->unit_kerja }}</td>
                        <td class="px-4 py-2 border border-gray-300">
                            @if($user->hasRole('admin'))
                            <span class="px-2 py-1 text-xs bg-blue-100 text-blue-700 rounded">Admin</span>
                            @else
                            <span class="px-2 py-1 text-xs bg-gray-200 text-gray-700 rounded">User</span>
                            @endif
                        </td>
                        <td class="px-4 py-2 border border-gray-300">
                            @if($user->hasRole('admin'))
                            <span class="text-green-600 font-semibold">Semua akses</span>
                            @else
                                @if($user->getPermissionNames()->isEmpty())
                                <span class="text-red-600">Tidak ada akses</span>
                                @else
                                <ul class="list-disc list-inside text-gray-600">
                                    @foreach($user->getPermissionNames() as $perm)
                                    <li>{{ ucfirst(str_replace(['akses.', 'create.', 'update.', 'delete.', 'export.'], '', $perm)) }}</li>
                                    @endforeach
                                </ul>
                                @endif
                            @endif
                        </td>
                        <td class="px-4 py-2 text-center border border-gray-300">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('user.edit', $user->id) }}" class="p-2 text-yellow-600 hover:bg-yellow-100 rounded-full" title="Edit">
                                    <i class="fa fa-pen"></i>
                                </a>
                                <form action="{{ route('user.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus user ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="p-2 text-red-600 hover:bg-red-100 rounded-full" title="Hapus">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-gray-500 py-4 border border-gray-300">Belum ada user.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4 flex justify-between items-center">
            <div class="text-sm text-gray-700">
                Showing {{ $users->firstItem() ?? 0 }} to {{ $users->lastItem() ?? 0 }} of {{ $users->total() }} results
            </div>
            <div class="flex items-center gap-1">
                @if ($users->onFirstPage())
                    <button class="px-3 py-1 text-gray-400 bg-gray-100 border border-gray-300 rounded cursor-not-allowed">«</button>
                    <button class="px-3 py-1 text-gray-400 bg-gray-100 border border-gray-300 rounded cursor-not-allowed">‹</button>
                @else
                    <a href="{{ $users->url(1) }}" class="px-3 py-1 text-gray-600 bg-white border border-gray-300 rounded hover:bg-gray-100">«</a>
                    <a href="{{ $users->previousPageUrl() }}" class="px-3 py-1 text-gray-600 bg-white border border-gray-300 rounded hover:bg-gray-100">‹</a>
                @endif

                @foreach ($users->getUrlRange(1, $users->lastPage()) as $page => $url)
                    @if ($page == $users->currentPage())
                        <span class="px-3 py-1 text-sm bg-blue-600 text-white border border-blue-600 rounded">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="px-3 py-1 text-sm text-gray-600 bg-white border border-gray-300 rounded hover:bg-gray-100">{{ $page }}</a>
                    @endif
                @endforeach

                @if ($users->hasMorePages())
                    <a href="{{ $users->nextPageUrl() }}" class="px-3 py-1 text-gray-600 bg-white border border-gray-300 rounded hover:bg-gray-100">›</a>
                    <a href="{{ $users->url($users->lastPage()) }}" class="px-3 py-1 text-gray-600 bg-white border border-gray-300 rounded hover:bg-gray-100">»</a>
                @else
                    <button class="px-3 py-1 text-gray-400 bg-gray-100 border border-gray-300 rounded cursor-not-allowed">›</button>
                    <button class="px-3 py-1 text-gray-400 bg-gray-100 border border-gray-300 rounded cursor-not-allowed">»</button>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
