<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="DoLikeEdu is a mobile learning service brought to Namibian learners by the Government of Namibia." />

	<title>@yield('title', config('app.name', ''))</title>

	<link rel="shortcut icon" href="/images/favicon_32.ico" type="image/x-icon">
	<link rel="icon" href="/images/favicon_32.ico" sizes="32x32">

	@yield ('meta_tags')

	<!-- Open Meta Graph data -->
	<meta property="og:site_name" content="{{ getenv('APP_NAME') }}" />
	<meta property="og:title" content="Learn with {{ getenv('APP_NAME') }}" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="{{ URL::to('/') }}" />
	<meta property="og:image" content="{{ URL::to('/') }}/images/badge-main-transparent-large.png" />
	<meta property="og:locale" content="en_US" />
	<meta property="og:description" content="DoLikeEdu is a mobile learning service brought to Namibian learners by the Government of Namibia." />

	<!--  jquery -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<!-- Select 2 -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js" defer></script>

	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="/css/app.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<!-- Vendors -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	@if ( false )
		<link rel="stylesheet" href="/css/intlTelInput.css"> -->
		<script src="/js/intlTelInput.min.js"></script>
	@endif

	<!-- App inclusions -->
	<script src="/js/script.min.js"></script>

	<!-- Google Analytics -->
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		ga('create', '{{ env('GOOGLE_ANALYTICS') }}', 'auto');
		ga('send', 'pageview');
	</script>
</head>
<body class="{{ get_route_class( Request::route() ) }}">

	@if( config( 'front.frame' ) ) @include( 'partials.frame' ) @endif

	@if ( !empty(Request::route()) ? ( Request::route()->uri != '/' ) : true )
		<div id="branding">
			<div class="container">
				<div class="row">
					<div class="{{ get_body_class( Request::route() ) }} text-center">
						<a href="@if( Session::has('levelup_authentication') ) {{ '/home' }} @else {{ '/' }} @endif">
							<img src="/images/badge-main-transparent-header.png" width="42">
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

@yield('js')
</body>
</html>
