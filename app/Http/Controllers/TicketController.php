<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrdenVenta;
use App\Models\OrdenArticulo;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class TicketController extends Controller
{
    public function create(Request $request)
    {
        $productos = $request->input('productos', '[]');
        $productos = json_decode($productos, true);

        $idUsuario = Auth::id();

        $porcentajeDescuento = $request->has('procentaje_descuento') ? $request->input('procentaje_descuento') : 0.0;
        $idCliente = $request->has('id_cliente') ? $request->input('id_cliente') : 1;
        $totalOrden = 0.0;

        foreach ($productos as $producto) {
            $precioProducto = Producto::where('id', $producto['id'])->value('precio_menudeo');
            $totalOrden += $producto['cantidad'] * $precioProducto;
        }

        $ordenVenta = new OrdenVenta();
        $ordenVenta->id_usuario = $idUsuario;
        $ordenVenta->procentaje_descuento = $porcentajeDescuento;
        $ordenVenta->id_cliente = $idCliente;
        $ordenVenta->total = $totalOrden;
        $ordenVenta->fecha_venta = Carbon::now();
        $ordenVenta->hora_venta = Carbon::now();
        $ordenVenta->save();
        foreach ($productos as $producto) {
            $precioProducto = Producto::where('id', $producto['id'])->value('precio_menudeo');

            $ordenArticulo = new OrdenArticulo();
            $ordenArticulo->id_orden_venta = $ordenVenta->id;
            $ordenArticulo->id_producto = $producto['id'];
            $ordenArticulo->cantidad = $producto['cantidad'];
            $ordenArticulo->precio = $precioProducto;
            $ordenArticulo->save();

            Producto::where('id', $producto['id'])->decrement('cantidad', $producto['cantidad']);
        }

        //return redirect()->route('tickets.list')->with(['mensaje' => 'Venta realizada con éxito']);
    }

    public function list()
    {
        $tickets = OrdenVenta::all();

        return view('crud\Tickets', ['tickets' => $tickets]);
    }
}
