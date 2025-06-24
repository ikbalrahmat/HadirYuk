{{-- @extends('layouts.main')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}


@extends('layouts.main')

@section('content')
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Selamat Datang di Dashboard</h2>
            <p class="text-muted">Kamu berhasil login ke sistem <strong>HadirYuk</strong>.</p>
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
@endsection
