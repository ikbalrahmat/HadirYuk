{{-- @extends('layouts.main')

@section('content')
<div class="container py-5">
    <div class="text-center">
        <h1 class="mb-4">Halaman User Management</h1>
        <div class="alert alert-info">
            Fitur ini masih dalam tahap pengembangan. Silakan kembali lagi nanti.
        </div>
    </div>
</div>
@endsection --}}


{{-- @extends('layouts.main')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between mb-4">
        <h2>Data User</h2>
        <a href="{{ route('users.create') }}" class="btn btn-primary">+ Tambah User</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->getRoleNames()->join(', ') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection --}}

{{-- @extends('layouts.main')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Daftar User</h2>
    <a href="{{ route('user.create') }}" class="btn btn-primary mb-3">Tambah User</a>

    <table class="table table-bordered">
        <thead>
            <tr><th>Nama</th><th>Email</th><th>Role</th></tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ implode(', ', $user->getRoleNames()->toArray()) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection --}}


{{-- @extends('layouts.main')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Daftar User</h2>

    <a href="{{ route('user.create') }}" class="btn btn-primary mb-3">➕ Tambah User</a>

    <table class="table table-bordered align-middle">
        <thead class="table-light">
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ implode(', ', $user->getRoleNames()->toArray()) }}</td>
                    <td class="text-center">
                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-warning">
                            ✏️ Edit
                        </a>
                        <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">🗑️ Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection --}}


{{-- @extends('layouts.main')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Daftar User</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('user.create') }}" class="btn btn-primary mb-3">Tambah User</a>

    <table class="table table-bordered table-hover">
        <thead>
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
                    <td>
                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-warning">
                            ✏️ Edit
                        </a>
                        <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin hapus user ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">🗑️ Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center">Belum ada user.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection --}}


@extends('layouts.main')

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
@endsection
