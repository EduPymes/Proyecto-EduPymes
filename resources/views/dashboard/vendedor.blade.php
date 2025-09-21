@extends('layouts.app')

@section('title', 'Panel de Vendedor - EduPymes')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <!-- Sidebar para vendedor -->
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Panel de Vendedor</h5>
                </div>
                <div class="list-group list-group-flush">
                    <a href="{{ route('products.user') }}" class="list-group-item list-group-item-action">
                        <i class="fas fa-box me-2"></i>Mis Productos
                    </a>
                    <a href="{{ route('products.create') }}" class="list-group-item list-group-item-action">
                        <i class="fas fa-plus me-2"></i>Publicar Producto
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <i class="fas fa-chart-line me-2"></i>Estadísticas
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h4>Bienvenido Vendedor</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="card bg-success text-white text-center">
                                <div class="card-body">
                                    <h5>Productos Activos</h5>
                                    <h3>{{ auth()->user()->products()->count() }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card bg-info text-white text-center">
                                <div class="card-body">
                                    <h5>Total Productos</h5>
                                    <h3>{{ auth()->user()->products()->count() }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h5 class="mt-4">Productos Recientes</h5>
                    <div class="list-group">
                        @forelse(auth()->user()->products()->latest()->take(5)->get() as $product)
                            <a href="{{ route('products.edit', $product) }}" class="list-group-item list-group-item-action">
                                <div class="d-flex justify-content-between">
                                    <span>{{ $product->name }}</span>
                                    <span class="badge bg-{{ $product->is_active ? 'success' : 'warning' }}">
                                        {{ $product->is_active ? 'Activo' : 'Inactivo' }}
                                    </span>
                                </div>
                            </a>
                        @empty
                            <div class="list-group-item text-center text-muted">
                                No tienes productos publicados
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection