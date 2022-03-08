@section('styles')
<!-- ESTILS PERSONALITZATS AQUI! -->

<style>
#map {
        height: 500px;
        width: 100%;
        margin-bottom: 10%;
}
</style>

@endsection

@foreach ($empresas as $empresa)

        <p class="d-none nomE">{{$empresa->nom}}</p>
        <p class="d-none latE">{{$empresa->lat}}</p>
        <p class="d-none lonE">{{$empresa->lon}}</p>

@endforeach

@foreach ($institutos as $institut) 

        <p class="d-none nomI">{{$institut->nom}}</p>
        <p class="d-none latI">{{$institut->lat}}</p>
        <p class="d-none lonI">{{$institut->lon}}</p>

@endforeach

<div class='bg-grey p-5 text-center'>

        <h1 class="bg-grey text-center pb-3">Localització d'Entitats i Centres Educatius</h1>
        
        <div class="row justify-content-center mr-auto ml-auto">

                <div id ="map">
                       
                </div>
        </div>
</div>



        
 
</div>
