<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use App\Models\Propuesta;
use App\Models\LiniaPresupuesto;
use App\Models\Chat;
use App\Models\Mensaje;
use App\Models\User;
use App\Models\MensajeEnviado;
use App\Models\MensajeRecibido;
use App\Models\Categoria;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projectes = Proyecto::where('estat', 'actiu')->paginate();
        $pressupostos= LiniaPresupuesto::All();
        return view('Grup3.projectes.index', compact('projectes','pressupostos'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $projecte = Proyecto::create($request->all());
        return redirect()->route('projectes.index');

    }
    public function getDisplay($idProjecte)
    {
      $projecte = Proyecto::where("estat", "=", "actiu")->find($idProjecte);
      $propostaProjecte = Propuesta::all()->find($projecte->id_proposta);
      $representant = User::all()->find($propostaProjecte->id_responsable);
      $categoria = Categoria::all()->find($propostaProjecte->categoria);
      return view('Grup3.projectes.publicShowProjecte',compact('projecte','categoria','representant','propostaProjecte'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */


    //funció per a mostrar, pero no està implementada
    public function show(Proyecto $projecte)
    {
        return $this->index_month(date("Y-m"),$projecte);
    }

    public function index_month($month, Proyecto $projecte)
    {
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

        return view('Grup3.projectes.vistaProjecte',compact('projecte','data','mes','mespanish','chat', 'users', 'user', 'idChat'));
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

    public function chatUp(Request $request, $idChat, Proyecto $projecte )
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
        return $this->show($projecte);
      }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function edit(Proyecto $proyecto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    //Funció para actualitzar dades del crud
    public function update(Request $request, Proyecto $proyecto)
    {
        $proyecto = Proyecto::find($request->id);

      $proyecto->nom_projecte = $request->nom_projecte;
      $proyecto->data_inici = $request->data_inici;
      $proyecto->data_final = $request->data_final;


      $proyecto->save();

        return redirect()->route('projectes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    //Funció para actualitzar l'estat ("eliminar")
    public function destroy(Request $request, $id)
    {
        $affected = Proyecto::find($id);
        $affected->motiu = $request->motiu;
        $affected->estat = 'inactiu';
        $affected->save();

        return redirect()->route('projectes.index');
    }

    public function finalDestroy(Request $request, $id)
    {
        $affected = Proyecto::find($id);
        $affected->motiu = $request->motiu;
        $affected->estat = 'inactiu';
        $affected->finalitzat = 'si';
        $affected->save();

        return redirect()->route('projectes.index');
    }

    public function retornProposta(Request $request)
    {

        $affected = Proyecto::find($request->id_projecte);
        $proposta= $affected->proposta->id;
        $affected->motiu = $request->motiu;
        $affected->estat = 'inactiu';
        $affected->save();

        $proposta= Propuesta::find($proposta);
        $proposta->estat='actiu';
        $proposta->estat_proposta='Disponible';
        $proposta->save();

        $mail = new MensajeEnviado();
        $rebut = new MensajeRecibido();
        $rebut->remitent = 'admin@proiectus.cat';
        $rebut->destinatari = auth()->user()->email;
        $rebut->assumpte = 'Projecte retornar a Proposta';
        $rebut->cos = 'Has passat el projecte'.$affected->nom_projecte.' a proposta pel motiu:'.$request->motiu;
        $rebut->estat = 'actiu';
        $mail->remitent = 'admin@proiectus.cat';
        $mail->assumpte = 'Projecte retornar a Proposta';
        $mail->cos = 'Has passat el projecte'.$affected->nom_projecte.' a proposta pel motiu:'.$request->motiu;
        $mail->estat = 'actiu';
        $mail->save();
        $rebut->save();

        return redirect()->route('projectes.index');
    }
}
