<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	@include('layouts.headers')
	<body id="management" class="bg-light d-flex flex-column">
		@include('layouts.navbar')
		@auth
			<main class="d-flex w-100 flex-grow-1">
			@include('layouts.sidebar')
		@else
			<main class="d-flex w-100 flex-grow-1 flex-column">
		@endauth
			@yield('content')
		</main>
	</body>
	@include('layouts.footer')
</html>
