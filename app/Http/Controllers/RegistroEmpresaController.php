<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Hash;

use Mail;

use DB;

use Carbon\Carbon;

use Illuminate\Support\Str;

class RegistroEmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $empresa = new Empresa;


        //$centre = $request['centre'];        
        //exit($request['empresa']);
        $empresa->nom = $request['empresa'];
        $empresa->localitat = "unknown";
        $empresa->direccio = "unknown";
        $empresa->telefon = "unknown";
        $empresa->cif = "unknown";
        $empresa->email = "unknown";
        $empresa->estat = "inactiu";

        $empresa->save();

        //exit("id:". $empresa->id);
        $token = Str::random(60);

        DB::table('empresa_validacions')->insert(
            ['id_empresa' => $empresa->id, 'token' => $token, 'created_at' => Carbon::now()]
        );

        Mail::send('auth.verifyEntitat',['token' => $token], function($message) use ($request) {
                  $message->to($request['email']);
                  $message->subject('Notificació de validació de la entitat');
               });

        return redirect()->route('home')->with('alert', 'S\'ha enviat un correu de confirmació de la entitat');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Comentar a joan de afegir el valor de id_roles i de estat aqui a més de la vista (més segur)
        $request['id_roles'] = "3";
        $request['estat'] = "actiu";
        $request['password'] = Hash::make($request['password']);

        $usuarios = User::create($request->all());

        return redirect()->route('registroempresas.create', $request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $empresa = Empresa::find($request['id_empresa']);
        
        return redirect()->route('home')->with(['empresa' => $empresa]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->hasFile('docum_entitat')){
            
            $file= $request->file("docum_entitat");

            $valids = ['pdf', 'zip', 'tar'];

            $nombre =  time(). "-". $file->getClientOriginalName();
            $ext = $file->getClientOriginalExtension();

            //exit(var_dump($nombre));

            if (!in_array($ext, $valids)) {
                return back()->with('error', 'Extensió de fitxer invalida!');
            } else {
                $file->storeAs('reviewdocumentation/', $nombre);
                //exit(var_dump("Finiquitao"));
            }
        }

        DB::table('empresas')->where('id', $id)->update([
                'localitat' => $request['localitat'],
                'direccio' => $request['direccio'],
                'telefon' => $request['telefon'],
                'cif' => $request['cif'],
                'email' => $request['email'],
                'ruta_document' => $nombre,
                'estat' => 'pendent'
            ]);
            Mail::send('auth.verifyEntitatend', [],function($message) use ($request) {
                $message->to($request['email']);
                $message->subject('Et donem la benvinguda a Proiectus');
            });    
        

        return redirect()->route('home')->with(['alert' => 'T\'has registrat correctament!']);
    }

    public function acceptreview(Request $request)
    {
        //exit(var_dump($request['id_centre'], $request['centre_nom'], $request['centre_email']));
        DB::table('empresas')->where('id', $request['id_entitat'])->update([
                'estat' => 'actiu'
        ]);
     
        Mail::send('auth.verifyEntitatend', [],function($message) use ($request) {
            $message->to($request['entitat_email']);
            $message->subject('Benvingut a Proiectus');
        });

        return back()->with(['alert' => 'La sol·licitud ha sigut acceptada correctament!']);
    }

    public function denyreview(Request $request)
    {
        //exit(var_dump($request['centr_id'], $request['centre_nom'], $request['centr_email']));
        DB::table('empresas')->where('id', $request['enti_id'])->update([
                'estat' => 'inactiu'
        ]);
     
        Mail::send('auth.verifyEntitatendrefuse', [],function($message) use ($request) {
            $message->to($request['enti_email']);
            $message->subject('La teva sol·licitud de registre ha estat declinada');
        });

        return back()->with(['alert' => 'La sol·licitud ha estat declinada correctament!']);
    }
}
