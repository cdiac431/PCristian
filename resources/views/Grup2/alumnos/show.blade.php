@extends('layouts.plantilla')

@section('title', 'Alumne ' . $alumno->id)

@section('content')
<h1>Alumne seleccionat: {{$alumno->id}}</h1>
<a href="{{route('alumnos.index')}}">Tornar al llistat</a>
<br>
<a href="{{route('alumnos.edit', $alumno)}}">Editar alumne</a>

<form action="{{route('alumnos.destroy', $alumno)}}" method="POST">
    @csrf
    @method('delete')
    <button type="submit">Eliminar alumne</button>
</form>
@endsection



