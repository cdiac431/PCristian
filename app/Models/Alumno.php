<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Alumno extends Model
{


  use HasFactory, Loggable;

  public $timestamps = true;

  public function usuari()
  {
    return $this->belongsTo(User::class, 'user_id');
  }
  public function grupClasses()
  {
    return $this->belongsTo(GrupoClase::class, 'id_grup_tutoria');
  }

  public function institut()
  {
    return $this->belongsTo(Instituto::class, 'id_institut');
  }

  public static function getAlumne($shown,$institutDefault){

    if($institutDefault == 0){
      $alumnes = DB::table('users') //
      ->join('alumnos', 'alumnos.user_id', '=', 'users.id')
      ->join('institutos', 'alumnos.id_institut', '=', 'institutos.id')
      ->join('grupo_clases', 'alumnos.id_grup_tutoria', '=', 'grupo_clases.id')
      ->select('users.*', 'alumnos.id', 'alumnos.user_id', 'institutos.nom as institutNom','institutos.id as id_instituts','grupo_clases.nom as grupNom')
      ->where('users.estat', '=', 'actiu')
      ->orderBy('nom', 'ASC')
      ->paginate($shown);
      return $alumnes;

    }
    else{
      $alumnes = DB::table('users') //
      ->join('alumnos', 'alumnos.user_id', '=', 'users.id')
      ->join('grupo_clases', 'alumnos.id_grup_tutoria', '=', 'grupo_clases.id')
      ->select('users.*', 'alumnos.id', 'alumnos.user_id','grupo_clases.nom as grupNom')
      ->where('users.estat', '=', 'actiu')
      ->where('alumnos.id_institut','=', $institutDefault)
      ->orderBy('nom', 'ASC')
      ->paginate($shown);
      return $alumnes;
    }
      
  }
}
