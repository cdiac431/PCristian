@extends('Grup2.Grups')

@section('title', 'Gestió de Grups - Gestió interna')


@section('styles')
    <link rel="stylesheet" href="{{asset('css/bootstrap-dropdownhover.min.css')}}" crossorigin="anonymous"/>

@endsection

@section('menuG')
<div class="container overflow-hidden">
    <div class="row mt-5 mb-2">
      <div class="col-lg-12">
          <div class="bg-blue text-white py-1 px-3 rounded-top d-inline-flex w-100">
              <h3 class="mx-0 my-auto font-weight-bold">Llista de Grups</h3>
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
              <button class="btn btn-primary" data-toggle="modal" data-target="#crearGrup"><i class="fas fa-plus text-dark"></i></button>
            @endcan
          </div>
          <div class="overflow-scroll">
            <table
            class="table table-striped m-0 w-100 table-hover table-checkbox border striped user-select-none">
                <thead>
                    <tr id="table-header">
                        <th class="text-center">Nom</th>
                        <th class="text-center">Professor</th>
                        <th class="text-center">Centre Educatiu</th>
                    @can('GestioInstitut.tot')
                            <th class="text-center">Accions</th>
                    @endcan
                    </thead>
                <tbody>

                    @foreach($grups as $grup )
                    <tr class="body">
                        <td class="d-none">
                            <input class="table-checkbox" type="checkbox" onclick="">
                        </td>
                        <td class="align-middle">{{$grup->nom}}</td>
                        <td class="align-middle">{{$grup->professorGrup->usuari->nom}} {{$grup->professorGrup->usuari->cognom}}</td>
                        <td class="align-middle">{{$grup->institut2->nom}}</td>

                    @can('GestioInstitut.tot')
                        <td>
                            <div class="d-flex justify-content-between">

                                <a href="" onclick="selGrup('{{$grup->id}}','{{$grup->nom}}','{{$grup->professorGrup->id}}','{{$grup->institut2->id}}');" data-toggle="modal" data-target="#editGrup"><i class="fas fa-edit text-dark"></i></a>

                                <a href="" onclick="delGrup('{{$grup->id}}');" data-toggle="modal" data-target="#delGrup"><i class="fa fa-trash-alt text-dark"></i></a>
                            </div>
                        </td>
                    @endcan

                    </tr>
                    @endforeach
                </tbody>
            </table>
          </div>
        <div class="bg-blue justify-content-center py-2 rounded-bottom d-inline-flex w-100">
            <a class="mx-3 text-white" id="items-10" href="{{route('grups.show',10)}}"><u>10</u></a>
            <a class="mx-3 text-white" id="items-20" href="{{route('grups.show',20)}}"><u>20</u></a>
            <a class="mx-3 text-white" id="items-50" href="{{route('grups.show',50)}}"><u>50</u></a>
        </div>
        </div>
    </div>
    {{$grups->links()}}
</div>

@can('GestioInstitut.tot')

    @include('Grup2.grups.createGrup')
    @include('Grup2.grups.editGrup')
    @include('Grup2.grups.deleteGrup')

@endcan

@endsection

@section('scripts')
    <script src="{{ asset('js/Grup2/customgrups.js') }}"></script>

        <script>
            let checkedBoxes = [],
            grupid = [],
            idgrupeliminat = []

            let i = 0;

            $('.d-none#grupid').each(function () {
                grupid.push($(this).text())
            })
            //eliminar
            $(function () {
                $('.d-none#grupid').each(function () {
                    grupid.push($(this).text())
                })
            });

            $('.fa.fa-edit').each(function () {
                let link = '{{ route('grups.update', "id")}}'
                link = link.replace("id",grupid[i])
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
                    idgrupeliminat.push(grupid[checkedBoxes[i]-1]);
                }
                if (checkedBoxes.length>0){
                    $('#mformulari_eliminar_grup').modal('toggle');
                    idgrupeliminat.forEach(function (index){
                        content = content + ("<input type='hidden' name='id"+index+"'"+" value="+"'"+index+"'"+">");
                        i++;
                        console.log(content)
                    });
                    $('#mformulari_eliminar_grup').append(content);
                }
                let link = '{{route('grups.deleteall')}}'
                $('#submitEliminar').click(function () {
                    $('#mformulari_eliminar_grup').attr('method', 'POST')
                    $('#mformulari_eliminar_grup').attr('action', link)
                });
            });
        </script>
  @endsection
