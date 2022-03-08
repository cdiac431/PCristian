<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComentarioPost extends Model
{
  use HasFactory, Loggable;

  public $timestamps = true;

  public function post()
  {
    return $this->belongsTo(Post::class, 'id_post');
  }

  public function usuari()
  {
    return $this->belongsTo(User::class, 'id_usuari');
  }
}
