<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
  use HasFactory, Loggable;

  protected $guarded;
  public $timestamps = true;
  protected $fillable = [
        'nom','localitat','direccio','telefon','cif',
        'email', 'ruta_imatge'
    ];
  protected $hidden =[
        'id'
    ];

  public function empleat()
  {
    return $this->hasMany(Empleado::class);
  }

  public function propostes()
  {
    return $this->hasMany(Propuesta::class);
  }
}
