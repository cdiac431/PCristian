@extends('Grup1.GestioCentral')

@section('title', 'Gestió d\'Empresa - Gestió central')

@section('styles')
    <link rel="stylesheet" href="{{asset('css/Grup1/custom.css')}}">
@endsection

@section('menuG')
<div class="container">
    <div class="row mb-3 py-5"> 
        <div class="col-lg-6">
            <h2 class="mb-3"> Vista de <strong>{{$empresa->nom}}</strong></h2>
            <div class="col-md-12 col-lg-12 mt-5 mb-5 mb-lg-4 ml-5 py-5" id="tamany">
                <p class="mb-4"><strong>Localitat:</strong> {{$empresa->localitat}}</p>
                <p class="mb-4"><strong>Direcció: </strong>{{$empresa->direccio}}</p>
                <p class="mb-4"><strong>Telèfon:</strong> {{$empresa->telefon}}</p>
                <p class="mb-4"><strong>CIF:</strong> {{$empresa->cif}}</p>
                <p class="mb-4"><strong>Email:</strong> {{$empresa->email}}</p>
                <p><a href="{{route('empreses.index')}}"><i class="fas fa-arrow-circle-left text-dark fa-3x mt-5"></i></a></p>
            </div>
        </div>
        <div class="col-lg-6 ">
            <div class="col-md-6 col-lg-6 mb-5 mb-lg-4 ml-5 py-5">
             <p>Logo empresa:</p>
                <img src="{{asset('entitatsIcon/' . $empresa->ruta_imatge)}}" class="ml-5 img-thumbnail img-responsive" alt="Logo empresa">
            </div>
        </div>
    </div>
</div>
@endsection