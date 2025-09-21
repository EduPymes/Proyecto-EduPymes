@extends('layouts.app', ['title' => 'Registro Compradores - EduPymes'])

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-info">
                <div class="card-header bg-info text-white text-center py-4">
                    <i class="fas fa-shopping-cart fa-3x mb-3"></i>
                    <h2 class="mb-0">Registro Compradores</h2>
                    <p class="mb-0">Encuentra productos únicos</p>
                </div>

                <div class="card-body p-4">
                    <form method="POST" action="{{ route('register.comprador') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">
                                <i class="fas fa-user me-1 text-info"></i>Nombre Completo
                            </label>
                            <input id="name" type="text" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   name="name" value="{{ old('name') }}" 
                                   required autocomplete="name" autofocus
                                   placeholder="Tu nombre completo">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">
                                <i class="fas fa-envelope me-1 text-info"></i>Correo Electrónico
                            </label>
                            <input id="email" type="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   name="email" value="{{ old('email') }}" 
                                   required autocomplete="email"
                                   placeholder="correo@ejemplo.com">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">
                                <i class="fas fa-phone me-1 text-info"></i>Teléfono (opcional)
                            </label>
                            <input id="phone" type="tel" 
                                   class="form-control @error('phone') is-invalid @enderror" 
                                   name="phone" value="{{ old('phone') }}"
                                   placeholder="+569 1234 5678">

                            @error('phone')
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
                                   name="password" required autocomplete="new-password"
                                   placeholder="Mínimo 8 caracteres">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password-confirm" class="form-label">
                                <i class="fas fa-lock me-1 text-info"></i>Confirmar Contraseña
                            </label>
                            <input id="password-confirm" type="password" 
                                   class="form-control" 
                                   name="password_confirmation" required autocomplete="new-password"
                                   placeholder="Repite tu contraseña">
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="terms" required>
                            <label class="form-check-label" for="terms">
                                Acepto los <a href="#" class="text-decoration-none">términos y condiciones</a>
                            </label>
                        </div>

                        <div class="d-grid gap-2 mb-3">
                            <button type="submit" class="btn btn-info btn-lg text-white">
                                <i class="fas fa-user-plus me-2"></i>Crear Cuenta de Comprador
                            </button>
                        </div>

                        <div class="text-center">
                            <p class="mb-0">¿Ya tienes cuenta?</p>
                            <a href="{{ route('login.comprador') }}" class="text-decoration-none">
                                Inicia sesión aquí
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection