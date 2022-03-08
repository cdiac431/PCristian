<header>
	@if (!auth()->user())
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">

        <a class="navbar-brand" href="{{route('home')}}">
        @else
{{--        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-purple">--}}
			@role('Administrador')
			<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-purple">
			@endrole
			@role('Gestor Institut')
			<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-blue2">
			@endrole
			@role('Gestor Empresa')
			<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-green">
			@endrole
			@role('Professor')
			<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-blue2">
			@endrole
			@role('Alumne')
			<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-blue2">
			@endrole
			@role('Empleat')
			<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-green2">
			@endrole
        <a class="navbar-brand" href="{{route('management')}}">
        @endif
			<!-- Logo -->
			<img src="/img/logoproiectus.png" width="30" height="30" class="d-inline-block align-top" alt="">
			<span class="ml-1">Proiectus</span>

		</a>
		@if (!auth()->user())
		<a class="navbar-brand">
			<button data-toggle="modal" data-target="#registreempresa" class="btn btn-outline-primary my-2 my-sm-0" type="submit">Adherir-se com a Entitat</button>
		</a>

		<a>
			<button data-toggle="modal" data-target="#registreinstitut" class="btn btn-outline-primary my-2 my-sm-0" type="submit">Adherir-se com a Institut</button>
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarCollapse">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item ">
					<a class="nav-link {{request()->routeIs('home') ? 'active' : ''}}" href="{{route('home')}}">Inici <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link {{request()->routeIs('blogs.index') ? 'active' : ''}}" href="{{route('blogpublic')}}">Blog</a>
				</li>
				<li class="nav-item">
					<a class="nav-link {{request()->routeIs('about') ? 'active' : ''}}" href="{{route('about')}}">Equip</a>
				</li>
				<li class="nav-item">
					<a class="nav-link {{request()->routeIs('faqs') ? 'active' : ''}}" href="{{route('faqs')}}">FAQs</a>
				</li>
				<li class="nav-item">
					<a class="nav-link {{request()->routeIs('contacte') ? 'active' : ''}}" href="{{route('contacte')}}">Contacte</a>
				</li>
			</ul>
			<button data-toggle="modal" data-target="#login" class="btn btn-outline-primary my-2 my-sm-0" type="submit">Login</button>
		</div>
		@endif
		<!-- MANAGEMENT -->
		@auth


		<div class="ml-auto" >
			<ul class="list-inline m-0">
				<li class="list-inline-item" id="buscador">
					{{-- <form method=GET action="">
						<table>
								<tr>
									<td>
										<input class="form-control2" TYPE=text name=q size=20 maxlength=255 placeholder="Busca a Proiectus">
										<input TYPE=hidden name=hl value=es >
										<button type=submit class="btn" id="search" title="Busca a Proiectus">
											<i class="fas fa-search text-primary fa-fw" aria-hidden="true"></i>
										</button>
									</td>
								</tr>
							</table>
					</form> --}}

				</li>

				<li class="list-inline-item">
					<a href="" title="Notificacions"><i class="icon fas fa-bell text-primary fa-fw" aria-hidden="true"></i></a>
				</li>

				<li class="list-inline-item text-primary">
					<a href="{{route('mail.index')}}" title="Accedeix al correu">
						<i class="icon fas fa-envelope text-primary fa-fw"></i>
					</a>

					@foreach ($mailNotificacio as $notify)
						@if($notify->destinatari == auth()->user()->email)
							<span id="puntRoig"></span>
							@break
						@endif
					@endforeach

				</li>
				<li class="list-inline-item">
					<a href="{{route('chat.index',1)}}" title="Accedeix al xat"><i class="icon fa fa-comment text-primary fa-fw" aria-hidden="true"></i></a>
				</li>
				<li class="list-inline-item">
					<a href="{{route('incidencies.index')}}" title="Accedeix al gestor de les incidències"><i class="icon fas fa-exclamation-triangle text-primary fa-fw"></i></a>
				</li>


				<li id="profile" class="list-inline-item cursor-pointer"> <!-- perfilavatar -->
					<div class="d-flex align-items-center">
						<span class="text-capitalize text-white">{{ auth()->user()->user_name }}</span>
						<img class="mx-2 rounded-circle" src="{{asset('avatars/' . auth()->user()->ruta_avatar)}}" width="40px" height="40px"/>
						<i class="fas fa-chevron-down text-primary"></i>
					</div>
				</li>
			</ul>
			<!-- MANAGEMENT PROFILE DROPDOWN -->
			<div id="avatar-dropdown" class="dropdown-menu dropdown-menu-right align-tr-br" >
				<a href="{{route('tauler')}}" class="dropdown-item menu-action">
					<i class="icon fa fa-tachometer fa-fw " aria-hidden="true"></i>
					<span class="menu-action-text pl-2" id="actionmenuaction-1">Tauler</span>
				</a>
				<a href="{{route('management')}}" class="dropdown-item menu-action">
					<i class="icon fa fa-tasks fa-fw " aria-hidden="true"></i>
					<span class="menu-action-text pl-2" id="actionmenuaction-2">Menú principal</span>
				</a>
				<div class="dropdown-divider" role="presentation"><span class="filler">&nbsp;</span></div>
				<a href="{{route('perfil.user')}}" class="dropdown-item menu-action">
					<i class="icon fa fa-user fa-fw " aria-hidden="true"></i>
					<span class="menu-action-text pl-2" id="actionmenuaction-2">Perfil</span>
				</a>
				<div class="dropdown-divider" role="presentation"><span class="filler">&nbsp;</span></div>
				<a href="{{route('logout')}}" class="dropdown-item menu-action" >
					<i class="icon fa fa-sign-out fa-fw " aria-hidden="true"></i>
					<span class="menu-action-text pl-2" id="actionmenuaction-6">Surt</span>
				</a>
			</div>
		</div>
		@endauth
	</nav>

	@if(!auth()->user())
		@include('modals.login')
		@include('modals.registreempresa')
		@include('modals.registreinstitut')
	@endif
</header>
