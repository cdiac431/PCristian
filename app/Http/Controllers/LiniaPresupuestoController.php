<?php

namespace App\Http\Controllers;

use App\Models\LiniaPresupuesto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class LiniaPresupuestoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pressupostos = LiniaPresupuesto::paginate();
        return view('Grup3.pressupostos.indexPressupost', compact('pressupostos'));
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
        $pressupost = LiniaPresupuesto::create($request->all());
        return redirect()->route('pressupostos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LiniaPresupuesto  $liniaPresupuesto
     * @return \Illuminate\Http\Response
     */
    public function show(LiniaPresupuesto $liniaPresupuesto)
    {
        dd($liniaPresupuesto);
        return view('Grup3.pressupostos.showLiniaPresupuesto');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LiniaPresupuesto  $liniaPresupuesto
     * @return \Illuminate\Http\Response
     */
    public function edit(LiniaPresupuesto $liniaPresupuesto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LiniaPresupuesto  $liniaPresupuesto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LiniaPresupuesto $liniaPresupuesto)
    {
        $liniaPresupuesto = LiniaPresupuesto::find($request->id);

      $liniaPresupuesto->nom_cost = $request->nom_cost;
      $liniaPresupuesto->preu_cost = $request->preu_cost;
      $liniaPresupuesto->quantitat_cost = $request->quantitat_cost;
      $liniaPresupuesto->total_linia_producte = $request->total_linia_producte;
      $liniaPresupuesto->iva = $request->iva;
      $liniaPresupuesto->procedencia = $request->procedencia;
      $liniaPresupuesto->nom_cost = $request->nom_cost;
      $liniaPresupuesto->estat_proposta = $request->estat_proposta;

      $liniaPresupuesto->save();

        return redirect()->route('pressupostos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LiniaPresupuesto  $liniaPresupuesto
     * @return \Illuminate\Http\Response
     */

    public function destroy($id){

        $affected = LiniaPresupuesto::find($id);
        $affected->estat = 'inactiu';
        $affected->save();   

        return redirect()->route('pressupostos.index');
    }
}
