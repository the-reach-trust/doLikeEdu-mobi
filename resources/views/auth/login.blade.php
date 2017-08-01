@extends('layouts.master')

@section('title', config('app.name').' - Login')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="box-body">
					{{ Form::open([
						'method' => 'POST',
						'route' => ['auth.login']
					]) }}

					@include('partials.forms.auth-login')

					{{ Form::submit('Login', array('class' => 'btn')) }}

					{{ Form::close() }}
				</div>

				<a href="/terms">Terms</a>
			</div>
		</div>
	</div>
@stop