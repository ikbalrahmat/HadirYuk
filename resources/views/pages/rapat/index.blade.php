{{-- @extends('layouts.main')

@section('content')
<div class="container py-5">
    <div class="text-center">
        <h1 class="mb-4">Halaman Rapat</h1>
        <div class="alert alert-info">
            Fitur ini masih dalam tahap pengembangan. Silakan kembali lagi nanti.
        </div>
    </div>
</div>
@endsection --}}


{{-- @extends('layouts.main')

@section('content')
<div class="container py-5">
  <div class="text-center">
    <h1 class="mb-4">Pilih Platform Rapat</h1>
    <div class="d-grid gap-3 col-md-6 mx-auto">
        <a href="{{ route('rapat.zoom') }}" target="_blank" rel="noopener noreferrer"
            class="btn btn-primary btn-lg">
            <i class="bi bi-camera-video me-2"></i> Zoom
            </a>
            <a href="{{ route('rapat.gmeet') }}" target="_blank" rel="noopener noreferrer"
            class="btn btn-success btn-lg">
            <i class="bi bi-camera-video-fill me-2"></i> Google Meet
        </a>
    </div>
    <div class="alert alert-info mt-4">
      Fitur ini masih dalam tahap pengembangan—nanti kamu langsung diarahkan ke Zoom atau Google Meet.
    </div>
  </div>
</div>
@endsection --}}


@extends('layouts.main')

@section('content')
<div class="container py-5">
  <h1 class="text-center mb-4">Pilih Platform Rapat</h1>

  <div class="row justify-content-center g-4">
    {{-- Zoom Card --}}
    <div class="col-md-4">
      <div class="card shadow-sm h-100 text-center">
        <div class="card-body d-flex flex-column justify-content-center">
          <i class="bi bi-camera-video display-4 text-primary mb-3"></i>
          <h5 class="card-title">Zoom</h5>
          <p class="card-text">Masuk ke ruang Zoom untuk rapat.</p>
          <a href="{{ route('rapat.zoom') }}" target="_blank" rel="noopener noreferrer"
             class="btn btn-primary mt-auto">Gabung Zoom</a>
        </div>
      </div>
    </div>

    {{-- Google Meet Card --}}
    <div class="col-md-4">
      <div class="card shadow-sm h-100 text-center">
        <div class="card-body d-flex flex-column justify-content-center">
          <i class="bi bi-camera-video-fill display-4 text-success mb-3"></i>
          <h5 class="card-title">Google Meet</h5>
          <p class="card-text">Masuk ke ruang Google Meet Anda.</p>
          <a href="{{ route('rapat.gmeet') }}" target="_blank" rel="noopener noreferrer"
             class="btn btn-success mt-auto">Gabung Google Meet</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
