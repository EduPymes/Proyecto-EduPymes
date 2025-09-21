<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - EduPymes</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <!-- Estilos personalizados -->
    <style>
        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
        }
        .card {
            transition: transform 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .jumbotron {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 3rem;
            border-radius: 0.5rem;
            margin-bottom: 2rem;
        }
        .bg-primary { background-color: #007bff !important; }
        .bg-info { background-color: #17a2b8 !important; }
        .btn-primary { background-color: #007bff; border-color: #007bff; }
        .btn-info { background-color: #17a2b8; border-color: #17a2b8; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="fas fa-store me-2"></i>EduPymes
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('products.index') }}">
                            <i class="fas fa-search me-1"></i>Catálogo
                        </a>
                    </li>
                    @auth
                        @if(auth()->user()->isPyme() || auth()->user()->isAdmin())
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('vendedor.dashboard') }}">
                                    <i class="fas fa-store me-1"></i>Mi Tienda
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('products.create') }}">
                                    <i class="fas fa-plus me-1"></i>Publicar
                                </a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('comprador.dashboard') }}">
                                    <i class="fas fa-user me-1"></i>Mi Cuenta
                                </a>
                            </li>
                        @endif
                    @endauth
                </ul>

                <ul class="navbar-nav ms-auto">
                    @auth
                        @if(auth()->user()->isPyme() || auth()->user()->isAdmin())
                            <li class="nav-item">
                                <form method="POST" action="{{ route('logout.vendedor') }}" class="d-inline">
                                    @csrf
                                    <button type="submit" class="nav-link btn btn-link">
                                        <i class="fas fa-sign-out-alt me-1"></i>Cerrar Sesión
                                    </button>
                                </form>
                            </li>
                        @else
                            <li class="nav-item">
                                <form method="POST" action="{{ route('logout.comprador') }}" class="d-inline">
                                    @csrf
                                    <button type="submit" class="nav-link btn btn-link">
                                        <i class="fas fa-sign-out-alt me-1"></i>Cerrar Sesión
                                    </button>
                                </form>
                            </li>
                        @endif
                    @else
                        <!-- Botón desplegable para acceso -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                <i class="fas fa-user me-1"></i>Acceso
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="{{ route('login.vendedor') }}">
                                        <i class="fas fa-store me-2 text-primary"></i>Acceso Vendedores
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('login.comprador') }}">
                                        <i class="fas fa-shopping-cart me-2 text-info"></i>Acceso Compradores
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Botón desplegable para registro -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                <i class="fas fa-user-plus me-1"></i>Registrarse
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="{{ route('register.vendedor') }}">
                                        <i class="fas fa-store me-2 text-primary"></i>Registro Vendedores
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('register.comprador') }}">
                                        <i class="fas fa-shopping-cart me-2 text-info"></i>Registro Compradores
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        <div class="container">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            
            @yield('content')
        </div>
    </main>

    <footer class="bg-dark text-white text-center py-4 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <h5>EduPymes</h5>
                    <p>Plataforma para PYMES estudiantiles</p>
                </div>
                <div class="col-md-4 mb-3">
                    <h5>Contacto</h5>
                    <p>contacto@edupymes.cl</p>
                </div>
                <div class="col-md-4 mb-3">
                    <h5>Síguenos</h5>
                    <div class="d-flex justify-content-center gap-3">
                        <a href="#" class="text-white"><i class="fab fa-facebook fa-lg"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-instagram fa-lg"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-twitter fa-lg"></i></a>
                    </div>
                </div>
            </div>
            <hr>
            <p class="mb-0">&copy; {{ date('Y') }} EduPymes - Desarrollado por Wladimir Cortes y Gabriel Opazo</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Scripts personalizados -->
    <script>
        // Funcionalidad básica para tooltips
        document.addEventListener('DOMContentLoaded', function() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            });
        });
    </script>
    
    @stack('scripts')
</body>
</html>