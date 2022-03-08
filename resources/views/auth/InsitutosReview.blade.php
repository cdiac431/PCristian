@extends('Grup1.GestioCentral')

@section('title', 'Revisió de centres')

@section('menuG')

@if (session('alert'))
<div id="fade-out" class="alert alert-success mb-auto position-fixed w-100 rounded-0">
	{{ session('alert') }}
</div>
@endif

<div class="container overflow-hidden">
    <div class="row mt-5 mb-2">
        <div class="col-lg-12">
            <div class="bg-blue text-white py-1 px-3 rounded-top d-inline-flex w-100">
                <h3 class="mx-0 my-auto font-weight-bold">Sol·licituds de centres educatius pendents de revisió</h3>
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
                    </thead>
                    <tbody>
                    @foreach($insituto as $institut)
                            <tr class="body">
                                <td class="d-none">
                                <input class="table-checkbox" type="checkbox" onclick="">
                                </td>
                                <td id="institutid" class="d-none">{{$institut->id}}</td>
                                <td class="align-middle">{{$institut->nom}}</td>
                                <td class="align-middle">{{$institut->localitat}}</td>
                                <td class="align-middle">{{$institut->telefon}}</td>
                                <td class="align-middle">{{$institut->email}}</td>
                                <td class="align-middle"><a href="/reviewdocumentation/{{$institut->ruta_document}}" download><i class="fas fa-download"></i></a></td>
                                <td>
                                    <div class="d-flex justify-content-between">
                                        <a href="" onclick="reviewInstitut('{{$institut->id}}','{{$institut->nom}}','{{$institut->localitat}}','{{$institut->direccio}}','{{$institut->telefon}}','{{$institut->cif}}','{{$institut->email}}', '{{$institut->ruta_document}}');" data-toggle="modal" data-target="#reviewcentre"><i class="fas fa-eye text-dark"></i></a>                                        
                                    </div>
                                </td>
                            </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="bg-blue justify-content-center py-2 rounded-bottom d-inline-flex w-100">
                <a class="mx-3 text-white" id="items-10" href="{{route('instituto.pendents',10)}}"><u>10</u></a>
                <a class="mx-3 text-white" id="items-20" href="{{route('instituto.pendents',20)}}"><u>20</u></a>
                <a class="mx-3 text-white" id="items-50" href="{{route('instituto.pendents',50)}}"><u>50</u></a>
            </div>
        </div>
    </div>
{{$insituto->links()}}
</div>

<!-- Faltaria eliminar tots els de "Grup1" -->

@include('auth.ModalconfirmationReview')

@endsection

  @section('scripts')
    <script src="{{asset('js\Grup1\custominstitut.js')}}"></script>
  @endsection
