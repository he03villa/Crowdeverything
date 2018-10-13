<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $fillable = [
        'nombre','codigo',
    ];

    public function Departamento(){
        return $this->belongsTo('App\Departamento');
    }

    public function Usuario(){
        return $this->hasMany('App\User');
    }
}
