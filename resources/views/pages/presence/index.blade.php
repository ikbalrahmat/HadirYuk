{{-- @extends('layouts.main')

@section('content')
    <div class="container my-4">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <a href="{{ route('presence.create') }}" class="btn btn-primary">
                            Buat Absensi Baru
                        </a>
                    </div>
                    <div class="col text-center">
                        <h4 class="card-title mb-0">
                            Riwayat Agenda/Kegiatan
                        </h4>
                    </div>
                </div>
            </div>

            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
@endsection

@push('js')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        $(document).on('click', '.btn-delete', function(e) {
            e.preventDefault();
            let url = $(this).attr('href');

            if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                $.ajax({
                    type: 'DELETE',
                    url: url,
                    success: function(data) {
                        window.location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
            }
        })
    </script>
@endpush --}}


{{-- @extends('layouts.main')

@section('content')
    <div class="container my-4">
        <div class="card shadow-sm rounded-4 border-0">
            <div class="card-header bg-white py-3 border-0">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h4 class="mb-0 fw-semibold">Riwayat Agenda/Kegiatan</h4>
                    </div>
                    <div class="col-md-6 text-md-end mt-3 mt-md-0">
                        <a href="{{ route('presence.create') }}" class="btn btn-primary rounded-pill px-4">
                            <i class="bi bi-plus-lg me-1"></i> Buat Absensi Baru
                        </a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    {{ $dataTable->table(['class' => 'table table-striped table-hover align-middle']) }}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')

    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        $(document).on('click', '.btn-delete', function(e) {
            e.preventDefault();
            let url = $(this).attr('href');

            if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                $.ajax({
                    type: 'DELETE',
                    url: url,
                    success: function(data) {
                        window.location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
            }
        });
    </script>
@endpush --}}



@extends('layouts.main')

@section('content')
    <div class="container my-4">
        <div class="bg-light p-4 rounded-4 shadow-sm">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="fw-bold text-dark mb-0">Riwayat Agenda / Kegiatan</h3>
                <a href="{{ route('presence.create') }}" class="btn btn-outline-primary rounded-pill px-4 shadow-sm">
                    <i class="bi bi-calendar-plus me-1"></i> Buat Absensi Baru
                </a>
            </div>

            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body bg-white rounded-3">
                    <div class="table-responsive">
                        {{ $dataTable->table(['class' => 'table table-borderless table-striped align-middle mb-0']) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        $(document).on('click', '.btn-delete', function(e) {
            e.preventDefault();
            let url = $(this).attr('href');

            if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                $.ajax({
                    type: 'DELETE',
                    url: url,
                    success: function(data) {
                        window.location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
            }
        });
    </script>
@endpush
