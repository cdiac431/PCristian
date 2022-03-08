<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propuesta extends Model
{
  use HasFactory, Loggable;

  public $timestamps = true;

  protected $guarded;
  public function categoria()
  {
    return $this->belongsTo(Categoria::class, 'id_categoria');
  }

  public function empresa()
  {
    return $this->belongsTo(Empresa::class, 'id_empresa');
  }

  public function institut()
  {
    return $this->belongsTo(Instituto::class, 'id_institut');
  }

  public function grupClasse()
  {
    return $this->belongsTo(GrupoClase::class, 'id_grup');
  }

  public function projecte()
  {
    return $this->hasOne(Proyecto::class);
  }

  public function solicitant()
  {
    return $this->belongsTo(User::class, 'id_solicitant');
  } 


  public function responsable()
  {
    return $this->belongsTo(User::class, 'id_responsable');
  }

}
