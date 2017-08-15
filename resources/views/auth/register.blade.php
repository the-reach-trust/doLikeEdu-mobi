@extends('layouts.master')

@section('title', config('app.name').' - register')

@section('content')
	<span class="space-10"></span>
    <div class="container">
		<div class="row">
			<div class="{{ get_body_class( Request::route() ) }}">
				<div class="box-body">
					{{ Form::open([
						'method' => 'POST',
						'route' => ['auth.register'],
					]) }}

					@include('partials.forms.auth-register')

					<span class="space-7"></span>
					<div class="text-center">
						{{ Form::submit('Join DoLikeEdu', array('class' => 'btn btn-primary btn-lg')) }}						
					</div>

					{{ Form::close() }}

					<span class="space-4"></span>
					<div class="text-center">
						<p class="mb-0">Have an account?</p>
						<a href="{{ route('auth.login') }}" class="body-text">Click here to login</a>

						<span class="space-5"></span>
					</div>
					<div class="max-width-250 text-center">
						<p>By pressing 'Join DoLikeEdu' you agree to our <a href="/terms" class="body-text">terms &amp; conditions</a>.
						</p>
					</div>
				</div>
				
			</div>
		</div>
	</div>
@stop