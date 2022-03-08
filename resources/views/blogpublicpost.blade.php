@extends('layouts.management')

@section('title', 'Blog')

@section('content')


{{-- taula  --}}
<div class="container">

    <div class="row">

        <div class="col-8">

            <div class="row">

                {{-- <a href="{{route('blogpublic')}}"><i class="fas fa-undo-alt mt-2"></i></a> --}}

                <h2 class="mt-5 mb-2" style="color: #ffa251">{{$post->titol}}</h2>

            </div>

        </div>

            <div class="col-8">

                <div class="row">

                    <div class="embed-responsive embed-responsive-16by9">
                        <img class="embed-responsive-item rounded" src="../../portadaPost/{{$post->ruta_blog}}">
                    </div>

                </div>

                <div class="row">

                    <h5 class="my-3 text-justify font-italic" style="color: #888">{{$post->entradeta}}</h5>



                </div>

                <div class="row">

                    <p>{!! $post->contingut !!} </p>

                </div>

                <div class="row my-3">

                    <div class="col-2 d-flex justify-content-end">

                        <img class="rounded-circle" style="display: inline-block" width="100" height="100" src="{{asset('avatars/'. $usuari->ruta_avatar)}}" alt="#">

                    </div>

                    <div class="col-10 align-self-end">

                        <p class="cover-heading m-0" style="color: #ffa251">{{$usuari->nom.' '.$usuari->cognom.' '.$usuari->segon_cognom}}</p>

                        <small class="m-0">{{date("d/m/y",strtotime($post->data))}}</small>

                    </div>

                </div>

            </div>

            <div class="col-4">

                @foreach ($llista as $llist)

                    <div class="row ml-2">

                        <a href="{{ route('blogpublicpost', ['id' => $llist->id]) }}"><h5>{{$llist->titol}}</h5></a>

                    </div>

                    <div class="row ml-2 d-flex justify-content-between">

                        <small>{{$llist->nom. ' ' .$llist->cognom. ' ' .$llist->segon_cognom}}</small>

                        <small>{{date("d/m/y",strtotime($llist->data))}}</small>

                    </div>

                    <hr class="ml-3">

                @endforeach

                {{-- {{$llista->links()}} --}}

            </div>



    </div>

</div>

@endsection
