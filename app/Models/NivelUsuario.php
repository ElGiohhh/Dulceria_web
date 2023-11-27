<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NivelUsuario extends Model
{
    protected $table = 'nvl_usuarios';
    protected $fillable = ['nombre'];
    public $timestamps = false;
    
    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'id_nivel_usuario');
    }
}
