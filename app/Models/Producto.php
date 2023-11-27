<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    protected $fillable = ['nombre', 'descripcion', 'cantidad', 'precio_menudeo', 'precio_mayoreo', 'precio_compra'];
    public $timestamps = false;
    
    public function ordenVentaArticulos()
    {
        return $this->hasMany(OrdenVentaArticulo::class, 'id_producto');
    }
}
