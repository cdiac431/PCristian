@extends('layouts.management')

@section('title', 'Gestio Interna')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                @yield('menuG')
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="{{asset('css/Grup1CSS/custom.css')}}">

@endsection
