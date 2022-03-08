@extends('Grup1.GestioCentral')

@section('title', 'Gestió de Categories - Gestió central')

@section('styles')

<link rel="stylesheet" href="{{asset('css/bootstrap-dropdownhover.min.css')}}" crossorigin="anonymous"/>

@endsection

@section('menuG')
<div class="container overflow-hidden">
    <div class="row mt-5 mb-2">
        <div class="col-lg-12">
            <div class="bg-purple text-white py-1 px-3 rounded-top d-inline-flex w-100">
                <div class="w-100 d-inline-flex align-self-end" >
                    <h3 class="mx-0 my-auto font-weight-bold">Llista de Categories</h3>
                    @if(auth()->user()->hasRole('Administrador'))
                    <button class="btn btn-primary mx-2 ml-auto" data-toggle="modal" data-target="#crearEmpresa"><i
                            class="far fa-plus-square" title="Afegir"></i></button>
                    <button title="Eliminar Seleccionat" data-toggle="modal" data-target="#mdel" id="deleteAll" data-backdrop="static"
                            data-keyboard="false" class="btn btn-primary ml-2"><i class="fa fa-trash"></i></button>
                @endif
                </div>
            </div>
            <div class="overflow-scroll">
                <table class="table table-striped m-0 w-100 table-hover table-checkbox border striped user-select-none">
                    <thead>
                        <tr id="table-header">
                            <th class="text-center"> <input id="selectAll" type="checkbox"></th>
                            <th class="text-center">Nom</th>
                            <th class="text-center">Descripció</th>
                            @if(auth()->user()->hasRole('Administrador'))
                                <th class="text-center">Accions</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $categoria)
                            <tr class="body">
                                <td class="align-middle align-content-center text-center">
                                    <input class="table-checkbox" type="checkbox">
                                </td>
                                <td class="d-none" id="categoryid">{{$categoria->id}}</td>
                                <td class="align-middle">{{$categoria->nom}}</td>
                                <td class="align-middle">{{$categoria->descripcio}}</td>
                                @if(auth()->user()->hasRole('Administrador'))
                                    <td>
                                        <div class="d-flex justify-content-between">
                                            <a href="" onclick="selCategoria('{{$categoria->id}}','{{$categoria->nom}}','{{$categoria->descripcio}}');" data-toggle="modal" data-target="#editCategoria"><i class="fas fa-edit text-dark"></i></a>

                                            <a href="" onclick="delCategoria('{{$categoria->id}}');" data-toggle="modal" data-target="#delCategoria"><i class="fa fa-trash-alt text-dark"></i></a>
                                        </div>

                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="bg-purple justify-content-center py-2 rounded-bottom d-inline-flex w-100">
                <a class="mx-3 text-white" id="items-10" href="{{route('categories.show',10)}}"><u>10</u></a>
                <a class="mx-3 text-white" id="items-20" href="{{route('categories.show',20)}}"><u>20</u></a>
                <a class="mx-3 text-white" id="items-50" href="{{route('categories.show',50)}}"><u>50</u></a>
            </div>
        </div>
    </div>
{{$categories->links()}}
</div>

@include('Grup1.categories.createCategoria')


@if(auth()->user()->hasRole('Administrador'))
    @include('Grup1.categories.editCategoria')
    @include('Grup1.categories.deleteCategoria')
    @include('Grup1.categories.deleteCategoria')
    @include('Grup1.categories.multipledeleteCategoria')
@endif

@endsection

  @section('scripts')
    <script src="{{asset('js/Grup1/customcategoria.js')}}"></script>
    <script src="{{asset('js\taula.js')}}"></script>
        <script>
            let checkedBoxes = [],
            categoryid = [],
            idcategoryeliminat = []

            let i = 0;

            $('.d-none#categoryid').each(function () {
                categoryid.push($(this).text())
            })
            //eliminar
            $(function () {
                $('.d-none#categoryid').each(function () {
                    categoryid.push($(this).text())
                })
            });

            $('.fa.fa-edit').each(function () {
                let link = '{{ route('categories.update', "id")}}'
                link = link.replace("id",categoryid[i])
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
                    idcategoryeliminat.push(categoryid[checkedBoxes[i]]);
                }
                if (checkedBoxes.length>0){
                    $('#mdel').modal('toggle');
                    idcategoryeliminat.forEach(function (index){
                        content = content + ("<input type='hidden' name='id"+index+"'"+" value="+"'"+index+"'"+">");
                        i++;
                    });
                }
                let link = '{{route('categories.deleteall')}}'
                $('#submitEliminar').click(function () {
                    $('#mformularieliminar').append(content)
                    .attr('method', 'POST')
                    .attr('action', link)
                });
            });
        </script>
  @endsection
