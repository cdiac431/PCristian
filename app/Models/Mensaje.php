<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
  use HasFactory, Loggable;

  public $timestamps = true;

  public function xat()
  {
    return $this->belongsTo(Chat::class, 'id_xat');
  }

  public function usuari()
  {
    return $this->belongsTo(User::class, 'id_usuari');
  }
}
