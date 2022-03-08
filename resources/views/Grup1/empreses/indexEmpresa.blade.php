@extends('Grup1.GestioCentral')

@section('title', 'Gestió d\'Empresa - Gestió central')

@section('styles')
  <link rel="stylesheet" href="{{asset('css/Grup1/custom.css')}}">

  <link rel="stylesheet" href="{{asset('css/bootstrap-dropdownhover.min.css')}}" crossorigin="anonymous"/>

@endsection
@section('menuG')
    <div class="container overflow-hidden">
        <div class="row mt-5 mb-2">
            <div class="col-lg-12">
                    <div class="bg-purple text-white py-1 px-3 rounded-top d-inline-flex w-100">
                        <div class="w-100 d-inline-flex align-self-end" >
                            <h3 class="mx-0 my-auto font-weight-bold">Llista d'Entitats</h3>
                            <form class="ml-auto" method="post" action="{{route('empreses.exportCsv')}}">
                                <button title="Exportar tots" class="btn btn-primary mx-2"><i
                                        class="fas fa-download"></i>
                                    @csrf
                                </button>
                            </form>
                            <button id="upload" title="Importar" class="btn btn-primary mx-2"
                                    type="button" class="btn btn-info" data-toggle="modal" data-target="#uploadModal">
                                <i class="fas fa-upload"></i>
                            </button>
                            <button class="btn btn-primary mx-2" data-toggle="modal" data-target="#crearEmpresa"><i
                                    class="far fa-plus-square" title="Afegir"></i></button>
                            <button title="Eliminar Seleccionat" data-toggle="modal" data-target="#mdel" id="deleteAll" data-backdrop="static"
                                    data-keyboard="false" class="btn btn-primary ml-2"><i class="fa fa-trash"></i></button>
                        </div>
                    </div>
                <div class="overflow-scroll">
                    <table class="table table-striped m-0 w-100 table-hover table-checkbox border striped user-select-none">
                        <thead>
                            <tr id="table-header">
                                <th class="text-center"> <input id="selectAll" type="checkbox"></th>
                                <th class="text-center">Nom</th>
                                <th class="text-center">Localitat</th>
                                <th class="text-center">Telèfon</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Accions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($empreses as $empresa)
                            <tr class="body">
                                <td class="align-middle align-content-center text-center">
                                    <input class="table-checkbox" type="checkbox" onClick="this.checked=!this.checked;">
                                </td>
                                <td id="empresaid" class="d-none">{{$empresa->id}}</td>
                                <td class="align-middle">{{$empresa->nom}}</td>
                                <td class="align-middle">{{$empresa->localitat}}</td>
                                <td class="align-middle">{{$empresa->telefon}}</td>
                                <td class="align-middle">{{$empresa->email}}</td>
                                <td>
                                    <div class="d-flex justify-content-between">

                                        {{-- <a href="{{route('empreses.veure', $empresa->id)}}"><i class="fas fa-eye text-dark"></i></a> --}}

                                        <a href="" onclick="selEmpresa('{{$empresa->id}}','{{$empresa->nom}}','{{$empresa->localitat}}','{{$empresa->direccio}}','{{$empresa->telefon}}','{{$empresa->cif}}','{{$empresa->email}}');" data-toggle="modal" data-target="#editEmpresa"><i class="fas fa-edit text-dark"></i></a>

                                        <a href="" onclick="delEmpresa('{{$empresa->id}}');" data-toggle="modal" data-target="#delEmpresa"><i class="fa fa-trash-alt text-dark"></i></a>

                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="bg-purple justify-content-center py-2 rounded-bottom d-inline-flex w-100">
                    <a class="mx-3 text-white" id="items-10" href="{{route('empreses.show',10)}}"><u>10</u></a>
                    <a class="mx-3 text-white" id="items-20" href="{{route('empreses.show',20)}}"><u>20</u></a>
                    <a class="mx-3 text-white" id="items-50" href="{{route('empreses.show',50)}}"><u>50</u></a>

                </div>
            </div>
        </div>
    {{$empreses->links()}}
</div>

@include('modals.Grup1.empreses.createEmpresa')
@include('modals.Grup1.empreses.editEmpresa')
@include('modals.Grup1.empreses.deleteEmpresa')
@include('modals.Grup1.empreses.multipledeleteEmpresa')
@include('modals.Grup1.empreses.importEmpresa')

@endsection

  @section('scripts')
    <script src="{{asset('js\Grup1\customempresa.js')}}"></script>
    <script src="{{asset('js\taula.js')}}"></script>
    <script>
      let checkedBoxes = [],
          empresaid = [],
              idempresaideliminat = []

              let i = 0;

              $('.d-none#empresaid').each(function () {
                  empresaid.push($(this).text())
              })
              //eliminar
              $(function () {
                  $('.d-none#empresaid').each(function () {
                      empresaid.push($(this).text())
                  })
              });

              $('.fa.fa-edit').each(function () {
                  let link = '{{ route('empreses.update', "id")}}'
                  link = link.replace("id",empresaid[i])
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
                      idempresaideliminat.push(empresaid[checkedBoxes[i]]);
                  }
                  if (checkedBoxes.length>0){
                      $('#mdel').modal('toggle');
                      idempresaideliminat.forEach(function (index){
                          content = content + ("<input type='hidden' name='id"+index+"'"+" value="+"'"+index+"'"+">");
                          i++;
                      });

                  }
                  let link = '{{route('empreses.deleteall')}}'
                  $('#submitEliminar').click(function () {
                      $('#mformularieliminar').append(content)
                      .attr('action', link)
                  });
              });
    </script>
  @endsection
