{{-- @extends('layouts.main')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Buat Survey Baru</h1>

    <form action="{{ route('survey.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Judul Survey</label>
            <input type="text" name="judul" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Deadline</label>
            <input type="date" name="deadline" class="form-control">
        </div>
        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="Draft">Draft</option>
                <option value="Aktif">Aktif</option>
                <option value="Selesai">Selesai</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('survey.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection --}}


@extends('layouts.main')

@section('content')
<div class="max-w-3xl mx-auto py-10">
    <h1 class="text-2xl font-bold mb-6">Buat Survey Baru</h1>

    <form action="{{ route('survey.store') }}" method="POST" class="space-y-6 bg-white p-6 rounded-xl shadow">
        @csrf

        <div>
            <label class="block text-sm font-medium mb-1">Judul Survey</label>
            <input type="text" name="judul" class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Deadline</label>
            <input type="date" name="deadline" class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Status</label>
            <select name="status" class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
                <option value="Draft">Draft</option>
                <option value="Aktif">Aktif</option>
                <option value="Selesai">Selesai</option>
            </select>
        </div>

        <div class="flex gap-3">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">Simpan</button>
            <a href="{{ route('survey.index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 transition">Batal</a>
        </div>
    </form>
</div>
@endsection
