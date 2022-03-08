<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{
  use HasFactory, Loggable;

  protected $guarded;
  public $timestamps = true;


  public function usuari()
  {
    return $this->belongsTo(User::class, 'id_usuari');
  }
}
