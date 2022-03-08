<?php

namespace App\Http\Controllers;

use App\Exports\EmpresesExport;
use App\Exports\UsersExport;
use App\Imports\EmpresesImport;
use App\Imports\UsersImport;
use App\Models\Empresa;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

if (!defined('defaultShown')) define('defaultShown', '10');
if (!defined('shown')) define('shown', '10');

class EmpresaController extends Controller
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

    public function pendents()
    {
        $shown=10;
        $empresa = Empresa::where('estat','pendent')->paginate($shown);
        return view('Grup1.empreses.empresesPendents', compact('empresa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function create(Request $request)
    {
        //$empresa = new Empresa;
        $usuarios = new Usuario;

        $usuarios->email = $request->email;
        //$empresa->nom = $request->empresa;
        $usuarios->nom = $request->nom;
        $usuarios->cognom = $request->cognom;
        $usuarios->segon_cognom = $request->segoncognom;
        $usuarios->dni = $request->dni;
        $usuarios->user_name = $request->username;
        $usuarios->password = $request->password;
        $usuarios->telefon = $request->telefon;

        //$empresa->save();
        $usuarios->save();
        return back();
    }*/

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Empresa::create($request->all());
        return redirect()->route('empreses.index');
    }

    public function show($shown)
    {
        $empreses = Empresa::where('estat','actiu')->paginate($shown);
        return view('Grup1.empreses.indexEmpresa', compact('empreses'));
    }

    public function veure(Empresa $empresa)
    {
        return view('Grup1.empreses.showEmpresa', compact('empresa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empresa $empresa)
    {
        $empresa = Empresa::find($request->id);

      $empresa->nom = $request->nom;
      $empresa->localitat = $request->localitat;
      $empresa->direccio = $request->direccio;
      $empresa->telefon = $request->telefon;
      $empresa->cif = $request->cif;
      $empresa->email = $request->email;

      $empresa->save();
        return redirect()->route('empreses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $affected = Empresa::find($id);
        $affected->estat = 'inactiu';
        $affected->save();


        return redirect()->route('empreses.index');
    }
    public function multipledelete(Request $request)
    {

        $ids = $request->except('_token',"empresa_id_elim","idundefined");

        foreach ($ids as $key) {
            $eliminat = Empresa::find($key);
            $eliminat -> estat = 'inactiu';
            $eliminat -> save();
        }
        return redirect()->route('empreses.index',defaultShown);

    }

    public function exportCsv()
    {
        return Excel::download(new EmpresesExport, 'empreses.csv');
    }
    public function importCsv()
    {

        Excel::import(new EmpresesImport,request()->file('file'),null,\Maatwebsite\Excel\Excel::CSV);

        return back();
    }
}
