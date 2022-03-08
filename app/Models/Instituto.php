<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instituto extends Model
{
  use HasFactory, Loggable;

  protected $guarded;
  public $timestamps = true;

  public function grupClasse()
  {
    return $this->hasMany(GrupoClase::class);
  }
}
