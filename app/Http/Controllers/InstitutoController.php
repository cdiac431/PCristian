<?php

namespace App\Http\Controllers;

use App\Exports\institutsExport;
use App\Exports\UsersExport;
use App\Imports\institutsImport;
use App\Imports\UsersImport;
use App\Models\Instituto;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

if (!defined('defaultShown')) define('defaultShown', '10');
class InstitutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {

        return $this->show();
    }
    
    public function pendents()
    {
        $shown=10;
        $insituto = Instituto::where('estat','pendent')->paginate($shown);
        return view('auth.InsitutosReview', compact('insituto'));
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
        $instituts = Instituto::create($request->all());
        return redirect()->route('instituts.index');
    }

    public function show($shown = defaultShown)
    {
        $instituts = Instituto::where('estat','actiu')->paginate($shown);
        return view('Grup1.instituts.indexInstitut', compact('instituts'));
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
    public function update(Request $request, Instituto $instituto)
    {
        $instituto = Instituto::find($request->id);

        $instituto->nom = $request->nom;
        $instituto->localitat = $request->localitat;
        $instituto->direccio = $request->direccio;
        $instituto->telefon = $request->telefon;
        $instituto->cif = $request->cif;
        $instituto->email = $request->email;

      $instituto->save();

        return redirect()->route('instituts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $centro = Instituto::find($id);
        $centro -> estat = 'inactiu';
        $centro ->save();
        return redirect()->route('instituts.index');
    }

    public function multipledelete(Request $request)
    {

        $ids = $request->except('_token',"institut_id_elim","idundefined");

        foreach ($ids as $key) {
            $eliminat = Instituto::find($key);
            $eliminat -> estat = 'inactiu';
            $eliminat -> save();
        }
        return redirect()->route('instituts.index',defaultShown);

    }
    public function exportCsv()
    {
        return Excel::download(new institutsExport(), 'instituts.csv');
    }
    public function importCsv()
    {

        Excel::import(new institutsImport(),request()->file('file'),null,\Maatwebsite\Excel\Excel::CSV);

        return back();
    }
}

