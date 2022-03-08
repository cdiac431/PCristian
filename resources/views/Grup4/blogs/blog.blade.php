@extends('Grup4.GestioXarxes')

@section('title', 'Blog Proiectus')

@section('styles')
    <!-- Styles Empleats -->
    <link href="{{ url('/css/Grup4/custom.css') }}" rel="stylesheet">
    <!-- Bootstrap Dropdown Hover CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap-dropdownhover.min.css')}}" crossorigin="anonymous"/>
@endsection

@section('menuG')
      @include('Grup4.blogs.createPost')
      @include('Grup4.blogs.editPost')
      @include('Grup4.blogs.deletePost')
      @include('Grup4.blogs.multipledeletePost')

<head>

  {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css"> --}}
</head>

<div class="container d-none">
  <h1>CRUD Blog</h1>
  {{-- <h3>Safata d'entrada de {{auth()->post()->titol}}</h3> --}}
   @if (count($errors) > 0)
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
      </ul>
    </div>
  @endif

  @if(\Session::has('success'))
    <div class="alert alert-success">
      <p>{{ \Session::get('success')}}</p>
    </div>
  @endif

</div>

  {{-- Final de modal de creacio de blog --}}
  <div class="container overflow-hidden">
    <div class="row mt-5 mb-2">
      <div class="col-lg-12">
        <div class="bg-red text-white py-1 px-3 rounded-top d-inline-flex w-100">
          <h3 class="mx-0 my-auto font-weight-bold">Llista de posts</h3>
          <div class="dropdown ml-auto">
            <button class="btn btn-danger mr-2" id="eliminar"> Acció múltiple <i class="fa fa-caret-down" aria-hidden="true"></i></button>
            <ul class="dropdown-menu m-0 striped post-select-none">
              <li id="selectAll" class="cursor-pointer text-center dropdown-item menu-action">Seleccionar tot </li>
              <li id="unselectAll" class="cursor-pointer text-center dropdown-item menu-action"> Desseleccionar tot </li>
              <li data-toggle="modal" data-target="#mdel" id="deleteAll" data-backdrop="static"  class="btn cursor-pointer text-center dropdown-item menu-action">Eliminar seleccionats </li>    
            </ul>
          </div>
          <button class="btn btn-primary" data-toggle="modal" data-target="#crearPost"><i class="far fa-plus-square"></i></button>
        </div>
          <div class="overflow-scroll">
            <table class="table table-striped m-0 w-100 table-hover table-checkbox border striped post-select-none">
              <thead>
                <tr id="table-header">
                  <th class="px-5 text-center"></th><!-- Aqui aniran les imatges-->
                  <th class="text-center">Titol</th>
                  <th class="text-center">Entradeta</th>
                  <th class="text-center">Ultima modificació</th>
                  <th class="text-center">Accions</th>
                  <th class="d-none">blogid</th>
                </tr>
              </thead>
                <tbody>
                  @foreach($post ?? '' as $row)
                  <tr class="body">
                    <td class="d-none"> <input class="table-checkbox" type="checkbox" onclick=""> </td>
                    <!-- fer classe per la imag -->
                    <td class="align-middle "><img class= "rounded" src="{{asset('portadaPost/'.$row->ruta_blog)}}" alt="imagBlog"  width= 200px height=125px></td>
                    <td class="align-middle"> {{$row->titol}}</td>
                    <td class="align-middle">{{$row->entradeta}}</td>
                    <td class="align-middle">{{$row->data}}</td>
                    <td class="d-none" id="postid">{{$row->id}}</td>
                    <td>
                    <div class="d-flex justify-content-between">
                      <a href="" onclick="editPost('{{$row->id}}','{{$row->titol}}','{{$row->entradeta}}','{{$row->contingut}}','{{$row->ruta_blog}}');" data-toggle="modal" data-target="#editPost" class="btn"><i class="fa fa-edit"></i></a>
                      <a href="" onclick="elimPost('{{$row->id}}','{{$row->titol}}');" data-toggle="modal" data-target="#delPost" class="btn" data-toggle="modal" data-target="#delPost"><i class="fa fa-trash"></i></a>
                    </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
            </table>
          </div>
          <div class="bg-red justify-content-center py-2 rounded-bottom d-inline-flex w-100">
            <a class="mx-3 text-white" id="items-10" href="{{route('blogs.show',10)}}"><u>10</u></a>
            <a class="mx-3 text-white" id="items-20" href="{{route('blogs.show',20)}}"><u>20</u></a>
            <a class="mx-3 text-white" id="items-50" href="{{route('blogs.show',50)}}"><u>50</u></a>
        </div>
      </div>
    </div>
{{$post ?? ''->links()}}
  </div>

  {{-- MODALS --}}


      {{-- Modal per a eliminar blogs class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"--}}
      <div class="modal fade" id="eliminarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Eliminar post</h5>
              <button type="button" class="close" data-dismiss="modalEdit" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

          <form action="{{ route('blogs.destroy', $id ?? 'idaeleiminar') }}" method="POST" id="formularieliminar" >
            @csrf
            @method('delete')

            <div class="modal-body">

              <input type="hidden" id="blog_id_elim" name="blog_id_elim">
              <p>Estas segur d'eliminar aquest Post?</p>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Sortir</button>
              <button type="submit" class="btn btn-success edit">Si! Vull eliminar les dades</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    {{-- Principi del modal --}}

    {{-- Final del modal --}}




@endsection
@section('scripts')
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
  CKEDITOR.replace('contingut');
</script>
<script>
  CKEDITOR.inline('contingute');
</script>
<script src="{{asset('js\Grup4\custompost.js')}}"></script>
<script>
  let checkedBoxes = [],
      postid = [],
      idposteliminat = []

  let i = 0;

  $('.d-none#postid').each(function () {
      postid.push($(this).text())
  })
  //eliminar
  $(function () {
      $('.d-none#postid').each(function () {
         postid.push($(this).text())
      })
  });

  $('.fa.fa-edit').each(function () {
      let link = '{{ route('blogs.update', "id")}}'
      link = link.replace("id",postid[i])
      $(this).parent().attr("href", link)
      i++;
  });

  //funcio eliminar
  $('#deleteAll').click(function () {
      let content = '';
      let i = 0;
      let link = '{{route('usuaris.deleteall')}}'; //modificar la ruta
      checkedBoxes = [];
      idposteliminat = [];
      $('table input.table-checkbox').each(function (index){
          if ( $(this).prop('checked') ) checkedBoxes.push(index);
          index++;
      });
      for (let i = 0; i<checkedBoxes.length;i++){
        idposteliminat.push(postid[checkedBoxes[i]-1]);
      }
      if (checkedBoxes.length>0){
          content = '_'
          idposteliminat.forEach(function (index){
              content = content + ("<input type='hidden' name='id"+index+"'"+" value="+"'"+index+"'"+">");
              i++;
              console.log(content)
          });
          $('#inputs').html(content)
          $('#mformulari_eliminar_post').attr('method', 'POST')
              .attr('action', link)
              .modal('toggle');
      }
  });










</script>
@endsection