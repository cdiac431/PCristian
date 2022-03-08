@extends('layouts.plantilla')
@section('content')
    <div class="container pt-5 pb-5">
        <div class="row justify-content-center">
            <form method="POST" action="/forget-password">
                @csrf
                <div class="col-sm-12">
                    <h1 class="h3 mb-0">Restaurar contrasenya</h1>
                    <p>Escriu el teu email i rebràs les instruccions a seguir.</p>
                </div>

                @if(Session::has('message'))
                    <div class="alert alert-success">
                    <p>{{ \Session::get('message')}}</p>
                    </div>
                @endif

                <div class="js-form-message mb-3">
                    <div class="js-focus-state input-group form">
                    <div class="input-group-prepend formprepend">
                        <span class="input-group-text formtext">
                        <i class="fa fa-user formtext-inner"></i>
                        </span>
                    </div>
                    <input type="email" class="form-control forminput @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  placeholder="Email" autocomplete="email" autofocus>

                    </div>
                </div>

                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary login-btn btn-block btn-round">Restaurar contrasenya</button>
                </div>
            </form>
        </div>
    </div>
@endsection