@extends('layouts.management')

@section('styles')
<!-- ESTILS PERSONALITZATS AQUI! -->
@endsection

@section('title', 'Proposta Proiectus - '. $proposta->nom)


@section('content')

<div class="container">
	<button class="mt-3 btn btn-primary"  onclick="window.location='{{ url("/") }}'"><i class="fas fa-chevron-circle-left"> 	Enrere</i></button>

	<div class="row mx-0 my-5">

    <div class="col-lg-7">

      <!-- Title -->
      <h1 class="mt-4">{{$proposta->nom}} <span class="badge badge-secondary">{{$categoria->nom}}</span></h1>
      <hr>
      <!-- Author -->
      <p class="lead">
        Creada per:
        <a style="pointer-events: none" href="#">{{$representant->professor->institut->nom ?? $representant->empleat->empresa->nom}}</a>
        Estat de la Proposta:

        <a style="pointer-events: none" href="#">{{$proposta->estat_proposta}}</a>
      </p>

      <hr>
      <!-- Date/Time -->
      <p>Publicada dia {{$proposta->data_publicacio}}</p>


      <hr>

      <br>
      <h3>Estimació econòmica:</h3>
      <p>{{$proposta->estimacio_economica}}</p>
      <br>

      </div>
      <div class="col-lg-5">
        <!-- Preview Image -->

        <img class="img-thumbnail rounded mt-5 "style="" src="{{asset('propostaImage/'.$proposta->ruta_imatge)}}" >
				<div class="row ">
					<hr style="width:100%">


					<h4 class="ml-5 pl-4" >Compartir: </h4>
							<div class="pl-2 addthis_inline_share_toolbox_l7v1"></div>

				</div>
      </div>

      <div class="row w-100">
        <hr style="width:100%">
        <div class="col-lg-7">
          <!-- Post Content -->
          <p class="lead">{{$proposta->descripcio}}</p>
          <br>
        </div>
        <div class="col-lg-5">
          <div class="list-group">
            <label  class="text-secondary list-group-item list-group-item-action active">
              <strong>Requeriments</strong>
            </label>
          </div>

          @php
          $requeriments = $proposta->requeriments;
          $arrayReq = explode(".",$requeriments);
          @endphp
          @for ($i = 0; $i < count($arrayReq); $i++)
          @if (!empty($arrayReq[$i]))
          <label class="list-group-item list-group-item-action">{{ $arrayReq[$i] }}.</label>
          @endif
          @endfor



        </div>

      </div>

        <!-- CONTINGUT AQUI! (BORREU LES 2 DIVS PARES SI VOLEU ESTIRAR EL CONTINGUT AL 100% DE LA PAGINA) -->
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-607da54e686abc1c"></script>
<!-- SCRIPTS PERSONALITZATS AQUI! -->
@endsection
