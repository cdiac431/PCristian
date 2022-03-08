<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VersionAnterior extends Model
{
    use HasFactory, Loggable;

    public $timestamps = true;
    
    public function article(){
        return $this->belongsTo(Articulo::class, 'id_article');
      }

      public function usuari(){
        return $this->belongsTo(User::class, 'id_usuari');
      }
}
