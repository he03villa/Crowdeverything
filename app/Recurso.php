<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recurso extends Model
{
    protected $fillable = [
        'id',
        'nombre_recurso',
        'costo',
        'tipo_recurso_id',
        'proyecto_id',
    ];

    public function Proyecto(){
        return $this->belongsTo('App\Proyecto');
    }

    public function Tipo_recurso(){
        return $this->belongsTo('App\Tipo_recurso');
    }

    public function Donacion(){
        return $this->hasMany('App\Donacion');
    }
}
