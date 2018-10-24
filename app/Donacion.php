<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donacion extends Model
{
    protected $fillable = [
        'id',
        'proyecto_id',
        'recurso_id',
        'usuario_id',
        'costo',
        'anonimo',
    ];

    public function Proyecto(){
        
    }
}
