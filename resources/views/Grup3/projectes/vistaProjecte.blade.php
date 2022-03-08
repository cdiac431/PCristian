@extends('layouts.management')

@section('title', 'Projecte')

@section('styles')
<link rel="stylesheet" href="font-awesome-animation.min.css">

<style>
.bg-gray{
    background: #dfdede;
}
.container1 {
    float: left;
    box-shadow: 
    2px 0 0 0 #ffa251, 
    0 2px 0 0 #ffa251, 
    2px 2px 0 0 #ffa251,   /* Just to fix the corner */
    2px 0 0 0 #ffa251 inset, 
    0 2px 0 0 #ffa251 inset;
}

.header-col{
      background: #E3E9E5;
      color:#536170;
      text-align: center;
      font-size: 10px;
      font-weight: bold;
      width: 320px;

    }
    .header-calendar{
      background: #CE374C;color:white;
      width: 325px;

    }
    .box-day{
      border:1px solid #E3E9E5;
      height:20px;
      background: white;
      color:black;
      width: 325px;
      font-size: 10px;

    }
    .box-dayoff{
      border:1px solid #E3E9E5;
      height:20px;
      background-color: #ccd1ce;
      width: 325px;
      font-size: 10px;
    }
    
</style>
@endsection


@section('content')
<div class="container">
  <button class="mt-3 btn btn-primary"  onclick="window.location='{{ url("/management/Gestio-empresa/projectes") }}'"><i class="fas fa-chevron-circle-left"> 	Enrere</i></button>

    <div class="row mx-0 my-5 ml-5">

        <div class="col-lg-7">
          <h1 class="">{{$projecte->nom_projecte}}<span class="badge badge-secondary ml-2">{{$projecte->proposta->categoria->nom}}</span></h1>
          <hr/>  
          <p class="lead">
            {{$projecte->proposta->descripcio}}
          </p>
          <hr>
          <!-- Date/Time -->
          <p>Data d'inici Projecte {{$projecte->data_inici}}</p>
        </div>
        <div class="col-lg-5 float-right">
          
            @if($projecte->proposta->id_responsable==auth()->user()->id)
              <div class="col-sm-12 d-flex float-right">
                <a title="Retorna a proposta" class="btni mr-2 noselect text-black" data-toggle="modal" data-target="#retornProjecte"><i class="fas fa-reply faa-horizontal faa-reverse animated-hover pr-3"></i>Retornar</a>
                <a title="Finalitza el projecte" class="btni mr-2 noselect text-black" data-toggle="modal" data-target="#finProjecte" onclick="delProjecte('{{$projecte->id}}');"><i class="fas fa-flag-checkered faa-pulse animated-hover text-primary pr-3"></i>Finalitzar</a>
                <a title="Elimina el projecte" class="btni noselect text-black" data-toggle="modal" data-target="#deleProjecte"><i class="fas fa-trash-alt text-danger animated-hover faa-shake	animated-hover pr-3" aria-hidden="true"></i>Esborrar</a>
              </div>
            @endif
            <div class="gradient-border">
              <img src="{{asset('projecteImage/'.$projecte->ruta_imatge)}}" class="img-thumbnail rounded mt-5">
            </div>
          </div>
        </div>
      <hr style="width:100%">
      <div class="row mx-0 my-5 ml-5">
        <div class="col-lg-7 ml-3">
          
          <h4 class="d-inline-flex"><a href="" class="text-dark onhover"><i class="fas fa-cloud text-primary mr-3"></i>Proiectus Cloud</a></h4>
          <p class="ml-2 mt-1 d-inline-flex">Gestor dels fitxers del projecte.</p>
      
          <hr style="hr: margin-left: 15px; margin-top:-2px; margin-bottom:20px;">


          
          <h4 class="d-inline-flex"><a href="" class="text-dark onhover"><i class="fas fa-tasks text-primary mr-3"></i>Recursos</a></h4>
      
          <p class="ml-2 mt-1 d-inline-flex">Gestor de recursos necessaris per al projecte.</p>


          <hr style="hr: margin-left: 15px; margin-top:-2px; margin-bottom:20px;">

              
          <h4 class="d-inline-flex"><a href="" class="text-dark onhover"><i class="fas fa-clipboard text-primary mr-3"></i>Tasques</a></h4>
          
          <p class="ml-2 mt-1 d-inline-flex">Gestor de tasques del projecte.</p>


          <hr style="hr: margin-left: 15px; margin-top:-2px; margin-bottom:20px;">
          
          <h4 class="d-inline-flex"><a href="{{route('wiki.index',$projecte->id)}}" class="text-dark onhover"><i class="fa fa-wikipedia-w text-primary mr-3"></i>Wiki</a></h4>
  
          <p class="ml-2 mt-1 d-inline-flex">Informació del projecte.</p>
          
          <hr style="hr: margin-left: 15px; margin-top:-2px; margin-bottom:20px;">

          @role('Gestor Institut')
          <h4 class="d-inline-flex"><a href="" class="text-dark onhover"><i class="fa fa-user text-primary mr-3"></i>Participants</a></h4>
  
          <p class="ml-2 mt-1 d-inline-flex">Afegeix alumnes al teu projecte.</p>
          @endif

          @role('Gestor Empresa')
            <h4 class="d-inline-flex"><a href="" class="text-dark onhover"><i class="fa fa-user text-primary mr-3"></i>Participants</a></h4>
    
            <p class="ml-2 mt-1 d-inline-flex">Afegeix personal al teu projecte.</p>
          @endif
          <hr style="hr: margin-left: 15px; margin-top:-2px; margin-bottom:20px;">
          
          
        </div>
        <div class="col-lg-4 float-right shadow p-3 mb-5 bg-light rounded">
          <h5>Empresa participant al projecte</h5>
          <div class="col-sm-5 mt-4 float-left">
            <p>{{$projecte->proposta->empresa->nom}}</p>
            @if($projecte->proposta->responsable->id_roles=='3')
                <img class="rounded-circle d-inline-flex" src="{{asset('avatars/' . $projecte->proposta->responsable->ruta_avatar)}}" width="20px" height="20px"/>
                <p class="pl-2 d-inline-flex">{{$projecte->proposta->responsable->nom}}</p>
              @else
                <img class="rounded-circle d-inline-flex" src="{{asset('avatars/' . $projecte->proposta->solicitant->ruta_avatar)}}" width="20px" height="20px"/>
                <p class="pl-2 d-inline-flex ">{{$projecte->proposta->solicitant->nom}}</p>
              @endif
          </div>
          <div class="col-sm-7 mt-3 float-right">
            <img class="card-img-top" src="{{ asset('entitatsIcon/'.$projecte->proposta->empresa->ruta_imatge) }}" alt="Card image cap">
            
          </div>
          <h5 class="mt-3 float-left">Institut participant al projecte</h5>

          <div class="col-sm-5 mt-4 float-left">
            <p class="text-center">{{$projecte->proposta->institut->nom}}</p>
            @if($projecte->proposta->responsable->id_roles=='2')
                <img class="rounded-circle d-inline-flex" src="{{asset('avatars/' . $projecte->proposta->responsable->ruta_avatar)}}" width="20px" height="20px"/>
                <p class="pl-2 d-inline-flex">{{$projecte->proposta->responsable->nom}}</p>
              @else
                <img class="rounded-circle d-inline-flex" src="{{asset('avatars/' . $projecte->proposta->solicitant->ruta_avatar)}}" width="20px" height="20px"/>
                <p class="pl-2 d-inline-flex ">{{$projecte->proposta->solicitant->nom}}</p>
              @endif
          </div>
          <div class="col-sm-7 mt-3 float-right">
            <img class="card-img-top" src="{{ asset('centresIcon/'.$projecte->proposta->institut->ruta_imatge) }}" alt="Card image cap">
            
          </div>

        </div>
      </div>
    </div>
    
@include('layouts.sidebarDreta')
@include('Grup3.projectes.finalitzarProjecte')
@include('Grup3.projectes.esborrarProjecte')
@include('Grup3.projectes.retornProposta')


@endsection

@section('scripts')
  <script src="{{asset('/js/Grup3/customprojectes.js')}}"></script>
@endsection