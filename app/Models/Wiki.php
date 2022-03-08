<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wiki extends Model
{
  use HasFactory, Loggable;

  public $timestamps = true;

  public function article()
  {
    return $this->hasMany(Articulo::class);
  }

  public function projecte()
  {
    return $this->belongsTo(Proyecto::class, 'id_projecte');
  }
}
