{{-- @extends('layouts.main')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Tambah User Baru</h2>

    <form action="{{ route('users.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Role</label>
            <select name="role" class="form-select" required>
                <option value="">-- Pilih Role --</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection --}}


{{-- @extends('layouts.main')

@section('content')
<div class="container py-4">
    <h2>Tambah User Baru</h2>

    <form method="POST" action="{{ route('user.store') }}">
        @csrf

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Role</label>
            <select name="role" class="form-control" required>
                @foreach($roles as $role)
                    <option value="{{ $role->name }}">{{ ucfirst($role->name) }}</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection --}}


{{-- @extends('layouts.main')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Tambah User</h2>

    <form action="{{ route('user.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required minlength="6">
        </div>

        <div class="mb-3">
            <label>Role</label>
            <select name="role" class="form-control" id="roleSelect" required>
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>
        </div>

        <div id="permissionGroup" class="mb-3" style="display: none;">
            <label>Akses Halaman</label>
            @foreach ($permissions as $perm)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $perm->name }}" id="perm_{{ $perm->id }}">
                    <label class="form-check-label" for="perm_{{ $perm->id }}">
                        {{ ucfirst(str_replace('akses.', '', $perm->name)) }}
                    </label>
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection

@push('js')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const roleSelect = document.getElementById('roleSelect');
        const permissionGroup = document.getElementById('permissionGroup');

        function togglePermissions() {
            permissionGroup.style.display = roleSelect.value === 'user' ? 'block' : 'none';
        }

        roleSelect.addEventListener('change', togglePermissions);
        togglePermissions();
    });
</script>
@endpush --}}



@extends('layouts.main')

@section('content')
<div class="container py-4">
    <div class="bg-white p-4 rounded-4 shadow-sm">

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold mb-0">Tambah User</h3>
            <a href="{{ route('user.index') }}" class="btn btn-secondary rounded-pill shadow-sm">
                <i class="bi bi-arrow-left me-1"></i> Kembali
            </a>
        </div>

        <!-- Form -->
        <form action="{{ route('user.store') }}" method="POST" autocomplete="off">
            @csrf

            <!-- Anti-autofill dummy -->
            <input type="text" name="fakeusernameremembered" style="display:none">
            <input type="password" name="fakepasswordremembered" style="display:none">

            <div class="mb-3">
                <label for="name" class="form-label fw-semibold">Nama</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Masukkan nama lengkap" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label fw-semibold">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan email" autocomplete="off" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label fw-semibold">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" autocomplete="new-password" required>
            </div>

            <div class="mb-3">
                <label for="roleSelect" class="form-label fw-semibold">Role</label>
                <select name="role" id="roleSelect" class="form-select" required>
                    <option value="">-- Pilih Role --</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
            </div>

            <div id="permissionGroup" class="mb-3" style="display: none;">
                <label class="form-label fw-semibold">Akses Halaman</label>
                <div class="row">
                    @foreach ($permissions as $perm)
                        <div class="col-sm-6 col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $perm->name }}" id="perm_{{ $perm->id }}">
                                <label class="form-check-label" for="perm_{{ $perm->id }}">
                                    {{ ucfirst(str_replace('akses.', '', $perm->name)) }}
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="d-flex justify-content-end mt-4">
                <button type="submit" class="btn btn-primary rounded-pill shadow-sm px-4">
                    <i class="bi bi-save me-1"></i> Simpan
                </button>
            </div>
        </form>

    </div>
</div>
@endsection

@push('js')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const roleSelect = document.getElementById('roleSelect');
        const permissionGroup = document.getElementById('permissionGroup');

        function togglePermissions() {
            permissionGroup.style.display = roleSelect.value === 'user' ? 'block' : 'none';
        }

        roleSelect.addEventListener('change', togglePermissions);
        togglePermissions(); // Panggil awal saat load
    });
</script>
@endpush
