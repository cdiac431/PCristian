@extends('Grup1.GestioCentral')

@section('title', 'Gestió d\'Incidencies - Gestió central')

@section('styles')
  <link rel="stylesheet" href="{{asset('css/Grup1/custom.css')}}">


  <link rel="stylesheet" href="{{asset('css/bootstrap-dropdownhover.min.css')}}" crossorigin="anonymous"/>

@endsection

@section('menuG')
<div class="container overflow-hidden">
    <div class="row mt-5 mb-5">
        <div class="col-lg-12">
            <div class="bg-purple text-white py-1 px-3 rounded-top d-inline-flex w-100">
                <h3 class="mx-0 my-auto font-weight-bold">Llista d'Incidències</h3>
                <div class="dropdown ml-auto">
                    @if(auth()->user()->hasRole('Administrador'))
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
                        <li data-toggle="modal" data-target="#mdelUsuari" class="btn" data-toggle="modal" data-target="#deletemodal" id="deleteAll" class="cursor-pointer text-center dropdown-item menu-action">Eliminar
                        seleccionats
                        </li>
                        <li  class="cursor-pointer text-center dropdown-item menu-action">
                            <form method="post" action="{{route('incidencies.exportCsv')}}">
                                <button class="cursor-pointer text-center dropdown-item menu-action" type="submit">
                                    @csrf Exportar tots
                                </button>
                            </form>
                        </li>
                    </ul>
                        @endif
                </div>
                <button class="btn btn-primary" data-toggle="modal" data-target="#crearIncidencia"><i class="fas fa-plus text-dark"></i></button>
            </div>
            <div class="overflow-scroll">
                <table class="table table-striped m-0 w-100 table-hover table-checkbox border striped user-select-none">
                    <thead>
                        <tr id="table-header">
                            <th class="text-center align-middle">Nom</th>
                            <th class="text-center align-middle">Descripció</th>
                            <th class="text-center align-middle">Estat Incidència</th>
                            @if(auth()->user()->hasRole('Administrador'))
                                <th class="text-center align-middle">Accions</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($incidencies as $incidencia)
                            <tr class="body">
                                <td class="d-none">
                                    <input class="table-checkbox" type="checkbox" onclick="">
                                </td>
                                    <td id="incidenciaid" class="d-none">{{$incidencia->id}}</td>
                                <td class="align-middle">{{$incidencia->nom}}</td>
                                <td class="align-middle">{{$incidencia->descripcio}}</td>
                                <td class="align-middle">{{$incidencia->estat_incidencia}}</td>

                                <td class="align-middle">
                                    <div class="d-flex justify-content-between">
                                    @if(auth()->user()->hasRole('Administrador'))
                                        <a href="" onclick="selIncidencia('{{$incidencia->id}}','{{$incidencia->usuari->nom}}','{{$incidencia->nom}}','{{$incidencia->descripcio}}','{{$incidencia->estat_incidencia}}');" data-toggle="modal" data-target="#editIncidencia"><i class="fas fa-edit text-dark"></i></a>
                                        <a href="" onclick="delIncidencia('{{$incidencia->id}}');" data-toggle="modal" data-target="#delIncidencia"> <i class="fa fa-trash-alt text-dark"></i></a>
                                    @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="bg-purple justify-content-center py-2 rounded-bottom d-inline-flex w-100">
                <a class="mx-3 text-white" id="items-10" href="{{route('incidencies.show',10)}}"><u>10</u></a>
                <a class="mx-3 text-white" id="items-20" href="{{route('incidencies.show',20)}}"><u>20</u></a>
                <a class="mx-3 text-white" id="items-50" href="{{route('incidencies.show',50)}}"><u>50</u></a>
            </div>
        </div>
    </div>
{{$incidencies->links()}}
</div>
@include('Grup1.incidencies.createIncidencia')

@if(auth()->user()->hasRole('Administrador'))
    @include('Grup1.incidencies.editIncidencia')
    @include('Grup1.incidencies.deleteIncidencia')
    @include('Grup1.incidencies.multipledeleteIncidencia')
@endif
  @endsection

    @section('scripts')
    <script src="{{asset('js\Grup1\customincidencia.js')}}"></script>
    <script>
      let checkedBoxes = [],
            incidenciaid = [],
            idincidenciaeliminat = []

            let i = 0;

            $('.d-none#incidenciaid').each(function () {
                incidenciaid.push($(this).text())
            })
            //eliminar
            $(function () {
                $('.d-none#incidenciaid').each(function () {
                    incidenciaid.push($(this).text())
                })
            });

            $('.fa.fa-edit').each(function () {
                let link = '{{ route('incidencies.update', "id")}}'
                link = link.replace("id",incidenciaid[i])
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
                    idincidenciaeliminat.push(incidenciaid[checkedBoxes[i]-1]);
                }
                if (checkedBoxes.length>0){
                    $('#mdel').modal('toggle');
                    idincidenciaeliminat.forEach(function (index){
                        content = content + ("<input type='hidden' name='id"+index+"'"+" value="+"'"+index+"'"+">");
                        i++;
                    });

                }
                let link = '{{route('incidencies.deleteall')}}'
                $('#submitEliminar').click(function () {
                    $('#mformularieliminar').append(content)
                        .attr('method', 'POST')
                        .attr('action', link)
                });
            });
    </script>
  @endsection
