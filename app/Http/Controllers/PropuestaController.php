<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Propuesta;
use App\Models\Proyecto;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\Instituto;
use App\Models\Empresa;
use App\Models\Incidencia;
use App\Models\MensajeEnviado;
use App\Models\MensajeRecibido;

class PropuestaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = Auth::user();
        $categories = Categoria::orderBy('id', 'asc')->where("estat", "=", "actiu")->get();
        if($user->id_roles == 1){
            $propostes = Propuesta::where("estat", "=", "actiu")->paginate();
            return view('Grup2.propostes.indexPropostes', compact('propostes', 'categories'));
        }
        elseif($user->id_roles == 2 || $user->id_roles == 5 || $user->id_roles == 4){
            $id_insti = $user->professor->id_institut ?? $user->alumne->id_institut;
            $propostesInsti = Propuesta::where("id_institut",$id_insti)->where("id_empresa",null)->orderBy("estat_proposta", "desc")->get();
            $propostes = Propuesta::where("estat", "=", "actiu")->where("id_institut", null)->orderBy("estat_proposta", "desc")->paginate();
            return view('Grup2.propostes.indexPropostes', compact('propostes', 'categories', 'propostesInsti'));
        }
        else{
            $id_empresa = $user->empleat->id_empresa;
            $propostesEmpresa = Propuesta::where("id_empresa",$id_empresa)->where("id_institut",null)->orderBy("estat_proposta", "desc")->get();
            $propostes = Propuesta::where("estat", "=", "actiu")->where("id_empresa", null)->orderBy("estat_proposta", "desc")->paginate();
            // $propostesEmpresaAcceptades = Propuesta::where("id_empresa",$id_empresa)->orderBy("estat_proposta", "desc")->get();
            return view('Grup2.propostes.indexPropostes', compact('propostes', 'categories', 'propostesEmpresa'));
            

        }
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
        $user=Auth::user();
        if ($user->id_roles===2) {
            $request['id_institut'] = $user->professor->id_institut;
        } elseif ($user->id_roles===3) {
            $request['id_empresa'] = $user->empleat->id_empresa;
        }
        $request['id_responsable'] = $user->id;
        $request['estat_proposta'] = 'Disponible';
        $propostes = Propuesta::create($request->all());

        if ($request->hasfile('ruta_imatge')){
            $file= $request->file("ruta_imatge");
            $valids = ['jpg', 'jpeg', 'png', 'gif', 'bmp'];
            $nombre =  time(). "-". $file->getClientOriginalName();
            $ext = $file->getClientOriginalExtension();
        }
        else{
            $ext = null;
            $valids = array('Hola' => 1);
        }
        if (in_array($ext, $valids)) {
            $file->storeAs('propostaImage/', $nombre);
            $propostes->ruta_imatge = $nombre;
            $propostes->save();
        }

        return redirect()->route('propostes.index');
    }

    public function unirse(Request $request)
    {
        $user=Auth::user();
        $proposta = Propuesta::find($request->proposta_id_unirse);
        $userResponsable = User::find($proposta->id_responsable);
        if ($user->id_roles===2 || $user->id_roles===5) {
            $nom = $user->professor->institut->nom;
        } elseif ($user->id_roles===3) {
            $nom = $user->empleat->empresa->nom;
        }
        $mail = new MensajeEnviado();
        $rebut = new MensajeRecibido();
        $rebut->remitent = auth()->user()->email;
        $rebut->destinatari = $userResponsable->email;
        $rebut->assumpte = $nom." és vol unir a la teva proposta";
        $rebut->cos = $nom." vol unir-se a la teva proposta ";
        $rebut->link_proposta = "/management/Gestio-interna/propostes/$proposta->id";
        $rebut->estat = 'actiu';
        $mail->remitent = auth()->user()->email;
        $mail->assumpte = $nom." és vol unir a la teva proposta ";
        $mail->cos = $nom." vol unir-se a la teva proposta ";
        $mail->link_proposta = "/management/Gestio-interna/propostes/$proposta->id";
        $mail->estat = 'actiu';
        $mail->save();
        $rebut->save();
        $proposta->estat_proposta = "Sol·licitada";
        $proposta->id_solicitant = $user->id;
        $proposta->save();
        return redirect()->route('propostes.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Propuesta  $propuesta
     * @return \Illuminate\Http\Response
     */
    public function show($idProposta)
    {
        //$propostes = Propuesta::where("estat", "=", "actiu")->get();
        $proposta = Propuesta::find($idProposta);
        $representant = User::find($proposta->id_responsable);
        $categoria = Categoria::all()->find($proposta->categoria);
        return view('Grup2.propostes.showPropostes', compact('proposta','categoria','representant'));

    }
    public function getDisplay($idProposta)
    {
      $propostes = Propuesta::where("estat", "=", "actiu")->get();
      $proposta = $propostes->find($idProposta);
      $representant = User::all()->find($proposta->id_responsable);
      $categoria = Categoria::all()->find($proposta->categoria);
      return view('Grup2.propostes.publicShowPropostes',compact('proposta','categoria','representant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Propuesta  $propuesta
     * @return \Illuminate\Http\Response
     */
    public function edit(Propuesta $propuesta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Propuesta  $propuesta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Propuesta $propuesta)
    {
        $user=Auth::user();
        if ($user->id_roles===2) {
            $request['id_institut'] = $user->professor->id_institut;
        } elseif ($user->id_roles===3) {
            $request['id_empresa'] = $user->empleat->id_empresa;
        }
        if ($request->hasfile('ruta_imatge')){
            $file= $request->file("ruta_imatge");
            $valids = ['jpg', 'jpeg', 'png', 'gif', 'bmp'];
            $nombre =  time(). "-". $file->getClientOriginalName();
            $ext = $file->getClientOriginalExtension();
      }
      else{
          $ext = null;
          $valids = array('Hola' => 1);
      }
        if (in_array($ext, $valids)) {
            $file->storeAs('propostaImage/', $nombre);
            $propuesta = Propuesta::find($request->id);

      $propuesta->id_categoria = $request->id_categoria;
      $propuesta->nom = $request->nom;
      $propuesta->descripcio = $request->descripcio;
      $propuesta->estimacio_economica = $request->estimacio_economica;
      $propuesta->estat_proposta = $request->estat_proposta;
            $propuesta->ruta_imatge = $request->ruta_imatge;
      $propuesta->save();
        }
        else{
            $propuesta = Propuesta::find($request->id);

            $propuesta->id_categoria = $request->id_categoria;
            $propuesta->nom = $request->nom;
            $propuesta->descripcio = $request->descripcio;
            $propuesta->estimacio_economica = $request->estimacio_economica;
            $propuesta->estat_proposta = $request->estat_proposta;

            $propuesta->save();
        }

        return redirect()->route('propostes.index');
    }

    public function updateValoracio(Request $request, $id)
    {
        //return response()->json($request, 200);
        $propuesta = Propuesta::find($id);
        $propuesta->valoracio += $request->estrellas;
        $propuesta->num_valoracions += 1;
        $propuesta->save();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Propuesta  $propuesta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $affected = Propuesta::find($id);
        $affected->estat = 'inactiu';
        $affected->save();

        return redirect()->route('propostes.index');
    }
    public function acceptar($id)
    {
        $proposta = Propuesta::find($id);
        $proposta->estat_proposta = 'Assignada';
        $mail = new MensajeEnviado();
        $rebut = new MensajeRecibido();
        $usuari_solicitant = User::find($proposta->id_solicitant);
        $rebut->remitent = auth()->user()->email;
        $rebut->destinatari = $usuari_solicitant->email;
        $rebut->assumpte = "Aprovació de sol·licitud";
        $rebut->cos = "El responsable de la proposta ".$proposta->nom.", ha acceptat la teva sol·licitud i ja és un projecte actiu";
        $rebut->estat = 'actiu';
        $mail->remitent = auth()->user()->email;
        $mail->assumpte = "Aprovació de sol·licitud.";
        $mail->cos = "El responsable de la proposta ".$proposta->nom.", ha acceptat la teva sol·licitud i ja és un projecte actiu";
        $mail->estat = 'actiu';
        $mail->save();
        $rebut->save();
        if ($proposta->id_empresa == "") {
            $proposta->id_empresa = $usuari_solicitant->empleat->empresa->id;
        } else{
            $proposta->id_institut = $usuari_solicitant->professor->institut->id;
        }
        $proposta->save();

        $projecte = new Proyecto();
        $projecte->id_proposta = $proposta->id;
        
        $projecte->nom_projecte = $proposta->nom;
        $oldPath = "propostaImage/".$proposta->ruta_imatge;
        $newPath = "projecteImage/".$proposta->ruta_imatge;
        if (\File::copy($oldPath , $newPath)) {
            $projecte->ruta_imatge = $proposta->ruta_imatge;
        }

        $projecte->save();
        return redirect()->route('propostes.index');
    }

    public function declinar($id)
    {

        $proposta = Propuesta::find($id);
        $proposta->estat_proposta = 'Disponible';
        

        $mail = new MensajeEnviado();
        $rebut = new MensajeRecibido();
        $usuari_solicitant = User::find($proposta->id_solicitant);
        $rebut->remitent = auth()->user()->email;
        $rebut->destinatari = $usuari_solicitant->email;
        $rebut->assumpte = "Denegació de sol·licitud.";
        $rebut->cos = "El responsable de la proposta ".$proposta->nom.", ha denegat la teva sol·licitud.";
        $rebut->estat = 'actiu';
        $mail->remitent = auth()->user()->email;
        $mail->assumpte = "Denegació de sol·licitud.";
        $mail->cos = "El responsable de la proposta ".$proposta->nom.", ha denegat la teva sol·licitud.";
        $mail->estat = 'actiu';
        $mail->save();
        $rebut->save();
        $proposta->id_solicitant = null;
        $proposta->save();
        return redirect()->route('propostes.index');
    }
}

