<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        
        // Redirigir según el rol del usuario
        if ($user->isAdmin()) {
            return redirect()->route('admin.dashboard');
        }
        
        if ($user->isPyme()) {
            return $this->vendedorDashboard();
        }
        
        return $this->compradorDashboard();
    }

    protected function vendedorDashboard()
    {
        $user = auth()->user();
        $products = $user->products()->latest()->paginate(10);
        
        return view('dashboard.vendedor', compact('products'));
    }

    protected function compradorDashboard()
    {
        $featuredProducts = Product::with('user')
            ->where('is_active', true)
            ->inRandomOrder()
            ->take(6)
            ->get();
            
        return view('dashboard.comprador', compact('featuredProducts'));
    }
}