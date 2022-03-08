<?php

namespace App\Http\Controllers;

use \Carbon\Carbon;
use App\Models\Post;
use App\Models\Propuesta;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\FitxersController;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* $posts = Post::where('estat', 'actiu')->orderBy('id','desc')->paginate(5);
        return view('blogpublicindex', compact('posts')); */

        $post = Post::where('estat', 'actiu')->orderBy('id','desc')->paginate(5);
        return view('Grup4.blogs.blog', compact('post'));
    }

    public function indexP()
    {
        $posts = Post::where('posts.estat', 'actiu')
            ->join('users', 'users.id', '=', 'posts.id_usuari')
            ->orderBy('posts.id','desc')
            ->select('posts.*', 'users.ruta_avatar', 'users.nom', 'users.cognom', 'users.segon_cognom')
            ->paginate(5);

            /* return ($posts); */

        return view('blogpublicindex', compact('posts'));
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
     * Ssre a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $imatge = FitxersController::store($request->ruta_blog, '/portadaPost/', false, ['image/jpeg','image/png']);

        if ($imatge) {
            $post = Post::create([
                'titol' => $request->titol,
                'entradeta' => $request->entradeta,
                'contingut' => $request->contingut,
                'ruta_blog' => $imatge['nom_definitiu']. $imatge['extensio'],
                'id_usuari' => auth()->user()->id
            ]);
        }
         
        return redirect()->route('blogs.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $post = Post::find($id);

        $usuari = User::find($post->id_usuari);

        $llista = Post::where('posts.estat', 'actiu')
            ->join('users', 'users.id', '=', 'posts.id_usuari')
            ->orderBy('posts.id','desc')
            ->select('posts.*', 'users.ruta_avatar', 'users.nom', 'users.cognom', 'users.segon_cognom')
            ->get();

        /* return($llista); */

        return view('blogpublicpost', compact('post', 'usuari', 'llista'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $imatge = FitxersController::store($request->ruta_blog, 'portadaPost/', false, ['image/jpeg','image/png']);
        if ($imatge) {
       $post = Post::where('id', $request->id)
        ->update(
            ['titol' => $request->titol,
            'entradeta'=>$request->entradeta,
            'contingut'=>$request->contingut,
            'ruta_blog' => $imatge['nom_definitiu']. $imatge['extensio'],
            'id_usuari' => auth()->user()->id,
            'data'=> Carbon::now()],
            );
        }
        return redirect()->route('blogs.index');
    }
   



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $affected = Post::where('id', $id)
        ->update(['estat' => 'inactiu']);

      return redirect()->route('blogs.index');
    }
}
