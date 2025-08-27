{{-- @extends('layouts.main')

@section('content')
<div class="container py-5">
  <h1 class="text-center mb-4">Pilih Platform Rapat</h1>

  <div class="row justify-content-center g-4">

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
@endsection --}}


@extends('layouts.main')

@section('content')
<div class="container mx-auto py-10">
    <h1 class="text-2xl font-bold text-center text-gray-800 mb-8">Pilih Platform Rapat</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-4xl mx-auto">
        {{-- Zoom Card --}}
        <div class="bg-white rounded-2xl shadow-md p-6 flex flex-col items-center text-center hover:shadow-lg transition">
            <div class="text-blue-600 mb-4">
                <i class="bi bi-camera-video text-6xl"></i>
            </div>
            <h5 class="text-lg font-semibold mb-2">Zoom</h5>
            <p class="text-gray-600 mb-4">Masuk ke ruang Zoom untuk rapat.</p>
            <a href="{{ route('rapat.zoom') }}" target="_blank" rel="noopener noreferrer"
               class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition mt-auto">
               Gabung Zoom
            </a>
        </div>

        {{-- Google Meet Card --}}
        <div class="bg-white rounded-2xl shadow-md p-6 flex flex-col items-center text-center hover:shadow-lg transition">
            <div class="text-green-600 mb-4">
                <i class="bi bi-camera-video-fill text-6xl"></i>
            </div>
            <h5 class="text-lg font-semibold mb-2">Google Meet</h5>
            <p class="text-gray-600 mb-4">Masuk ke ruang Google Meet Anda.</p>
            <a href="{{ route('rapat.gmeet') }}" target="_blank" rel="noopener noreferrer"
               class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition mt-auto">
               Gabung Google Meet
            </a>
        </div>
    </div>
</div>
@endsection
