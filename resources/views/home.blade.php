{{-- @extends('layouts.main')

@section('content')
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Selamat Datang di Dashboard</h2>
            <p class="text-muted">Kamu berhasil login ke sistem <strong>JoinYuk</strong>.</p>
        </div>

        <div class="row justify-content-center g-4">
            <div class="col-md-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-calendar-check display-4 text-primary mb-3"></i>
                        <h5 class="card-title">Absensi</h5>
                        <p class="card-text text-muted">Kelola daftar kehadiran peserta rapat dan agenda kegiatan.</p>
                        <a href="{{ route('presence.index') }}" class="btn btn-outline-primary">Lihat Absensi</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-journal-richtext display-4 text-success mb-3"></i>
                        <h5 class="card-title">Materi</h5>
                        <p class="card-text text-muted">Upload dan lihat materi yang dibahas dalam rapat.</p>
                        <a href="{{ route('materi.index') }}" class="btn btn-outline-success">Lihat Materi</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-bar-chart-line display-4 text-warning mb-3"></i>
                        <h5 class="card-title">Survey</h5>
                        <p class="card-text text-muted">Cek dan isi survei terkait rapat dan evaluasi kegiatan.</p>
                        <a href="{{ route('survey.index') }}" class="btn btn-outline-warning">Lihat Survey</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}


@extends('layouts.main')

@section('content')
<div class="py-10">
    <div class="text-center mb-10">
        <h2 class="text-2xl font-bold">Selamat Datang di Dashboard</h2>
        <p class="text-gray-500">Kamu berhasil login ke sistem <strong>JoinYuk</strong>.</p>
    </div>

    <div class="grid gap-6 md:grid-cols-3">
        <!-- Absensi -->
        <div class="bg-white rounded-2xl shadow p-6 text-center">
            <div class="flex items-center justify-center w-16 h-16 mx-auto mb-4 rounded-full bg-blue-100 text-blue-600">
                <i class="fa fa-calendar-check text-2xl"></i>
            </div>
            <h5 class="text-lg font-semibold mb-2">Absensi</h5>
            <p class="text-gray-500 mb-4">Kelola daftar kehadiran peserta rapat dan agenda kegiatan.</p>
            <a href="{{ route('presence.index') }}" class="inline-block px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                Lihat Absensi
            </a>
        </div>

        <!-- Materi -->
        <div class="bg-white rounded-2xl shadow p-6 text-center">
            <div class="flex items-center justify-center w-16 h-16 mx-auto mb-4 rounded-full bg-green-100 text-green-600">
                <i class="fa fa-book text-2xl"></i>
            </div>
            <h5 class="text-lg font-semibold mb-2">Materi</h5>
            <p class="text-gray-500 mb-4">Upload dan lihat materi yang dibahas dalam rapat.</p>
            <a href="{{ route('materi.index') }}" class="inline-block px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                Lihat Materi
            </a>
        </div>

        <!-- Survey -->
        <div class="bg-white rounded-2xl shadow p-6 text-center">
            <div class="flex items-center justify-center w-16 h-16 mx-auto mb-4 rounded-full bg-yellow-100 text-yellow-600">
                <i class="fa fa-chart-line text-2xl"></i>
            </div>
            <h5 class="text-lg font-semibold mb-2">Survey</h5>
            <p class="text-gray-500 mb-4">Cek dan isi survei terkait rapat dan evaluasi kegiatan.</p>
            <a href="{{ route('survey.index') }}" class="inline-block px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 transition">
                Lihat Survey
            </a>
        </div>
    </div>
</div>
@endsection
