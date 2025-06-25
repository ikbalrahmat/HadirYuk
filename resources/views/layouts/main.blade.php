{{-- <!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME') }}</title>


    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">
</head>

<body>
    <nav class="navbar shadow-sm navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="#">HadirYuk</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('presence.index') }}">Daftar Absensi</a>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>

    @stack('js')
</body>

</html> --}}


{{-- <!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME', 'HadirYuk') }}</title>


    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">


    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">
</head>

<body>

    <nav class="navbar shadow-sm navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand fw-semibold" href="#">HadirYuk</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('risalah.index') }}">Risalah</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('presence.index') }}">Riwayat Agenda / Kegiatan</a>
                    </li>
                </ul>


                <ul class="navbar-nav ms-auto">
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bi bi-person-circle me-1"></i> {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="bi bi-box-arrow-right me-1"></i> {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>


    <main class="py-4">
        @yield('content')
    </main>


    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>


    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>

    @stack('js')
</body>

</html> --}}


{{-- <!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME', 'HadirYuk') }}</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">

    <style>
        body {
            margin: 0;
            padding: 0;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background-color: #f8f9fa;
            border-right: 1px solid #dee2e6;
            padding: 1.5rem 1rem;
        }

        .main-content {
            margin-left: 250px;
            padding: 1rem;
        }

        .navbar-custom {
            margin-left: 250px;
        }

        @media (max-width: 768px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
                border-right: none;
            }

            .main-content,
            .navbar-custom {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h5 class="fw-semibold mb-4">HadirYuk</h5>
        <div class="list-group">
            <a href="{{ route('risalah.index') }}" class="list-group-item list-group-item-action border-0">
                <i class="bi bi-journal-text me-2"></i> Risalah
            </a>
            <a href="{{ route('presence.index') }}" class="list-group-item list-group-item-action border-0">
                <i class="bi bi-calendar-check me-2"></i> Riwayat Agenda
            </a>
        </div>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm navbar-custom">
        <div class="container-fluid justify-content-end">
            <ul class="navbar-nav">
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="bi bi-person-circle me-1"></i> {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="bi bi-box-arrow-right me-1"></i> {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>

    <!-- Content -->
    <div class="main-content">
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>

    @stack('js')

</body>

</html> --}}


{{-- <!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME', 'HadirYuk') }}</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">

    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #F1F5F9;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background-color: #1E293B;
            padding: 1.5rem 1rem;
        }

        .sidebar h5 {
            color: #ffffff;
        }

        .list-group-item {
            background-color: transparent;
            color: #ffffff;
            font-weight: 500;
            border: none;
            border-radius: 0.375rem;
            margin-bottom: 0.5rem;
        }

        .list-group-item:hover,
        .list-group-item.active {
            background-color: #3B82F6;
            color: #ffffff;
        }

        .navbar-custom {
            margin-left: 250px;
            background-color: #ffffff !important;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
        }

        .main-content {
            margin-left: 250px;
            padding: 2rem;
        }

        @media (max-width: 768px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
                border-right: none;
            }

            .main-content,
            .navbar-custom {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h5 class="fw-bold mb-4 text-center">HadirYuk</h5>
        <div class="list-group">
            <a href="{{ route('risalah.index') }}" class="list-group-item list-group-item-action">
                <i class="bi bi-journal-text me-2"></i> Risalah
            </a>
            <a href="{{ route('presence.index') }}" class="list-group-item list-group-item-action">
                <i class="bi bi-calendar-check me-2"></i> Riwayat Agenda
            </a>
        </div>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light navbar-custom">
        <div class="container-fluid justify-content-end">
            <ul class="navbar-nav">
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="bi bi-person-circle me-1"></i> {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="bi bi-box-arrow-right me-1"></i> {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>

    <!-- Content -->
    <div class="main-content">
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>

    @stack('js')

</body>

</html> --}}



{{-- <!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME', 'HadirYuk') }}</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">

    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #F1F5F9;
        }

        .wrapper {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background-color: #1E293B;
            padding: 1.5rem 1rem;
        }

        .sidebar h5 {
            color: #ffffff;
        }

        .list-group-item {
            background-color: transparent;
            color: #ffffff;
            font-weight: 500;
            border: none;
            border-radius: 0.375rem;
            margin-bottom: 0.5rem;
        }

        .list-group-item:hover,
        .list-group-item.active {
            background-color: #3B82F6;
            color: #ffffff;
        }

        .navbar-custom {
            margin-left: 250px;
            background-color: #ffffff !important;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
        }

        .main-content {
            margin-left: 250px;
            padding: 2rem;
            flex: 1;
        }

        footer {
            margin-left: 250px;
            border-top: 1px solid #dee2e6;
        }

        @media (max-width: 768px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
                border-right: none;
            }

            .navbar-custom,
            .main-content,
            footer {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>
    <div class="wrapper">

        <!-- Sidebar -->
        <div class="sidebar">
            <h5 class="fw-bold mb-4 text-center">HadirYuk</h5>
            <div class="list-group">
                <a href="{{ route('risalah.index') }}" class="list-group-item list-group-item-action">
                    <i class="bi bi-journal-text me-2"></i> Risalah
                </a>
                <a href="{{ route('presence.index') }}" class="list-group-item list-group-item-action">
                    <i class="bi bi-calendar-check me-2"></i> Riwayat Agenda
                </a>
            </div>
        </div>

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light navbar-custom">
            <div class="container-fluid justify-content-end">
                <ul class="navbar-nav">
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bi bi-person-circle me-1"></i> {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="bi bi-box-arrow-right me-1"></i> {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="main-content">
            @yield('content')
        </div>

        <!-- Footer -->
        <footer class="text-center py-3 bg-light mt-4">
            <small class="text-muted">
                &copy; {{ date('Y') }} HadirYuk. All rights reserved.
            </small>
        </footer>

    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>

    @stack('js')

</body>

</html> --}}


{{-- <!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME', 'HadirYuk') }}</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">

    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #F1F5F9;
        }

        .wrapper {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background-color: #1E293B;
            padding: 1.5rem 1rem;
        }

        .sidebar h5 {
            color: #ffffff;
        }

        .list-group-item {
            background-color: transparent;
            color: #ffffff;
            font-weight: 500;
            border: none;
            border-radius: 0.375rem;
            margin-bottom: 0.5rem;
        }

        .list-group-item:hover,
        .list-group-item.active {
            background-color: #3B82F6;
            color: #ffffff;
        }

        .navbar-custom {
            margin-left: 250px;
            background-color: #ffffff !important;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
        }

        .main-content {
            margin-left: 250px;
            padding: 2rem;
            flex: 1;
        }

        footer {
            margin-left: 250px;
        }

        @media (max-width: 768px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
                border-right: none;
            }

            .navbar-custom,
            .main-content,
            footer {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>
    <div class="wrapper">

        <!-- Sidebar -->
        <div class="sidebar">
            <h5 class="fw-bold mb-4 text-center">HadirYuk</h5>
            <div class="list-group">
                <a href="{{ route('risalah.index') }}" class="list-group-item list-group-item-action">
                    <i class="bi bi-journal-text me-2"></i> Risalah
                </a>
                <a href="{{ route('presence.index') }}" class="list-group-item list-group-item-action">
                    <i class="bi bi-calendar-check me-2"></i> Riwayat Agenda
                </a>
            </div>
        </div>

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light navbar-custom sticky-top">
            <div class="container-fluid justify-content-end">
                <ul class="navbar-nav">
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bi bi-person-circle me-1"></i> {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="bi bi-box-arrow-right me-1"></i> {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="main-content">
            @yield('content')
        </div>

        <!-- Footer -->
        <footer class="text-center py-3 mt-4 bg-light border-top ">
            <small class="text-muted">
                &copy; {{ date('Y') }} HadirYuk.
            </small>
        </footer>

    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>

    @stack('js')

</body>

</html> --}}


{{-- <!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ env('APP_NAME', 'HadirYuk') }}</title>

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Bootstrap & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">


  <!-- DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">

  <style>
    body {
      margin: 0;
      padding: 0;
      background-color: #F1F5F9;
    }

    .wrapper {
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    .sidebar {
      width: 250px;
      height: 100vh;
      position: fixed;
      left: 0;
      top: 0;
      background-color: #1E293B;
      padding: 1.5rem 1rem;
      z-index: 1050;
    }

    .sidebar h5 {
      color: #ffffff;
    }

    .list-group-item {
      background-color: transparent;
      color: #ffffff;
      font-weight: 500;
      border: none;
      border-radius: 0.375rem;
      margin-bottom: 0.5rem;
    }

    .list-group-item:hover,
    .list-group-item.active {
      background-color: #3B82F6;
      color: #ffffff;
    }

    .navbar-custom {
      margin-left: 250px;
      background-color: #ffffff !important;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
    }

    .main-content {
      margin-left: 250px;
      padding: 2rem;
      flex: 1;
    }

    footer {
      margin-left: 250px;
    }

    @media (max-width: 992px) {
      .sidebar {
        position: relative;
        width: 100%;
        height: auto;
      }

      .navbar-custom,
      .main-content,
      footer {
        margin-left: 0;
      }
    }
  </style>
</head>

<body>
  <div class="wrapper">

    <!-- Sidebar (collapse for mobile) -->
    <div id="mobileSidebar" class="sidebar collapse d-lg-block">
      <div class="text-center mb-4">
        <a href="{{ route('home') }}">
            <img src="{{ asset('assets/hadiryuk.png') }}" alt="Logo HadirYuk" class="img-fluid" style="max-height: 50px;">
        </a>
        </div>
        <div class="list-group">
            <a href="{{ route('home') }}" class="list-group-item list-group-item-action">
                <i class="bi bi-house-door me-2"></i> Dashboard
            </a>
            <a href="https://portal.peruri.co.id/portal/site/login?redir=https://portal.peruri.co.id/portal/"
                    class="list-group-item list-group-item-action"
                    target="_blank" rel="noopener noreferrer">
                <i class="bi bi-envelope-paper me-2"></i> Undangan
            </a>
            <a href="{{ route('susunan.index') }}" class="list-group-item list-group-item-action">
                <i class="bi bi-list-task me-2"></i> Susunan Acara
            </a>
            <a href="{{ route('rapat.index') }}" class="list-group-item list-group-item-action">
                <i class="bi bi-people-fill me-2"></i> Rapat
            </a>
            <a href="{{ route('materi.index') }}" class="list-group-item list-group-item-action">
                <i class="bi bi-journal-richtext me-2"></i> Materi
            </a>
            <a href="{{ route('presence.index') }}" class="list-group-item list-group-item-action">
                <i class="bi bi-calendar-check me-2"></i> Absensi
            </a>
            <a href="{{ route('risalah.index') }}" class="list-group-item list-group-item-action">
                <i class="bi bi-file-earmark-text me-2"></i> Risalah
            </a>
            <a href="{{ route('kuis.index') }}" class="list-group-item list-group-item-action">
                <i class="bi bi-patch-question-fill me-2"></i> Kuis
            </a>
            <a href="{{ route('survey.index') }}" class="list-group-item list-group-item-action">
                <i class="bi bi-bar-chart-line me-2"></i> Survey
            </a>
        </div>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light navbar-custom sticky-top">
      <div class="container-fluid">
        <!-- Sidebar toggle for mobile -->
        <button class="btn btn-outline-secondary d-lg-none me-2" type="button" data-bs-toggle="collapse"
          data-bs-target="#mobileSidebar">
          <i class="bi bi-list"></i>
        </button>

        <div class="ms-auto">
          <ul class="navbar-nav">
            @guest
              @if (Route::has('login'))
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
              @endif
              @if (Route::has('register'))
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
              @endif
            @else
              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                  data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="bi bi-person-circle me-1"></i> {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="bi bi-box-arrow-right me-1"></i> {{ __('Logout') }}
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                  </form>
                </div>
              </li>
            @endguest
          </ul>
        </div>
      </div>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
      @yield('content')
    </div>

    <!-- Footer -->
    <footer class="text-center py-3 mt-4 bg-light border-top">
      <small class="text-muted">
        &copy; {{ date('Y') }} HadirYuk.
      </small>
    </footer>

  </div>

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
  </script>
  <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>

  @stack('js')
</body>

</html> --}}



{{-- <!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ env('APP_NAME', 'HadirYuk') }}</title>

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Bootstrap & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <!-- DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">

  <style>
    body {
      margin: 0;
      padding: 0;
      background-color: #F1F5F9;
    }

    .wrapper {
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    .sidebar {
      width: 250px;
      height: 100vh;
      position: fixed;
      left: 0;
      top: 0;
      background-color: #1E293B;
      padding: 1.5rem 1rem;
      z-index: 1050;
    }

    .sidebar-logo {
      padding: 1rem 0;
      border-bottom: 1px solid rgba(255, 255, 255, 0.15);
      margin-bottom: 1rem;
    }

    .sidebar-logo img {
      max-height: 48px;
    }

    .list-group-item {
      background-color: transparent;
      color: #ffffff;
      font-weight: 500;
      border: none;
      border-radius: 0.375rem;
      margin-bottom: 0.5rem;
    }

    .list-group-item:hover,
    .list-group-item.active {
      background-color: #3B82F6;
      color: #ffffff;
    }

    .navbar-custom {
      margin-left: 250px;
      background-color: #ffffff !important;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
    }

    .main-content {
      margin-left: 250px;
      padding: 2rem;
      flex: 1;
    }

    footer {
      margin-left: 250px;
    }

    @media (max-width: 992px) {
      .sidebar {
        position: relative;
        width: 100%;
        height: auto;
      }

      .navbar-custom,
      .main-content,
      footer {
        margin-left: 0;
      }
    }
  </style>
</head>

<body>
  <div class="wrapper">

    <!-- Sidebar -->
    <div id="mobileSidebar" class="sidebar collapse d-lg-block">
      <div class="sidebar-logo text-center">
        <a href="{{ route('home') }}">
          <img src="{{ asset('assets/hadiryuk.png') }}" alt="Logo HadirYuk" class="img-fluid" style="max-height: 80px;">
        </a>
      </div>

      <div class="list-group">
        <a href="{{ route('home') }}" class="list-group-item list-group-item-action">
          <i class="bi bi-house-door me-2"></i> Dashboard
        </a>
        <a href="{{ route('user.index') }}" class="list-group-item list-group-item-action">
          <i class="bi bi-people-fill me-2"></i> User Management
        </a>
        <a href="https://portal.peruri.co.id/portal/site/login?redir=https://portal.peruri.co.id/portal/"
          class="list-group-item list-group-item-action" target="_blank" rel="noopener noreferrer">
          <i class="bi bi-envelope-paper me-2"></i> Undangan
        </a>
        <a href="{{ route('susunan.index') }}" class="list-group-item list-group-item-action">
          <i class="bi bi-list-task me-2"></i> Susunan Acara
        </a>
        <a href="{{ route('rapat.index') }}" class="list-group-item list-group-item-action">
            <i class="bi bi-people-fill me-2"></i> Rapat
        </a>
        <a href="{{ route('materi.index') }}" class="list-group-item list-group-item-action">
            <i class="bi bi-journal-richtext me-2"></i> Materi
        </a>
        <a href="{{ route('presence.index') }}" class="list-group-item list-group-item-action">
            <i class="bi bi-calendar-check me-2"></i> Absensi
        </a>
        <a href="{{ route('risalah.index') }}" class="list-group-item list-group-item-action">
            <i class="bi bi-file-earmark-text me-2"></i> Risalah
        </a>
        <a href="{{ route('kuis.index') }}" class="list-group-item list-group-item-action">
            <i class="bi bi-patch-question-fill me-2"></i> Kuis
        </a>
        <a href="{{ route('survey.index') }}" class="list-group-item list-group-item-action">
            <i class="bi bi-bar-chart-line me-2"></i> Survey
        </a>
        <a href="{{ route('kalkulator.index') }}" class="list-group-item list-group-item-action">
            <i class="bi bi-calculator me-2"></i> Kalkulator
        </a>
        <a href="{{ route('konsumsi.index') }}" class="list-group-item list-group-item-action">
            <i class="bi bi-cup-straw me-2"></i> Konsumsi
        </a>

      </div>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light navbar-custom sticky-top">
      <div class="container-fluid">
        <!-- Sidebar toggle -->
        <button class="btn btn-outline-secondary d-lg-none me-2" type="button" data-bs-toggle="collapse"
          data-bs-target="#mobileSidebar">
          <i class="bi bi-list"></i>
        </button>

        <div class="ms-auto">
          <ul class="navbar-nav">
            @guest
              @if (Route::has('login'))
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
              @endif
              @if (Route::has('register'))
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
              @endif
            @else
              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                  data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="bi bi-person-circle me-1"></i> {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="bi bi-box-arrow-right me-1"></i> {{ __('Logout') }}
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                  </form>
                </div>
              </li>
            @endguest
          </ul>
        </div>
      </div>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
      @yield('content')
    </div>

    <!-- Footer -->
    <footer class="text-center py-3 mt-4 bg-light border-top">
      <small class="text-muted">
        &copy; {{ date('Y') }} HadirYuk.
      </small>
    </footer>

  </div>

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>

  @stack('js')
</body>

</html> --}}

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ env('APP_NAME', 'HadirYuk') }}</title>

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Bootstrap & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <!-- DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">

  <style>
    body {
      margin: 0;
      padding: 0;
      background-color: #F1F5F9;
    }

    .wrapper {
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    .sidebar {
      width: 250px;
      height: 100vh;
      position: fixed;
      left: 0;
      top: 0;
      background-color: #1E293B;
      padding: 1.5rem 1rem;
      z-index: 1050;
    }

    .sidebar-logo {
      padding: 1rem 0;
      border-bottom: 1px solid rgba(255, 255, 255, 0.15);
      margin-bottom: 1rem;
    }

    .sidebar-logo img {
      max-height: 48px;
    }

    .list-group-item {
      background-color: transparent;
      color: #ffffff;
      font-weight: 500;
      border: none;
      border-radius: 0.375rem;
      margin-bottom: 0.5rem;
    }

    .list-group-item:hover,
    .list-group-item.active {
      background-color: #3B82F6;
      color: #ffffff;
    }

    .navbar-custom {
      margin-left: 250px;
      background-color: #ffffff !important;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
    }

    .main-content {
      margin-left: 250px;
      padding: 2rem;
      flex: 1;
    }

    footer {
      margin-left: 250px;
    }

    @media (max-width: 992px) {
      .sidebar {
        position: relative;
        width: 100%;
        height: auto;
      }

      .navbar-custom,
      .main-content,
      footer {
        margin-left: 0;
      }
    }
  </style>
</head>

<body>
  <div class="wrapper">

    <!-- Sidebar -->
    <div id="mobileSidebar" class="sidebar collapse d-lg-block">
      <div class="sidebar-logo text-center">
        <a href="{{ route('home') }}">
          <img src="{{ asset('assets/hadiryuk.png') }}" alt="Logo HadirYuk" class="img-fluid" style="max-height: 80px;">
        </a>
      </div>

      <div class="list-group">
        @if(auth()->user()->can('akses.dashboard'))
          <a href="{{ route('home') }}" class="list-group-item list-group-item-action">
            <i class="bi bi-house-door me-2"></i> Dashboard
          </a>
        @endif

        @if(auth()->user()->can('akses.user'))
          <a href="{{ route('user.index') }}" class="list-group-item list-group-item-action">
            <i class="bi bi-people-fill me-2"></i> User Management
          </a>
        @endif

        @if(auth()->user()->can('akses.undangan'))
          <a href="https://portal.peruri.co.id/portal/site/login?redir=https://portal.peruri.co.id/portal/"
            class="list-group-item list-group-item-action" target="_blank" rel="noopener noreferrer">
            <i class="bi bi-envelope-paper me-2"></i> Undangan
          </a>
        @endif

        @if(auth()->user()->can('akses.susunan'))
          <a href="{{ route('susunan.index') }}" class="list-group-item list-group-item-action">
            <i class="bi bi-list-task me-2"></i> Susunan Acara
          </a>
        @endif

        @if(auth()->user()->can('akses.rapat'))
          <a href="{{ route('rapat.index') }}" class="list-group-item list-group-item-action">
            <i class="bi bi-people-fill me-2"></i> Rapat
          </a>
        @endif

        @if(auth()->user()->can('akses.materi'))
          <a href="{{ route('materi.index') }}" class="list-group-item list-group-item-action">
            <i class="bi bi-journal-richtext me-2"></i> Materi
          </a>
        @endif

        @if(auth()->user()->can('akses.absensi'))
          <a href="{{ route('presence.index') }}" class="list-group-item list-group-item-action">
            <i class="bi bi-calendar-check me-2"></i> Absensi
          </a>
        @endif

        @if(auth()->user()->can('akses.risalah'))
          <a href="{{ route('risalah.index') }}" class="list-group-item list-group-item-action">
            <i class="bi bi-file-earmark-text me-2"></i> Risalah
          </a>
        @endif

        @if(auth()->user()->can('akses.kuis'))
          <a href="{{ route('kuis.index') }}" class="list-group-item list-group-item-action">
            <i class="bi bi-patch-question-fill me-2"></i> Kuis
          </a>
        @endif

        @if(auth()->user()->can('akses.survey'))
          <a href="{{ route('survey.index') }}" class="list-group-item list-group-item-action">
            <i class="bi bi-bar-chart-line me-2"></i> Survey
          </a>
        @endif

        @if(auth()->user()->can('akses.kalkulator'))
          <a href="{{ route('kalkulator.index') }}" class="list-group-item list-group-item-action">
            <i class="bi bi-calculator me-2"></i> Kalkulator
          </a>
        @endif

        @if(auth()->user()->can('akses.konsumsi'))
          <a href="{{ route('konsumsi.index') }}" class="list-group-item list-group-item-action">
            <i class="bi bi-cup-straw me-2"></i> Konsumsi
          </a>
        @endif
      </div>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light navbar-custom sticky-top">
      <div class="container-fluid">
        <button class="btn btn-outline-secondary d-lg-none me-2" type="button" data-bs-toggle="collapse"
          data-bs-target="#mobileSidebar">
          <i class="bi bi-list"></i>
        </button>

        <div class="ms-auto">
          <ul class="navbar-nav">
            @guest
              @if (Route::has('login'))
                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
              @endif
              @if (Route::has('register'))
                <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
              @endif
            @else
              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                  <i class="bi bi-person-circle me-1"></i> {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                     onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="bi bi-box-arrow-right me-1"></i> Logout
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                  </form>
                </div>
              </li>
            @endguest
          </ul>
        </div>
      </div>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
      @yield('content')
    </div>

    <!-- Footer -->
    <footer class="text-center py-3 mt-4 bg-light border-top">
      <small class="text-muted">&copy; {{ date('Y') }} HadirYuk.</small>
    </footer>
  </div>

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>

  @stack('js')
</body>

</html>
