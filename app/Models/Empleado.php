<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empleado extends Model
{
    use HasFactory, Loggable;

    protected $guarded;
    public $timestamps=true;


  public function usuari()
  {
    return $this->belongsTo(User::class, 'user_id');
  }

  public function empresa()
  {
    return $this->belongsTo(Empresa::class, 'id_empresa');
  }

      public static function getEmpleado($shown,$empresaDefault){

        if($empresaDefault == 0){
          $empleats= DB::table('users') //
              ->join('empleados', 'empleados.user_id', '=', 'users.id')
              ->join('roles', 'roles.id', '=','users.id_roles' )
              ->join('empresas', 'empleados.id_empresa', '=', 'empresas.id')
              ->select('users.*', 'roles.name as nom_roles', 'empresas.nom as empresaNom' )
              ->where('users.estat', '=', 'actiu')
              ->orderBy('nom', 'ASC')
              ->paginate($shown);

        }else{
          $empleats= DB::table('users') //
              ->join('empleados', 'empleados.user_id', '=', 'users.id')
              ->join('roles', 'roles.id', '=','users.id_roles' )
              ->join('empresas', 'empleados.id_empresa', '=', 'empresas.id')
              ->select('users.*', 'roles.name as nom_roles', 'empresas.nom as empresaNom' )
              ->where('users.estat', '=', 'actiu')
              ->where('empleados.id_empresa', $empresaDefault) //caldra posar-ho si al final ho fem per entorns pero per al funcional ja sobra
              ->orderBy('nom', 'ASC')
              ->paginate($shown);

        }
        return $empleats;
      }



}
