<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Empresa;
use App\Models\Instituto;



class ApimapController extends Controller
{
 
    public function index()
    {
       
        $empresas = Empresa::ALL();
        $empresas = $empresas->where('lat','!=', 'NULL');
        $institutos = Instituto::ALL();
        $institutos = $institutos->where('lat','!=', 'NULL');


        return view('apimap', compact('empresas', 'institutos'));    }

    
}

// var nomE = document.getElementsByClassName('nomE');

// for (i = 0; i <= nomE.length; i++) {
//     nomE=[document.getElementsByClassName('nomE')[i].innerHTML];
//   }
//   console.log(nomE);