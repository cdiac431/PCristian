@extends('Grup1.GestioCentral')


@section('title', 'Gestió d\'Usuari - Gestió central')

@section('styles')
    <!-- Styles Empleats -->
    <link href="{{ url('/css/Grup3/custom.css') }}" rel="stylesheet">
    <!-- Bootstrap Dropdown Hover CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap-dropdownhover.min.css')}}" crossorigin="anonymous"/>
@endsection

@section('menuG')
      @include('modals.Grup1.usuaris.createUsuari')
      @include('modals.Grup1.usuaris.editUsuari')
      @include('modals.Grup1.usuaris.deleteUsuari')
      @include('modals.Grup1.usuaris.multipledeleteUsuari')
      @include('modals.Grup1.usuaris.importUsuari')




    <div class="container overflow-hidden">
        <div class="row mt-5 mb-2">
            <div class="col-lg-12">
                <div class="bg-purple text-white py-1 px-3 rounded-top d-inline-flex w-100">
                    <div class="w-100 d-inline-flex align-self-end" >
                        <h3 class="mx-0 my-auto font-weight-bold">Llistat d'Usuaris</h3>
                        <form class="ml-auto" method="post" action="{{route('usuaris.exportCsv')}}">
                            <button title="Exportar tots" class="btn btn-primary mx-2"><i
                                    class="fas fa-download"></i>
                                @csrf
                            </button>
                        </form>
                        <button id="upload" title="Importar" class="btn btn-primary mx-2"
                                type="button" class="btn btn-info" data-toggle="modal" data-target="#uploadModal">
                            <i class="fas fa-upload"></i>
                            <br>
                        </button>
                        <button class="btn btn-primary mx-2" data-toggle="modal" data-target="#crearUsuari"><i
                                class="far fa-plus-square" title="Afegir usuari"></i></button>
                        <button title="Eliminar Seleccionat" data-toggle="modal" data-target="#mdel" id="deleteAll" data-backdrop="static"
                                data-keyboard="false" class="btn btn-primary mx-2"><i class="fa fa-trash"></i></button>
                        <div class="panel d-inline-flex ml-2">
                            <input name="cercar"
                                   id="cercarinput"
                                   class="form-control" placeholder="Cercar...">
                            <button class="fas fa-search btn-primary" id="cercar"></button>
                        </div>
                    </div>
                </div>
                <div class="overflow-scroll">
                    <table
                        class="table table-striped m-0 w-100 table-hover table-checkbox border striped user-select-none">
                        <thead>
                        <tr id="table-header">
                            <th class="text-center"> <input id="selectAll" type="checkbox"></th>
                            <th class="px-5 text-center">Nom</th>
                            <th class="text-center">Nom Usuari</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Rol</th>
                            <th class="text-center">Accions</th>
                            <th class="d-none">Userid</th>
                        </tr>
                        </thead>
                        <tbody id="tablebody">
                        @foreach($usuaris as $user)

                            <tr class="body">
                                <td class="align-middle align-content-center text-center">
                                    <input class="table-checkbox" type="checkbox" onClick="this.checked=!this.checked;">
                                </td>
                                <td class="align-middle">
                                    {{$user->nom}} {{$user->cognom}} {{$user->segon_cognom}}
                                </td>
                                <td class="align-middle">{{$user->user_name}}</td>
                                <td class="align-middle">{{$user->email}}</td>
                                <td class="align-middle">{{$user->nom_roles}}</td>
                                <td class="d-none" id="userid">{{$user->id}}</td>
                                <td>
                                    <div class="d-flex justify-content-between">
                                        <a href="" onclick="selUsuari('{{$user->tipus}}','{{$user->id}}','{{$user->nom}}','{{$user->cognom}}','{{$user->segon_cognom}}','{{$user->dni}}','{{$user->user_name}}','{{$user->email}}','{{$user->telefon}}','{{$user->data_naixement}}');" data-toggle="modal" data-target="#editUsuari" class="btn"><i class="fa fa-edit"></i></a>
                                        <a href=""  onclick="delUsuari('{{$user->id}}');" data-toggle="modal" data-target="#delUsuari" class="btn" data-toggle="modal" data-target="#deletemodal"><i
                                                class="fa fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div id="t-footer" class="text-white bg-purple justify-content-center py-2 rounded-bottom d-inline-flex w-100">
                    <a class="mx-3 text-white" id="items-10" href="{{route('usuaris.show',10)}}"><u>10</u></a>
                    <a class="mx-3 text-white" id="items-20" href="{{route('usuaris.show',20)}}"><u>20</u></a>
                    <a class="mx-3 text-white" id="items-50" href="{{route('usuaris.show',50)}}"><u>50</u></a>
                </div>
            </div>
        </div>
       <div id="paginate-results"> {{$usuaris->links()}}</div>
    </div>

@endsection
@section('scripts')
<script src="{{asset('js\Grup1\customusuari.js')}}"></script>
<script src="{{asset('js\taula.js')}}"></script>
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
                });

                $('.fa.fa-edit').each(function () {
                    let link = '{{ route('usuaris.update', "id")}}'
                    link = link.replace("id",userid[i])
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
                        idusereliminat.push(userid[checkedBoxes[i]]);
                    }
                    if (checkedBoxes.length>0){
                        content = '_'
                        idusereliminat.forEach(function (index){
                            content = content + ("<input type='hidden' name='id"+index+"'"+" value="+"'"+index+"'"+">");
                            i++;
                            console.log(content)
                        });
                        $('#inputs').html(content)
                        $('#mformulari_eliminar_user').attr('method', 'POST')
                            .attr('action', link)
                            .modal('toggle');
                    }
                });

                $(document).ready(function () {
                    let url = "{{route('usuaris.cercar')}}"
                    function fetch_cercar_data(query= ''){
                        $.ajax({
                            method: 'GET',
                            dataType: 'json',
                            data:{query:query},
                            url:url,
                            success:function (data){
                                if (typeof data.refresh !== 'undefined') {
                                window.location.href = data.refresh;
                                }
                                else{
                                $('#tablebody').html(data.tabledata);
                                $('#paginate-results').addClass("d-none");
                                $('#t-footer').html('<p>Mostrant '+data.count+' resultats</p>');
                                }
                            },
                            error:function (xhr, ajaxOptions, thrownError) {
                                if (xhr.status === 404 || xhr.status === 500) {
                                    alert(thrownError);
                                }
                            }
                        })
                    }
                    $('#cercar').click( function () {
                        let query = $('#cercarinput').val();
                        fetch_cercar_data(query);
                    });
                });

</script>
@endsection
