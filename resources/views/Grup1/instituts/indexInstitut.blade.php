@extends('Grup1.GestioCentral')

@section('title', 'Gestió d\'Institut - Gestió central')

@section('menuG')
<div class="container overflow-hidden">
    <div class="row mt-5 mb-2">
        <div class="col-lg-12">
            <div class="bg-purple text-white py-1 px-3 rounded-top d-inline-flex w-100">
            <div class="w-100 d-inline-flex align-self-end" >
                <h3 class="mx-0 my-auto font-weight-bold">Llista de Centres Educatius</h3>
                <form class="ml-auto" method="post" action="{{route('instituts.exportCsv')}}">
                    <button title="Exportar tots" class="btn btn-primary mx-2"><i
                            class="fas fa-download"></i>
                        @csrf
                    </button>
                </form>
                <button id="upload" title="Importar" class="btn btn-primary mx-2"
                        type="button" class="btn btn-info" data-toggle="modal" data-target="#uploadModal">
                    <i class="fas fa-upload"></i>
                </button>
                <button class="btn btn-primary mx-2" data-toggle="modal" data-target="#crearInstitut"><i
                        class="far fa-plus-square" title="Afegir Institut"></i></button>
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
                        <th>Accions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($instituts as $institut)
                        @if($institut->estat === 'actiu')
                            <tr class="body">
                                <td class="align-middle align-content-center text-center">
                                    <input class="table-checkbox" type="checkbox" onClick="this.checked=!this.checked;">
                                </td>
                                <td id="institutid" class="d-none">{{$institut->id}}</td>
                                <td class="align-middle">{{$institut->nom}}</td>
                                <td class="align-middle">{{$institut->localitat}}</td>
                                <td class="align-middle">{{$institut->telefon}}</td>
                                <td class="align-middle">{{$institut->email}}</td>
                                <td>
                                    <div class="d-flex justify-content-between">
                                        <a href="" onclick="selInstitut('{{$institut->id}}','{{$institut->nom}}','{{$institut->localitat}}','{{$institut->direccio}}','{{$institut->telefon}}','{{$institut->cif}}','{{$institut->email}}');" data-toggle="modal" data-target="#editInstitut"><i class="fas fa-edit text-dark"></i></a>

                                        <a href="" onclick="delInstitut('{{$institut->id}}'); "data-toggle="modal" data-target="#delInstitut"><i class="fa fa-trash-alt text-dark"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="bg-purple justify-content-center py-2 rounded-bottom d-inline-flex w-100">
                <a class="mx-3 text-white" id="items-10" href="{{route('instituts.show',10)}}"><u>10</u></a>
                <a class="mx-3 text-white" id="items-20" href="{{route('instituts.show',20)}}"><u>20</u></a>
                <a class="mx-3 text-white" id="items-50" href="{{route('instituts.show',50)}}"><u>50</u></a>
            </div>
        </div>
    </div>
{{$instituts->links()}}
</div>

@include('modals.Grup1.instituts.createInstitut')
@include('modals.Grup1.instituts.editInstitut')
@include('modals.Grup1.instituts.deleteInstitut')
@include('modals.Grup1.instituts.multipledeleteInstitut')
@include('modals.Grup1.instituts.importInstitut')
@endsection

  @section('scripts')
    <script src="{{asset('js\Grup1\custominstitut.js')}}"></script>
    <script src="{{asset('js\taula.js')}}"></script>
    <script>
        let checkedBoxes = [],
            institutid = [],
            idinstituteliminat = []

        let i = 0;

        $('.d-none#institutid').each(function () {
            institutid.push($(this).text())
        })
        //eliminar
        $(function () {
            $('.d-none#institutid').each(function () {
                institutid.push($(this).text())
            })
        });

        $('.fa.fa-edit').each(function () {
            let link = '{{ route('instituts.update', "id")}}'
            link = link.replace("id",institutid[i])
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
                idinstituteliminat.push(institutid[checkedBoxes[i]]);
            }
            if (checkedBoxes.length>0){
                $('#mformularieliminar').modal('toggle');
                idinstituteliminat.forEach(function (index){
                    content = content + ("<input type='hidden' name='id"+index+"'"+" value="+"'"+index+"'"+">");
                    i++;
                });
            }
            let link = '{{route('instituts.deleteall')}}'
            $('#submitEliminar').click(function () {
                $('#mformularieliminar').append(content)
                .attr('method', 'POST')
                .attr('action', link)
            });
        });
        $("#exportCSV").click(function () {
            window.location.href = "https://www.laravelcode.com/post/how-to-export-csv-file-in-laravel-example"
        })
    </script>
  @endsection
