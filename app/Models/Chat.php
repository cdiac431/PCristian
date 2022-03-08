<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
  use HasFactory, Loggable;

  public $timestamps = true;


  public function missatges()
  {
    return $this->hasMany(Mensaje::class);
  }
}
