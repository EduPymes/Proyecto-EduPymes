<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    // Mostrar todos los productos (público)
    public function index()
    {
        $products = Product::with('user')
            ->where('is_active', true)
            ->latest()
            ->paginate(12);

        return view('products.index', compact('products'));
    }

    // Mostrar un producto específico (público)
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    // Mostrar productos del usuario autenticado
    public function userProducts()
    {
        $products = Auth::user()->products()->latest()->paginate(10);
        return view('products.user', compact('products'));
    }

    // Mostrar formulario de creación
    public function create()
    {
        return view('products.create');
    }

    // Almacenar nuevo producto
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048'
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        Product::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category' => $request->category,
            'image' => $imagePath
        ]);

        return redirect()->route('products.user')
            ->with('success', 'Producto publicado exitosamente.');
    }

    // Mostrar formulario de edición
    public function edit(Product $product)
    {
        // Verificar que el usuario es el dueño del producto
        if ($product->user_id !== Auth::id()) {
            abort(403);
        }

        return view('products.edit', compact('product'));
    }

    // Actualizar producto
    public function update(Request $request, Product $product)
    {
        // Verificar que el usuario es el dueño del producto
        if ($product->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048'
        ]);

        // Lógica de actualización de imagen (si se sube una nueva)
        if ($request->hasFile('image')) {
            // Eliminar imagen anterior si existe
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $imagePath = $request->file('image')->store('products', 'public');
            $product->image = $imagePath;
        }

        $product->update($request->only(['name', 'description', 'price', 'category']));

        return redirect()->route('products.user')
            ->with('success', 'Producto actualizado exitosamente.');
    }

    // Eliminar producto
    public function destroy(Product $product)
    {
        // Verificar que el usuario es el dueño del producto
        if ($product->user_id !== Auth::id()) {
            abort(403);
        }

        // Eliminar imagen si existe
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('products.user')
            ->with('success', 'Producto eliminado exitosamente.');
    }
}