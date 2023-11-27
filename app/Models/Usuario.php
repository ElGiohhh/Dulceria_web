<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Model implements Authenticatable
{
    use Notifiable;

    protected $table = 'usuarios';
    protected $fillable = ['id_nivel_usuario', 'nombre', 'apellido_pa', 'apellido_ma', 'usuario', 'password'];
    public $timestamps = false;

    public function nivelUsuario()
    {
        return $this->belongsTo(NivelUsuario::class, 'id_nivel_usuario');
    }

    public function ordenesVenta()
    {
        return $this->hasMany(OrdenVenta::class, 'id_usuario');
    }

    // Métodos requeridos por la interfaz Authenticatable
    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        // No estamos utilizando "recordar sesión", así que podemos dejar esto vacío
        return null;
    }

    public function setRememberToken($value)
    {
        // No estamos utilizando "recordar sesión", así que podemos dejar esto vacío
    }

    public function getRememberTokenName()
    {
        // No estamos utilizando "recordar sesión", así que podemos dejar esto vacío
        return null;
    }
}
