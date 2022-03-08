@extends('layouts.management')

@section('title', 'Pàgina no trobada')

@section('content')

    <div class="fondo">
        <div id="errorpage">

            <div class="error-box">
                <div>
                    
                    <h1>Ups</h1>
                    <h2>
                        <span>No s'ha trobat </span>
                        <span>la pàgina</span>
                    </h2>

                    <a href="{{route('home')}}" class="cta-button text-center">
                        <span>Tornar a Inici</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection