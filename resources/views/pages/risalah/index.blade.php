@extends('layouts.main')

@section('content')
<div class="container my-4">
    <div class="bg-light p-4 rounded-4 shadow-sm">
        <h3 class="fw-bold text-dark mb-4">Tambah Risalah Baru</h3>

        <form method="POST" action="{{ route('risalah.store') }}">
            @csrf
            <div class="mb-3">
                <label for="judul" class="form-label">Judul Risalah</label>
                <input type="text" name="judul" id="judul" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="isi" class="form-label">Isi Risalah</label>
                <textarea name="isi" id="isi" class="form-control" rows="5" required></textarea>
            </div>
            <div class="d-flex justify-content-between">
                <a href="{{ route('risalah.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan Risalah</button>
            </div>
        </form>
    </div>
</div>
@endsection
