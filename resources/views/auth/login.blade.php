@extends('layouts.master')

@section('title', config('app.name').' - Login')

@section('content')
	<span class="space-15"></span>
	<div class="container">
		<div class="row">
			<div class="{{ get_body_class( Request::route() ) }}">
				<div class="box-body">
					{{ Form::open([
						'method' => 'POST',
						'route' => ['auth.login']
					]) }}

					@include('partials.forms.auth-login')

					<span class="space-12"></span>
					<div class="text-center">
						{{ Form::submit('Login', array('class' => 'btn btn-primary btn-lg')) }}
					</div>

					{{ Form::close() }}
				</div>

				<span class="space-4"></span>
				<div class="max-width-250 text-center">
					<p>By pressing 'Login' you agree to our <a href="/terms" class="body-text">terms &amp; conditions</p>
				</div>
			</div>
		</div>
	</div>
@stop