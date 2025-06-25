@extends('layouts.main')

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
@endpush
