<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profesor;
use App\Models\Roles;
use Illuminate\Support\Facades\Hash;
use App\Models\Instituto;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Http\Request;
if (!defined('defaultShown')) define('defaultShown', '10');
class ProfesorController extends Controller
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
        $request['Password'] = Hash::make($request->Password);
        $usuario = new User;
        $usuario->id_roles = $request->id_roles;
        $usuario->nom = $request->Nom;
        $usuario->cognom = $request->Cognom;
        $usuario->segon_cognom = $request->Segon_cognom;
        $usuario->dni = $request->Dni;
        $usuario->user_name = $request->User_Name;
        $usuario->password = Hash::make($request->Password);
        $usuario->email = $request->Email;
        $usuario->telefon = $request->Telefon;
        if($request->id_roles == 2){
            $usuario->assignRole('Gestor Institut');
        }else{
            $usuario->assignRole('Professor');
        }
        $usuario->save();

        $profesor = new Profesor;
        $profesor->user_id = $usuario->id;
        $profesor->id_institut = $request->id_institut;

        $profesor->save();
        return redirect()->route('professors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function show($shown)
    {
        if(auth()->user()->HasRole('Alumne')){
            $institutDefault=auth()->user()->alumne['id_institut'];
        }else{
            $institutDefault=auth()->user()->professor['id_institut'] ?? 0;
        }

        $professors = Profesor::getProfessor($shown,$institutDefault);
        if($institutDefault==0){
            $instituts = Instituto::all();
        }else
            if(auth()->user()->HasRole('Alumne'))
            {
                $instituts = auth()->user()->alumne['institut'];
            }
            else
            {
                $instituts = auth()->user()->professor['institut'];
            }


        return view('Grup2.profesors.indexProfessors', compact('professors','instituts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function edit(Profesor $profesor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $profesorUpdate = Profesor::where('user_id', $id);
        if ($request->password===null) {
            $user = User::find($id);
            $user->nom = $request->nom;
            $user->cognom = $request->cognom;
            $user->segon_cognom = $request->segon_cognom;
            $user->id_roles = $request->id_roles;
            $user->dni = $request->dni;
            $user->user_name = $request->user_name;
            $user->email = $request->email;
            $user->telefon = $request->telefon;
            $user->data_naixement = $request->data_naixement;
                $userrole = User::find($id);
                //echo $request->Id;

                if($request->id_roles == 2){
                
                    if($userrole->id_roles==5){
                    
                        $userrole->removeRole('Professor');
                        
                        $userrole->assignRole('Gestor Institut');
                    }

                }else{
                    
                    if($userrole->id_roles==2){
                        
                        $userrole->removeRole('Gestor Institut');
                        $userrole->assignRole('Professor');
                    }
                }
        }
        else{
            $request['password'] = Hash::make($request->password);
            $user = User::find($id);
            $user->nom = $request->nom;
            $user->cognom = $request->cognom;
            $user->segon_cognom = $request->segon_cognom;
            $user->id_roles = $request->id_roles;
            $user->dni = $request->dni;
            $user->user_name = $request->user_name;
            $user->password = $request->password;
            $user->email = $request->email;
            $user->telefon = $request->telefon;
            $user->data_naixement = $request->data_naixement;
                $userrole = User::find($id);

                if($request->id_roles == 2){
                    if($userrole->id_roles==5){
                        $userrole->removeRole('Professor');
                        $userrole->assignRole('Gestor Institut');
                    }

                }else{
                    if($userrole->id_roles==2){
                        $userrole->removeRole('Gestor Institut');
                        $userrole->assignRole('Professor');
                    }
                }
        }
        $user->save();
        return redirect()->route('professors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $afected = User::where('id', $id)->update(['estat' => 'inactiu']);

        return redirect()->route('professors.index');
    }

    public function multipledelete(Request $request)
    {

        $ids = $request->except('_token',"profe_id_elim","idundefined");

        foreach ($ids as $key) {
            $eliminat = Profesor::find($key);
            $eliminat -> estat = 'inactiu';
            $eliminat -> save();
        }
        return redirect()->route('professors.index',defaultShown);

    }


}
