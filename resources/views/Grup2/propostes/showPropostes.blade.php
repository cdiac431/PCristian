@extends('layouts.management')

@section('styles')
<!-- ESTILS PERSONALITZATS AQUI! -->
@endsection

@section('title', 'Proposta Proiectus - '. $proposta->nom)


@section('content')

<div class="container">
	<button class="mt-3 btn btn-primary"  onclick="window.location='{{ url("/management/Gestio-interna/propostes") }}'"><i class="fas fa-chevron-circle-left"> 	Enrere</i></button>

	<div class="row mx-0 my-5">

    <div class="col-lg-7">

      <!-- Title -->
      <h1 class="mt-4">{{$proposta->nom}} <span class="badge badge-secondary">{{$categoria->nom}}</span></h1>
      @if ($proposta->num_valoracions > 0)
      <h4><span>Puntuació de <span class="text-primary">{{number_format($proposta->valoracio / $proposta->num_valoracions, 1, '.', '')}} <span class="fa fa-star checked"></span></span></h4>
      @endif
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
        @if(auth()->user()->id_roles != 4 || auth()->user()->id_roles != 6)
          <button data-toggle="modal" data-target="#unirseProposta" onclick="unirseProposta('{{$proposta->id}}','{{$proposta->nom}}')" type="button" class="btn btn-primary col-9 ml-5">Unir-se a la proposta</button>
        @endif
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
    @if ($proposta->estat_proposta == "Sol·licitada")
        <h4>Acceptes o declines la sol·licitud?</h4>
        <div class="container">
          <div class="row">
            <div class="col-lg3">
              <form id = "formulariAcceptarProposta" method="POST" action="{{route('propostes.acceptar',$proposta->id)}}">
                @csrf
                @method('put')
               <button type="submit" class="btn btn-primary"  id="botoDeclinar">Acceptar</button>
              </form>
            </div>
          </div>
          <div class="row">
            <div class="col-lg3">
              <form id = "formulariAcceptarProposta" method="POST" action="{{route('propostes.declinar',$proposta->id)}}">
                @csrf
                @method('put')
                <button type="submit" class="btn btn-danger" id="botoAcceptar" style="margin-left: 130%; margin-top: -75%;">Declinar</button>
              </form>
            </div>
          </div>

      </div>
      @endif
      <h4 id="puntuarProposta" class="mr-2 mt-5">Puntua la proposta</h4>
      @include('Grup2.propostes.propostaStarRate')
</div>
@include('Grup2.propostes.modalJoinConfirmation')
@endsection

@section('scripts')
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-607da54e686abc1c"></script>
<script src="{{asset('js/Grup2/propostes.js')}}"></script>
<!-- SCRIPTS PERSONALITZATS AQUI! -->
@endsection
