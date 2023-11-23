<?php

namespace App\Http\Controllers;

use App\Models\productos;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search'); 
   
        if ($search) {
            $lista_producto = productos::where('nombre', 'LIKE', '%' . $search . '%')->get();
        } else {
            $lista_producto = productos::all();
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
            'cantidad' => 'required|int|max:10',
            'precio_menudeo' => 'required|max:6',
            'precio_mayoreo' => 'required|max:6',
        ]);

        $producto = new productos;
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->cantidad = $request->cantidad;
        $producto->precio_menudeo = $request->precio_menudeo;
        $producto->precio_mayoreo = $request->precio_mayoreo;
        // Crea un nuevo producto en la base de datos
        //Product::create($request->all());
        $producto->save();

        return redirect()->back() ->with('success', 'Producto creado correctamente');
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        // Valida los datos del formulario
        
    }

    public function destroy($nombre)
    {
        $producto = $nombre;
        $producto->delete();
        return redirect()->back()->with(["mensaje"=>"Exito"]);
    }
}

