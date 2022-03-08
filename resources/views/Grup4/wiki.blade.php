@extends('layouts.management')

@section('title', 'Gestions')

@section('content')
{{--<div class="container">
  <h3>Safata d'entrada de {{auth()->user()->nom}}</h3>
  @if (count($errors) > 0)
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
      </ul>
    </div>
  @endif
  @if(Session::has('success'))
    <div class="alert alert-success">
      <p>{{ \Session::get('success')}}</p>
    </div>
  @endif
</div> --}}
{{--@php
  $contador = 0;
@endphp--}}
<div class="container mb-2">
  <div class="row d-flex">
    <h1>Wiki <span class="text-primary">{{$wikis->find(request()->route('idWiki'))->nom}}</span></h1>
  </div>
  <div class="d-flex justify-content-end">
      <a id="crear" href="#!" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i></a>
  </div>
  </div>


@forelse($articles as $article)
  <div class="jumbotron p-3 p-md-5 text-white rounded bg-primary">
    <div class="col-md-12 px-0 border-bottom border-dark">
    <h1>{{$article->nom}}</h1>
  </div>
  <div class="row mt-2">
    <p>{{$users->find($article->id_usuari)->nom}} {{$users->find($article->id_usuari)->cognom}} - {{$article->data_ultima_modificacio }}</p>
  </div>
  <div class="row">
    <p>{{$article->cos}}</p>
  </div>
  <div class="row flex-row-reverse">
    <button type="submit" class="btn btn-danger">Eliminar</button>
    <button type="submit" class="btn btn-secondary mr-2">Modificar</button>
  </div>
  </div>
@empty
  <h2>No hi ha articles</h2>
@endforelse
{{$articles->links()}}

<!-- Modal de creació -->
<div class="modal fade" id="crearWiki" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Envia un correu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {{-- <form action="{{route('wiki.store'), $wikis->find(request()->route('idWiki'))->id}}" method="POST"> --}}
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label for="nomArticle">Nom article</label>
            <input type="email" class="form-control" name="nomArticle" required>
          </div>
          <div class="form-group">
            <label for="cos">Cos</label>
            <textarea class="form-control" name="cos" rows="3" required></textarea>
          </div>
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tancar</button>
          <button type="submit" class="btn btn-primary"  onclick="validar()">Enviar</button>
        </div>
      {{-- </form> --}}
    </div>
  </div>
</div>

<script  src="{{asset('js/grup4js/wiki.js')}}" type="text/javascript"></script>

@endsection
