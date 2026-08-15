<?php

namespace App\Http\Controllers;

use App\Models\Familia;

use Illuminate\Http\Request;

class FamiliaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('familias.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('familias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos = $request->validate([
            'fam_nombre' => 'required|string|max:255'
        ]);

        Familia::create($datos);
        return redirect()->route('familias.index')->with('exito', 'Familia guardada correctamente ✅');
    }

    /**
     * Display the specified resource.
     */
    public function show($familia)
    {
        return view('familias.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('familias.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
