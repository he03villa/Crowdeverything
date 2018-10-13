<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_recurso extends Model
{
    protected $fillable = [
        'nombre',
    ];

    public function Donacion(){
        return $this->hasMany('App\Donacion');
    }

    public function Recurso(){
        return $this->hasMany('App\Recurso');
    }
}
