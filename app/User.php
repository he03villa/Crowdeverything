<?php

namespace App;

use Caffeinated\Shinobi\Traits\ShinobiTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, ShinobiTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'telefono',
        'identificacion',
        'direccion',
        'nombre_usuario',
        'contasena',
        'estado',
        'ciudad_id',
        'tipo_documento_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function Ciudad(){
        return $this->belongsTo('App\Ciudad');
    }

    public function Tipo_docuemnto(){
        return $this->belongsTo('App\Tipo_documento');
    }

    public function Proyecto(){
        return $this->hasMany('App\Proyecto');
    }

    public function Donacion(){
        return $this->hasMany('App\Donacion');
    }
}
