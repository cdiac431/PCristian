@extends('layouts.management')

@section('title', 'Contacte')

@section('content')
{!! htmlScriptTagJsApi() !!}
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-6">
                    <form class="py-5" method="POST" action="{{route('contacte.enviarProposta')}}">
                        @csrf
                        <fieldset>
                            <h2 class="text-center p-0 mb-4">Contacta amb el responsable de la proposta " <a style="">{{$proposta->nom}} </a>"</h2>
                            <div class="form-group">
                                <i class="fa fa-user bigicon iconLeft"></i>
                                <input class="form-control ml-4" name="nom" type="text" required placeholder="Nom" >
                            </div>
                            <div class="form-group">
                                <i class="fa fa-user bigicon iconLeft"></i>
                                <input class="form-control ml-4" name="cognom" type="text" required placeholder="Cognom">
                            </div>

                            <div class="form-group">
                                <i class="fa fa-envelope-o bigicon iconLeft"></i>
                                <input class="form-control ml-4" name="correu" type="text" required placeholder="Email">
                            </div>

                            <div class="form-group">
                                <i class="fa fa-pencil-square-o bigicon iconLeft"></i>
                                <textarea class="form-control ml-4" name="missatge" required placeholder="Escriu el teu missatge." rows="7">Bones, estic interessat/ada en la vostra proposta " {{ $proposta->nom }} " i m'agradaria contactar amb vosté per a ...</textarea>
                                <input class="d-none" type="text" name="idProposta" value="{{$proposta->id}}">
                            </div>

                            <div class="form-group">
                                <div class="ml-4 text-left">
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                </div>
                                @if (Session::get('message_sent'))
                                <div class="alert alert-success mt-2 ml-4" role="alert">
                                    {{Session::get('message_sent')}}
                                </div>

                             @endif
                            </div>
                        </fieldset>
                    </form>

            </div>
            <div class="col-md-3">
              <div class="align-items-center card card-block  my-4 mx-4 d-flex flex-column" >
                  <img class="card-img-top "style="max-height:9rem"
                       src="{{ asset('propostaImage/'.$proposta->ruta_imatge) }}" alt="Card image cap">
                  <div class="card-body ">
                      <h4 class="card-title text-dark">{{$proposta->nom}}</h4>
                      <p class="card-text text-dark">{{$proposta->descripcio}}</p>

                  </div>

              </div>
            </div>
        </div>
    </div>

@endsection
