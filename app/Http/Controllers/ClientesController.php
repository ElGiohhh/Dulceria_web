<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        User::create([
            'name' => $request->nombre,
            'descuento' => $request->descuento,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $cliente = Cliente::create([
            'nombre' => $request->nombre,
            'telefono' => $request->telefono,
            'porcentaje_descuento' => $request->descuento,
        ]);


        return redirect()->route('Configuracion')->with('success', 'Cliente creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $clientes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $clientes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $clientes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $nombre = $request->input('nombre');
        
        $cliente = Cliente::where('nombre', $nombre)->first();
        
        if (!$cliente) {
            return redirect()->back()->with(["mensaje" => "Cliente no encontrado"]);
        }

        $cliente->delete();
        return redirect()->back()->with(["mensaje" => "Cliente eliminado con éxito"]);
    }
}
