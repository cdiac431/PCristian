@extends('layouts.management')
@section('title', 'Inici')
@section('content')
@auth

<div class="flex-column">
@endauth
@if (count($errors) > 0)
<div id="fade-out" class="alert alert-danger mb-auto position-fixed w-100 rounded-0">
	@foreach ($errors->all() as $error)
	  {{$error}}
	@endforeach
</div>
@endif

@if (session('alert'))
<div id="fade-out" class="alert alert-success mb-auto position-fixed w-100 rounded-0">
	{{ session('alert') }}
</div>
@endif

<div id="carrousel-inici" class="carousel slide" data-ride="carousel">
	<ol class="carousel-indicators">
		<li data-target="#carrousel-inici" data-slide-to="0" class="active"></li>
		<li data-target="#carrousel-inici" data-slide-to="1"></li>
		<li data-target="#carrousel-inici" data-slide-to="2"></li>
	</ol>
	<div class="carousel-inner">
		<div class="carousel-item active">
			<img class="first-slide" src="./img/carrousel1.jpg" alt="First slide" >
			<div class="container">
				<div class="carousel-caption text-left">
					<h1>Treball en equip amb <b class="text-primary">Proiectus</b></h1>
					<p>Proiectus t'ofereix totes les eines necessaries per treballar amb el teu equip.</p>
				</div>
			</div>
		</div>
		<div class="carousel-item">
			<img class="second-slide" src="./img/carrousel2.jpg" alt="Second slide">
			<div class="container">
				<div class="carousel-caption text-left">
					<h1>Plataforma colaborativa <b class="text-primary">Proiectus</b></h1>
					<p></p>
				</div>
			</div>
		</div>
		<div class="carousel-item">
			<img class="third-slide" src="./img/carrousel3.jpg" alt="Third slide">
			<div class="container">
				<div class="carousel-caption text-left">
					<h1>Resultats amb <b class="text-primary">Proiectus</b></h1>
					<p>Obté resultats sorprenents amb Proiectus!</p>
				</div>
			</div>
		</div>
	</div>
	<a class="carousel-control-prev" href="#carrousel-inici" role="button" data-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="carousel-control-next" href="#carrousel-inici" role="button" data-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div>
<!-- START THE FEATURETTES -->

<div id="featurette-inici" class="container">
	<div class="row py-5">
		<div class="col-md-7">
			<h2>Proiectus, <strong class="text-primary">El teu programari.</strong></h2>
			<p class="lead">Som una empresa innovadora que volem ajudar al creixement del nostre territori. Som reconeguts pels nostres clients com un aliat estratègic per a aconseguir els seus objectius i metes a través dels seus projectes.</p>
		</div>
		<div class="col-md-5">
			<img class="img-fluid mx-auto pb-4 pr-4" src="./img/fotoportada2.png" />
			<span class="ribbon-r bg-light">Proiectus, <strong>El teu programari.</strong></span>
		</div>
	</div>
</div>

<div class="bg-grey">
	<div id="featurette-inici"  class="container">
		<div class="row py-5">
			<div class="col-md-7 order-md-2">
				<h2>La nostra dedicació <strong class="text-primary">per a tu.</strong></h2>
				<p class="lead">Som especialistes en la formulació de projectes. T'assessorem en la preparació de subvencions per a convocatòries locals, autonòmiques, nacionals i europees. Dissenyem i impartim cursos de formació, així com organització de congressos, jornades, fires temàtiques, etc.</p>
			</div>
			<div class="col-md-5 order-md-1">
				<img class="img-fluid mx-auto pb-4 pl-4" src="./img/fotoportada3.png" />
				<span class="ribbon-l bg-light">La nostra dedicació <strong>per a tu.</strong></span>
			</div>
		</div>
	</div>
</div>
<div id="featurette-inici" class="container">
	<div class="row py-5">
		<div class="col-md-7">
			<h2>Gestiona <strong class="text-primary">Proiectus.</strong></h2>
			<p class="lead">Gestiona tot el teu voltant, realitza pressupostos per als projectes, xateja amb els teus companys, amb el nostre revolucionari programari desenvolupat a les Terres de l'Ebre.</p>
		</div>
		<div class="col-md-5">
			<img class="img-fluid mx-auto pb-4 pr-4" src="./img/fotoportada1.png">
			<span class="ribbon-r bg-light">Gestiona <strong>Proiectus</strong></span>
		</div>
	</div>
</div>




        <div class="bg-grey">
          <h1 class="text-center mb-3 pt-3">Projectes Actius</h1>
            @include('layouts.sliderListProjectes')
            </div>
          <div class=" mt-5">
                  <h1 class="text-center mb-3">Propostes Pendents</h1>
                  @include('layouts.sliderListPropostes')
          </div>

          @include('layouts.iconListEmpreses')
          @include('layouts.iconListInstituts')

		  @include('apimap');
				@include('modals.loginRedirectProposta')

        <!-- </div> -->
      </div>
	  @auth
	</div>
	@endauth
<!-- /END THE FEATURETTES -->
@endsection

@section('scripts')

<!-- Seguir desde aqui... -->
@if(session('institut'))

<script>
$(function() {
    $('#registreinstitutfinal').modal('show');
});

</script>
@endif

@if(session('empresa'))
<script>
	$(function() {
		$('#registreempresafinal').modal('show');
	});

	</script>
	@endif

<!-- potser falta el asset?! al script -->
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB0DVRKOEYwBVdSaldVM8_3i32QAKnHJ6k&callback=initMap"
type="text/javascript"></script>
<script src="{{asset('js/apimap.js')}}" type="text/javascript"></script>

@endsection
