<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nombres',
        'apellidos',
        'telefono',
        'correo',
        'fecha_nacimiento',
        'direccion',
        'pass',
    ];

    protected $hidden = [
        'pass', 'remember_token',
    ];
    
    public function comentarios(){
        return $this->hasMany(Comentario::class,'id_usuario');
    }
    public function pedidos(){
        return $this->hasMany(Pedido::class);
    }
}
