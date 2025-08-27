{{-- @extends('layouts.main')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Edit User</h2>

    <form action="{{ route('user.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
        </div>

        <div class="mb-3">
            <label>Role</label>
            <select name="role" class="form-control" id="roleSelect" required>
                @foreach ($roles as $role)
                    <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                        {{ ucfirst($role->name) }}
                    </option>
                @endforeach
            </select>
        </div>

        <div id="permissionGroup" class="mb-3" style="display: none;">
            <label>Akses Halaman</label>
            @foreach ($permissions as $perm)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $perm->name }}"
                        id="perm_{{ $perm->id }}"
                        {{ in_array($perm->name, $userPermissions) ? 'checked' : '' }}>
                    <label class="form-check-label" for="perm_{{ $perm->id }}">
                        {{ ucfirst(str_replace('akses.', '', $perm->name)) }}
                    </label>
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-success">Update</button>
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

{{-- @extends('layouts.main')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Edit User</h2>

    <form action="{{ route('user.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
        </div>

        <div class="mb-3">
            <label>Unit Kerja</label>
            <input type="text" name="unit_kerja" class="form-control" value="{{ $user->unit_kerja }}" required>
        </div>

        <div class="mb-3">
            <label>Role</label>
            <select name="role" class="form-control" id="roleSelect" required>
                @foreach ($roles as $role)
                <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                    {{ ucfirst($role->name) }}
                </option>
                @endforeach
            </select>
        </div>

        <div id="permissionGroup" class="mb-3" style="display: none;">
            <label>Akses Halaman</label>
            @foreach ($permissions as $perm)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $perm->name }}" id="perm_{{ $perm->id }}" {{ in_array($perm->name, $userPermissions) ? 'checked' : '' }}>
                <label class="form-check-label" for="perm_{{ $perm->id }}">
                    {{ ucfirst(str_replace('akses.', '', $perm->name)) }}
                </label>
            </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-success">Update</button>
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

{{-- @extends('layouts.main')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Edit User</h2>

    <form action="{{ route('user.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
        </div>

        <div class="mb-3">
            <label>Unit Kerja</label>
            <input type="text" name="unit_kerja" class="form-control" value="{{ $user->unit_kerja }}" required>
        </div>

        <div class="mb-3">
            <label>Role</label>
            <select name="role" class="form-control" id="roleSelect" required>
                @foreach ($roles as $role)
                <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                    {{ ucfirst($role->name) }}
                </option>
                @endforeach
            </select>
        </div>

        <div id="permissionGroup" class="mb-3" style="display: none;">
            <label>Akses Halaman</label>
            @foreach ($permissions as $perm)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="permissions[]"
                       value="{{ $perm->name }}" id="perm_{{ $perm->id }}"
                       {{ in_array($perm->name, $userPermissions) ? 'checked' : '' }}>
                <label class="form-check-label" for="perm_{{ $perm->id }}">
                    {{ ucfirst(str_replace('akses.', '', $perm->name)) }}
                </label>
            </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection

@push('js')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const roleSelect = document.getElementById('roleSelect');
        const permissionGroup = document.getElementById('permissionGroup');

        function togglePermissions() {
            if (roleSelect.value === 'admin') {
                permissionGroup.style.display = 'none';
            } else {
                permissionGroup.style.display = 'block';
            }
        }

        roleSelect.addEventListener('change', togglePermissions);
        togglePermissions();
    });
</script>
@endpush --}}

{{--
@extends('layouts.main')

@section('content')
<div class="container py-4">
    <div class="bg-white p-4 rounded-4 shadow-sm">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold mb-0">Edit User</h3>
            <a href="{{ route('user.index') }}" class="btn btn-secondary rounded-pill shadow-sm">
                <i class="bi bi-arrow-left me-1"></i> Kembali
            </a>
        </div>

        <form action="{{ route('user.update', $user->id) }}" method="POST" autocomplete="off">
            @csrf
            @method('PUT')

            <!-- anti autofill browser -->
            <input type="text" name="fakeusernameremembered" style="display:none">
            <input type="password" name="fakepasswordremembered" style="display:none">

            <div class="mb-3">
                <label for="name" class="form-label fw-semibold">Nama</label>
                <input type="text" name="name" id="name" value="{{ $user->name }}" class="form-control" placeholder="Masukkan nama lengkap" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label fw-semibold">Email</label>
                <input type="email" name="email" id="email" value="{{ $user->email }}" class="form-control" placeholder="Masukkan email" autocomplete="off" required>
            </div>

            <div class="mb-3">
                <label for="unit_kerja" class="form-label fw-semibold">Unit Kerja</label>
                <input type="text" name="unit_kerja" id="unit_kerja" value="{{ $user->unit_kerja }}" class="form-control" placeholder="Masukkan unit kerja (contoh: P3T, PPA)" required>
            </div>

            <div class="mb-3">
                <label for="roleSelect" class="form-label fw-semibold">Role</label>
                <select name="role" id="roleSelect" class="form-select" required>
                    @foreach ($roles as $role)
                        <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                            {{ ucfirst($role->name) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div id="permissionGroup" class="mb-3" style="display: none;">
                <label class="form-label fw-semibold">Akses Halaman</label>
                <div class="row">
                    @foreach ($permissions as $perm)
                        <div class="col-sm-6 col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="permissions[]"
                                    value="{{ $perm->name }}" id="perm_{{ $perm->id }}"
                                    {{ in_array($perm->name, $userPermissions) ? 'checked' : '' }}>
                                <label class="form-check-label" for="perm_{{ $perm->id }}">
                                    {{ ucfirst(str_replace('akses.', '', $perm->name)) }}
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="d-flex justify-content-end gap-2 mt-4">
                <a href="{{ route('user.index') }}" class="btn btn-outline-secondary rounded-pill shadow-sm px-4">
                    <i class="bi bi-x-circle me-1"></i> Batal
                </a>
                <button type="submit" class="btn btn-primary rounded-pill shadow-sm px-4">
                    <i class="bi bi-save me-1"></i> Update
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
            const roleValue = roleSelect.value.toLowerCase();
            if (roleValue === 'user' || roleValue.startsWith('yanum-')) {
                permissionGroup.style.display = 'block';
            } else {
                permissionGroup.style.display = 'none';
            }
        }

        roleSelect.addEventListener('change', togglePermissions);
        togglePermissions();
    });
</script>
@endpush --}}


@extends('layouts.main')

@section('content')
<div class="p-6">
    <div class="bg-white p-6 rounded-2xl shadow">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-xl font-bold text-gray-800">Edit User</h3>
            <a href="{{ route('user.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-500 text-white text-sm font-medium rounded-lg shadow hover:bg-gray-600 transition">
                <i class="fa fa-arrow-left mr-2"></i> Kembali
            </a>
        </div>

        <form action="{{ route('user.update', $user->id) }}" method="POST" autocomplete="off" class="space-y-4">
            @csrf
            @method('PUT')

            <input type="text" name="fakeusernameremembered" class="hidden">
            <input type="password" name="fakepasswordremembered" class="hidden">

            <div>
                <label for="name" class="block text-sm font-semibold mb-1">Nama</label>
                <input type="text" name="name" id="name" value="{{ $user->name }}" placeholder="Masukkan nama lengkap" required class="w-full border-gray-300 rounded-lg px-3 py-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label for="email" class="block text-sm font-semibold mb-1">Email</label>
                <input type="email" name="email" id="email" value="{{ $user->email }}" placeholder="Masukkan email" autocomplete="off" required class="w-full border-gray-300 rounded-lg px-3 py-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label for="unit_kerja" class="block text-sm font-semibold mb-1">Unit Kerja</label>
                <input type="text" name="unit_kerja" id="unit_kerja" value="{{ $user->unit_kerja }}" placeholder="Masukkan unit kerja (contoh: P3T, PPA)" required class="w-full border-gray-300 rounded-lg px-3 py-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label for="roleSelect" class="block text-sm font-semibold mb-1">Role</label>
                <select name="role" id="roleSelect" required class="w-full border-gray-300 rounded-lg px-3 py-2 focus:ring-blue-500 focus:border-blue-500">
                    @foreach ($roles as $role)
                    <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                        {{ ucfirst($role->name) }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div id="permissionGroup" class="hidden">
                <label class="block text-sm font-semibold mb-2">Akses Halaman</label>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-2">
                    @foreach ($permissions as $perm)
                    <div class="flex items-center">
                        <input type="checkbox" name="permissions[]" value="{{ $perm->name }}" id="perm_{{ $perm->id }}" {{ in_array($perm->name, $userPermissions) ? 'checked' : '' }} class="mr-2 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        <label for="perm_{{ $perm->id }}" class="text-sm text-gray-700">
                            {{ ucfirst(str_replace('akses.', '', $perm->name)) }}
                        </label>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="flex justify-end gap-2 pt-4">
                <a href="{{ route('user.index') }}" class="inline-flex items-center px-5 py-2 border border-gray-300 text-gray-600 text-sm font-medium rounded-lg hover:bg-gray-100 transition">
                    <i class="fa fa-times mr-2"></i> Batal
                </a>
                <button type="submit" class="inline-flex items-center px-5 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg shadow hover:bg-blue-700 transition">
                    <i class="fa fa-save mr-2"></i> Update
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
            const roleValue = roleSelect.value.toLowerCase();
            if (roleValue === 'user' || roleValue.startsWith('yanum-')) {
                permissionGroup.classList.remove('hidden');
            } else {
                permissionGroup.classList.add('hidden');
            }
        }

        roleSelect.addEventListener('change', togglePermissions);
        togglePermissions();
    });
</script>
@endpush
