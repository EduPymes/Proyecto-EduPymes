<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\VendedorLoginController;
use App\Http\Controllers\Auth\CompradorLoginController;
use App\Http\Controllers\Auth\VendedorRegisterController;
use App\Http\Controllers\Auth\CompradorRegisterController;
use Illuminate\Support\Facades\Route;

// Ruta principal
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Rutas PÚBLICAS de productos (accesibles sin login)
Route::controller(ProductController::class)->group(function () {
    Route::get('/productos', 'index')->name('products.index');
    Route::get('/productos/{product}', 'show')->name('products.show');
});

// Rutas de autenticación para Vendedores
Route::prefix('vendedor')->group(function () {
    Route::get('/login', [VendedorLoginController::class, 'showLoginForm'])->name('login.vendedor');
    Route::post('/login', [VendedorLoginController::class, 'login']);
    Route::post('/logout', [VendedorLoginController::class, 'logout'])->name('logout.vendedor');
    
    // Registro
    Route::get('/register', [VendedorRegisterController::class, 'showRegistrationForm'])->name('register.vendedor');
    Route::post('/register', [VendedorRegisterController::class, 'register']);
});

// Rutas de autenticación para Compradores
Route::prefix('comprador')->group(function () {
    Route::get('/login', [CompradorLoginController::class, 'showLoginForm'])->name('login.comprador');
    Route::post('/login', [CompradorLoginController::class, 'login']);
    Route::post('/logout', [CompradorLoginController::class, 'logout'])->name('logout.comprador');
    
    // Registro
    Route::get('/register', [CompradorRegisterController::class, 'showRegistrationForm'])->name('register.comprador');
    Route::post('/register', [CompradorRegisterController::class, 'register']);
});

// Rutas PROTEGIDAS de productos (solo para vendedores autenticados)
Route::middleware(['auth'])->group(function () {
    Route::prefix('vendedor')->group(function () {
        // Rutas de productos para vendedores
        Route::get('/productos', [ProductController::class, 'userProducts'])->name('products.user');
        Route::get('/productos/crear', [ProductController::class, 'create'])->name('products.create');
        Route::post('/productos', [ProductController::class, 'store'])->name('products.store');
        Route::get('/productos/{product}/editar', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('/productos/{product}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('/productos/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
        
        // Dashboard de vendedor
        Route::get('/dashboard', function () {
            return view('dashboard.vendedor');
        })->name('vendedor.dashboard');
    });

    // Dashboard de comprador
    Route::prefix('comprador')->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard.comprador');
        })->name('comprador.dashboard');
    });
});