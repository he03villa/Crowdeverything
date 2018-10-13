<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $fillable = [
        'nombre','iso_2','iso_3',
    ];

    public function Dpartamento(){
        return $this->hasMany('App\Departamento');
    }
}
