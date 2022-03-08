<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiniaPresupuesto extends Model
{
  use HasFactory, Loggable;

  protected $guarded;
  public $timestamps = true;

  public function pressupost()
  {
    return $this->belongsTo(Presupuesto::class, 'id_pressupost');
  }
}
