<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producto - {{ $product->name }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-4xl mx-auto">
            <a href="{{ route('home') }}" class="text-blue-500 hover:text-blue-700 mb-4 inline-block">
                ← Volver al inicio
            </a>
            
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-64 object-cover">
                
                <div class="p-6">
                    <h1 class="text-3xl font-bold text-gray-800">{{ $product->name }}</h1>
                    <p class="text-2xl text-green-600 font-semibold mt-2">${{ number_format($product->price, 2) }}</p>
                    
                    <div class="flex items-center mt-4">
                        <span class="bg-blue-100 text-blue-800 text-sm font-medium px-2.5 py-0.5 rounded">
                            {{ $product->category }}
                        </span>
                    </div>
                    
                    <p class="text-gray-600 mt-4">{{ $product->description }}</p>
                    
                    <div class="flex items-center mt-6">
                        <img src="{{ $product->user->avatar }}" alt="{{ $product->user->name }}" class="w-10 h-10 rounded-full">
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-900">{{ $product->user->name }}</p>
                            <div class="flex items-center">
                                <span class="text-yellow-400">★</span>
                                <span class="text-sm text-gray-600 ml-1">{{ $product->rating }}</span>
                                <span class="text-sm text-gray-500 ml-2">({{ $product->reviews }} reviews)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>