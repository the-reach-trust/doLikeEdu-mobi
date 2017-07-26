<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>@yield('title', config('app.name', ''))</title>

	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<!-- Custom styles for this template -->
	
</head>
<body class="container-fluid">
	@include ('layouts.nav')

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
	
	@include('layouts.footer')
</body>
</html>
