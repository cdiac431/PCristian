@extends('layouts.management')

@section('title', 'Blog')

@section('styles')
    <link rel="stylesheet" href="{{asset('css/Grup4/custom.css')}}">
@endsection

@section('content')

{{-- taula  --}}
<div class="container">

        <div class="row">
            <h1 class="cover-heading text-center my-5 titulBlog d-inline mx-auto"> Blog de Proiectus</h1>
        </div>

        <div class="row">
            @foreach ($posts as $post)
                <div class="col-3 my-3 embed-responsive embed-responsive-16by9">
                    <img class="embed-responsive-item rounded" src="../../portadaPost/{{$post->ruta_blog}}">
                </div>

                <div class="col-9 my-3">
                    <h4><a href="{{ route('blogpublicpost', ['id' => $post->id]) }}">{{ $post->titol }}</a></h4>
                    <h6 style="text-align: justify">{{substr($post->entradeta, 0, 200). '..'}}</h6>
                    <div class="row">
                        <div class="col-12 d-flex justify-content-end">
                            <small class="m-0">{{$post->nom.' '.$post->cognom.' '.$post->segon_cognom}}</small>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 d-flex justify-content-end">
                            <small class="m-0">{{date("d/m/y",strtotime($post->data))}}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    {{$posts->links()}}
</div>

@endsection
