<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{

  use HasFactory, Loggable;

  public $timestamps = true;

  public function usuari()
  {
    return $this->belongsTo(User::class, 'id_usuari');
  }

  public function wiki()
  {
    return $this->belongsTo(Wiki::class, 'id_wiki');
  }

  public function comentari()
  {
    return $this->hasMany(Comentario::class);
  }

  public function versioAnterior()
  {
    return $this->hasMany(VersionAnterior::class);
  }
}
