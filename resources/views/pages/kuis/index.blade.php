{{-- @extends('layouts.main')

@section('content')
<div class="container py-5">
    <div class="text-center">
        <h1 class="mb-4">Halaman Kuis</h1>
        <div class="alert alert-info">
            Fitur ini masih dalam tahap pengembangan. Silakan kembali lagi nanti.
        </div>
    </div>
</div>
@endsection --}}


@extends('layouts.main')

@section('content')
<div class="container py-5">
  <div class="text-center mb-5">
    <h1 class="fw-bold mb-4">Pilih Platform Kuis</h1>
    <p class="text-muted">Silakan pilih platform kuis untuk mulai kegiatan interaktif.</p>
  </div>

  <div class="row justify-content-center g-4">
    <!-- Quizizz -->
    <div class="col-md-4">
      <div class="card shadow-sm border-0 h-100">
        <div class="card-body text-center">
          <img src="https://cdn.prod.website-files.com/68355113496452bf05789e95/68480ff9c322e13a2f937a22_Logo_Dark_Primary_Horizontal_MINIMUM.svg"
               alt="Quizizz Logo"
               class="img-fluid mb-3" style="height: 80px;">
          <h5 class="card-title">Quizizz</h5>
          <p class="card-text text-muted">Platform kuis interaktif dan pembelajaran berbasis game.</p>
          <a href="https://wayground.com/?lng=id" target="_blank" rel="noopener noreferrer"
             class="btn btn-outline-primary">Buka Quizizz</a>
        </div>
      </div>
    </div>

    <!-- Kahoot -->
    <div class="col-md-4">
      <div class="card shadow-sm border-0 h-100">
        <div class="card-body text-center">
          <img src="https://kahoot.com/files/2020/11/Kahoot-1024-rounded.png"
               alt="Kahoot Logo"
               class="img-fluid mb-3" style="height: 60px;">
          <h5 class="card-title">Kahoot</h5>
          <p class="card-text text-muted">Buat kuis menyenangkan dan langsung ajak peserta bermain.</p>
          <a href="https://kahoot.com/?utm_name=controller_app&utm_source=controller&utm_campaign=controller_app&utm_medium=link"
             target="_blank" rel="noopener noreferrer"
             class="btn btn-outline-success">Buka Kahoot</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
