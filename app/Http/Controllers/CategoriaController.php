<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Models\Categoria;
use Illuminate\Support\Facades\DB;
if (!defined('defaultShown')) define('defaultShown', '10');
class CategoriaController extends Controller
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

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categoria = Categoria::create($request->all());
        return redirect()->route('categories.index');
    }

    public function show($shown)
    {
        $categories = Categoria::where('estat','actiu')->paginate($shown);
        return view('Grup1.categories.indexCategoria', compact('categories'));
    }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit()
    // {
    //
    // }

    /**
* Update the specified resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
    public function update(Request $request, Categoria $categoria)
    {
        $categoria = Categoria::find($request->id);

      $categoria->nom = $request->nom;
      $categoria->descripcio = $request->descripcio;

      $categoria->save();
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $affected = Categoria::find($id);
        $affected->estat = 'inactiu';
        $affected->save();

        return redirect()->route('categories.index');
    }

    public function multipledelete(Request $request)
    {

        $ids = $request->except('_token',"catogoria_id_elim","idundefined");

        foreach ($ids as $key) {
            $eliminat = Categoria::find($key);
            $eliminat -> estat = 'inactiu';
            $eliminat -> save();
        }
        return redirect()->route('categories.index',defaultShown);

    }
}
