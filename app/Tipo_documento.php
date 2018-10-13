<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_documento extends Model
{
    protected $fillable = [
        'nombre',
    ];

    public function Usuario(){
        return $this->hasMany('App\User');
    }
}
