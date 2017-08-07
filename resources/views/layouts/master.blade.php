<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>@yield('title', config('app.name', ''))</title>

	<!-- Select 2 -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js" defer></script>

	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="/css/app.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<!-- Vendors -->
	<link rel="stylesheet" href="/css/intlTelInput.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>	
	<script src="/js/intlTelInput.min.js"></script>

	<!-- App inclusions -->
	<script src="/js/script.min.js"></script>

	<!-- Custom styles for this template -->
	
</head>
<body class="route-{{ !empty(Request::route()) ? str_replace( '/', '-', ( Request::route()->uri == '/' ) ? 'welcome' : Request::route()->uri ) : 'home' }}">
	@if ( !empty(Request::route()) ? ( Request::route()->uri != '/' ) : true )
		<div id="branding">
			<div class="container">
				<div class="row">
					<div class="{{ config( 'front.dfltBodyClass' ) }}">
						<a href="@if( Session::has('levelup_authentication') ) {{ '/home' }} @else {{ '/' }} @endif">
							<img src="https://via.placeholder.com/100x50">
							<span><strong>DoLike</strong>Edu</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	@endif

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
