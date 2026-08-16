<?php

namespace App\Http\Controllers;

use App\Models\Familia;
use App\Models\Pronostico;
use App\Models\User;

use Illuminate\Http\Request;

class PronosticoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pronosticos = Pronostico::with(['user', 'familia', 'producto'])->get();
        return view('pronosticos.index', compact('pronosticos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $usuarios = User::orderBy('name', 'asc')->get();
        $familias = Familia::orderBy('fam_nombre', 'asc')->get();
        return view('pronosticos.create', compact('usuarios', 'familias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // ✅ PASO 1: Filtrar SOLO los productos marcados
        $datosFiltrados = $request->all();

        if (isset($datosFiltrados['productos'])) {
            // Mantener solo los que tienen producto_id y al menos el mes Ene lleno
            $datosFiltrados['productos'] = collect($datosFiltrados['productos'])
                ->filter(function ($item) {
                    return !empty($item['producto_id']) && isset($item['ene']) && $item['ene'] !== '';
                })
                ->values() // Reordenar índices: 0, 1, 2...
                ->toArray();
        }

        // ✅ PASO 2: Validar los datos filtrados (usar validate() CORRECTAMENTE)
        $reglas = [
            'user_id'   => 'required|exists:users,id',
            'familia_id' => 'required|exists:familias,id',
            'productos' => 'required|array|min:1',
            'productos.*.producto_id' => 'required|exists:productos,id',
            'productos.*.ene' => 'required|integer|min:0',
            'productos.*.feb' => 'required|integer|min:0',
            'productos.*.mar' => 'required|integer|min:0',
            'productos.*.abr' => 'required|integer|min:0',
            'productos.*.may' => 'required|integer|min:0',
            'productos.*.jun' => 'required|integer|min:0',
            'productos.*.jul' => 'required|integer|min:0',
            'productos.*.ago' => 'required|integer|min:0',
            'productos.*.sep' => 'required|integer|min:0',
            'productos.*.oct' => 'required|integer|min:0',
            'productos.*.nov' => 'required|integer|min:0',
            'productos.*.dic' => 'required|integer|min:0',
        ];

        $datos = validator($datosFiltrados, $reglas)->validate();

        // ✅ PASO 3: Guardar cada producto como un pronóstico
        foreach ($datos['productos'] as $prod) {
            Pronostico::create([
                'user_id'    => $datos['user_id'],
                'familia_id' => $datos['familia_id'],
                'producto_id' => $prod['producto_id'],
                'ene' => $prod['ene'],
                'feb' => $prod['feb'],
                'mar' => $prod['mar'],
                'abr' => $prod['abr'],
                'may' => $prod['may'],
                'jun' => $prod['jun'],
                'jul' => $prod['jul'],
                'ago' => $prod['ago'],
                'sep' => $prod['sep'],
                'oct' => $prod['oct'],
                'nov' => $prod['nov'],
                'dic' => $prod['dic'],
            ]);
        }

        return redirect()->route('pronosticos.index')
            ->with('exito', '¡Pronósticos guardados correctamente! ✅');
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
    public function edit(Pronostico $pronostico)
    {
        return view('pronosticos.edit', compact('pronostico'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pronostico $pronostico)
    {
        // ✅ Validar los datos
        $datos = $request->validate([
            'user_id'   => 'required|exists:users,id',
            'familia_id' => 'required|exists:familias,id',
            'producto_id' => 'required|exists:productos,id',
            'ene' => 'required|integer|min:0',
            'feb' => 'required|integer|min:0',
            'mar' => 'required|integer|min:0',
            'abr' => 'required|integer|min:0',
            'may' => 'required|integer|min:0',
            'jun' => 'required|integer|min:0',
            'jul' => 'required|integer|min:0',
            'ago' => 'required|integer|min:0',
            'sep' => 'required|integer|min:0',
            'oct' => 'required|integer|min:0',
            'nov' => 'required|integer|min:0',
            'dic' => 'required|integer|min:0',
        ]);

        // ✅ Actualizar el pronóstico
        $pronostico->update($datos);

        // ✅ Redirigir con mensaje
        return redirect()->route('pronosticos.index')->with('exito', '¡Pronóstico actualizado correctamente! ✅');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pronostico $pronostico)
    {
        $pronostico->delete();

        return redirect()->route('pronosticos.index')->with('exito', '¡Pronóstico eliminado correctamente! ✅');
    }
}
