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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="/css/intlTelInput.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>	
	<script src="/js/intlTelInput.min.js"></script>

	<!-- App inclusions -->
	<script src="/js/script.min.js"></script>

	<!-- Custom styles for this template -->
	
</head>
<body class="{{ get_route_class( Request::route() ) }}">

	@if( config( 'front.frame' ) ) @include( 'partials.frame' ) @endif

	@if ( !empty(Request::route()) ? ( Request::route()->uri != '/' ) : true )
		<div id="branding">
			<div class="container">
				<div class="row">
					<div class="{{ get_body_class( Request::route() ) }} text-center">
						<a href="@if( Session::has('levelup_authentication') ) {{ '/home' }} @else {{ '/' }} @endif">
							<img src="images/badge-main-transparent-header.png" width="42">
							<span><strong>DoLike</strong>Edu</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	@endif

	@if(Session::has('levelup_authentication'))
		@include( 'layouts.nav' )
	@endif

	<div>

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

	<div>
		@yield ('content')
	</div>
	
	@if(Session::has('levelup_authentication'))
		@include('layouts.footer')
	@endif
</body>
</html>
