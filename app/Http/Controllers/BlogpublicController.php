<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogpublicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = Post::where('estat', 'actiu')->orderBy('id','desc')->paginate(5);
        return view('blogpublicindex', compact('blog'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        //echo 'hola'.$post;
        $blog = Post::find($id);
        //var_dump($blog);
        return view('blogpublicpost', compact('blog'));
    }

}
