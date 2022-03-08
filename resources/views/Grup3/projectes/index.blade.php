@extends('layouts.management')

@section('title', 'Projectes - Gestió empresa')

@section('content')
<div class="container">
    <div class="row mt-5 mb-5">
        <div class="col-sm-10">
            <h1>Projectes</h1>
        </div>
    </div>
    <div class="card-group mt-5 mb-5">
        @php
          $con = 1;
        @endphp
      @forelse ($projectes as $projecte)
        <div class="col-sm-4 d-flex align-items-stretch mb-5" >
            <a title="Veure projecte" href="{{route('projectes.show',$projecte)}}" class="vistapj" tittle="{{$projecte->nom_projecte}}">
                <div class="card" style="width: 18rem;border-width:3px;">
                    <img src="{{asset('projecteImage/'.$projecte->ruta_imatge)}}" class="card-img-top" style="max-height: 9rem" alt="{{$projecte->nom_projecte}}">
                
                @php
                $con++;
                @endphp
                <div class="card-body d-flex flex-column">
                    @php
                        if (strlen($projecte->nom_projecte)>50) {
                            echo'<h5 class="card-title text-dark">'.substr($projecte->nom_projecte, 0,  20).'...</h5>';
                        } else {
                            echo'<h5 class="card-title text-dark">'.$projecte->nom_projecte.'</h5>';

                        }
                    @endphp
                    
                    <p class="card-text text-dark">{{ substr($projecte->proposta->descripcio, 0,  30) }}...</p>
                    <p class="card-text text-dark">{{ $projecte->data_inici }}</p>
                    </a>
                    <div class="container justify-content-center text-center flex-grow-1 d-flex mt-2">
                        <div class="row my-auto">
                            <div class="col-sm">
                                <a class="vistapj" onclick="veureprojecte('{{$projecte->nom_projecte}}','{{$projecte->proposta->descripcio}}','{{$projecte->data_inici}}');"data-toggle="modal" data-target="#showProjectes">
                                    <i class="fas fa-search fa-lg text-primary cursor-pointer "></i>
                                </a>
                            </div>
                            <div class="col-sm pl-5">
                                <a class="vistapj">
                                    <i class="fab fa-wikipedia-w fa-lg cursor-pointer text-danger"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <h2>No hi ha cap projecte en aquests moments</h2>
      @endforelse
      {{$projectes->links()}}
      </div>

      @can('propostes.top')

        @include('Grup3.projectes.create')
        @include('Grup3.projectes.edit')
        @include('Grup3.projectes.delete')
        @include('Grup3.projectes.showPressupost')
      @endcan
      @include('Grup3.projectes.showProjectes')
</div>

@endsection

@section('scripts')
  <script src="{{asset('js/Grup3/customprojectes.js')}}"></script>
@endsection
