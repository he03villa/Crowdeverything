<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donacion extends Model
{
    protected $fillable = [
        'costo', 'anonimo',
    ];

    public function Proyecto(){
        
    }
}
