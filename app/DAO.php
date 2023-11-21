<?php

namespace App\DAO; // Asegúrate de usar el namespace correcto

use App\Models\OrdenVenta;
use App\Models\ProductosCarrito;

class TicketDAO {
    public function getOrdenVenta($idOrdenVenta) {
        return OrdenVenta::find($idOrdenVenta);
    }

    public function getProductosCarrito($idOrdenVenta) {
        return ProductosCarrito::join('orden_venta_articulos as o', 'productos.id', '=', 'o.id_producto')
            ->where('o.id_orden_venta', $idOrdenVenta)
            ->select(
                'productos.id as idProducto',
                'productos.nombre as nombreProducto',
                'productos.descripcion as descripcionProducto',
                'o.cantidad as cantidadProducto',
                'productos.precio_menudeo as precioMenudeoProducto',
                'productos.precio_mayoreo as precioMayoreoProducto'
            )
            ->get();
    }
}
