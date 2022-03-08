<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles, Loggable;

    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $guard_name = 'web';

    protected $fillable = [
        'id_roles','nom','cognom','segon_cognom',
        'dni', 'user_name', 'password',
        'ruta_avatar', 'email','telefon',
        'data_naixement',
        'estat'
    ];

    protected $hidden =[
        'id',
        'password'
    ];

    protected $guarded;
    public function alumne(){
        return $this->hasOne(Alumno::class);
      }

      public function articles(){
        return $this->hasMany(Articulo::class);
      }

      public function comentaris(){
        return $this->hasMany(Comentario::class);
      }

      public function comentarisPost(){
        return $this->hasMany(ComentarioPost::class);
      }

      public function empleat(){
        return $this->hasOne(Empleado::class);
      }


      public function incidencia(){
        return $this->hasMany(Incidencia::class);
      }

      public function missatge(){
        return $this->hasMany(Mensaje::class);
      }

      public function post(){
        return $this->hasMany(Post::class);
      }

      public function professor(){
        return $this->hasOne(Profesor::class);
      }

      public function arxiu(){
        return $this->hasMany(Archivo::class);
      }

      public function versioAnterior(){
        return $this->hasMany(VersionAnterior::class);
      }

      public function responsableProposta(){
        return $this->hasMany(Propuesta::class);
      }

      public function solicitantProposta(){
        return $this->hasMany(Propuesta::class);
      }

      


}
