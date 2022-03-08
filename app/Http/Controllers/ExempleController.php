<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExempleController extends Controller
{
    public function index(){
        return view('exemples.index');
        
    }

    public function create(){
        return view('exemples.create');

    }

    public function show($exemple){

       // compact('exemple') = ['exemple' => exemple]

        return view('exemples.show',compact('exemple'));

    }
}
