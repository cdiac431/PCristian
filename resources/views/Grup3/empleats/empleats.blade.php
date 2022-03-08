@extends('layouts.management')
@section('styles')
    <!-- Styles Empleats -->
    <link href="{{ url('/css/Grup3/custom.css') }}" rel="stylesheet">
    <!-- Bootstrap Dropdown Hover CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap-dropdownhover.min.css')}}" crossorigin="anonymous"/>
@endsection
@section('title', 'Gestió de Empleats - Gestió empresa')
@section('content')

    <div class="container overflow-hidden">
        <div class="row mt-5 mb-2">
            <div class="col-lg-12">
                <div class="bg-success text-white py-1 px-3 rounded-top d-inline-flex w-100">
                    <h3 class="mx-0 my-auto font-weight-bold">Llista de Personal d'Entitats</h3>
                    @can('GestioEmpresaTop.view')
                    <div class="dropdown ml-auto">
                        <button class="btn btn-danger mr-2" id="eliminar"> Acció múltiple <i class="fa fa-caret-down" aria-hidden="true"></i>
                        </button>
                        <ul class="dropdown-menu m-0 striped user-select-none">
                            <li id="selectAll" class="cursor-pointer text-center dropdown-item menu-action">Seleccionar
                                tot
                            </li>
                            <li id="unselectAll" class="cursor-pointer text-center dropdown-item menu-action">
                                Desseleccionar tot
                            </li>
                            <li id="deleteAll" class="cursor-pointer text-center dropdown-item menu-action">Eliminar
                                seleccionats
                            </li>
                        </ul>
                    </div>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#crear"><i
                            class="far fa-plus-square"></i></button>
                    @endcan
                </div>
                <div class="overflow-scroll">
                    <table
                        class="table table-striped m-0 w-100 table-hover table-checkbox border striped user-select-none">
                        <thead>
                        <tr id="table-header">
                            <th class="px-5 text-center">Nom</th>
                            <th class="text-center">Nom Usuari</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Rol</th>
                            <th class="text-center">Empresa</th>
                        @can('GestioEmpresaTop.view')
                                <th class="text-center">Accions</th>
                        @endcan
                            <th class="d-none">Userid</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($empleats as $empleat)
                            <tr class="body">
                                <td class="d-none">
                                    <input class="table-checkbox" type="checkbox" onclick="">
                                </td>
                                <td class="align-middle">
                                    {{$empleat->nom}} {{$empleat->cognom}} {{$empleat->segon_cognom}}
                                </td>
                                <td class="align-middle">{{$empleat->user_name}}</td>
                                <td class="align-middle">{{$empleat->email}}</td>
                                <td class="align-middle">{{$empleat->nom_roles}}</td>
                                <td class="align-middle">{{$empleat->empresaNom}}</td>
                                <td class="d-none" id="userid">{{$empleat->id}}</td>
                                @can('GestioEmpresaTop.view')
                                <td>
                                    <div class="d-flex justify-content-between">
                                        <a href="" class="btn"><i class="fa fa-edit"></i></a>
                                        <a href="" class="btn" data-toggle="modal" data-target="#deletemodal"><i
                                                class="fa fa-trash"></i></a>
                                    </div>
                                </td>
                                @endcan
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="bg-success justify-content-center py-2 rounded-bottom d-inline-flex w-100">
                <a class="mx-3 text-white" id="items-10" href="{{route('empleats.show',10)}}"><u>10</u></a>
                <a class="mx-3 text-white" id="items-20" href="{{route('empleats.show',20)}}"><u>20</u></a>
                <a class="mx-3 text-white" id="items-50" href="{{route('empleats.show',50)}}"><u>50</u></a>
            </div>
        </div>
        {{$empleats->links()}}
    </div>
    

    {{-- Modal Crear empleat --}}
    @can('GestioEmpresaTop.view')
        @include('modals.Grup3.empleats.crear')
        @include('modals.Grup3.empleats.succes')
        @include('modals.Grup3.empleats.eliminar')
        @include('modals.Grup3.empleats.editar')
    @endcan
    
@endsection
@section('scripts')
    <script>
        let checkedBoxes = [],
            userid = [],
            idusereliminat = []

        let i = 0;

        $('.d-none#userid').each(function () {
            userid.push($(this).text())
        })
        //eliminar
        $(function () {
            $('.d-none#userid').each(function () {
                userid.push($(this).text())
            })
            $('.fa.fa-trash').click(function () {
                let link = '{{ route('empleats.deleteone', "id")}}'
                link = link.replace("id",userid[i])
                $('#submitEliminar').click(function () {
                    $('#eliminarform').attr('method', 'GET')
                    $('#eliminarform').attr('action', link)
                });
            });
        });

        $('.fa.fa-edit').each(function () {
            let link = '{{ route('empleats.editar', "id")}}'
            link = link.replace("id",userid[i])
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
                idusereliminat.push(userid[checkedBoxes[i]-1]);
            }
            if (checkedBoxes.length>0){
                $('#deletemodal').modal('toggle');
                idusereliminat.forEach(function (index){
                    content = content + ("<input type='hidden' name='id"+index+"'"+" value="+"'"+index+"'"+">");
                    i++;
                });

            }
            let link = '{{route('empleats.deleteall')}}'
            $('#submitEliminar').click(function () {
                $('#eliminarform').append(content)
                .attr('method', 'POST')
                .attr('action', link)
            });
        });
    </script>
    <script src="{{asset('js\Grup3\customempleat.js')}}">

    </script>
    {{-- Modal editar--}}
    @if(session()->get('user'))
        <script>
            $(window).on('load', function () {
                $('#editar').modal('show')
                //confirm password edit modal
                $('.modal.fade#editar').find('.form-control#editpassword, .form-control#editconfirm_password').on('keyup', function () {
                    if ($('.form-control#editpassword').val() === $('.form-control#editconfirmpassword').val()) {

                        $('.btn.btn-primary#submitEditar').prop('disabled', false);

                    } else {

                        $('.btn.btn-primary#submitEditar').prop('disabled', true);
                    }
                });
                $('.modal-content form#editform').attr('action', '{{ route('empleats.actualitzar', session('user.id'))}}');
            });
        </script>
    @endif
@endsection
