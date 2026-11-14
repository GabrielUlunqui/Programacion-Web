<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="SIS Seguridad Electrónica - Gestión de servicios (Laravel)." />
    <title>@yield('title', 'Gestión de Servicios | SIS Seguridad Electrónica')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />
</head>
<body>
    <a class="skip-link" href="#contenido">Saltar al contenido</a>

    <header>
        <nav class="navbar navbar-expand-lg sis-navbar sticky-top" aria-label="Navegación principal">
            <div class="container">
                <a class="navbar-brand sis-brand" href="{{ route('servicios.index') }}">
                    <img class="sis-logo-img" src="{{ asset('img/logo.jpg') }}" alt="SIS Seguridad Electrónica" width="280" height="88" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav"
                        aria-controls="mainNav" aria-expanded="false" aria-label="Abrir menú">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="mainNav">
                    <ul class="navbar-nav mx-lg-auto sis-nav mb-3 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('servicios.index') ? 'active' : '' }}"
                               href="{{ route('servicios.index') }}">Servicios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('servicios.create') ? 'active' : '' }}"
                               href="{{ route('servicios.create') }}">Nuevo Servicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost:8000/Programacion-Web/auth/admin_panel.php">
                                <i class="bi bi-arrow-left me-1"></i>Panel Admin
                            </a>
                        </li>
                    </ul>
                    <a class="btn btn-sis" href="{{ route('servicios.create') }}">Agregar servicio</a>
                </div>
            </div>
        </nav>
    </header>

    @if (session('success'))
        <div class="container mt-4">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        </div>
    @endif

    @if ($errors->any())
        <div class="container mt-4">
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <main id="contenido">
        @yield('content')
    </main>

    <footer class="sis-footer">
        <div class="container">
            <div class="footer-bottom">© {{ date('Y') }} SIS Seguridad Electrónica. Gestión de servicios - Laravel 12.</div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
