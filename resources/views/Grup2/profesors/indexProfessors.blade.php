@extends('Grup2.Professors')

@section('title', 'Gestió de Professorat - Gestió Interna')


@section('styles')
    <link rel="stylesheet" href="{{asset('css/bootstrap-dropdownhover.min.css')}}" crossorigin="anonymous"/>

@endsection

@section('content')
<div class="container overflow-hidden">
    <div class="row mt-5 mb-2">
        <div class="col-lg-12">
            <div class="bg-blue text-white py-1 px-3 rounded-top d-inline-flex w-100">
                <h3 class="mx-0 my-auto font-weight-bold">Llista del Professorat</h3>
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
                <button class="btn btn-primary" data-toggle="modal" data-target="#crearProfessor"><i class="fas fa-plus text-dark"></i></button>
            @endcan
            </div>
            <div class="overflow-scroll">
                <table class="table table-striped m-0 w-100 table-hover table-checkbox border striped user-select-none">
                    <thead>
                        <tr id="table-header">
                            <th class="text-center">Nom</th>
                            <th class="text-center">Nom Usuari</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Rol</th>
                            <th class="text-center">Centre Educatiu</th>
                        @can('GestioInstitut.tot')
                            <th class="text-center">Accions</th>
                        @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($professors as $professor)
                        <tr class="body">
                            <td class="d-none">
                                <input class="table-checkbox" type="checkbox" onclick="">
                            </td>
                            <td class="align-middle">{{$professor->nom}}
                            {{$professor->cognom}}
                            {{$professor->segon_cognom}}</td>
                            <td class="align-middle">{{$professor->user_name}}</td>
                            <td class="align-middle">{{$professor->email}}</td>
                            <td class="align-middle">{{$professor->nom_roles}}</td>
                            @role('Administrador')
                            <td class="align-middle">{{$professor->institutNom}}</td>
                            @else
                            <td class="align-middle">{{$instituts['nom']}}</td>
                            @endrole
                        @can('GestioInstitut.tot')

                            <td>
                                <div class="d-flex justify-content-between">

                                    <a href="" onclick="selProfessor('{{$professor->nom}}','{{$professor->cognom}}','{{$professor->segon_cognom}}','{{$professor->id_roles}}','{{$professor->dni}}','{{$professor->user_name}}','{{$professor->email}}','{{$professor->telefon}}','{{$professor->id}}','{{$professor->user_id}}')" data-toggle="modal" data-target="#editProfessor"><i class="fas fa-edit text-dark"></i></a>

                                    <a href="" onclick="deleteProfessor('{{$professor->user_id}}')" data-toggle="modal" data-target="#deleteProfessor"><i class="fa fa-trash-alt text-dark"></i></a>
                                </div>
                            </td>
                        @endcan

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="bg-blue justify-content-center py-2 rounded-bottom d-inline-flex w-100">
                <a class="mx-3 text-white" id="items-10" href="{{route('professors.show',10)}}"><u>10</u></a>
                <a class="mx-3 text-white" id="items-20" href="{{route('professors.show',20)}}"><u>20</u></a>
                <a class="mx-3 text-white" id="items-50" href="{{route('professors.show',50)}}"><u>50</u></a>
            </div>
        </div>
    </div>
    {{$professors->links()}}
</div>

@can('GestioInstitut.tot')

    @include('Grup2.profesors.createProfessor')
    @include('Grup2.profesors.deleteProfessor')
    @include('Grup2.profesors.editProfessor')

@endcan

@endsection

@section('scripts')
    <script src="{{ asset('js/Grup2/professors.js') }}"></script>

        <script>
            let checkedBoxes = [],
            profeid = [],
            idprofeeliminat = []

            let i = 0;

            $('.d-none#profeid').each(function () {
                profeid.push($(this).text())
            })
            //eliminar
            $(function () {
                $('.d-none#profeid').each(function () {
                    profeid.push($(this).text())
                })
            });

            $('.fa.fa-edit').each(function () {
                let link = '{{ route('professors.update', "id")}}'
                link = link.replace("id",profeid[i])
                $(this).parent().attr("href", link)
                i++;
            });

            //funcio eliminar
            $('#deleteAll').click(function () {
                let content = '';
                let i = 0;
                $('table input.table-checkbox').each(function (index){
                    if ( $(this).prop('checked') ) checkedBoxes.push(index);
                    index++;
                });
                for (let i = 0; i<checkedBoxes.length;i++){
                    idprofeeliminat.push(profeid[checkedBoxes[i]-1]);
                }
                if (checkedBoxes.length>0){
                    $('#mformulari_eliminar_profe').modal('toggle');
                    idprofeeliminat.forEach(function (index){
                        content = content + ("<input type='hidden' name='id"+index+"'"+" value="+"'"+index+"'"+">");
                        i++;
                        console.log(content)
                    });
                    $('#mformulari_eliminar_profe').append(content);
                }
                let link = '{{route('professors.deleteall')}}'
                $('#submitEliminar').click(function () {
                    $('#mformulari_eliminar_profe').attr('method', 'POST')
                    $('#mformulari_eliminar_profe').attr('action', link)
                });
            });
        </script>
  @endsection
