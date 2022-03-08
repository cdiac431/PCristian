@extends('layouts.management')

@section('title', 'Gestio Interna')

@section('content')
  <div class="container">
    <div class="row mt-5 mb-2">
      <div class="col-sm-10">
        <h1>Propostes</h1>
        </a>
      </div>
      <div class="col-sm-2">
      @can('propostes.top')

        <h1><a href="" data-toggle="modal" data-target="#crearProposta"><i class="fas fa-plus-circle"></i></a></h1>
        </a>
      @endcan
      </div>
    </div>

    @include('Grup2.propostes.sliderPropostesInstitut')
    @include('Grup2.propostes.sliderPropostesEmpreses')

    <h2>Propostes dels altres</h2>
    <div class="card-group mt-5 mb-2" id="propostesAjax">
      
      @php
        $con = 1;
      @endphp
    @forelse ($propostes as $proposta)
    @if ($proposta->estat_proposta == 'Disponible'|| ($proposta->estat_proposta == "Sol·licitada" && $proposta->id_solicitant == auth()->user()->id))
    <a title="Veure la proposta" onclick="veureProposta('{{$proposta->id}}');" style="cursor:pointer;">
      <div class="col-sm-4 d-flex align-items-stretch mb-5">
        @if ($proposta->estat_proposta == "Sol·licitada" && $proposta->id_solicitant == auth()->user()->id)
        <div id="cardProposta" class="card border-warning" style="width: 18rem;border-width:3px;">
        @else
        <div id="cardProposta" class="card border-success" style="width: 18rem;border-width:3px;">
            <img src="{{asset('propostaImage/'.$proposta->ruta_imatge)}}" class="card-img-top" style="max-height: 9rem" alt="{{$proposta->nom}}">

          @php
            $con++;
          @endphp
          <div class="card-body d-flex flex-column">
            @php
              if (strlen($proposta->nom)>50) {
                  echo'<h5 class="card-title">'.substr($proposta->nom, 0,  20).'...</h5>';
              } else {
                  echo'<h5 class="card-title">'.$proposta->nom.'</h5>';
              }
            @endphp
              <p class="card-text">{{ substr($proposta->descripcio, 0,  30) }}...</p>
              <p class="card-text">{{ $proposta->data_publicacio }}</p>
            </a>
              <div class="container justify-content-center text-center flex-grow-1 d-flex mt-2">
                <div class="row my-auto">
                  @if(auth()->user()->id_roles == 1)
                   <div class="col-sm mr-5">
                  @else
                    <div class="col-sm"style="min-height: 20px;">
                  @endif
                  @if(auth()->user()->id_roles != 4 || auth()->user()->id_roles != 6)
                    @if($proposta->estat_proposta == 'Disponible')
                      <a title="Unir-se a la proposta">
                       <i class="fa fa-handshake-o fa-lg text-dark cursor-pointer"  data-toggle="modal" data-target="#unirseProposta" onclick="unirseProposta('{{$proposta->id}}','{{$proposta->nom}}')"></i>
                      </a>
                      @else
                      <i class="fas fa-clock text-warning" style="font-size: 22px;"></i>
                    @endif
                  @endif
                  </div>
                  @if(auth()->user()->id_roles == 1)
                    <div class="col-sm">
                      <a onclick="editarProposta('{{$proposta->id}}','{{$proposta->id_categoria}}','{{$proposta->nom}}','{{$proposta->descripcio}}','{{$proposta->requeriments}}','{{$proposta->estimacio_economica}}','{{$proposta->estat_proposta}}')"data-toggle="modal" data-target="#editProposta">
                        <i class="fas fa-edit fa-lg text-dark ml-1 cursor-pointer"></i>
                      </a>
                    </div>
                    <div class="col-sm">
                      <a title="Eliminar la proposta" onclick="eliminarProposta('{{$proposta->id}}','{{$proposta->nom}}')"data-toggle="modal" data-target="#deleteProposta">
                        <i class="fas fa-trash fa-lg text-danger cursor-pointer"></i>
                      </a>
                    </div>
                  @endif
                </div>
              </div>
        </div></div>
        </div>
        @endif
        @empty
        <h4>No hi ha cap proposta en aquests moments</h4>
        
    @endforelse
    {{$propostes->links()}}
    @include('Grup2.propostes.sliderPropostesEmpresesAcceptades')
    @include('Grup2.propostes.sliderPropostesInstitutsAcceptades')
    </div>
    @can('propostes.top')
      @include('Grup2.propostes.createPropostes')
      @include('Grup2.propostes.deletePropostes')
      @include('Grup2.propostes.editPropostes')
    @endcan
    @include('Grup2.propostes.modalJoinConfirmation')
    
  </div>
@endsection

@section('scripts')
  <script src="{{asset('js/Grup2/propostes.js')}}"></script>
@endsection
