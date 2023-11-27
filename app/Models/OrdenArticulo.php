<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenArticulo extends Model
{
    use HasFactory;

    protected $table = 'orden_venta_articulos';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'id_orden_venta',
        'id_producto',
        'cantidad',
        'precio',
    ];

    // Relación con la orden de venta
    public function ordenVenta()
    {
        return $this->belongsTo(OrdenVenta::class, 'id_orden_venta', 'id');
    }

    // Relación con el producto
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto', 'id');
    }
}
