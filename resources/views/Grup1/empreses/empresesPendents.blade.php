@extends('Grup1.GestioCentral')

@section('title', 'Revisió d\'Entitats')

@section('styles')
  <link rel="stylesheet" href="{{asset('css/Grup1/custom.css')}}">

  <link rel="stylesheet" href="{{asset('css/bootstrap-dropdownhover.min.css')}}" crossorigin="anonymous"/>

@endsection
@section('menuG')
@if (session('alert'))
<div id="fade-out" class="alert alert-success mb-auto position-fixed w-100 rounded-0">
	{{ session('alert') }}
</div>
@endif
    <div class="container overflow-hidden">
        <div class="row mt-5 mb-2">
            <div class="col-lg-12">
                <div class="bg-green text-white py-1 px-3 rounded-top d-inline-flex w-100">
                    <h3 class="mx-0 my-auto font-weight-bold">Sol·licituds d'Entitats pendents de revisió</h3>
                </div>
                <div class="overflow-scroll">
                    <table class="table table-striped m-0 w-100 table-hover table-checkbox border striped user-select-none">
                        <thead>
                            <tr id="table-header">
                                <th class="text-left">Nom</th>
                                <th class="text-left">Localitat</th>
                                <th class="text-left">Telèfon</th>
                                <th class="text-left">Email</th>
                                <th class="text-left">Documentació</th>
                                <th class="">Accions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($empresa as $empresap)
                            @if($empresap->estat === 'pendent')
                            <tr class="body">
                                <td class="d-none">
                                    <input class="table-checkbox" type="checkbox" onclick="">
                                </td>
                                <td id="empresaid" class="d-none">{{$empresap->id}}</td>
                                <td class="align-middle">{{$empresap->nom}}</td>
                                <td class="align-middle">{{$empresap->localitat}}</td>
                                <td class="align-middle">{{$empresap->telefon}}</td>
                                <td class="align-middle">{{$empresap->email}}</td>
                                <td class="align-middle"><a href="/reviewdocumentation/{{$empresap->ruta_document}}" download><i class="fas fa-download"></i></a></td>
                                <td>
                                    <div class="d-flex justify-content-between">

                                        {{-- <a href="{{route('empreses.veure', $empresap->id)}}"><i class="fas fa-eye text-dark"></i></a> --}}

                                        <a href="" onclick="empresesPendents('{{$empresap->id}}','{{$empresap->nom}}','{{$empresap->localitat}}','{{$empresap->direccio}}','{{$empresap->telefon}}','{{$empresap->cif}}','{{$empresap->email}}','{{$empresap->ruta_document}}');" data-toggle="modal" data-target="#empresespendents"><i class="fas fa-eye text-dark"></i></a>   
                                    </div>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="bg-green justify-content-center py-2 rounded-bottom d-inline-flex w-100">
                    <a class="mx-3 text-white" id="items-10" href="{{route('empreses.show',10)}}"><u>10</u></a>
                    <a class="mx-3 text-white" id="items-20" href="{{route('empreses.show',20)}}"><u>20</u></a>
                    <a class="mx-3 text-white" id="items-50" href="{{route('empreses.show',50)}}"><u>50</u></a>

                </div>
            </div>
        </div>
    {{$empresa->links()}}
</div>

@include('Grup1.empreses.createEmpresa')
@include('Grup1.empreses.editEmpresa')
@include('Grup1.empreses.deleteEmpresa')
@include('Grup1.empreses.multipledeleteEmpresa')
@include('Grup1.empreses.ModalconfirmationReviewEmpreses')


@endsection

  @section('scripts')
  
    <script src="{{asset('js\Grup1\custom.js')}}"></script>
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
                      idempresaideliminat.push(empresaid[checkedBoxes[i]-1]);
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
