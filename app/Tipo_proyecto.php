<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_proyecto extends Model
{
    protected $fillable = [
        'nombre',
        'id',
    ];

    public function Proyecto(){
        return $this->hasMany('App\Proyecto');
    }
}
