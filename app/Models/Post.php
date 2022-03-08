<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  use HasFactory;
  protected $guarded;
  public $timestamps = true;

  public function comentarisPost()
  {
    return $this->hasMany(ComentarioPost::class);
  }

  public function usuari()
  {
    return $this->belongsTo(User::class, 'id_usuari');
  }
}
