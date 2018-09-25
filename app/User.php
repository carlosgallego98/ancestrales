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
        'correo',
        'cedula',
        'genero',
        'fecha_nacimiento',
        'direccion',
        'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];


    public function avatar(){
        $carpeta_personal = "usuario_{$this->id}_{$this->created_at->format('dmy')}";
        $foto_perfil = "/storage/subidas/{$carpeta_personal}/foto_perfil/{$this->foto_perfil}";

        if (file_exists("storage/subidas/{$carpeta_personal}/foto_perfil/{$this->foto_perfil}")) {
            return $foto_perfil;
        } else {
            return '/img/default_avatar.jpg';
        }
        

        return $foto_perfil;
    }
    
    public function comentarios(){
        return $this->hasMany(Comentario::class,'id_usuario');
    }
    public function pedidos(){
        return $this->hasMany(Pedido::class,'id_usuario');
    }
    public function numeros(){
        return $this->hasMany(TelefonoUsuario::class,'id_usuario');
    }
}
