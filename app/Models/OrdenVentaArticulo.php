<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdenVentaArticulo extends Model
{
    protected $table = 'orden_venta_articulos';
    protected $fillable = ['id_orden_venta', 'id_producto', 'cantidad', 'precio'];
    public $timestamps = false;
    
    public function ordenVenta()
    {
        return $this->belongsTo(OrdenVenta::class, 'id_orden_venta');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }
}
