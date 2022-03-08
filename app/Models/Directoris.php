<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Directoris extends Model
{
    use HasFactory;

    public function usuari()
    {
      return $this->belongsTo(User::class, 'id_usuari');
    }
}
