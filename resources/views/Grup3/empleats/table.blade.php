
<div class="container-table100-custom">
        <div class="wrap-table100">
            <div class="botonera-table">
                <button class="btn-create" data-toggle="modal" data-target="#crear"> Crear <i class="far fa-plus-square"></i></button><button style="margin-left: 20px" class="btn-delete" id="eliminar"> Eliminar <i class="far fa-plus-square"></i></button>
            </div>
            <div class="table100 ver1">
                <div class="table100-checkbox">
                    <table>
                        <thead>
                        <th class="table100 th checkbox-th" >
                            <input class="table-checkbox" type="checkbox" id="allCheck" onclick="">
                        </th>
                        </thead>
                        <tbody>
                        @foreach($empleats as $empleat)
                        <tr class="row100 body">
                            <td class="table100 td checkbox-td">
                                <input class="table-checkbox" type="checkbox" onclick="">
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table100-firstcol">
                    <table>
                        <thead>
                        <tr class="row100 head">
                            <th class="cell100 column1">Empleats</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($empleats as $empleat)
                        <tr class="row100 body">
                          <td class="cell100 column1">
                              {{$empleat->nom}} {{$empleat->cognom}} {{$empleat->segon_cognom}}
                          </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="wrap-table100-nextcols  js-pscroll">
                    <div class="table100-nextcols">
                        <table>
                            <thead>
                            <tr class="row100 head">
                                <th class="cell100 column3">UserName</th>
                                <th class="cell100 column4">Tipus</th>
                                <th class="cell100 column5">Email</th>
                                <th class="cell100 column4">Rol</th>
                                <th class="cell100 column2">DNI</th>
                                <th class="cell100 column6">Telefon</th>
                                <th class="cell100 column8">NSS</th>
                                <th class="cell100 column8">NSS</th>
                                <th style="display:none" class="cell100 column8">Userid</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($empleats as $empleat)
                            <tr class="row100 body">
                                <td class="cell100 column2">{{$empleat->user_name}}</td>
                                <td class="cell100 column3">{{$empleat->tipus}}</td>
                                <td class="cell100 column4">{{$empleat->email}}</td>
                                <td class="cell100 column5">{{$empleat->dni}}</td>
                                <td class="cell100 column6">{{$empleat->telefon}}</td>
                                <td class="cell100 column8">{{$empleat->nss}}</td>
                                <td class="cell100 column8">{{$empleat->nss}}</td>
                                <td class="cell100 column8">{{$empleat->nss}}</td>
                                <td class="cell100 column8">{{$empleat->nss}}</td>
                                <td style="display: none" class="cell100 column8" id="userid">{{$empleat->id}}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="table100-lastcol">
                    <table>
                        <thead>
                        <tr class="row100 head">
                            <th class="cell100 column1">Editar/Eliminar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($empleats as $empleat)
                        <tr class="row100 body">
                            <td class="table100 td options">
                                <a href="" class="btn"><i class="fa fa-edit"></i></a>
                                <a href="" class="btn"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- PAGINACIÓ--}}
            <div class="row">
                <div class="col-sm-12 col-md-5">
                    <div class="dataTables_info" id="table_info" role="status" aria-live="polite">Mostrant de {{$offset}} a
                        {{$offset+$limit}}  de {{$numempleats}} empleats.</div>
                </div>
                <div class="col-sm-12 col-md-7">
                    <div class="dataTables_paginate paging_simple_numbers" id="paginacio">
                        <ul class="pagination">
                            <li class='paginate_button page-item previous disabled' id='previous'>
                                <a href='{{url("/management/Gestio-empresa/empleats/".($page-1)."/".$limit."/".($offset-$limit))}}' aria-controls='dtBasicExample' data-dt-idx='0' class='page-link'>
                                    Enrere
                                </a>
                            </li>
                            @for ($i = 1; $i<=(ceil($numempleats/$limit));$i++)
                                @if($page == $i)
                                <li class="page-item active">
                                    <a href="{{url("/management/Gestio-empresa/empleats/".$i."/".$limit."/".($offset+$limit))}}" aria-controls="dtBasicExample" data-dt-idx="{{$i+1}}" tabindex="0" class="page-link">
                                        {{$i}}
                                    </a>
                                </li>

                                    @else
                                    <li class="paginate_button page-item">
                                        <a  href="{{url("/management/Gestio-empresa/empleats/".$i."/".$limit."/".($offset+$limit))}}" aria-controls="dtBasicExample" data-dt-idx="{{$i+1}}" tabindex="0" class="page-link">
                                            {{$i}}
                                        </a>
                                    </li>
                                         @endif
                                @endfor
                            <li class="paginate_button page-item next" id="next" style="">
                                <a href='{{url("/management/Gestio-empresa/empleats/".($page+1)."/".$limit."/".($offset+$limit))}}' aria-controls="dtBasicExample" data-dt-idx="7" tabindex="0" class="page-link">
                                    Següent
                                </a>
                            </li>
                            </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


<script>
    let checkedBoxes  = [],
    userid = [],
    idusereliminat = [],
     toggleChecked = false,
        //table vars
    offset = JSON.parse({{json_encode($offset)}}),
    limit = JSON.parse({{json_encode($limit)}}),
    total = JSON.parse({{json_encode($numempleats)}}),
    pagines = Math.ceil(total/limit),
    paginaactual = JSON.parse({{json_encode($page)}}),
    previous = paginaactual-1,
    next = paginaactual+1;

    console.log('offset: '+offset+'\n'+'limit: '+limit+'\n'+'total: '+ total+ '\n' + 'total pagines: '+ pagines +`\n`+
    'pagina actual: '+ paginaactual)
    $('.js-pscroll').each(function(){
        var ps = new PerfectScrollbar(this,{
            useKeyboard:true,
            swipePropagation:true,
        });

        $(window).on('resize', function(){
            ps.update();
        })

        $(this).on('ps-x-reach-start', function(){
            $(this).parent().find('.table100-firstcol').removeClass('shadow-table100-firstcol');
        });

        $(this).on('ps-scroll-x', function(){
            $(this).parent().find('.table100-firstcol').addClass('shadow-table100-firstcol');
        });

        $(this).on('ps-x-reach-start', function(){
            $(this).parent().find('.table100-lastcol').removeClass('shadow-table100-lastcol');
        });

        $(this).on('ps-scroll-x', function(){
            $(this).parent().find('.table100-lastcol').addClass('shadow-table100-lastcol');
        });
    });
    //▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒
    $(document).ready(function (){
        let i =0;
        $('.cell100.column8#userid').each(function (){
            userid.push($(this).text())
        })

        $('.fa.fa-trash').each(function (){
        let link= '{{ route('empleats.deleteone',['pagina','limit','offset','userid'])}}'
            link = link.replace('limit', limit)
            link = link.replace('offset',offset)
            link = link.replace('userid',userid[i])
            link = link.replace('pagina',paginaactual)
            $(this).parent().attr("href", link)
            i++;
            });
        i =0;
        $('.fa.fa-edit').each(function (){
            let link= '{{url('/management/Gestio-empresa/empleats/editar/{page}/{limit}/{offset}/{id}')}}'
            link = link.replace('{limit}', limit)
            link = link.replace('{offset}',offset)
            link = link.replace('{id}',userid[i])
            link = link.replace('{page}',paginaactual)
            $(this).parent().attr("href", link)
            i++;
        });
    });



//funcio eliminar
    $('#eliminar').click(function () {
        let content = '';
        let i = 0;
       $('input.table-checkbox').each(function (index){
           if ( $(this).prop('checked') ) checkedBoxes.push(index)
           index++
        })

        for (let i = 0; i<checkedBoxes.length;i++){
            idusereliminat.push(userid[checkedBoxes[i]-1])
        }
        if (checkedBoxes.length>0){
            $('#deletemodal').modal('toggle');
            idusereliminat.forEach(function (index){
                console.log(index)
                content = content + ("<input type='hidden' name='id"+index+"'"+" value="+"'"+index+"'"+">")
                i++;
            })
            $('#eliminarform').append(content);
        }
    });
//checar totes les checkbox
    $('#allCheck').click(function (){
        if (toggleChecked){
        $('input.table-checkbox').each(function () {
            if ($(this).prop('checked')) $(this).prop('checked', false)
            })
            toggleChecked = false;
        }
            else {
            $('input.table-checkbox').each(function () {
                if (!$(this).prop('checked')) $(this).prop('checked', true)
            })
            toggleChecked = true;
                }
    });

    //confirm password crear form
    $('.btn-create').click(function () {
    $('.form-control#password, .form-control#confirm_password').on('keyup',function () {
        if ($('.form-control#password').val() === $('.form-control#confirmpassword').val()) {

            $('.btn.btn-primary#submitCrear').prop('disabled', false);

        } else {

            $('.btn.btn-primary#submitCrear').prop('disabled', true);
        }

        });

    });


    //Paginació
        if (previous<1) {
            $('#previous').attr('class','paginate_button page-item previous disabled')
        }
        else {
            $('#previous').attr('class','paginate_button page-item previous')
        }
        if (next>pagines){
            $('#next').attr('style', 'pointer-events:none; opacity:0.6;')
        }
        else {
            $('#next').attr('style', '')
        }


</script>
{{-- Modal editar--}}
@if(session()->get('user'))
    <script>
        $(window).on('load', function() {
            $('#editar').modal('show')
            //confirm password edit modal
            $('.modal.fade#editar').find('.form-control#editpassword, .form-control#editconfirm_password').on('keyup', function () {
                if ($('.form-control#editpassword').val() === $('.form-control#editconfirmpassword').val()) {

                    $('.btn.btn-primary#submitEditar').prop('disabled', false);

                } else {

                    $('.btn.btn-primary#submitEditar').prop('disabled', true);
                }
            });
            let id = JSON.parse("{{json_encode(session()->get("user.id"))}}")
            $('.modal-content form#editform').attr('action', '{{ route('empleats.update',[$page,$limit,$offset,session()->get("user.id")])}}');
        });

    </script>
@endif


