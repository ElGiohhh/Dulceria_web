<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdenVenta extends Model
{
    protected $table = 'orden_venta';
    protected $fillable = ['id_usuario', 'id_cliente', 'procentaje_descuento', 'total', 'fecha_venta', 'hora_venta'];
    public $timestamps = false;
    
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }

    public function articulos()
    {
        return $this->hasMany(OrdenVentaArticulo::class, 'id_orden_venta');
    }
}
