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
        return $this->belongsTo('App\Proyecto');
    }

    public function Recurso(){
        return $this->belongsTo('App\Recurso');
    }

    public function Usuario(){
        return $this->belongsTo('App\User');
    }
}
