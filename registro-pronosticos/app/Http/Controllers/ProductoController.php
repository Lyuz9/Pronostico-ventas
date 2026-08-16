<?php

namespace App\Http\Controllers;

use App\Models\Familia;
use App\Models\Producto;

use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::with('familia')->get();
        return view('productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $familias = Familia::orderBy('fam_nombre', 'asc')->get();
        return view('productos.create', compact('familias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos = $request->validate([
            'pro_nombre' => 'required|string|max:255',
            'familia_id' => 'required|exists:familias,id' // ✅ Verifica que la familia EXISTA
        ]);

        Producto::create($datos);

        return redirect()->route('productos.index') ->with('exito', 'Producto guardado correctamente ✅');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        $familias = Familia::orderBy('fam_nombre', 'asc')->get();
        return view('productos.edit', compact('producto', 'familias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        $datos = $request->validate([
            'pro_nombre' => 'required|string|max:255',
            'familia_id' => 'required|exists:familias,id'
        ]);

        $producto->update($datos);

        return redirect()->route('productos.index')->with('exito', 'Producto actualizado ✅');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index') ->with('exito', 'Producto eliminado ✅');
    }
}
