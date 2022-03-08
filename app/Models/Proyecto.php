<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Proyecto extends Model
{

  /*Fa les relacions*/
    use HasFactory, Loggable;

    protected $guarded;
    public $timestamps=true;

    
    public function blog(){
        return $this->hasOne(Blog::class);
      }


      public function pressupost(){
        return $this->hasOne(Presupuesto::class);
        
      }

      public function proposta(){
        return $this->belongsTo(Propuesta::class, 'id_proposta');
      }

      public function wiki(){
        return $this->hasOne(Wiki::class);
      }

      public static function getProyecto($id_institut){
        $projecte = DB::table('proyectos')
            ->join('propuestas', 'propuestas.id', '=', 'proyectos.id_proposta')
            ->select('proyectos.*','propuestas.id_institut')
            ->where('propuestas.id_institut','=', $id_institut)
            ->where('proyectos.estat', '=', 'actiu');


        return $projecte;
      }

      public static function getProyectoEmpresa($id_empresa){
        $projecte = DB::table('propuestas')
            ->join('proyectos', 'proyectos.id_proposta', '=', 'propuestas.id')
            ->select('proyectos.*')
            ->where('propuestas.id_empresa','=', $id_empresa)
            ->where('proyectos.estat', '=', 'actiu');


        return $projecte;
      }
      
      
}
