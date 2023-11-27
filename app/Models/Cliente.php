<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    protected $fillable = ['nombre', 'telefono', 'porcentaje_descuento'];
    public $timestamps = false;
    
    public function ordenesVenta()
    {
        return $this->hasMany(OrdenVenta::class, 'id_cliente');
    }
}
