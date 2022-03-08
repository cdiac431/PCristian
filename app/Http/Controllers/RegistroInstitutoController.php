<?php

namespace App\Http\Controllers;

use App\Models\Instituto;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Hash;

use Mail;

use DB;

use Carbon\Carbon;

use Illuminate\Support\Str;

class RegistroInstitutoController extends Controller
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

        $institut = new Instituto;


        //$centre = $request['centre'];        
        //exit($request['centre']);
        $institut->nom = $request['centre'];
        $institut->localitat = "unknown";
        $institut->direccio = "unknown";
        $institut->telefon = "unknown";
        $institut->cif = "unknown";
        $institut->email = "unknown";
        $institut->estat = "inactiu";

        $institut->save();

        $token = Str::random(60);

        DB::table('institut_validacions')->insert(
            ['id_institut' => $institut->id, 'token' => $token, 'created_at' => Carbon::now()]
        );

        Mail::send('auth.verifyCentre',['token' => $token], function($message) use ($request) {
                  $message->to($request['email']);
                  $message->subject('Notificació de validació del centre');
        });

        return redirect()->route('home')->with('alert', 'S\'ha enviat un correu de confirmació del centre');   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['id_roles'] = "2";
        $request['estat'] = "actiu";
        $request['password'] = Hash::make($request['password']);

        $usuarios = User::create($request->all());
        return redirect()->route('registroinstitutos.create', $request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $institut = Instituto::find($request['id_institut']);        
        return redirect()->route('home')->with(['institut' => $institut]);
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
        if ($request->hasFile('docum_centre')){
            
            $file= $request->file("docum_centre");

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
        //exit(var_dump($request['docum_centre']));

        DB::table('institutos')->where('id', $id)->update([
                'localitat' => $request['localitat'],
                'direccio' => $request['direccio'],
                'telefon' => $request['telefon'],
                'cif' => $request['cif'],
                'email' => $request['email'],
                'ruta_document' => $nombre,
                'estat' => 'pendent'
        ]);


     
        Mail::send('auth.verifyCentrereview', [],function($message) use ($request) {
            $message->to($request['email']);
            $message->subject('Registre en revisió');
        });

        return redirect()->route('home')->with(['alert' => 'El teu registre ha sigut completat! Revisa el Correu Electrònic.']);
    }

    public function acceptreview(Request $request)
    {
        //exit(var_dump($request['id_centre'], $request['centre_nom'], $request['centre_email']));
        DB::table('institutos')->where('id', $request['id_centre'])->update([
                'estat' => 'actiu'
        ]);
     
        Mail::send('auth.verifyCentreend', [],function($message) use ($request) {
            $message->to($request['centre_email']);
            $message->subject('Benvingut a Proiectus');
        });

        return back()->with(['alert' => 'La sol·licitud ha sigut acceptada correctament!']);
    }

    public function denyreview(Request $request)
    {
        //exit(var_dump($request['centr_id'], $request['centre_nom'], $request['centr_email']));
        DB::table('institutos')->where('id', $request['centr_id'])->update([
                'estat' => 'inactiu'
        ]);
     
        Mail::send('auth.verifyCentreendrefuse', [],function($message) use ($request) {
            $message->to($request['centr_email']);
            $message->subject('La teva sol·licitud de registre ha estat declinada');
        });

        return back()->with(['alert' => 'La sol·licitud ha estat declinada correctament!']);
    }
}
