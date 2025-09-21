<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Productos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-center mb-8">Nuestros Productos</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($products as $product)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h2 class="text-xl font-semibold">{{ $product->name }}</h2>
                    <p class="text-green-600 font-bold">${{ number_format($product->price, 2) }}</p>
                    <p class="text-gray-600">{{ $product->category }}</p>
                    <a href="{{ route('products.show', $product->id) }}" class="block mt-4 bg-blue-500 text-white text-center py-2 rounded hover:bg-blue-600">
                        Ver detalles
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="mt-8 text-center">
            <a href="{{ route('home') }}" class="text-blue-500 hover:text-blue-700">
                ← Volver al inicio
            </a>
        </div>
    </div>
</body>
@extends('layouts.app')

@section('title', 'Catálogo de Productos - EduPymes')

@section('content')
<div class="container">
    <h1 class="mb-4">Catálogo de Productos</h1>
    
    <div class="row">
        @foreach($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" 
                             class="card-img-top" alt="{{ $product->name }}" 
                             style="height: 200px; object-fit: cover;">
                    @else
                        <div class="card-img-top bg-light d-flex align-items-center justify-content-center" 
                             style="height: 200px;">
                            <i class="fas fa-image fa-3x text-muted"></i>
                        </div>
                    @endif
                    
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text text-muted">{{ Str::limit($product->description, 100) }}</p>
                        <p class="card-text"><strong>${{ number_format($product->price, 0) }}</strong></p>
                        <p class="card-text">
                            <small class="text-muted">Vendedor: {{ $product->user->name }}</small>
                        </p>
                    </div>
                    
                    <div class="card-footer">
                        <a href="{{ route('products.show', $product) }}" class="btn btn-primary w-100">
                            Ver Detalles
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $products->links() }}
    </div>
</div>
@endsection
</html>