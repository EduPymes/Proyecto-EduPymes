<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        // ✅ Usar paginate() en lugar de get()
        $products = Product::with('user')
            ->where('is_active', true)
            ->latest()
            ->paginate(12); // ← Esto devuelve un objeto Paginator

        return view('welcome', compact('products'));
    }

    public function about()
    {
        return view('about');
    }

    public function services()
    {
        return view('services');
    }

    public function contact()
    {
        return view('contact');
    }

    public function sendContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string|min:10'
        ]);

        // Lógica de envío de contacto...

        return redirect()->route('contact')
            ->with('success', 'Mensaje enviado correctamente.');
    }
}