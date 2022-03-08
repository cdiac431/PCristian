<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Imports\UsersImport;
use App\Models\Alumno;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Hash;
use App\Models\Roles;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

if (!defined('defaultShown')) define('defaultShown', '10');
class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    use HasRoles;
    public function index()
    {
        return $this->show(defaultShown);
    }

    public function indexuser()
    {
        return view('perfil');
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $rols = $request->id_roles;
        $roles = Roles::where('name', '=', $rols)->get('id');
        foreach ($roles as $rol) {
            $iddd = $rol->id;
        }
        $request['id_roles'] = $iddd;

        $request['password'] = Hash::make($request->password);

        $usuari = User::create($request->all());
        $usuari->save();
        $usuari->assignRole($rols);

        return redirect()->route('usuaris.index');
    }

    public function show($shown)
    {
        $usuaris = User::join('roles', 'roles.id', '=', 'users.id_roles')->select('users.*', 'roles.name as nom_roles')->where('estat', 'actiu')->orderBy('id', 'ASC')->paginate($shown);
        $roles = Roles::all();
        return view('Grup1.usuaris.indexUsuari', compact('usuaris', 'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, User $alumno)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {

        if ($request->password === null) {
            $user = User::find($request->id);
            $user->nom = $request->nom;
            $user->cognom = $request->cognom;
            $user->segon_cognom = $request->segon_cognom;
            $user->dni = $request->dni;
            $user->user_name = $request->user_name;
            $user->email = $request->email;
            $user->telefon = $request->telefon;
            $user->data_naixement = $request->data_naixement;
        } else {
            $request['password'] = Hash::make($request->password);
            $user = User::find($request->id);
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
        //
        $user->save();
        return redirect()->route('usuaris.index');
    }
    public function updateuser(Request $request, $id)
    {

        if ($request->password === null) {
            User::where('id', $request->id)
                ->update(
                    [
                        'nom' => $request->nom,
                        'cognom' => $request->cognom,
                        'segon_cognom' => $request->segon_cognom,
                        'dni' => $request->dni,
                        'user_name' => $request->user_name,
                        'email' => $request->email,
                        'telefon' => $request->telefon,
                        'data_naixement' => $request->data_naixement
                    ]
                );
        } else {
            $request['password'] = Hash::make($request->password);
            User::where('id', $request->id)
                ->update(
                    [
                        'nom' => $request->nom,
                        'cognom' => $request->cognom,
                        'segon_cognom' => $request->segon_cognom,
                        'dni' => $request->dni,
                        'password' => $request->password,
                        'user_name' => $request->user_name,
                        'email' => $request->email,
                        'telefon' => $request->telefon,
                        'data_naixement' => $request->data_naixement
                    ]
                );
        }
        return redirect()->route('perfil.user');
    }

    public function updateavatar(Request $request, $id)
    {

        if ($request->hasfile('urlfoto')) {
            $file = $request->file("urlfoto");

            $valids = ['jpg', 'jpeg', 'png', 'gif', 'bmp'];

            $nombre =  time() . "-" . $file->getClientOriginalName();
            $ext = $file->getClientOriginalExtension();

            if (!in_array($ext, $valids)) {
                return back()->with('error', 'Extensió de fitxer invalida!');
            } else {
                $file->storeAs('avatars/', $nombre);

                User::where('id', $request->id)->update(['ruta_avatar' => $nombre]);

                return redirect()->route('perfil.user')->with('status', 'Arxius penjats correctament');
            }
        }

        return back()->with('error', 'Fitxer invalid!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $affected = User::find($id);
        $affected->estat = 'inactiu';
        $affected->save();
        return redirect()->route('usuaris.index');
    }

    public function multipledelete(Request $request)
    {

        $ids = $request->except('_token', "usuari_id_elim", "idundefined");

        foreach ($ids as $key) {
            $eliminat = User::find($key);
            $eliminat->estat = 'inactiu';
            $eliminat->save();
        }
        return redirect()->route('usuaris.index', defaultShown);
    }

    public function exportCsv()
    {
        return Excel::download(new UsersExport, 'users.csv');
    }
    public function importCsv()
    {

        Excel::import(new UsersImport,request()->file('file'),null,\Maatwebsite\Excel\Excel::CSV);

        return back();
    }


public function cercar (Request $request){
$output='';
$count = 0;
    if ($request->ajax()) {
        $query = $request->get('query');
        if($query!=''){
            $data= Usuario::where('nom', 'like', '%'.$query.'%')
                ->orWhere('cognom', 'like', '%'.$query.'%')
                ->orWhere('segon_cognom', 'like', '%'.$query.'%')
                ->orWhere('user_name', 'like', '%'.$query.'%')
                ->orWhere('email', 'like', '%'.$query.'%')
                ->get();
            $count = $data->count();
        }
        else{
            $data = array(
                'refresh' => route('usuaris.index',defaultShown)
        );
            return json_encode($data);
        }
        if ($data->count()>0){
        foreach ($data as $row)
        {
            $output .= '
            <tr>
            <td class="align-middle align-content-center text-center">
             <input class="table-checkbox" type="checkbox" onClick="this.checked=!this.checked;">
            </td>
            <td> '.$row->nom." ".$row->cognom." ".$row->segon_cognom.'</td>
           <td class="align-middle">'.$row->user_name.'</td>
            <td class="align-middle">'.$row->email.'</td>
            <td class="align-middle">'.$row->roles->name.'</td>
            <td class="d-none" id="userid">'.$row->id.'</td>
            <td>
            <div class="d-flex justify-content-between">
            <a href="" onclick="selUsuari('."'".$row->tipus.','.$row->id.','.$row->nom.','.$row->cognom.','.$row->segon_cognom.','.$row->dni.','.$row->user_name.','.$row->email.
                ','.$row->telefon.','.$row->data_naixement."'".');" data-toggle="modal" data-target="#editUsuari" class="btn"><i class="fa fa-edit"></i></a>
            <a href=""  onclick="delUsuari('."'".$row->id."'".');" data-toggle="modal" data-target="#delUsuari" class="btn" data-toggle="modal" data-target="#deletemodal"><i
            class="fa fa-trash"></i></a>
                    </div>
            </td>
            </tr>
            ';
        }
        }
        else {
            $output = '
            <tr>
            <td align="center" colspan="5">
            No s'."'".'han trobat resultats.
            </td>
            </tr>';
        }
        $data = array(
            'tabledata' => $output,
            'count' => $count
        );
        return json_encode($data);
    }
else{
    $query = $request->get('query');
    if($query!=''){
        $data= Usuario::where('nom', 'like', '%'.$query.'%')
            ->orWhere('cognom', 'like', '%'.$query.'%')
            ->orWhere('segon_cognom', 'like', '%'.$query.'%')
            ->orWhere('user_name', 'like', '%'.$query.'%')
            ->orWhere('email', 'like', '%'.$query.'%')
            ->get();
    }
    $output ='';
        foreach ($data as $row)
        {

            $output .= '
            <tr>
            <td class="align-middle align-content-center text-center">
             <input class="table-checkbox" type="checkbox" onClick="this.checked=!this.checked;">
            </td>
            <td> '.$row->nom." ".$row->cognom." ".$row->segon_cognom.'</td>
           <td class="align-middle">'.$row->user_name.'</td>
            <td class="align-middle">'.$row->email.'</td>
            <td class="align-middle">'.$row->roles.'</td>
            <td class="d-none" id="userid">'.$row->id.'</td>
            <td>
            <div class="d-flex justify-content-between">
            <a href="" onclick="selUsuari('."'".$row->tipus.','.$row->id.','.$row->nom.','.$row->cognom.','.$row->segon_cognom.','.$row->dni.','.$row->user_name.','.$row->email.
                ','.$row->telefon.','.$row->data_naixement."'".');" data-toggle="modal" data-target="#editUsuari" class="btn"><i class="fa fa-edit"></i></a>
            <a href=""  onclick="delUsuari('."'".$row->id."'".');" data-toggle="modal" data-target="#delUsuari" class="btn" data-toggle="modal" data-target="#deletemodal"><i
            class="fa fa-trash"></i></a>
                    </div>
            </td>
            </tr>
            ';
        }
}

}
}
