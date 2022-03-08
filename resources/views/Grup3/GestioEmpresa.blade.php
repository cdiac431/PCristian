@extends('layouts.management')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-4">
            </div>
            <div class="col-sm-6">
                @yield('menuG')
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="{{asset('css/Grup3CSS/custom.css')}}">

@endsection
