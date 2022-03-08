<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presupuesto extends Model
{
  use HasFactory, Loggable;

  public $timestamps = true;

  public function liniaPressupost()
  {
    return $this->hasMany(LiniaPresupuesto::class);
  }

  public function projecte()
  {
    return $this->belongsTo(Proyecto::class, 'id_projecte');
  }
}
