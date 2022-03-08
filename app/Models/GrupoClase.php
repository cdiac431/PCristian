<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class GrupoClase extends Model
{
  use HasFactory, Loggable;

  protected $guarded;
  public $timestamps = true;

  public function professorTutor()
  {
    return $this->belongsTo(Profesor::class);
  }

  public function alumne()
  {
    return $this->belongsTo(Alumne::class,);
  }

  public function professorGrup()
  {
    return $this->belongsTo(Profesor::class, 'id_tutor');
  }

  public function proposta()
  {
    return $this->hasMany(Propuesta::class);
  }

  public function institut()
  {
    return $this->hasMany(Instituto::class, 'id_institut');
  }
  public function institut2()
  {
    return $this->belongsTo(Instituto::class, 'id_institut');
  }
  public function usuari()
  {
    return $this->belongsTo(User::class, 'id_usuari');
  }
}
