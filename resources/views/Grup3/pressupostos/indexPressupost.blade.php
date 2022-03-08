@extends('Grup3.GestioEmpresa')

@section('title', 'Gestió de Pressupostos - Gestió Empreses')

@section('menuG')
    <h1>Benvingut al llistat dels Pressupostos</h1>
    <div id="central" class="col-sm-6 col-sm-offset-3">
      <table class="table table-bordered table-striped" style="margin-top:20px;text-align:center;justify-content: center;">
          <thead>
              <th>Concepte</th>
              <th>Preu unitari</th>
              <th>Quantitat</th>
              <th><a href="" data-toggle="modal" data-target="#crearPressupost"><i class="fas fa-plus text-dark"></i></a></th>
          </thead>
          <tbody>
              @foreach($pressupostos as $pressupost)
                @if($pressupost->estat === 'actiu')
                      <tr> 
                        <td>{{$pressupost->nom_cost}}</td>
                        <td>{{$pressupost->preu_cost}}</td>
                        <td>{{$pressupost->quantitat_cost}}</td>
                        <td colspan="2">

                            <a href="" onclick="selPressupost('{{$pressupost->nom_cost}}','{{$pressupost->preu_cost}}','{{$pressupost->quantitat_cost}}','{{$pressupost->id}}');" data-toggle="modal" data-target="#editPressupost"><i class="fas fa-edit text-dark"></i></a>

                            <a href="" onclick="delPressupost('{{$pressupost->id}}');" data-toggle="modal" data-target="#deletePressupost"><i class="fa fa-trash-alt text-dark"></i></a>
                        </td>
                     </tr>
                  @endif
              @endforeach
            </tbody>
      </table>
      {{$pressupostos->links()}}
      
      @include('Grup3.pressupostos.createPressupost')
      @include('Grup3.pressupostos.editPressupost')
      @include('Grup3.pressupostos.deletePressupost')

      <script src="{{asset('js\grup3js\custom.js')}}"></script>
    </div>
</div
  @endsection