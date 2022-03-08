<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
  use HasFactory, Loggable;

  public $timestamps = true;

  public function article()
  {
    return $this->belongsTo(Articulo::class, 'id_article');
  }

  public function user()
  {
    return $this->belongsTo(User::class, 'id_usuari');
  }
}
