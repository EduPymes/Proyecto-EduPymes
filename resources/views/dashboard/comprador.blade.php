@extends('layouts.app')

@section('title', 'Panel de Comprador - EduPymes')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <!-- Sidebar para comprador -->
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0">Panel de Comprador</h5>
                </div>
                <div class="list-group list-group-flush">
                    <a href="{{ route('products.index') }}" class="list-group-item list-group-item-action">
                        <i class="fas fa-search me-2"></i>Explorar Productos
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <i class="fas fa-heart me-2"></i>Favoritos
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <i class="fas fa-history me-2"></i>Historial
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h4>Bienvenido Comprador</h4>
                </div>
                <div class="card-body">
                    <h5>Productos Destacados</h5>
                    
                    <div class="row">
                        @foreach($featuredProducts as $product)
                            <div class="col-md-4 mb-3">
                                <div class="card h-100">
                                    @if($product->image)
                                        <img src="{{ asset('storage/' . $product->image) }}" 
                                             class="card-img-top" alt="{{ $product->name }}" 
                                             style="height: 150px; object-fit: cover;">
                                    @endif
                                    <div class="card-body">
                                        <h6 class="card-title">{{ Str::limit($product->name, 30) }}</h6>
                                        <p class="card-text text-success">
                                            <strong>${{ number_format($product->price, 0) }}</strong>
                                        </p>
                                        <small class="text-muted">Vendedor: {{ $product->user->name }}</small>
                                    </div>
                                    <div class="card-footer">
                                        <a href="{{ route('products.show', $product) }}" class="btn btn-sm btn-primary w-100">
                                            Ver Detalles
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection