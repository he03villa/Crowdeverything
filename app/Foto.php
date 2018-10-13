<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    protected $fillable = [
        'nombre',
    ];

    public function Proyecto(){
        return $this->belongsTo('App\Proyecto');
    }
}
