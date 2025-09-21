@extends('layouts.app', ['title' => 'Selecciona tu Tipo de Acceso'])

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <h1 class="display-4 mb-4">Bienvenido a EduPymes</h1>
            <p class="lead mb-5">Selecciona cómo quieres acceder a nuestra plataforma</p>

            <div class="row">
                <!-- Tarjeta Vendedor -->
                <div class="col-md-6 mb-4">
                    <div class="card h-100 shadow-lg border-primary">
                        <div class="card-header bg-primary text-white py-4">
                            <i class="fas fa-store fa-3x mb-3"></i>
                            <h3>Soy Vendedor</h3>
                            <p class="mb-0">Tengo productos para vender</p>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled text-start">
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Gestiona tus productos</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Controla tu inventario</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Contacta con compradores</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Analiza tus ventas</li>
                            </ul>
                        </div>
                        <div class="card-footer bg-transparent">
                            <a href="{{ route('login.vendedor') }}" class="btn btn-primary btn-lg w-100">
                                <i class="fas fa-sign-in-alt me-2"></i>Acceder como Vendedor
                            </a>
                            <div class="mt-2">
                                <small>¿No tienes cuenta? 
                                    <a href="{{ route('register.vendedor') }}">Regístrate aquí</a>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tarjeta Comprador -->
                <div class="col-md-6 mb-4">
                    <div class="card h-100 shadow-lg border-info">
                        <div class="card-header bg-info text-white py-4">
                            <i class="fas fa-shopping-cart fa-3x mb-3"></i>
                            <h3>Soy Comprador</h3>
                            <p class="mb-0">Busco productos únicos</p>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled text-start">
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Explora productos exclusivos</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Contacta directamente con vendedores</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Encuentra ofertas especiales</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Apoya emprendedores locales</li>
                            </ul>
                        </div>
                        <div class="card-footer bg-transparent">
                            <a href="{{ route('login.comprador') }}" class="btn btn-info btn-lg w-100 text-white">
                                <i class="fas fa-sign-in-alt me-2"></i>Acceder como Comprador
                            </a>
                            <div class="mt-2">
                                <small>¿No tienes cuenta? 
                                    <a href="{{ route('register.comprador') }}">Regístrate aquí</a>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection