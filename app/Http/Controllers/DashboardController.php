<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Propuesta;
use App\Models\Proyecto;
use App\Models\Incidencia;
use App\Models\Chat;
use App\Models\Mensaje;
use App\Models\User;
use App\Models\Profesor;
use App\Models\Alumno;
use App\Models\Empleado;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return $this->index_month(date("Y-m"));
    }

    public function updateIncidencia(Request $request,Incidencia $incidencia)
    {
        Incidencia::where('id', $request->id)->update(['estat_incidencia'=>$request->estat_incidencia]);
        return redirect()->route('tauler');
    }

    public function index_month($month)
    {
        $user=Auth::user();

        if($user->id_roles===2|| $user->id_roles===4|| $user->id_roles===5){
            
            $propostes = Propuesta::where([['id_institut', $user->professor['id_institut'] ?? $user->alumne['id_institut']],['estat', '=','actiu']])->get();
            $propostesOwner = Propuesta::where([['id_responsable', $user->id],['estat', '=','actiu']])->get();
            $projectesTauler = Proyecto::getProyecto($user->professor['id_institut'] ?? $user->alumne['id_institut'])->get();
            $shown=10;
            if($user->id_roles===2){
              $institutDefault=auth()->user()->professor['id_institut'];
              $professors = Profesor::getProfessor($shown,$institutDefault);
            }

            if($user->id_roles===2|| $user->id_roles===5){
              $institutDefault=auth()->user()->professor['id_institut'];
              $alumnos = Alumno::getAlumne($shown,$institutDefault);
            }

            //Chat
            $idChat = 1;
            $chat = Mensaje::where('estat', 'actiu')->where('id_xat', $idChat)->get();
            $users = User::all();
            $user = auth()->user();

            //Calendari
            $data = $this->calendar_month($month);
            $mes = $data['month'];
            // obtener mes en espanol
            $mespanish = $this->spanish_month($mes);
            $mes = $data['month'];

            if($user->id_roles===2){
              return view('dashboard', compact('propostes', 'projectesTauler','propostesOwner','data','mes','mespanish','chat', 'users', 'user', 'idChat','professors', 'alumnos'));
            }
            if($user->id_roles===5){
              return view('dashboard', compact('propostes', 'projectesTauler','propostesOwner','data','mes','mespanish','chat', 'users', 'user', 'idChat', 'alumnos'));
            }
        }
        elseif($user->id_roles===3 || $user->id_roles===6){
            $propostes = Propuesta::where([['id_empresa', $user->empleat['id_empresa']],['estat', '=','actiu']])->get();
            $propostesOwner = Propuesta::where([['id_responsable', $user->id],['estat', '=','actiu']])->get();
            $projectesTauler = Proyecto::getProyectoEmpresa($user->empleat['id_empresa'])->get();

            //Chat
            $idChat = 1;
            $chat = Mensaje::where('estat', 'actiu')->where('id_xat', $idChat)->get();
            $users = User::all();
            $user = auth()->user();

            //Calendari
            $data = $this->calendar_month($month);
            $mes = $data['month'];
            // obtener mes en espanol
            $mespanish = $this->spanish_month($mes);
            $mes = $data['month'];

            if($user->id_roles===3){
              $shown=10;
              $empresaDefault=auth()->user()->empleat['id_empresa'];
              $empleats = Empleado::getEmpleado($shown,$empresaDefault);
              return view('dashboard', compact('propostes', 'projectesTauler','propostesOwner','data','mes','mespanish','chat', 'users', 'user', 'idChat','empleats'));

            }

            return view('dashboard', compact('propostes', 'projectesTauler','propostesOwner','data','mes','mespanish','chat', 'users', 'user', 'idChat'));
        }
        if($user->id_roles===1){
            $incidencies = Incidencia::where('estat_incidencia','=','enviat')->orderBy('created_at', 'ASC')->get();
            $incidenciesCurs = Incidencia::where('estat_incidencia','=','en procès')->orderBy('updated_at', 'DESC')->get();
            $incidenciesResolt = Incidencia::where('estat_incidencia','=','Resolt')->orderBy('updated_at', 'DESC')->get();

            //Chat
            $idChat = 1;
            $chat = Mensaje::where('estat', 'actiu')->where('id_xat', $idChat)->get();
            $users = User::all();
            $user = auth()->user();

            //Calendari
            $data = $this->calendar_month($month);
            $mes = $data['month'];
            // obtener mes en espanol
            $mespanish = $this->spanish_month($mes);
            $mes = $data['month'];

            return view('dashboard', compact('incidencies','incidenciesCurs','incidenciesResolt','data','mes','mespanish','chat', 'users', 'user', 'idChat'));
        }
        

    }

      public static function calendar_month($month){
        //$mes = date("Y-m");
        $mes = $month;
        //sacar el ultimo de dia del mes
        $daylast =  date("Y-m-d", strtotime("last day of ".$mes));
        //sacar el dia de dia del mes
        $fecha      =  date("Y-m-d", strtotime("first day of ".$mes));
        $daysmonth  =  date("d", strtotime($fecha));
        $montmonth  =  date("m", strtotime($fecha));
        $yearmonth  =  date("Y", strtotime($fecha));
        // sacar el lunes de la primera semana
        $nuevaFecha = mktime(0,0,0,$montmonth,$daysmonth,$yearmonth);
        $diaDeLaSemana = date("w", $nuevaFecha);
        $nuevaFecha = $nuevaFecha - ($diaDeLaSemana*24*3600); //Restar los segundos totales de los dias transcurridos de la semana
        $dateini = date ("Y-m-d",$nuevaFecha);
        //$dateini = date("Y-m-d",strtotime($dateini."+ 1 day"));
        // numero de primer semana del mes
        $semana1 = date("W",strtotime($fecha));
        // numero de ultima semana del mes
        $semana2 = date("W",strtotime($daylast));
        // semana todal del mes
        // en caso si es diciembre
        if (date("m", strtotime($mes))==12) {
            $semana = 5;
        }
        else {
          $semana = ($semana2-$semana1)+1;
        }
        // semana todal del mes
        $datafecha = $dateini;
        $calendario = array();
        $iweek = 0;
        while ($iweek < $semana):
            $iweek++;
            //echo "Semana $iweek <br>";
            //
            $weekdata = [];
            for ($iday=0; $iday < 7 ; $iday++){
              // code...
              $datafecha = date("Y-m-d",strtotime($datafecha."+ 1 day"));
              $datanew['mes'] = date("M", strtotime($datafecha));
              $datanew['dia'] = date("d", strtotime($datafecha));
              $datanew['fecha'] = $datafecha;
              //AGREGAR CONSULTAS EVENTO
              //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
              array_push($weekdata,$datanew);
            }
            $dataweek['semana'] = $iweek;
            $dataweek['datos'] = $weekdata;
            //$datafecha['horario'] = $datahorario;
            array_push($calendario,$dataweek);
        endwhile;
        $nextmonth = date("Y-M",strtotime($mes."+ 1 month"));
        $lastmonth = date("Y-M",strtotime($mes."- 1 month"));
        $month = date("M",strtotime($mes));
        $yearmonth = date("Y",strtotime($mes));
        //$month = date("M",strtotime("2019-03"));
        $data = array(
          'next' => $nextmonth,
          'month'=> $month,
          'year' => $yearmonth,
          'last' => $lastmonth,
          'calendar' => $calendario,
        );
        return $data;
      }

      public static function spanish_month($month)
    {

        $mes = $month;
        if ($month=="Jan") {
          $mes = "Gener";
        }
        elseif ($month=="Feb")  {
          $mes = "Febrer";
        }
        elseif ($month=="Mar")  {
          $mes = "Març";
        }
        elseif ($month=="Apr") {
          $mes = "Abril";
        }
        elseif ($month=="May") {
          $mes = "Maig";
        }
        elseif ($month=="Jun") {
          $mes = "Juny";
        }
        elseif ($month=="Jul") {
          $mes = "Juliol";
        }
        elseif ($month=="Aug") {
          $mes = "Agosto";
        }
        elseif ($month=="Sep") {
          $mes = "Septembre";
        }
        elseif ($month=="Oct") {
          $mes = "Octubre";
        }
        elseif ($month=="Nov") {
          $mes = "Novembre";
        }
        elseif ($month=="Dec") {
          $mes = "Decembre";
        }
        else {
          $mes = $month;
        }
        return $mes;
    }

    public function chatUp(Request $request, $idChat)
    {
        if (strlen(trim($request->contingut)) > 0) {
            $chat = new Mensaje;

            $chat->id_usuari = auth()->user()->id;
            $chat->id_xat = $idChat;
            $chat->estat_missatge = 'Enviat';
            $chat->estat = 'actiu';
            $chat->contingut = trim($request->contingut);

            $chat->save();
        }
        return redirect()->route('tauler');
      }

    
}
