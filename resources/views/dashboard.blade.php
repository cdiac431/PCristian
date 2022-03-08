@extends('layouts.management')

@section('styles')
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

@section('title', 'Tauler')

@section('content')


<div class="container my-4 pb-4">


@role('Administrador')
<div id="featured-services" class="column mx-0 my-4 ml-4">
    <div class="container my-4">
        <div class="row w-100">
            <div class="col-4 d-flex flex-column bg-gray container1">
                <h3 class="mb-4 mt-3 text-center border border-light bg-blue">Incidències noves</h3>
                @if(count($incidencies)>0)
                    @foreach($incidencies as $incidencia)    
                    <a class="text-dark d-flex mb-5 align-items-stretch" href="" onclick="selIncidencia('{{$incidencia->id}}','{{$incidencia->usuari->nom}}','{{$incidencia->nom}}','{{$incidencia->descripcio}}','{{$incidencia->estat_incidencia}}');" data-toggle="modal" data-target="#editIncidencia">
                        <div class="card d-flex h-auto ">
                            <p class="card-text mt-4 ml-4">{{$incidencia->nom}}</p>   
                            <div class="card-body">
                                
                                <p class="card-text">{{$incidencia->descripcio}}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
                @else 
                <p>No hi han incidencies per gestionar</p>
                @endif
            </div>
            <div class="col-4 d-flex flex-column bg-gray container1">
                <h3 class="mb-4 mt-3 text-center border border-light bg-blue">Incidències en curs</h3>
                @if(count($incidenciesCurs)>0)
                @foreach($incidenciesCurs as $incidencia)    
                <a class="text-dark d-flex mb-5 align-items-stretch" href="" onclick="selIncidencia('{{$incidencia->id}}','{{$incidencia->usuari->nom}}','{{$incidencia->nom}}','{{$incidencia->descripcio}}','{{$incidencia->estat_incidencia}}');" data-toggle="modal" data-target="#editIncidencia">
                    <div class="card d-flex h-auto ">
                        <p class="card-text mt-4 ml-4">{{$incidencia->nom}}</p>   
                        <div class="card-body">
                            
                            <p class="card-text">{{$incidencia->descripcio}}</p>
                        </div>
                    </div>
                </a>
            @endforeach
            @else 
            <p>No hi han incidencies en curs</p>
            @endif
            </div>
            <div class="col-4 d-flex flex-column bg-gray container1">
                <h3 class="mb-4 mt-3 text-center border border-light bg-blue">Historial d'Incidències</h3>
                @if(count($incidenciesResolt)>0)
                @foreach($incidenciesResolt as $incidencia)    
                <a class="text-dark d-flex mb-5 align-items-stretch" href="" onclick="selIncidencia('{{$incidencia->id}}','{{$incidencia->usuari->nom}}','{{$incidencia->nom}}','{{$incidencia->descripcio}}','{{$incidencia->estat_incidencia}}');" data-toggle="modal" data-target="#editIncidencia">
                    <div class="card d-flex h-auto ">
                        <p class="card-text mt-4 ml-4">{{$incidencia->nom}}</p>   
                        <div class="card-body">
                            
                            <p class="card-text">{{$incidencia->descripcio}}</p>
                        </div>
                    </div>
                </a>
            @endforeach
            @else 
            <p>No hi han incidencies resoltes</p>
            @endif
            </div>
        </div>
        

          </div>
        </div>


      </div>
  
      @include('modals.IncidenciaDashboard')
     
@else
    <div id="featured-services" class="column mx-0 my-4">
        <h3 class="mb-3">Projectes en els que estic participant</h3>
        <hr class="mb-4"/>
        <div class="container my-4">
        @if(count($projectesTauler)>0)
        
          <!--Carousel Wrapper-->
            <div id="multi-item-example" class="carousel slide carousel-multi-item" data-interval="false" data-ride="carousel">

                <!--Controls-->
                <div class="controls-top mb-4">
                    <a class="btn-floating" href="#multi-item-example" data-slide="prev"><i class="fas fa-chevron-left fa-lg pr-4"></i></a>
                    <a class="btn-floating" href="#multi-item-example" data-slide="next"><i
                            class="pl-4 fas fa-chevron-right fa-lg"></i></a>
                </div>
                <!--/.Controls-->

                <!--Indicators-->
                <ol class="carousel-indicators">
                <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
                <li data-target="#multi-item-example" data-slide-to="1"></li>

                </ol>
                

            

                <div class="carousel-inner" role="listbox">

                <!--/.First slide-->

                <!--Second slide-->
                @php
                    $slide = 0;
                @endphp


                <div class="carousel-item active">

                @foreach($projectesTauler as $projecteTauler)                    
                    @if($slide == 4)
                </div>
                <div class="carousel-item align-items-stretch">
                @php
                    $slide = 0;
                @endphp
                @endif

                @php
                    $slide ++;
                @endphp
                <div class="row d-inline align-items-stretch">
                    <div class="col-lg-3 mb-5 mb-lg-4 d-inline align-items-stretch" style ="float:left">
                        <a class="text-dark align-items-stretch" href="{{route('projectes.index')}}">
                            <div class="card d-flex h-auto ">
                            <img class="card-img-top" src="{{asset('projecteImage/'.$projecteTauler->ruta_imatge)}}" alt="Card image cap">
                                <div class="card-body">
                                    <p class="card-text">{{$projecteTauler->nom_projecte}}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                        @endforeach
            </div>

              </div>
            </div>

            <!--/.Slides-->

          </div>
          <!--/.Carousel Wrapper-->
          @else
            <p>Aqui apareixeran els projectes als que participes</p>
        </div>
          @endif


    </div>

    <div id="featured-services" class="column mx-0 my-4">
        @if(auth()->user()->hasRole('Gestor Institut') || auth()->user()->hasRole('Gestor Empresa'))
        <h3 class="mb-3">Propostes que he creat</h3>
        @else

        @if(auth()->user()->hasRole('Professor') || auth()->user()->hasRole('Alumne'))
            <h3 class="mb-3">Propostes que ha creat el meu institut</h3>
        @endif

        @role('Empleat')
            <h3 class="mb-3">Propostes que ha creat la meva entitat</h3>
        @endrole
        @endif
        <hr class="mb-4"/>
        <div class="container my-4">
        @if(count($propostesOwner)>1)
        
          <!--Carousel Wrapper-->
          <div id="multi-item-example2" class="carousel slide carousel-multi-item" data-interval="false" data-ride="carousel">

            <!--Controls-->
            <div class="controls-top mb-4">
                <a class="btn-floating" href="#multi-item-example2" data-slide="prev"><i class="fas fa-chevron-left fa-lg pr-4"></i></a>
                <a class="btn-floating" href="#multi-item-example2" data-slide="next"><i
                        class="pl-4 fas fa-chevron-right fa-lg"></i></a>
            </div>
            <!--/.Controls-->

            <!--Indicators-->
            <ol class="carousel-indicators">
              <li data-target="#multi-item-example2" data-slide-to="0" class="active"></li>
              <li data-target="#multi-item-example2" data-slide-to="1"></li>

            </ol>
            <!--/.Indicators-->

            <!--Slides-->

            <div class="carousel-inner" role="listbox">

              <!--/.First slide-->

              <!--Second slide-->
            @php
                $slide = 0;
            @endphp


              <div class="carousel-item active">

                @foreach($propostesOwner as $proposta)
                    @if($slide == 4)
                        </div>
                        <div class='carousel-item'>
                        @php
                            $slide = 0;
                        @endphp
                    @endif

                    @php
                        $slide ++;
                    @endphp
                    <div class="row d-inline">
                        <div class="col-lg-3 mb-5 mb-lg-4 d-inline" style ="float:left">
                            <a class="text-dark" href="{{route('projectes.index')}}">
                                <div class="card h-100">
                                <img class="card-img-top" src="{{asset('propostaImage/'.$proposta->ruta_imatge)}}" alt="Card image cap">
                                    <div class="card-body">
                                        <p class="card-text">{{$proposta->nom}}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>

              </div>
            </div>

            <!--/.Slides-->

          </div>
          <!--/.Carousel Wrapper-->
        @else
            <p>Aqui apareixeran les propostes que has creat</p>
        </div>
        @endif

    </div>



    <div id="featured-services" class="column mx-0 my-4">
        @if(auth()->user()->hasRole('Gestor Institut') || auth()->user()->hasRole('Gestor Empresa'))
        <h3 class="mb-3">Propostes a les que he sol·licitat unir-me</h3>
        @else

        @if(auth()->user()->hasRole('Professor') || auth()->user()->hasRole('Alumne'))
            <h3 class="mb-3">Propostes a les que ha sol·licitat el meu institut</h3>
        @endif
        
        @role('Empleat')
            <h3 class="mb-3">Propostes a les que ha sol·licitat la meva entitat</h3>
        @endrole
        @endif
        <hr class="mb-4"/>
        <div class="container my-4">
            @if(count($propostes)>0)
            
          <!--Carousel Wrapper-->
          <div id="multi-item-example3" class="carousel slide carousel-multi-item" data-interval="false" data-ride="carousel">

            <!--Controls-->
            <div class="controls-top mb-4">
                <a class="btn-floating" href="#multi-item-example3" data-slide="prev"><i class="fas fa-chevron-left fa-lg pr-4"></i></a>
                <a class="btn-floating" href="#multi-item-example3" data-slide="next"><i
                        class="pl-4 fas fa-chevron-right fa-lg"></i></a>
            </div>
            <!--/.Controls-->

            <!--Indicators-->
            <ol class="carousel-indicators">
              <li data-target="#multi-item-example3" data-slide-to="0" class="active"></li>
              <li data-target="#multi-item-example3" data-slide-to="1"></li>

            </ol>
            <!--/.Indicators-->

            <!--Slides-->

            <div class="carousel-inner" role="listbox">

              <!--/.First slide-->

              <!--Second slide-->
            @php
                $slide = 0;
            @endphp
            @foreach($propostes as $proposta)

              <div class="carousel-item active">

                    @if($slide == 4)
                        </div>
                        <div class='carousel-item'>
                        @php
                            $slide = 0;
                        @endphp
                    @endif

                    @php
                        $slide ++;
                    @endphp
                    <div class="row d-inline">
                        <div class="col-lg-3 mb-5 mb-lg-4 d-inline" style ="float:left">
                            <a class="text-dark" href="{{route('projectes.index')}}">
                                <div class="card h-100">
                                <img class="card-img-top" src="{{asset('propostaImage/'.$proposta->ruta_imatge)}}" alt="Card image cap">
                                    <div class="card-body">
                                        <p class="card-text">{{$proposta->nom}}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                   @endforeach
                </div>
              </div>
            </div>

            <!--/.Slides-->

          </div>
        </div>
          <!--/.Carousel Wrapper-->
        @else
            <p>Aqui apareixeran les propostes que has solicitat i estan pendents d'acceptar</p>
        </div>
        @endif
        @role('Gestor Institut')
        <div>
            <h3 class="mb-3">Els teus companys</h3>
            <hr class="mb-4"/>
            <ol class="list-unstyled">
                @foreach($professors as $professor)
                <li class="ml-5">{{$professor->nom}}
                    {{$professor->cognom}}
                    {{$professor->segon_cognom}}</li>
                @endforeach
            </ol>
        </div>
        @endrole
        @if(auth()->user()->hasRole('Gestor Institut') || auth()->user()->hasRole('Professor'))
        <div>
            <h3 class="mb-3">Els teus alumnes</h3>
            <hr class="mb-4"/>
            <ol class="list-unstyled">
                @if(count($alumnos)>0)
                    @foreach($alumnos as $alumne)
                    <li class="ml-5">{{$alumne->nom}}
                        {{$alumne->cognom}}
                        {{$alumne->segon_cognom}}</li>
                    @endforeach
                @else
                <p>Pareix que no tens alumnes vinculats a Proiectus</p>
                @endif
            </ol>
        </div>
        @endif
        @role('Gestor Empresa')
        <h3 class="mb-3">Els teus empleats</h3>
        <hr class="mb-4"/>
        <ol class="list-unstyled">
            @foreach($empleats as $empleat)
            <li class="ml-5">{{$empleat->nom}}
                {{$empleat->cognom}}
                {{$empleat->segon_cognom}}</li>
            @endforeach
        </ol>
    </div>
        @endrole
        </div>
    </div>
</div>

@endrole
@include('layouts.sidebarDreta')
@endsection

@section('scripts')
<script>
selIncidencia = function(id, Nom,NomIn, Descripcio, Estat_incidencia) {
    $('.modal-title2').text('Editar incidencia: ' + Nom);
    $('#Incidencia_id').val(id);
    $("#formularieditar").attr("action", document.getElementById("formularieditar").getAttribute("action").replace("idaeditar", id));
    $('#nomIn').val(Nom);

    $('#Nom').val(NomIn);
    $('textarea#Descripcio').val(Descripcio);
    $('#estat_incidencia').val(Estat_incidencia);
}
</script>
@endsection
