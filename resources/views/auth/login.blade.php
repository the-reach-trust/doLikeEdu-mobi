@extends('layouts.master')

@section('title', config('app.name').' - Login')

@section('content')
	<span class="space-8"></span>
	<div class="container">
		<div class="row">
			<div class="{{ config( 'front.dfltBodyClass' )}}">
				<div class="box-body">
					{{ Form::open([
						'method' => 'POST',
						'route' => ['auth.login']
					]) }}

					@include('partials.forms.auth-login')

					{{ Form::submit('Login', array('class' => 'btn btn-primary')) }}

					{{ Form::close() }}
				</div>

				<a href="/terms">Terms</a>
			</div>
		</div>
	</div>
@stop