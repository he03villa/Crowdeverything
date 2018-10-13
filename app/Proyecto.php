<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    //use Proyecto_redes_social, Donacion, User;

    protected $fillable = [
        'foto', 
        'nombre_proyecto',
        'descripcion', 
        'total',
        'publicacion',
        'user_id',
        'tipo_proyecto_id',
    ];

    public function User(){
        return $this->belongsTo('App\User');
    }

    public function Tipo_proyecto(){
        return $this->belongsTo('App\Tipo_proyecto');
    }

    public function Recurso(){
        return $this->hasMany('App\Recurso');
    }

    public function Foto(){
        return $this->hasMany('App\Foto');
    }

    public function Redes(){
        return $this->hasMany('App\Proyecto_redes_social');
    }
}
