<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>@yield('title', config('app.name', ''))</title>

	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="/css/app.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<!-- Custom styles for this template -->
	
</head>
<body class="route-{{ !empty(Request::route()) ? str_replace( '/', '-', ( Request::route()->uri == '/' ) ? 'welcome' : Request::route()->uri ) : 'home' }}">
	<div id="branding">
		<div class="container">
			<div class="row">
				<div class="{{ config( 'front.dfltBodyClass' ) }}">
					<a href="/">
						<img src="https://via.placeholder.com/100x50">
						<span><strong>DoLike</strong>Edu</span>
					</a>
				</div>
			</div>
		</div>
	</div>

	@if(Session::has('levelup_authentication'))
		@include ('layouts.nav')
	@endif

	<div class="container">
		<div class="row">
			<div class="{{ config( 'front.dfltBodyClass' ) }}">
				@if(Session::has('flash_error'))
				<div class="alert alert-danger">
					{{ session('flash_error') }}
				</div>
				@endif

				@if(Session::has('flash_success'))
				<div class="alert alert-success">
					{{ session('flash_success') }}
				</div>
				@endif
			</div>
		</div>
	</div>

	<div>
		@yield ('content')
	</div>
	
	@if(Session::has('levelup_authentication'))
		@include('layouts.footer')
	@endif
</body>
</html>
