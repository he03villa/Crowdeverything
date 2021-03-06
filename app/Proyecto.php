<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    //use Proyecto_redes_social, Donacion, User;

    protected $fillable = [
        'id',
        'foto', 
        'nombre_proyecto',
        'descripcion', 
        'total',
        'publicacion',
        'fecha_inicio',
        'fecha_final',
        'user_id',
        'tipo_proyecto_id',
        'created_at',
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

    public function Donacion(){
        return $this->hasMany('App\Donacion');
    }
}
