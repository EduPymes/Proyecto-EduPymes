@extends('layouts.app', ['title' => 'Login Compradores - EduPymes'])

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-info">
                <div class="card-header bg-info text-white text-center py-4">
                    <i class="fas fa-shopping-cart fa-3x mb-3"></i>
                    <h2 class="mb-0">Acceso Compradores</h2>
                    <p class="mb-0">Encuentra productos únicos</p>
                </div>

                <div class="card-body p-4">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login.comprador') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">
                                <i class="fas fa-envelope me-1 text-info"></i>Correo Electrónico
                            </label>
                            <input id="email" type="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   name="email" value="{{ old('email') }}" 
                                   required autocomplete="email" autofocus
                                   placeholder="correo@ejemplo.com">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">
                                <i class="fas fa-lock me-1 text-info"></i>Contraseña
                            </label>
                            <input id="password" type="password" 
                                   class="form-control @error('password') is-invalid @enderror" 
                                   name="password" required autocomplete="current-password"
                                   placeholder="Ingresa tu contraseña">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3 form-check">
                            <input class="form-check-input" type="checkbox" name="remember" 
                                   id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                Recordar mi sesión
                            </label>
                        </div>

                        <div class="d-grid gap-2 mb-3">
                            <button type="submit" class="btn btn-info btn-lg text-white">
                                <i class="fas fa-sign-in-alt me-2"></i>Ingresar a Comprar
                            </button>
                        </div>

                        @if (Route::has('password.request'))
                            <div class="text-center">
                                <a class="text-decoration-none" href="{{ route('password.request') }}">
                                    ¿Olvidaste tu contraseña?
                                </a>
                            </div>
                        @endif
                    </form>

                    <hr class="my-4">

                    <div class="text-center">
                        <p class="mb-2">¿No tienes cuenta de comprador?</p>
                        <a href="{{ route('register.comprador') }}" class="btn btn-outline-info">
                            <i class="fas fa-user-plus me-2"></i>Crear Cuenta de Comprador
                        </a>
                    </div>

                    <div class="text-center mt-3">
                        <p class="mb-2">¿Eres vendedor?</p>
                        <a href="{{ route('login.vendedor') }}" class="btn btn-outline-primary">
                            <i class="fas fa-store me-2"></i>Acceso Vendedores
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection