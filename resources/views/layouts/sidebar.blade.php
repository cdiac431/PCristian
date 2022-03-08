<!-- Sidebar -->
<nav id="sidebar">
	<div id="main-menu">
		<div class="sidebar-header text-center" id="sidebar-header">
			@role('Administrador')
				<h3 class="text-center text-light">Menú Admin {{auth()->user()->nom}}</h3>
			@endrole

			@if( Auth::user()->hasRole('Gestor Institut') )
				<h3 class="c-default text-light"> Menú Gestor Institut <strong>{{auth()->user()->nom}}</strong></h3>
			@endif

			@if( Auth::user()->hasRole('Gestor Empresa') )
				<h3 class="c-default text-light"> Menú Gestor Empresa <strong>{{auth()->user()->nom}}</strong></h3>
			@endif

			@if( Auth::user()->hasRole('Professor') )
				<h3 class="c-default text-light"> Menú Professorat <strong>{{auth()->user()->nom}}</strong></h3>
			@endif

			@if( Auth::user()->hasRole('Alumne') )
				<h3 class="c-default text-light"> Menú Alumnat <strong>{{auth()->user()->nom}}</strong></h3>
			@endif

			@if( Auth::user()->hasRole('Empleat') )
				<h3 class="c-default text-light"> Menú Participant al projecte <strong>{{auth()->user()->nom}}</strong></h3>
			@endif
			<iframe id="myframe" class="mt-3" src="https://duckduckgo.com/search.html?width=140&site=dev.uniproject.cat&prefill=Busca a Proiectus" style="overflow:hidden;margin:0;padding:0;width:200px;height:40px;" frameborder="0"></iframe>

		</div>
		<ul class="list-unstyled components">
			<li class="normal la {{request()->routeIs('home') ? 'active' : ''}}"><a  href="{{route('home')}}"><i class="icon fas fa-home mr-3" aria-hidden="true"></i>Inici</a></li>
			<li class="normal la {{request()->routeIs('tauler') ? 'active' : ''}}"><a  href="{{route('tauler')}}"><i class="icon fa fa-tachometer fa-fw mr-3" aria-hidden="true"></i>Tauler</a></li>
			<li class="bg-red {{request()->routeIs('blogs.index') ? 'active' : ''}}"><a  href="{{route('blogs.index')}}"><i class="icon fab fa-blogger-b mr-3" aria-hidden="true"></i>Blog</a></li>
			@role('Administrador')
				<li class="central {{request()->routeIs('usuaris.index','instituts.index','empreses.index', 'categories.index') ? 'active' : ''}}" >
					<a href="#GCentral" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-lock fa-fw mr-3"></i>Gestió Central</a>
					<ul class="collapse list-unstyled" id="GCentral">
						<li class="{{request()->routeIs('usuaris.index') ? 'active' : ''}}">
							<a href="{{route('usuaris.index')}}"><i class="fas fa-user-circle pr-2"></i> Usuaris</a>
						</li>
						<li class="{{request()->routeIs('categories.index') ? 'active' : ''}}">
							<a href="{{route('categories.index')}}"><i class="fas fa-list-alt pr-2"></i>Categories</a>
						</li>
						<li class="{{request()->routeIs('propostes.index') ? 'active' : ''}}"><a href="{{route('propostes.index')}}"><i class="fas fa-sticky-note pr-2"></i>Propostes</a></li>
						<li class="{{request()->routeIs('projectes.index') ? 'active' : ''}}">
							<a href="{{route('projectes.index')}}"><i class="fas fa-project-diagram pr-2"></i>Projectes</a>
						</li>
					</ul>
				</li>
			@endrole
			@can('GestioInstitut.view')
			<li class="interna {{request()->routeIs('professors.index','alumnes.index','grups.index', 'propostes.index') ? 'active' : ''}}">
				<a href="#GInterna" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-school fa-fw mr-3"></i>Centres Educatius</a>
				<ul class="collapse list-unstyled" id="GInterna">
					@role('Administrador')
						<li class="{{request()->routeIs('instituts.index') ? 'active' : ''}}">
							<a href="{{route('instituts.index')}}"><i class="fas fa-school pr-2"></i>Llista de Centres</a>
						</li>

						<li class="{{request()->routeIs('instituto.pendents') ? 'active' : ''}}">
							<a href="{{route('instituto.pendents')}}"><i class="fas fa-building pr-2"></i>Revisió de registre de Centre</a>
						</li>
					@endrole
					<li class="{{request()->routeIs('professors.index') ? 'active' : ''}}">
						<a href="{{route('professors.index')}}"><i class="fas fa-user-tie pr-2"></i>Professorat</a>
					</li>
					<li class="{{request()->routeIs('alumnes.index') ? 'active' : ''}}">
						<a href="{{ route('alumnes.index') }}"><i class="fas fa-graduation-cap pr-2"></i>Alumnat</a>
					</li>
					<li class="{{request()->routeIs('grups.index') ? 'active' : ''}}">
						<a href="{{route('grups.index')}}"><i class="fas fa-users pr-2"></i>Grups</a>
					</li>
					@role('Gestor Institut')
					<li class="{{request()->routeIs('categories.index') ? 'active' : ''}}">
						<a href="{{route('categories.index')}}"><i class="fas fa-list-alt pr-2"></i>Categories</a>
					</li>
					@endrole
					@if(auth()->user()->hasRole('Gestor Institut')||auth()->user()->hasRole('Professor')||auth()->user()->hasRole('Alumne') )
					<li class="{{request()->routeIs('propostes.index') ? 'active' : ''}}"><a href="{{route('propostes.index')}}"><i class="fas fa-sticky-note pr-2"></i>Propostes</a></li>
					<li class="{{request()->routeIs('projectes.index') ? 'active' : ''}}">
						<a href="{{route('projectes.index')}}"><i class="fas fa-project-diagram pr-2"></i>Projectes</a>
					</li>
					@endif
				</ul>
			</li>
			@endcan
			@can('GestioEmpresa.view')
			<li class="empresa {{request()->routeIs('projectes.index','empleats.index') ? 'active' : ''}}">
				<a href="#GEmpresa" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-building fa-fw mr-3"></i>Entitats</a>
				<ul class="collapse list-unstyled" id="GEmpresa">
					@role('Administrador')
					<li class="{{request()->routeIs('empreses.index') ? 'active' : ''}}">
						<a href="{{route('empreses.index')}}"><i class="fas fa-building pr-2"></i>Llistat d'Entitats</a>
					</li>

					<li class="{{request()->routeIs('empreses.pendents') ? 'active' : ''}}">
						<a href="{{route('empreses.pendents')}}"><i class="fas fa-building pr-2"></i>Revisió de registre d'entitats</a>
					</li>

					@endrole

					@role('Gestor Empresa')
					<li class="{{request()->routeIs('categories.index') ? 'active' : ''}}">
						<a href="{{route('categories.index')}}"><i class="fas fa-list-alt pr-2"></i>Categories</a>
					</li>
					@endrole
					<li class="{{request()->routeIs('empleats.index') ? 'active' : ''}}">
						<a href="{{route('empleats.index')}}"><i class="fas fa-user-alt pr-2"></i>Personal d'Entitats</a>
					</li>

					@if(auth()->user()->hasRole('Gestor Empresa')||auth()->user()->hasRole('Empleat'))
					<li class="{{request()->routeIs('propostes.index') ? 'active' : ''}}"><a href="{{route('propostes.index')}}"><i class="fas fa-sticky-note pr-2"></i>Propostes</a></li>

					<li class="{{request()->routeIs('projectes.index') ? 'active' : ''}}">
						<a href="{{route('projectes.index')}}"><i class="fas fa-project-diagram pr-2"></i>Projectes</a>
					</li>
					@endif
				</ul>
			</li>
			@endcan
		</ul>
	</div>
</nav>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
$('#myframe').contents().find("head")
   .append($("<style type='text/css'>  #cuadro{	background: url('https://image.flaticon.com/icons/png/512/57/57477.png') no-repeat !important;}  </style>"));
	</script>

