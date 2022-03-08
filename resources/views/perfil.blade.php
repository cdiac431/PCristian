@extends('layouts.management')

@section('title', 'Gestions')

@section('content')
<div class="container">
    <div class="row mx-0">
        <div class="col-sm-3 pt-5 pb-4 pl-4">
            <h3>Foto de perfil</h3>
        </div>
        <div class="col-sm-9 pt-5">
            <h3>Perfil de <span class="text-primary">{{auth()->user()->nom}} {{auth()->user()->cognom}}</span></h3>
            <hr>
        </div>
    </div>
    <div class="row">
  		<div class="col-sm-3"><!--left col-->

      <div class="text-center" id="avatdef">
        <form action="{{ route('perfil.avatar', auth()->user()->id) }}" enctype="multipart/form-data" method="POST">
            @csrf
            <img src="{{asset('avatars/'.auth()->user()->ruta_avatar)}}" class="photo" alt="avatar">

            <input style="padding-left: 8%;" type="file" name="urlfoto" id="file" accept="image/x-png,image/jpeg,image/jpg" size="6000" >
            @error('files')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
            <br>
            <div class="col-sm-12 text-center">
                {{--s'ha de canviar el history.go--}}
                <a href="javascript: history.go(-1)" class="btn btn-secondary" style="margin-right:8px">CANCELAR</a>
                <button type="submit" class="btn btn-primary">Actualitzar</button>
            </div>
        </form>
      </div><hr><br>

        </div><!--/col-3-->
    	<div class="col-sm-9">

          <div class="tab-content">
            <div class="tab-pane active" id="home">
                <br>
                <form class="form" action="{{route('perfil.edit', auth()->user()->id)}}" method="POST" id="registrationForm">
                    @csrf
                    @method('put')
                    {{-- <input type="hidden" name="id" value="{{auth()->user()-id}}" > --}}
                    <div class="form-group">

                        <div class="col-xs-6">
                        <label for="last_name"><h4>Nom d'usuari</h4></label>
                            <input type="text" class="form-control" name="user_name" id="user_name" placeholder="Aquest es el teu nom d'usuari" title="El teu nom d'usuari" value="{{auth()->user()->user_name}}" readonly="readonly" required>
                        </div>
                    </div>

                    <div id="divpassword" class="form-group" style="display: none;">
                        <div class="col-xs-6">
                            <label for="password"><h4>Contrasenya</h4></label>
                            <input type="password" class="form-control" name="password" id="password" title="La teva nova contrasenya (opcional)" value="">
                        </div>
                    </div>

                    <div id="divpassword2" class="form-group" style="display: none;">
                        <div class="col-xs-6">
                            <label for="password-confirm"><h4>Confirmar Contrasenya</h4></label>
                            <input type="password" class="form-control" name="password_confirmation" id="password-confirm" title="Confirmar contrasenya (opcional)" value="">
                        </div>
                    </div>

                    <div id="divdni" class="form-group" style="display: none;">
                        <div class="col-xs-6 pt-3">
                            <label for="DNI"><h4>DNI</h4></label>
                            <input type="text" class="form-control" name="dni" id="dni" title="El teu DNI" value="{{auth()->user()->dni}}"  required>
                        </div>
                    </div>

                    <div class="form-group">

                        <div class="col-xs-6">
                            <label for="first_name"><h4>Nom</h4></label>
                            <input type="text" class="form-control" name="nom" id="nom" title="El teu nom" value="{{auth()->user()->nom}}" readonly="readonly" required>
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="col-xs-6">
                        <label for="last_name"><h4>Cognom</h4></label>
                            <input type="text" class="form-control" name="cognom" id="cognom" title="El teu primer cognom" value="{{auth()->user()->cognom}}" readonly="readonly" required>
                        </div>
                    </div>

                    <div class="form-group">

                    <div class="col-xs-6">
                        <label for="last_name"><h4>Segon Cognom</h4></label>
                            <input type="text" class="form-control" name="segon_cognom" id="segon_cognom" title="El teu segon cognom" value="{{auth()->user()->segon_cognom}}" readonly="readonly" required>
                        </div>
                    </div>

                    <div class="form-group">

                        <div class="col-xs-6">
                            <label for="phone"><h4>Telèfon</h4></label>
                            <input type="text" class="form-control" name="telefon" id="telefon" title="El teu nombre de telèfon" value="{{auth()->user()->telefon}}" readonly="readonly" required>
                        </div>
                    </div>

                    <div class="form-group">

                        <div class="col-xs-6">
                            <label for="email"><h4>Correu</h4></label>
                            <input type="email" class="form-control" name="email" id="email" title="El teu correu electrònic" value="{{auth()->user()->email}}" readonly="readonly" required>
                        </div>
                    </div>
                    <div class="form-group">

                    <div class="col-xs-6">
                            <label for="data_naixement"><h4>Data Naixement</h4></label>
                            <input class="form-control" name="data_naixement" type="date" id="data_naixement" title="La teva data de naixement" value="{{auth()->user()->data_naixement}}" readonly="readonly" required >
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <br>

                            <button class="btn btn-lg btn-primary" id="btn_2" style="display: none;" type="text">Guardar</button>
                        </div>
                    </div>
                </form>
                <button class="btn btn-lg btn-secondary" id="btn_3" style="display: none;position:relative; bottom:60px; left:15%;" type="text" onclick="returnonly()">Cancel·lar</button>
                <div class="form-group">
                    <button class="btn btn-lg btn-primary" id="btn_1" onclick="defusereadonly()" type="text"><i class="glyphicon glyphicon-ok-sign"></i>Edita</button>
                </div>
        </div>
    </div>
@endsection

@section('scripts')

<script src="{{asset('js/perfil.js')}}"></script>

@endsection