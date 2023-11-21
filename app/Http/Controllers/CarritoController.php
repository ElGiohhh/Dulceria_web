<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Carrito;
use Illuminate\Http\Request;

class CarritoController extends Controller
{

    public function index(Request $request)
    {
        $producto_seleccionados = Product::where('estado', 'seleccionado')->post(); // Obtiene los productos seleccionados, ajusta la condición según sea necesario

        return view('crud.Venta', compact('producto_seleccionados'));

    }

    
    
    public function mostrarProductosSeleccionados(Request $request)
    {
        // Obtener los IDs de los productos seleccionados enviados por POST
        $productos_seleccionadosIds = $request->input('productos_seleccionados');
        
        // Consultar la base de datos para obtener los detalles de los productos seleccionados
        $productos_seleccionados = Producto::whereIn('id', $productos_seleccionadosIds)->get();
        
        // Pasar los productos a una vista para mostrarlos
        return view('Venta')->with('productos_seleccionados', $productos_seleccionados);
    }
    

    public function store(Request $request)
    {
        //Valida los datos del formulario
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
        $producto->save();
        //return redirect()->back() ->with('success', 'Producto creado correctamente');
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
        /**$producto = productos::find($nombre);
        $producto->delete();
        return redirect()->back()->with(["mensaje"=>"Exito"]);
        */
    }




}
