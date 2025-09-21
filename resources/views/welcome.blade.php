@extends('layouts.app')

@section('title', 'Inicio - EduPymes')

@section('content')
<div class="container">
    <div class="jumbotron bg-primary text-white text-center py-5">
        <h1 class="display-4">Bienvenido a EduPymes</h1>
        <p class="lead">Plataforma para PYMES estudiantiles</p>
        <hr class="my-4">
        <p>Conectamos emprendedores con compradores</p>
        <div class="mt-4">
            <a href="{{ route('login.vendedor') }}" class="btn btn-light btn-lg me-2">
                <i class="fas fa-store me-2"></i>Acceso Vendedores
            </a>
            <a href="{{ route('login.comprador') }}" class="btn btn-outline-light btn-lg">
                <i class="fas fa-shopping-cart me-2"></i>Acceso Compradores
            </a>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <i class="fas fa-store fa-3x text-primary mb-3"></i>
                    <h5>Para Vendedores</h5>
                    <p>Publica tus productos y llega a m�s clientes</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <i class="fas fa-shopping-cart fa-3x text-info mb-3"></i>
                    <h5>Para Compradores</h5>
                    <p>Encuentra productos �nicos de emprendedores</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <i class="fas fa-handshake fa-3x text-success mb-3"></i>
                    <h5>Conexi�n Directa</h5>
                    <p>Contacta directamente con vendedores</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
