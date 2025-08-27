

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'JoinYuk') }}</title>
    <meta name="description" content="JoinYuk - Platform digital untuk mengelola rapat, absensi, dan dokumentasi kegiatan perusahaan secara efisien dan terintegrasi.">

    <link rel="icon" href="{{ asset('assets/logo1.png') }}" type="image/png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --primary-color: #3b82f6;
            --primary-hover: #2563eb;
            --text-dark: #1e293b;
            --text-medium: #475569;
            --text-light: #64748b;
            --bg-light: #f8fafc;
            --bg-medium: #f1f5f9;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: var(--text-dark);
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--text-dark) !important;
        }

        .logo-icon {
            background: var(--primary-color);
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
        }

        .hero-section {
            background: white;
            padding: 80px 0;
        }

        .hero-title {
            font-size: 3rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 1.5rem;
        }

        .hero-subtitle {
            font-size: 1.25rem;
            color: var(--text-medium);
            margin-bottom: 2rem;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }

        .btn-primary-custom {
            background: var(--primary-color);
            border: none;
            padding: 12px 24px;
            font-size: 1.1rem;
            border-radius: 8px;
            transition: all 0.2s;
        }

        .btn-primary-custom:hover {
            background: var(--primary-hover);
            transform: translateY(-1px);
        }

        .btn-outline-custom {
            border: 2px solid #e2e8f0;
            color: var(--text-medium);
            padding: 12px 24px;
            font-size: 1.1rem;
            border-radius: 8px;
            background: white;
            transition: all 0.2s;
        }

        .btn-outline-custom:hover {
            background: var(--bg-light);
            border-color: var(--primary-color);
            color: var(--primary-color);
        }

        .features-section {
            background: var(--bg-medium);
            padding: 80px 0;
        }

        .feature-card {
            background: white;
            border: none;
            border-radius: 12px;
            padding: 2rem;
            height: 100%;
            transition: all 0.3s;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }

        .feature-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

        .feature-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
            font-size: 1.5rem;
        }

        .cta-section {
            background: var(--text-dark);
            color: white;
            padding: 80px 0;
        }

        .cta-section h2 {
            color: white;
            margin-bottom: 1.5rem;
        }

        .cta-section p {
            color: #cbd5e1;
            margin-bottom: 2rem;
        }

        .btn-white-outline {
            border: 2px solid #64748b;
            color: white;
            background: transparent;
            padding: 12px 24px;
            font-size: 1.1rem;
            border-radius: 8px;
            transition: all 0.2s;
        }

        .btn-white-outline:hover {
            background: rgba(255,255,255,0.1);
            border-color: white;
            color: white;
        }

        .footer-section {
            background: white;
            border-top: 1px solid #e2e8f0;
            padding: 3rem 0;
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.25rem;
            }

            .hero-subtitle {
                font-size: 1.1rem;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('welcome') }}">
                <img src="{{ asset('assets/logo1.png') }}" alt="Logo JoinYuk" class="img-fluid" style="max-height: 50px;">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Fitur</a>
                    </li>
                    @guest
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="btn btn-primary-custom text-white ms-2">
                            <i class="bi bi-person-circle me-1"></i>
                            Masuk
                        </a>
                    </li>
                    @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="bi bi-person-circle me-1"></i>
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="{{ route('home') }}">
                                    <i class="bi bi-speedometer2 me-1"></i>
                                    Dashboard
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="bi bi-box-arrow-right me-1"></i>
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <section class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="hero-title">
                        Kelola Rapat & Kehadiran dengan
                        <span style="color: var(--primary-color);">JoinYuk</span>
                    </h1>
                    <p class="hero-subtitle">
                        Solusi lengkap untuk manajemen rapat, absensi, dan dokumentasi kegiatan perusahaan.
                        Tingkatkan produktivitas dan efisiensi tim Anda dengan platform terintegrasi yang mudah digunakan.
                    </p>
                    <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center">
                        @auth
                        <a href="{{ route('home') }}" class="btn btn-primary-custom">
                            <i class="bi bi-arrow-right me-2"></i>
                            Buka Dashboard
                        </a>
                        @else
                        <a href="{{ route('login') }}" class="btn btn-primary-custom">
                            <i class="bi bi-arrow-right me-2"></i>
                            Mulai Sekarang
                        </a>
                        @endauth
                        <a href="#features" class="btn btn-outline-custom">
                            <i class="bi bi-info-circle me-2"></i>
                            Pelajari Lebih Lanjut
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="features" class="features-section">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="display-5 fw-bold mb-4">Fitur Lengkap untuk Kebutuhan Perusahaan</h2>
                    <p class="lead text-muted">
                        Semua yang Anda butuhkan untuk mengelola rapat, kehadiran, dan dokumentasi dalam satu platform
                    </p>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="card feature-card">
                        <div class="card-body">
                            <div class="feature-icon bg-primary bg-opacity-10 text-primary">
                                <i class="bi bi-people-fill"></i>
                            </div>
                            <h5 class="card-title fw-bold">User Management</h5>
                            <p class="card-text text-muted">Kelola pengguna dan hak akses dengan mudah</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card feature-card">
                        <div class="card-body">
                            <div class="feature-icon bg-success bg-opacity-10 text-success">
                                <i class="bi bi-list-check"></i>
                            </div>
                            <h5 class="card-title fw-bold">Susunan Acara</h5>
                            <p class="card-text text-muted">Buat dan atur agenda rapat secara terstruktur</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card feature-card">
                        <div class="card-body">
                            <div class="feature-icon" style="background: rgba(147, 51, 234, 0.1); color: #9333ea;">
                                <i class="bi bi-calendar-event"></i>
                            </div>
                            <h5 class="card-title fw-bold">Manajemen Rapat</h5>
                            <p class="card-text text-muted">Jadwalkan dan kelola rapat dengan efisien</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card feature-card">
                        <div class="card-body">
                            <div class="feature-icon" style="background: rgba(249, 115, 22, 0.1); color: #f97316;">
                                <i class="bi bi-file-earmark-text"></i>
                            </div>
                            <h5 class="card-title fw-bold">Materi Rapat</h5>
                            <p class="card-text text-muted">Upload dan bagikan materi presentasi</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card feature-card">
                        <div class="card-body">
                            <div class="feature-icon bg-danger bg-opacity-10 text-danger">
                                <i class="bi bi-person-check"></i>
                            </div>
                            <h5 class="card-title fw-bold">Sistem Absensi</h5>
                            <p class="card-text text-muted">Catat kehadiran peserta secara digital</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card feature-card">
                        <div class="card-body">
                            <div class="feature-icon" style="background: rgba(99, 102, 241, 0.1); color: #6366f1;">
                                <i class="bi bi-file-earmark-bar-graph"></i>
                            </div>
                            <h5 class="card-title fw-bold">Risalah Rapat</h5>
                            <p class="card-text text-muted">Buat dan simpan notulen rapat sistematis</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card feature-card">
                        <div class="card-body">
                            <div class="feature-icon" style="background: rgba(20, 184, 166, 0.1); color: #14b8a6;">
                                <i class="bi bi-patch-question"></i>
                            </div>
                            <h5 class="card-title fw-bold">Kuis & Survey</h5>
                            <p class="card-text text-muted">Buat evaluasi dan feedback interaktif</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card feature-card">
                        <div class="card-body">
                            <div class="feature-icon bg-secondary bg-opacity-10 text-secondary">
                                <i class="bi bi-calculator"></i>
                            </div>
                            <h5 class="card-title fw-bold">Manajemen Anggaran & Konsumsi</h5>
                            <p class="card-text text-muted">Manajemen anggaran dan konsumsi pendukung rapat</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cta-section">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="display-5 fw-bold">Siap Meningkatkan Efisiensi Rapat Anda?</h2>
                    <p class="lead">
                        Bergabunglah dengan tim yang telah merasakan kemudahan mengelola rapat dan kehadiran dengan JoinYuk
                    </p>
                    <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center">
                        @auth
                        <a href="{{ route('home') }}" class="btn btn-primary-custom">
                            <i class="bi bi-arrow-right me-2"></i>
                            Buka Dashboard
                        </a>
                        @else
                        <a href="{{ route('login') }}" class="btn btn-primary-custom">
                            <i class="bi bi-arrow-right me-2"></i>
                            Mulai Sekarang
                        </a>
                        @endauth
                        <a href="{{ route('login') }}" class="btn btn-white-outline">
                            <i class="bi bi-person-circle me-2"></i>
                            Masuk
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('assets/logo1.png') }}" alt="Logo JoinYuk" class="img-fluid" style="max-height: 70px;">
                    </div>
                </div>
                <div class="col-md-6 text-md-end mt-3 mt-md-0">
                    <span class="text-muted">&copy; {{ date('Y') }} JoinYuk. All rights reserved.</span>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</body>
</html>

{{--
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ config('app.name', 'JoinYuk') }}</title>
  <meta name="description" content="JoinYuk - Platform digital untuk mengelola rapat, absensi, dan dokumentasi kegiatan perusahaan secara efisien dan terintegrasi.">

  <link rel="icon" href="{{ asset('assets/logo1.png') }}" type="image/png">

  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"/>
</head>
<body class="font-sans text-slate-800">

  <!-- Navbar -->
  <nav class="bg-white shadow sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 flex items-center justify-between h-16">
      <a href="{{ route('welcome') }}" class="flex items-center space-x-2">
        <img src="{{ asset('assets/logo1.png') }}" alt="Logo JoinYuk" class="h-10">
      </a>

      <div class="hidden md:flex items-center space-x-6">
        <a href="#features" class="text-slate-600 hover:text-blue-600">Fitur</a>

        @guest
        <a href="{{ route('login') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg flex items-center space-x-2">
          <i class="bi bi-person-circle"></i><span>Masuk</span>
        </a>
        @else
        <div class="relative group">
          <button class="flex items-center space-x-2 text-slate-700">
            <i class="bi bi-person-circle"></i>
            <span>{{ Auth::user()->name }}</span>
          </button>
          <div class="absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-lg hidden group-hover:block">
            <a href="{{ route('home') }}" class="block px-4 py-2 hover:bg-slate-100">
              <i class="bi bi-speedometer2"></i> Dashboard
            </a>
            <hr>
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
               class="block px-4 py-2 hover:bg-slate-100">
              <i class="bi bi-box-arrow-right"></i> Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
              @csrf
            </form>
          </div>
        </div>
        @endguest
      </div>
    </div>
  </nav>

  <!-- Hero -->
  <section class="bg-white py-20 text-center">
    <h1 class="text-4xl md:text-5xl font-bold mb-6">
      Kelola Rapat & Kehadiran dengan
      <span class="text-blue-500">JoinYuk</span>
    </h1>
    <p class="text-lg text-slate-600 max-w-3xl mx-auto mb-8">
      Solusi lengkap untuk manajemen rapat, absensi, dan dokumentasi kegiatan perusahaan. Tingkatkan produktivitas dan efisiensi tim Anda dengan platform terintegrasi yang mudah digunakan.
    </p>
    <div class="flex flex-col sm:flex-row gap-4 justify-center">
      @auth
      <a href="{{ route('home') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-lg flex items-center justify-center space-x-2">
        <i class="bi bi-arrow-right"></i><span>Buka Dashboard</span>
      </a>
      @else
      <a href="{{ route('login') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-lg flex items-center justify-center space-x-2">
        <i class="bi bi-arrow-right"></i><span>Mulai Sekarang</span>
      </a>
      @endauth
      <a href="#features" class="border-2 border-slate-200 hover:border-blue-500 hover:text-blue-500 text-slate-600 px-6 py-3 rounded-lg flex items-center justify-center space-x-2">
        <i class="bi bi-info-circle"></i><span>Pelajari Lebih Lanjut</span>
      </a>
    </div>
  </section>

  <!-- Features -->
  <section id="features" class="bg-slate-100 py-20">
    <div class="max-w-7xl mx-auto px-4 text-center mb-12">
      <h2 class="text-3xl font-bold mb-4">Fitur Lengkap untuk Kebutuhan Perusahaan</h2>
      <p class="text-slate-600">Semua yang Anda butuhkan untuk mengelola rapat, kehadiran, dan dokumentasi dalam satu platform</p>
    </div>
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 px-4">

      <!-- Card -->
      <div class="bg-white rounded-xl p-6 shadow hover:shadow-lg transition">
        <div class="w-12 h-12 rounded-lg flex items-center justify-center bg-blue-100 text-blue-600 mb-4">
          <i class="bi bi-people-fill text-xl"></i>
        </div>
        <h5 class="font-bold mb-2">User Management</h5>
        <p class="text-slate-500">Kelola pengguna dan hak akses dengan mudah</p>
      </div>

      <div class="bg-white rounded-xl p-6 shadow hover:shadow-lg transition">
        <div class="w-12 h-12 rounded-lg flex items-center justify-center bg-green-100 text-green-600 mb-4">
          <i class="bi bi-list-check text-xl"></i>
        </div>
        <h5 class="font-bold mb-2">Susunan Acara</h5>
        <p class="text-slate-500">Buat dan atur agenda rapat secara terstruktur</p>
      </div>

      <div class="bg-white rounded-xl p-6 shadow hover:shadow-lg transition">
        <div class="w-12 h-12 rounded-lg flex items-center justify-center bg-purple-100 text-purple-600 mb-4">
          <i class="bi bi-calendar-event text-xl"></i>
        </div>
        <h5 class="font-bold mb-2">Manajemen Rapat</h5>
        <p class="text-slate-500">Jadwalkan dan kelola rapat dengan efisien</p>
      </div>

      <div class="bg-white rounded-xl p-6 shadow hover:shadow-lg transition">
        <div class="w-12 h-12 rounded-lg flex items-center justify-center bg-orange-100 text-orange-600 mb-4">
          <i class="bi bi-file-earmark-text text-xl"></i>
        </div>
        <h5 class="font-bold mb-2">Materi Rapat</h5>
        <p class="text-slate-500">Upload dan bagikan materi presentasi</p>
      </div>

      <!-- Tambahan card lainnya tinggal copy pola di atas -->
    </div>
  </section>

  <!-- CTA -->
  <section class="bg-slate-900 text-white py-20 text-center">
    <h2 class="text-3xl font-bold mb-4">Siap Meningkatkan Efisiensi Rapat Anda?</h2>
    <p class="text-slate-300 mb-8">Bergabunglah dengan tim yang telah merasakan kemudahan mengelola rapat dan kehadiran dengan JoinYuk</p>
    <div class="flex flex-col sm:flex-row gap-4 justify-center">
      @auth
      <a href="{{ route('home') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-lg flex items-center justify-center space-x-2">
        <i class="bi bi-arrow-right"></i><span>Buka Dashboard</span>
      </a>
      @else
      <a href="{{ route('login') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-lg flex items-center justify-center space-x-2">
        <i class="bi bi-arrow-right"></i><span>Mulai Sekarang</span>
      </a>
      @endauth
      <a href="{{ route('login') }}" class="border-2 border-slate-500 hover:border-white hover:bg-white/10 text-white px-6 py-3 rounded-lg flex items-center justify-center space-x-2">
        <i class="bi bi-person-circle"></i><span>Masuk</span>
      </a>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-white border-t border-slate-200 py-8">
    <div class="max-w-7xl mx-auto px-4 flex flex-col md:flex-row items-center justify-between">
      <img src="{{ asset('assets/logo1.png') }}" alt="Logo JoinYuk" class="h-12 mb-4 md:mb-0">
      <span class="text-slate-500">&copy; {{ date('Y') }} JoinYuk. All rights reserved.</span>
    </div>
  </footer>

  <script>
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) target.scrollIntoView({ behavior: 'smooth', block: 'start' });
      });
    });
  </script>
</body>
</html> --}}
