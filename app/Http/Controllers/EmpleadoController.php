<?php

namespace App\Http\Controllers;
use App\Models\Empleado;
use App\Models\Empresa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/*
Empleats necessiten tenir per default la id de la empresa a la que pertañen. Al fer login, s'hauria de generar una
session amb la id de l'empresa (o altes dades) per a que al crear empleats/fer consultes de empleats surtin sols
els d'aquella empresa, de moment per a montar aixo dixare la id 1 que es la unica empresa que tenim, pero
es algo a tenir en compte, el mateix per a profes/alumnes
*/
if (!defined('defaultShown')) define('defaultShown', '10');
class EmpleadoController extends Controller
{

    public function index()
    {
    return $this->show();
    }
    public function show($shown=defaultShown)
    {
        $empresaDefault=auth()->user()->empleat['id_empresa'] ?? 0;
        if($empresaDefault==0){
            $empreses = Empresa::all()->where('estat','actiu');
        }
        else{
            $empreses = auth()->user()->empleat['empresa'];
        }
        $empleats = Empleado::getEmpleado($shown,$empresaDefault);//substituir per id de l'empresa entorn
        return view('Grup3.empleats.empleats')
            ->with('empleats', $empleats)
            ->with('empreses', $empreses);
    }

//futura millora, que un modal de Succes aparegui al fer alguna modificacio
    public function store(Request $request)
    {
        $data =  $request->except(['_token','_method']);
        $data = array_filter($data);
        $empuser = new User();
        $empuser -> fill($data);
        $empuser->password = Hash::make($request->input('password'));
        $empuser->save();
        if($request->id_roles == 3){
            $empuser->assignRole('Gestor Empresa');
        }else{
            $empuser->assignRole('Empleat');
        }
        $emp = new Empleado(); //al final ho apaño yo xdddxnjhnduidshnafijhnijhnf
        $emp->user_id = $empuser->id;
        $emp->id_empresa = $request->input('id_empresa'); //substituir per id de la empresa
        $emp->save();
        return redirect()->route('empleats.index')
            ->with('success', 'Nou usuari creat!');
    }

    public function delete(Request $request)
    {
        $ids = $request->except('_token');

        foreach ($ids as $key) {
            $eliminat = User::find($key);
            $eliminat -> estat = 'inactiu';
            $eliminat -> save();
        }

        return redirect()->route('empleats.show',defaultShown);

    }


    public function singledelete($id)
    {
        $eliminat = User::find($id);
        $eliminat -> estat = 'inactiu';
        $eliminat -> save();
        return redirect()->route('empleats.show',defaultShown);
    }

    public function edituser($id)
    {
        $useremp = User::where('id', $id)->first();
        $empleat = empleado::where('user_id', $id)->first();
        return  redirect()->route('empleats.show',defaultShown)
            ->with('user', $useremp)
            ->with('empleat', $empleat);
    }

    public function actualitzar(Request $request,$id)
    {
        $data =  $request->except(['_token','_method']);
        $data = array_filter($data);
        $user = User::find($id);
        $user->update($data);
        if($request->id_roles == 3){
            if($user->hasRole('Empleat')){
                $user->removeRole('Empleat');
                $user->assignRole('Gestor Empresa');
            }
        }else{
            if($user->hasRole('Gestor Empresa')){
                $user->removeRole('Gestor Empresa');
                $user->assignRole('Empleat');
            }
        }
        return redirect()->route('empleats.show',defaultShown)->with('success', 'Show is successfully updated');
    }

}
