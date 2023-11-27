<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search'); 
   
        if ($search) {
            $lista_producto = Producto::where('nombre', 'LIKE', '%' . $search . '%')->get();
        } else {
            $lista_producto = Producto::all();
        }
        return view('crud.Inventario', compact('lista_producto'));
    }

    public function create()
    {
        return view('crud.Inventario');
    }

    public function store(Request $request)
    {
        // Valida los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'cantidad' => 'required|integer|max:10',
            'precio_menudeo' => 'required|numeric|max:999999.99',
            'precio_mayoreo' => 'required|numeric|max:999999.99',
            'precio_compra' => 'required|numeric|max:999999.99',
        ]);

        // Crea un nuevo producto en la base de datos
        $producto = new Producto([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'cantidad' => $request->cantidad,
            'precio_menudeo' => $request->precio_menudeo,
            'precio_mayoreo' => $request->precio_mayoreo,
            'precio_compra' => $request->precio_compra,
        ]);

        $producto->save();

        return redirect()->back()->with('success', 'Producto creado correctamente');
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        // Valida los datos del formulario
        
    }

    public function destroy(Request $request)
    {
        $nombre = $request->input('nombre');
        
        $producto = Producto::where('nombre', $nombre)->first();
        
        if (!$producto) {
            return redirect()->back()->with(["mensaje" => "Producto no encontrado"]);
        }

        $producto->delete();
        return redirect()->back()->with(["mensaje" => "Producto eliminado con éxito"]);
    }


}

