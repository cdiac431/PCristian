<?php

namespace App\Http\Controllers;

use App\Models\GrupoClase;
use Illuminate\Http\Request;
use App\Models\Instituto;
use App\Models\Profesor;
use App\Models\User;
if (!defined('defaultShown')) define('defaultShown', '10');

class GrupoClaseController extends Controller
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
     

        $grups = GrupoClase::create($request->all());

        return redirect()->route('grups.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GrupoClase  $grups
     * @return \Illuminate\Http\Response
     */
    public function show($shown)
    {
        $grups = GrupoClase::where('estat','actiu')->paginate($shown);
        $profesor = Profesor::all();
        $nomprofesor =User::all();
        $institut = Instituto::all();
        $toteslestaules = $grups->merge($profesor,$nomprofesor,$institut);
        $data = GrupoClase::select('grupo_clases.nom', 'institutos.nom','users.nom')
            ->join('institutos', 'grupo_clases.id_institut', '=', 'institutos.id')
            ->join('users', 'grupo_clases.id_tutor', '=', 'users.id')->where('users.id_roles','=',5)
            ->get();

        return view('Grup2.grups.indexGrup', compact('grups','institut','profesor','nomprofesor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GrupoClase  $grups
     * @return \Illuminate\Http\Response
     */
    public function edit(GrupoClase $grups)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GrupoClase  $grups
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GrupoClase $grups)
    {
        $grups = GrupoClase::find($request->id);

      $grups->nom = $request->nom;
      $grups->id_tutor = $request->id_tutor;
      $grups->id_institut = $request->id_institut;

      $grups->save();
        return redirect()->route('grups.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param GrupoClase $grups
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $affected = GrupoClase::find($id);
        $affected->estat = 'inactiu';
        $affected->save();
        return redirect()->route('grups.index');
    }

    public function multipledelete(Request $request)
    {

        $ids = $request->except('_token',"grup_id_elim","idundefined");

        foreach ($ids as $key) {
            $eliminat = GrupoClase::find($key);
            $eliminat -> estat = 'inactiu';
            $eliminat -> save();
        }
        return redirect()->route('grups.index',defaultShown);

    }
}
