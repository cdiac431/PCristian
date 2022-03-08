<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Empresa;
use App\Models\Instituto;
use App\Models\Propuesta;
use App\Models\Proyecto;



class WelcomeController extends Controller
{
 
    public function index()
    {
       
        $empresas = Empresa::ALL();
        $empresas = $empresas->where('lat','!=', 'NULL');
        $institutos = Instituto::ALL();
        $institutos = $institutos->where('lat','!=', 'NULL');

        $iconListEntitats = Empresa::paginate()->where("estat", "=", "actiu");
        $iconListInstituts = Instituto::paginate()->where("estat", "=", "actiu");
        $sliderListPropostes = Propuesta::paginate()->where("estat", "=", "actiu");
        $sliderListProjectes = Proyecto::paginate()->where("estat", "=", "actiu");


        return view('welcome', compact('empresas', 'institutos','sliderListProjectes', 'iconListEntitats', 'iconListInstituts', 'sliderListPropostes'));    }

    
}

// var nomE = document.getElementsByClassName('nomE');

// for (i = 0; i <= nomE.length; i++) {
//     nomE=[document.getElementsByClassName('nomE')[i].innerHTML];
//   }
//   console.log(nomE);