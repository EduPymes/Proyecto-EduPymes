@extends('layouts.app', ['title' => 'Selecciona tu Tipo de Usuario'])

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <h1 class="display-4 mb-4">¡Bienvenido a EduPymes!</h1>
            <p class="lead mb-5">Selecciona cómo quieres usar nuestra plataforma</p>

            <div class="row">
                <!-- Tarjeta Vendedor -->
                <div class="col-md-6 mb-4">
                    <div class="card h-100 shadow-lg border-primary">
                        <div class="card-header bg-primary text-white py-4">
                            <i class="fas fa-store fa-3x mb-3"></i>
                            <h3>Quiero Vender</h3>
                            <p class="mb-0">Soy emprendedor/productor</p>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled text-start">
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Publicar mis productos</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Gestionar mi inventario</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Contactar con compradores</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Analizar mis ventas</li>
                            </ul>
                        </div>
                        <div class="card-footer bg-transparent">
                            <a href="{{ route('login.vendedor') }}" class="btn btn-primary btn-lg w-100 mb-2">
                                <i class="fas fa-sign-in-alt me-2"></i>Iniciar Sesión
                            </a>
                            <a href="{{ route('register.vendedor') }}" class="btn btn-outline-primary btn-lg w-100">
                                <i class="fas fa-user-plus me-2"></i>Registrarse
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Tarjeta Comprador -->
                <div class="col-md-6 mb-4">
                    <div class="card h-100 shadow-lg border-info">
                        <div class="card-header bg-info text-white py-4">
                            <i class="fas fa-shopping-cart fa-3x mb-3"></i>
                            <h3>Quiero Comprar</h3>
                            <p class="mb-0">Busco productos únicos</p>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled text-start">
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Explorar productos exclusivos</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Contactar con vendedores</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Encontrar ofertas especiales</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Apoyar emprendedores</li>
                            </ul>
                        </div>
                        <div class="card-footer bg-transparent">
                            <a href="{{ route('login.comprador') }}" class="btn btn-info btn-lg w-100 text-white mb-2">
                                <i class="fas fa-sign-in-alt me-2"></i>Iniciar Sesión
                            </a>
                            <a href="{{ route('register.comprador') }}" class="btn btn-outline-info btn-lg w-100">
                                <i class="fas fa-user-plus me-2"></i>Registrarse
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection