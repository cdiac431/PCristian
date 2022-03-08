@extends('layouts.management')

@section('styles')
<!-- ESTILS PERSONALITZATS AQUI! -->
@endsection

@section('title', 'Menu Proiectus')

@section('content')
<div class="container">
	<div id="featured-services" class="column mx-0 my-4">
			<h3 class="mb-3">Menú principal</h3>
			<hr class="mb-4"/>
			<div id="central">
				<div class="row">
					@if(auth()->user()->hasRole('Administrador'))
					<div class="col-lg-3 d-flex mb-5 mb-lg-4 bg-light">
						<a id="card" class="text-center shadow-sm bg-white text-decoration-none text-dark w-100 d-flex flex-column" href="{{route('usuaris.index')}}">
							<i class="fas fa-user-circle fa-3x mb-4"></i>
							<h4 class="text-center m-auto">Usuaris</h4>
						</a>
					</div>
					<div class="col-lg-3 d-flex mb-5 mb-lg-4 bg-light">
						<a id="card" class="text-center shadow-sm bg-white text-decoration-none text-dark w-100 d-flex flex-column" href="{{route('instituts.index')}}">
							<i class="fas fa-university fa-3x mb-4"></i>
							<h4 class="text-center m-auto">Centres Educatius</h4>
						</a>
					</div>
					<div class="col-lg-3 d-flex mb-5 mb-lg-4 bg-light">
						<a id="card" class="text-center shadow-sm bg-white text-decoration-none text-dark w-100 d-flex flex-column" href="{{route('empreses.index')}}">
							<i class="fas fa-building fa-3x mb-4"></i>
							<h4 class="text-center m-auto">Entitats</h4>
						</a>
					</div>
					@endif
					@can('categoria.view')
						<div class="col-lg-3 d-flex mb-5 mb-lg-4 bg-light">
							<a id="card" class="text-center shadow-sm bg-white text-decoration-none text-dark w-100 d-flex flex-column" href="{{route('categories.index')}}">
								<i class="fas fa-list-alt fa-3x mb-4"></i>
								<h4 class="text-center m-auto">Categories</h4>
							</a>
						</div>

					@endcan
					@can('GestioInstitut.view')
						<div id="institut" class="col-lg-3 d-flex mb-5 mb-lg-4 bg-light">
							<a id="card" class="text-center shadow-sm bg-white text-decoration-none text-dark w-100 d-flex flex-column" href="{{route('professors.index')}}">
								<i class="fas fa-user-tie fa-3x mb-4"></i>
								<h4 class="text-center m-auto">Professorat</h4>
							</a>
						</div>
						<div id="institut" class="col-lg-3 d-flex mb-5 mb-lg-4 bg-light">
							<a id="card" class="text-center shadow-sm bg-white text-decoration-none text-dark w-100 d-flex flex-column" href="{{route('alumnes.index')}}">
								<i class="fas fa-graduation-cap fa-3x mb-4"></i>
								<h4 class="text-center m-auto">Alumnat</h4>
							</a>
						</div>
						<div id="institut" class="col-lg-3 d-flex mb-5 mb-lg-4 bg-light">
							<a id="card" class="text-center shadow-sm bg-white text-decoration-none text-dark w-100 d-flex flex-column" href="{{route('grups.index')}}">
								<i class="fas fa-users fa-3x mb-4"></i>
								<h4 class="text-center m-auto">Grups</h4>
							</a>
						</div>
					@endcan
						<div id="institut" class="col-lg-3 d-flex mb-5 mb-lg-4 bg-light">
							<a id="card" class="text-center shadow-sm bg-white text-decoration-none text-dark w-100 d-flex flex-column" href="{{route('propostes.index')}}">
								<i class="fas fa-sticky-note fa-3x mb-4"></i>
								<h4 class="text-center m-auto">Propostes</h4>
							</a>
						</div>
						<div id="empresa" class="col-lg-3 d-flex mb-5 mb-lg-4 bg-light">
							<a id="card" class="text-center shadow-sm bg-white text-decoration-none text-dark w-100 d-flex flex-column" href="{{route('projectes.index')}}">
								<i class="fas fa-project-diagram fa-3x mb-4"></i>
								<h4 class="text-center m-auto">Projectes</h4>
							</a>
						</div>
					@can('GestioEmpresa.view')
						<div id="empresa" class="col-lg-3 d-flex mb-5 mb-lg-4 bg-light">
							<a id="card" class="text-center shadow-sm bg-white text-decoration-none text-dark w-100 d-flex flex-column" href="{{route('empleats.index')}}">
								<i class="fas fa-user-alt fa-3x mb-4"></i>
								<h4 class="text-center m-auto">Personal d'entitats</h4>
							</a>
						</div>
					@endcan
					</div>

				</div>


		<!-- CONTINGUT AQUI! (BORREU LES 2 DIVS PARES SI VOLEU ESTIRAR EL CONTINGUT AL 100% DE LA PAGINA) -->
    </div>
</div>
@endsection

@section('scripts')
<!-- SCRIPTS PERSONALITZATS AQUI! -->
@endsection
