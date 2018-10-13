<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $fillable = [
        'nombre','codigo',
    ];

    public function Pais(){
        return $this->belongsTo('App\Pais');
    }

    public function Ciudad(){
        return $this->hasMany('App\Ciudad');
    }
}
