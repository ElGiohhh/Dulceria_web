<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    use HasFactory;



    public function create()
    {
        User::create([
            'name' => $request->nombre,
            'descuento' => $request->descuento,
            
        ]);
    }



    
    protected $fillable = [
        'nombre',
        'descuento',
    ];


}
