@extends('layouts.management')
@section('styles')
<!-- ESTILS PERSONALITZATS AQUI! -->
@endsection
@section('title', 'Proiectus Cloud')
@section('content')
<div id="gestorDocumental" class="container-fluid main-section pt-20">
	<div class="row">
		<div class="col-lg-12 col-sm-12 col-12">
			<div class="row">
				<div class="bg-grey border-bottom col-lg-12 tab-head">
					<ul class="nav">
						@foreach ($ruta as $directori)
						<li class="nav-item d-flex">
							<a class="nav-link text-secondary px-0" href="{{route('proiectuscloud.index', [($idProjecte ? $idProjecte : 0), $directori->id])}}"><i class="fa fa-folder"></i> {{ $directori->nom }}</a>
						</li>
						@endforeach

					</ul>
				</div>
				<div class="col-lg-12 main-tab">
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
							<div class="row m-0">
								<div class="border-right col-lg-4 document">
									<h5 class="pt-2 m-0 pb-2"><strong>Folders</strong></h5>
									@foreach ($directoris as $directori)
									<p class="p-0 m-0"><a href="{{route('proiectuscloud.index', [($idProjecte !== null? $idProjecte : 0), $directori->id])}}"><i class="fa fa-folder pl-2 text-secondary pr-1" aria-hidden="true"></i>{{ $directori->nom }}</a></p>
									@endforeach
									<div class="d-flex justify-content-between">
										<a href="#" class="btn btn-success btn-sm mt-2 mb-3"><i class="fa fa-plus" aria-hidden="true"></i> File Upload</a>
										<a href="#" class="btn btn-success btn-sm mt-2 mb-3"><i class="fa fa-plus" aria-hidden="true"></i> New Directory</a>
									</div>
								</div>
								<div class="col-lg-8 document-left-list">
									<div class="document-left-list-second px-3 pt-3">
										<div class="row">
											@foreach($fitxers as $fitxer)
											<div class="col-lg-4 text-center pb-3">
												<div class="document-list border">
													<i class="fa fa-file-excel-o" aria-hidden="true"></i>
													<p class="m-0 p-2 bg-danger text-white">{{ $fitxer->nom }}{{ $fitxer->extensio }} {{ $fitxer->tamany }}</p>
												</div>
											</div>
											@endforeach
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- CONTINGUT AQUI! (BORREU LES 2 DIVS PARES SI VOLEU ESTIRAR EL CONTINGUT AL 100% DE LA PAGINA) -->
@endsection
@section('scripts')
<!-- SCRIPTS PERSONALITZATS AQUI! -->
@endsection
