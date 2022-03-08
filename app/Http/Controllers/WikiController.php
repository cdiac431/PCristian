<?php

namespace App\Http\Controllers;

use App\Models\Wiki;
use App\Models\Articulo;
use App\Models\User;
use App\Models\Proyecto;
use Illuminate\Http\Request;

class WikiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idWiki)
    {
      $wikis = Wiki::all();
      $projectes = Proyecto::all();
      $users = User::all();
      $articles = Articulo::orderBy('id','desc')->paginate(3);
      return view('Grup4.wiki', compact('articles', 'users', 'projectes', 'wikis'));
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
        $article = new Article();
        $article->nom = $request->nomArticle;
        $article->cos = $request->cos;
        $article->id_usuari = auth()->user()->id_usuari;
        $article->id_wiki =1;
        $article->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wiki  $wiki
     * @return \Illuminate\Http\Response
     */
    public function show(Wiki $wiki)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wiki  $wiki
     * @return \Illuminate\Http\Response
     */
    public function edit(Wiki $wiki)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wiki  $wiki
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wiki $wiki)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wiki  $wiki
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
    }
}
