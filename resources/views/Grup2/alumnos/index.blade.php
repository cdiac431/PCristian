@extends('Grup2.Alumnes')

@section('title', 'Gestió d\'Alumnat - Gestió Interna')


@section('styles')
    
    <link rel="stylesheet" href="{{asset('css/bootstrap-dropdownhover.min.css')}}" crossorigin="anonymous"/>

@endsection

@section('content')
<div class="container overflow-hidden">
    <div class="row mt-5 mb-2">
        <div class="col-lg-12">
            <div class="bg-blue text-white py-1 px-3 rounded-top d-inline-flex w-100">
                <h3 class="mx-0 my-auto font-weight-bold">Llista d'Alumnat</h3>
                @can('GestioInstitut.tot')
                <div class="dropdown ml-auto">

                    <button class="btn btn-danger mr-2" id="eliminar"> Acció múltiple <i class="fa fa-caret-down"
                    aria-hidden="true"></i>
                    </button>
                    <ul class="dropdown-menu m-0 striped user-select-none">
                        <li id="selectAll" class="cursor-pointer text-center dropdown-item menu-action">Seleccionar
                            tot
                        </li>
                        <li id="unselectAll" class="cursor-pointer text-center dropdown-item menu-action">
                            Desseleccionar tot
                        </li>
                        <li data-toggle="modal" data-target="#mdel" class="btn" data-toggle="modal" data-target="#deletemodal" id="deleteAll" class="cursor-pointer text-center dropdown-item menu-action">Eliminar
                            seleccionats
                        </li>
                    </ul>
                </div>
                
                <button class="btn btn-primary" data-toggle="modal" data-target="#crearAlumne"><i class="fas fa-plus text-dark"></i></button>
                @endif
            </div>
            <div class="overflow-scroll">
                <table class="table table-striped m-0 w-100 table-hover table-checkbox border striped user-select-none">
                    <thead>
                        <tr id="table-header">
                            <th class="text-center">Nom</th>
                            <th class="text-center">Nom Usuari</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Centre Educatiu</th>
                            <th class="text-center">Grup Tutoria</th>
                            @can('GestioInstitut.tot')
                                <th class="text-center">Accions</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alumnos as $alumno)
                        <tr class="body">
                            <td class="d-none">
                                <input class="table-checkbox" type="checkbox" onclick="">
                                </td>
                            <td class="align-middle">{{ $alumno->nom }}
                                {{ $alumno->cognom }}
                                {{ $alumno->segon_cognom }}</td>
                            <td class="align-middle">{{ $alumno->user_name }}</td>
                            <td class="align-middle">{{ $alumno->email }}</td>
                            @role('Administrador')
                            <td class="align-middle">{{$alumno->institutNom}}</td>
                            @else
                            <td class="align-middle">{{$instituts['nom']}}</td>
                            @endrole
                            <td class="align-middle">{{$alumno->grupNom}}</td>
                        @can('GestioInstitut.tot')

                            <td>
                                <div class="d-flex justify-content-between">
                                    <a href=""
                                        onclick="selAlumne('{{ $alumno->nom }}','{{ $alumno->cognom }}','{{ $alumno->segon_cognom }}','{{ $alumno->dni }}','{{ $alumno->user_name }}','{{ $alumno->email }}','{{ $alumno->telefon }}','{{ $alumno->user_id }}');"
                                        data-toggle="modal" data-target="#editAlumne"><i
                                            class="fas fa-edit text-dark"></i></a>

                                    <a href="" onclick="deleteAlumno('{{ $alumno->user_id }}')" data-toggle="modal"
                                        data-target="#deleteAlumne"><i class="fa fa-trash-alt text-dark"></i></a>
                                </div>
                            </td>

                        @endcan
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="bg-blue justify-content-center py-2 rounded-bottom d-inline-flex w-100">
                <a class="mx-3 text-white" id="items-10" href="{{route('alumnes.show',10)}}"><u>10</u></a>
                <a class="mx-3 text-white" id="items-20" href="{{route('alumnes.show',20)}}"><u>20</u></a>
                <a class="mx-3 text-white" id="items-50" href="{{route('alumnes.show',50)}}"><u>50</u></a>
            </div>
        </div>
    </div>
    {{$alumnos->links()}}
</div>

@can('GestioInstitut.tot')

    @include('Grup2.alumnos.create')
    @include('Grup2.alumnos.delete')
    @include('Grup2.alumnos.edit')

@endcan

@endsection

@section('scripts')
    <script src="{{ asset('js/Grup2/alumnes.js') }}"></script>

        <script>
            let checkedBoxes = [],
            alumneid = [],
            idalumneeliminat = []

            let i = 0;

            $('.d-none#alumneid').each(function () {
                alumneid.push($(this).text())
            })
            //eliminar
            $(function () {
                $('.d-none#alumneid').each(function () {
                    alumneid.push($(this).text())
                })
            });

            $('.fa.fa-edit').each(function () {
                let link = '{{ route('alumnes.update', "id")}}'
                link = link.replace("id",alumneid[i])
                $(this).parent().attr("href", link)
                i++;
            });

            //funcio eliminar
            $('#deleteAll').click(function () {
                let content = '';
                let i = 0;
                let link = '{{route('usuaris.deleteall')}}';
                checkedBoxes = [];
                idusereliminat = [];
                $('table input.table-checkbox').each(function (index){
                    if ( $(this).prop('checked') ) checkedBoxes.push(index);
                    index++;
                });
                for (let i = 0; i<checkedBoxes.length;i++){
                    idusereliminat.push(userid[checkedBoxes[i]-1]);
                }
                if (checkedBoxes.length>0){
                    content = '_'
                    idusereliminat.forEach(function (index){
                        content = content + ("<input type='hidden' name='id"+index+"'"+" value="+"'"+index+"'"+">");
                        i++;
                        console.log(content)
                    });
                    $('#inputs').html(content)
                    $('#mformulari_eliminar_alumne').attr('method', 'POST')
                        .attr('action', link)
                        .modal('toggle');
                }
            });

            </script>
  @endsection
