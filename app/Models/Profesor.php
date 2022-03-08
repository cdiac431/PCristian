<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Profesor extends Model
{
  use HasFactory, Loggable;

  public $timestamps = true;
  protected $guarded = [];

  public function grupClasseTutor()
  {
    return $this->hasMany(GrupoClase::class);
  }

  public function grupClasseProfessor()
  {
    return $this->belongsTo(GrupoClase::class);
  }

  public function usuari()
  {
    return $this->belongsTo(User::class, 'user_id');
  }

  public function institut()
  {
    return $this->belongsTo(Instituto::class, 'id_institut');
  }

  public static function getProfessor($shown,$institutDefault){

    if($institutDefault == 0){
      $profes = DB::table('users') //
      ->join('profesors', 'profesors.user_id', '=', 'users.id')
      ->join('institutos', 'profesors.id_institut', '=', 'institutos.id')
      ->join('roles', 'roles.id', '=','users.id_roles' )
      ->select('users.*', 'roles.name as nom_roles', 'profesors.id', 'profesors.user_id', 'institutos.nom as institutNom','institutos.id as id_instituts')
      ->where('users.estat', '=', 'actiu')
      ->orderBy('nom', 'ASC')
      ->paginate($shown);
      return $profes;

    }
    else{
      $profes = DB::table('users') //
      ->join('profesors', 'profesors.user_id', '=', 'users.id')
      ->join('roles', 'roles.id', '=','users.id_roles' )
      ->select('users.*', 'roles.name as nom_roles', 'profesors.id', 'profesors.user_id')
      ->where('users.estat', '=', 'actiu')
      ->where('profesors.id_institut','=', $institutDefault)
      ->orderBy('nom', 'ASC')
      ->paginate($shown);
      return $profes;
    }
      
  }
}
