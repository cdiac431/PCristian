@extends('layouts.management')

@section('title', 'Error inesperat')

@section('content')
<body class="error">

    <div class="fondo">
        <div id="errorpage">

            <div class="error-box">
                <div>
                    
                    <h1>Ups</h1>
                    <h2>
                        <span>Error </span> 
                        <span>Inesperat</span>
                    </h2>

                    <a href="{{route('home')}}" class="cta-button text-center">
                        <span>Torna a Inici</span>
                    </a>
                </div>


            </div>

        </div>
    </div>
</body>
@endsection