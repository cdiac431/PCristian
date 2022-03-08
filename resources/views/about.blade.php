@extends('layouts.management')

@section('title', 'About')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-6 py-5">
            <h1 class="cover-heading">Sobre nosaltres</h1>
            <p>Proiectus es compon d'un gran equip de 16 persones dividides amb petits equips de treball per a millorar l'eficiència de treball. Som una empresa innovadora que volem ajudar al creixement del nostre territori. Som reconeguts pels nostres clients com un aliat estratègic per a aconseguir els seus objectius i metes a través dels seus projectes.</p>
				    <p>Som especialistes en la formulació de projectes. T'assessorem en la preparació de subvencions per a convocatòries locals, autonòmiques, nacionals i europees. Dissenyem i impartim cursos de formació, així com organització de congressos, jornades, fires temàtiques, etc.</p>
            <a href="{{route('contacte')}}" class="btn btn-primary">Contacta'ns</a>
        </div>
        <div class="col-md-6 py-5">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
            	<ol class="carousel-indicators">
            		<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            		<li data-target="#myCarousel" data-slide-to="1"></li>
            		<li data-target="#myCarousel" data-slide-to="2"></li>
            	</ol>
            	<div class="carousel-inner">
            		<div class="carousel-item active">
            			<img class="first-slide" src="./images/carrousel1.webp" alt="First slide" >
            			<div class="container">
            				<div class="carousel-caption text-left">
            					<h1>Treball en equip amb <b class="text-primary">Proiectus</b></h1>
								<p>Proiectus t'ofereix totes les eines necessaries per treballar amb el teu equip.</p>
            				</div>
            			</div>
            		</div>
            		<div class="carousel-item">
            			<img class="second-slide" src="./images/carrousel2.webp" alt="Second slide">
            			<div class="container">
            				<div class="carousel-caption text-left">
            					<h1>Plataforma colaborativa <b class="text-primary">Proiectus</b></h1>
								<p></p>
            				</div>
            			</div>
            		</div>
            		<div class="carousel-item">
            			<img class="third-slide" src="./images/carrousel3.webp" alt="Third slide">
            			<div class="container">
            				<div class="carousel-caption text-left">
            					<h1>Resultats amb <b class="text-primary">Proiectus</b></h1>
								<p>Obté resultats sorprenents amb Proiectus!</p>
            				</div>
            			</div>
            		</div>
            	</div>
            	<a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
            		<span class="sr-only">Previous</span>
            	</a>
            	<a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            		<span class="carousel-control-next-icon" aria-hidden="true"></span>
            		<span class="sr-only">Next</span>
            	</a>
            </div>
        </div>
    </div>
</div>

@endsection