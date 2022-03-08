<?php

namespace App\Http\Controllers;

use App\Models\Incidencia;
use App\Models\User;
use Illuminate\Http\Request;
if (!defined('defaultShown')) define('defaultShown', '10');
class IncidenciaController extends Controller
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
        $request['id_usuari'] = auth()->user()->id;
        $request['estat_incidencia']= 'Enviat';
        $incidencia = Incidencia::create($request->all());

        return redirect()->route('incidencies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($shown)
    {
        $incidencies = Incidencia::where('id_usuari',auth()->user()->id)->where('estat','actiu')->paginate($shown);
        $usuaris = User::where('estat','actiu');
        return view('Grup1.incidencies.indexIncidencia', compact('incidencies','usuaris'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Incidencia $incidencia)
    {
        $incidencia = Incidencia::find($request->id);

      $incidencia->estat_incidencia = $request->estat_incidencia;

      $incidencia->save();
        return redirect()->route('incidencies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $affected = Incidencia::find($id);
        $affected->estat = 'inactiu';
        $affected->save();
        return redirect()->route('incidencies.index');

    }
    public function multipledelete(Request $request)
    {

        $ids = $request->except('_token',"incidencia_id_elim","idundefined");

        foreach ($ids as $key) {
            $eliminat = Incidencia::find($key);
            $eliminat -> estat = 'inactiu';
            $eliminat -> save();
        }
        return redirect()->route('incidencies.index',defaultShown);

    }
    public function exportCsv(Request $request)
    {
        $fileName = 'incidencies.csv';
        $incidencies = Incidencia::all();
        $columns = array('Usuari', 'Nom', 'Descripció', 'Data', 'Estat incidencia');
        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $callback = function() use($incidencies, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($incidencies as $incidencia) {
                $row['Usuari']  = $incidencia->usuari->nom;
                $row['Nom']    = $incidencia->nom;
                $row['Descripció']  = $incidencia->descripcio;
                $row['Data']  = $incidencia->registre_data;
                $row['Estat incidencia']    = $incidencia->estat_incidencia;
                fputcsv($file, array($row['Usuari'], $row['Nom'], $row['Descripció'], $row['Data'],$row['Estat incidencia']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
