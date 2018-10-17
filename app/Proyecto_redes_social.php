<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyecto_redes_social extends Model
{
    protected $fillable = [
        'id',
        'url',
        'redes_socials_id',
    ];

    public function Redes_social(){
        return $this->belongsTo('App\Redes_social');
    }

    public function Proyecto(){
        return $this->belongsTo('App\Proyecto');
    }
}
