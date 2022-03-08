<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
  use HasFactory, Loggable;

  protected $guarded;
  public $timestamps = true;

  public function propostes()
  {
    return $this->hasMany(Propuesta::class);
  }
}
