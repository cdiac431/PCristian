@extends('layouts.management')

@section('title', 'Gestions')

@section('content')
<div class="container">
  <div class="row mt-5 mb-5 flex-column">
    <h3>Safata d'entrada de {{auth()->user()->nom}}</h3>
    @if (count($errors) > 0)
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
    @endif
    @if(Session::has('success'))
      <div class="alert alert-success mt-5">
        <p>{{ \Session::get('success')}}</p>
      </div>
    @endif


    {{-- taula --}}
    <div class="col-lg-12 py-1 px-3 d-inline-flex w-auto h-auto mt-5">
        <table class="table border border-primary" id="table">
            <thead class="bg-red text-light">
                <tr id="table-header">
                    <th scope="col" class="text-center">
                        <div class="dropdown ml-auto d-flex d-inline-flex">
                            <input class="table-checkbox text-center" id="checkbox" type="checkbox" onclick="">
                            <i class="fas fa-sort-down pl-2" ></i>
                            <ul class="dropdown-menu m-0 striped user-select-none">
                                <li id="selectAll" class="cursor-pointer text-center dropdown-item menu-action">Seleccionar
                                    tot
                                </li>
                                <li id="unselectAll" class="cursor-pointer text-center dropdown-item menu-action">
                                    Desseleccionar tot
                                </li>
                                <li data-toggle="modal" data-target="#mdelmail" class="btn" data-toggle="modal" data-target="#mdelmail" id="deleteAll" class="cursor-pointer text-center dropdown-item menu-action">Eliminar
                                    seleccionats
                                </li>
                            </ul>
                        </div>
                    </th>
                    <th scope="col" class="text-center">Remitent</th>
                    <th scope="col" class="text-center">Assumpte</th>
                    <th scope="col" class="text-center">Data</th>
                    <th scope="col" class="text-center">
                    <a id="crear" href="#" data-toggle="modal" data-target="#crearMail"><i class="fa fa-plus text-light" aria-hidden="true"></i></a></th>
                    </tr>
                </thead>
            <tbody>
                @forelse ($mail as $row)
                <tr class="text-center" id="select">
                    <td class="d-none">{{$row->id}}</td>
                    <td scope="row">
                        <input class="table-checkbox" type="checkbox" onclick="">
                    </td>
                    <td>{{ $row->remitent }}</td>
                    <td>{{ $row->assumpte }}</td>
                    <td class="d-none">{{ $row->cos }}</td>
                    <td class="d-none">{{ $row->link_proposta }}</td>
                    <td>{{ $row->data_hora }}</td>
                    <td class="text-center"><a class="papelera" href="#" data-toggle="modal" data-target="#">
                        <div class="d-flex justify-content-between">
                            <a class="veure" href="#!" data-toggle="modal" data-target="#mostrarMail"><i class="fas fa-eye text-dark"></i></a>
                            <a class="papelera" href="#!" data-toggle="modal" data-target="#confirm-delete">
                                <i class="fa fa-trash text-dark" aria-hidden="true"></i>
                            </a>
                        </div>
                    {{--<button type="submit" data-toggle="modal" data-target="#myModal">Eliminar--}}
                    </td>
                </tr>
                @empty
                    <tr><td colspan="5">No hi ha cap email</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
  </div>
</div>
<!-- Modal de creació -->
<div class="modal fade" id="crearMail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Envia un correu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('mail.store')}}" method="POST">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label for="destinatari">Destinatari</label>
            <input type="email" class="form-control" name="destinatari" placeholder="name@example.com">
          </div>
          <div class="form-group">
            <label for="asu">Assumpte</label>
            <input type="text" class="form-control" name="asu" required>
          </div>
          <div class="form-group">
            <label for="cos">Missatge</label>
            <textarea class="form-control" name="cos" rows="3" required></textarea>
          </div>
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tancar</button>
          <button type="submit" class="btn btn-primary"  onclick="validar()">Enviar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal per mostrar email-->
<div class="modal fade" id="mostrarMail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Correu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="destinatari">Destinatari</label>
            <input type="email" class="form-control cursor-not-allowed" name="destinatari" id="destinatari" placeholder="name@example.com" disabled>
          </div>
          <div class="form-group">
            <label for="asu">Assumpte</label>
            <input type="text" class="form-control cursor-not-allowed" name="asu" id="asu" disabled>
          </div>
          <div class="form-group">
            <label for="cos">Missatge</label>
            <textarea class="form-control cursor-not-allowed" name="cos" id="cos" rows="3" disabled></textarea>
            <a id="link_proposta"></a>
            
          </div>
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary cursor-not-allowed" data-dismiss="modal">Tancar</button>
        </div>
    </div>
  </div>
</div>

{{--Modal de confirmació d'eliminació https://www.youtube.com/watch?v=I-B9TvjukLg&ab_channel=FundaOfWebIT--}}
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Eliminar correu
            </div>
            <form action="{{route('mail.destroy', 'id')}}" method="post" id="eliminarMail">
              @csrf
              @method('delete')
              <input type="hidden" name="emailEl" value="delete" id="idEliminar">
              <div class="modal-body">

                Segur que vols eliminar aquest correu?
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tornar</button>
                  <button type="submit" class="btn btn-primary">Eliminar</button>
              </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script  src="{{asset('js/Grup4/mail.js')}}" type="text/javascript"></script>
<script>
  let checkedBoxes = [],
  mailid = [],
  idmailaeliminar = []

  let i = 0;

  $('.d-none#mailid').each(function () {
      mailid.push($(this).text())
  })
  //eliminar
  $(function () {
      $('.d-none#mailid').each(function () {
          mailid.push($(this).text())
      })
  });

  $('.fa.fa-edit').each(function () {
      let link = '{{ route('mail.update', "id")}}'
      link = link.replace("id",mailid[i])
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
          idmailaeliminar.push(mailid[checkedBoxes[i]-1]);
      }
      if (checkedBoxes.length>0){
          $('#mformulari_eliminar_mail').modal('toggle');
          idmailaeliminar.forEach(function (index){
              content = content + ("<input type='hidden' name='id"+index+"'"+" value="+"'"+index+"'"+">");
              i++;
              console.log(content)
          });
          $('#mformulari_eliminar_mail').append(content);
      }
      let link = '{{route('mail.deleteall')}}'
      $('#submitEliminar').click(function () {
          $('#mformulari_eliminar_mail').attr('method', 'POST')
          $('#mformulari_eliminar_mail').attr('action', link)
      });
  });
</script>

@endsection