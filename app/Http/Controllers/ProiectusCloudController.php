<?php

namespace App\Http\Controllers;

use App\Models\Fitxers;
use App\Models\Directoris;
use Illuminate\Http\Request;

class ProiectusCloudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idProjecte = null, $idDirectori = null)
    {
        if (!Directoris::where(['id_projecte' => $idProjecte])->get()->isEmpty()) {
            if (!$current = Directoris::where(['id_projecte' => $idProjecte, 'id' => $idDirectori])->first()) {
                $current = Directoris::where(['id_projecte' => $idProjecte, 'id_directori' => null])->first();
            }

            $directoris = Directoris::where(['id_projecte' => $idProjecte, 'id_directori' => $current->id])->get();
            $fitxers = Fitxers::where('id_directori', $current->id)->get();

            $ruta = [];

            $dir = Directoris::where(['id_projecte' => $idProjecte, 'id' => $current->id])->first();
            array_unshift($ruta,$dir);
            while($dir->id_directori) {
                $dir = Directoris::where(['id_projecte' => $idProjecte, 'id' => $dir->id_directori])->first();
                array_unshift($ruta,$dir);
            }
        }else{
            if (!$current = Directoris::where(['id_usuari' => auth()->user()->id, 'id_projecte' => null, 'id' => $idDirectori])->first()) {
                $current = Directoris::where(['id_usuari' => auth()->user()->id, 'id_projecte' => null, 'id_directori' => null])->first();
            }

            $directoris = Directoris::where(['id_usuari' => auth()->user()->id, 'id_projecte' => null, 'id_directori' => $current->id])->get();
            $fitxers = Fitxers::where('id_directori', $current->id)->get();

            $ruta = [];

            $dir = Directoris::where(['id_usuari' => auth()->user()->id, 'id_projecte' => null, 'id' => $current->id])->first();
            array_unshift($ruta,$dir);
            while($dir->id_directori) {
                $dir = Directoris::where(['id_usuari' => auth()->user()->id, 'id_projecte' => null, 'id' => $dir->id_directori])->first();
                array_unshift($ruta,$dir);
            }
        }
        return view('Grup4.proiectuscloud', compact('fitxers', 'directoris', 'ruta', 'idProjecte'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Presupuesto  $presupuesto
     * @return \Illuminate\Http\Response
     */
    public function show(Presupuesto $presupuesto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Presupuesto  $presupuesto
     * @return \Illuminate\Http\Response
     */
    public function edit(Presupuesto $presupuesto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Presupuesto  $presupuesto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Presupuesto $presupuesto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Presupuesto  $presupuesto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Presupuesto $presupuesto)
    {
        //
    }
}
