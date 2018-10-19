<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Empleado extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    protected $guard_name = "empleado";

    protected $table = "users";

    protected $fillable = [
        'nombres',
        'apellidos',
        'email',
        'genero',
        'cedula',
        'nombre_usuario',
        'fecha_nacimiento',
        'password',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function avatar()
    {
        $carpeta_personal = "usuario_{$this->id}_{$this->created_at->format('dmy')}";
        $foto_perfil = "storage/subidas/{$carpeta_personal}/foto_perfil/{$this->foto_perfil}";

        if (file_exists($foto_perfil)) {
            return "/{$foto_perfil}";
        } else {
            return '/img/default_avatar.jpg';
        }
    }

    public function rol()
    {
        return $this->getRoleNames();
    }
    public function nombre_completo()
    {
        return "{$this->nombres} {$this->apellidos}";
    }
    public function numeros()
    {
        return $this->hasMany(TelefonoUsuario::class, 'id_usuario');
    }
}
