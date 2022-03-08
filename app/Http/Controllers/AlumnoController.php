<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Alumno;
use App\Models\User;
use App\Models\Instituto;
use App\Models\GrupoClase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

if (!defined('defaultShown')) define('defaultShown', '10');
class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->show(defaultShown);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuario = new User;
        $usuario->nom = $request->nom;
        $usuario->cognom = $request->primer_cognom;
        $usuario->segon_cognom = $request->segon_cognom;
        $usuario->dni = $request->dni;
        $usuario->user_name = $request->nom_usuari;
        $usuario->password = $request->contrasenya;
        $usuario->email = $request->correu;
        $usuario->telefon = $request->telefon;
        $usuario->id_roles = 4;
        $usuario->assignRole('Alumne');
        $usuario->save();

        $alumno = new Alumno;
        $alumno->id_institut = $request->id_institut;
        $alumno->id_grup_tutoria = $request->id_grup_tutoria;
        $alumno->user_id = $usuario->id;
        $alumno->save();

        return redirect()->route('alumnes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function show($shown)
    {
        if(auth()->user()->HasRole('Alumne')){
            $institutDefault=auth()->user()->alumne['id_institut'];
        }else{
            $institutDefault=auth()->user()->professor['id_institut'] ?? 0;
        }
     
        $alumnos = Alumno::getAlumne($shown,$institutDefault);
        if($institutDefault==0){
            $instituts = Instituto::all();
            $grups = GrupoClase::all();
        }else
            if(auth()->user()->HasRole('Alumne'))
            {
                $instituts = auth()->user()->alumne['institut'];
                $grups = GrupoClase::all()->where('id_institut','==',$instituts['id']);
            }
            else
            {
                $instituts = auth()->user()->professor['institut'];
                $grups = GrupoClase::all()->where('id_institut','==',$instituts['id']);
            }
        

        return view('Grup2.alumnos.index', compact('alumnos', 'instituts','grups'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function edit(Alumno $alumno)
    {
        return $alumno;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $alumneupdate = Alumno::where('user_id', $id);
        if ($request->password===null) {
            $user = User::find($id);
            $user->nom = $request->nom;
            $user->cognom = $request->cognom;
            $user->segon_cognom = $request->segon_cognom;
            $user->dni = $request->dni;
            $user->user_name = $request->user_name;
            $user->email = $request->email;
            $user->telefon = $request->telefon;
            $user->data_naixement = $request->data_naixement;
        }else{
            $request['password'] = Hash::make($request->password);
            $user = User::find($id);
            $user->nom = $request->nom;
            $user->cognom = $request->cognom;
            $user->segon_cognom = $request->segon_cognom;
            $user->dni = $request->dni;
            $user->user_name = $request->user_name;
            $user->password = $request->password;
            $user->email = $request->email;
            $user->telefon = $request->telefon;
            $user->data_naixement = $request->data_naixement;
        }
        $user->save();
        return redirect()->route('alumnes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $affected = User::find($id);
        $affected->estat = 'inactiu';
        $affected->save();
        return redirect()->route('alumnes.index');
    }

    public function multipledelete(Request $request)
    {

        $ids = $request->except('_token',"alumne_id_elim","idundefined");

        foreach ($ids as $key) {
            $eliminat = Alumno::find($key);
            $eliminat -> estat = 'inactiu';
            $eliminat -> save();
        }
        return redirect()->route('alumnes.index',defaultShown);

    }
}
