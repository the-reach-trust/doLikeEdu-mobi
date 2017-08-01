@extends('layouts.master')

@section('title', config('app.name').' - register')

@section('content')
	<span class="space-10"></span>
    <div class="container">
		<div class="row">
			<div class="{{ config( 'front.dfltBodyClass' )}}">
				<div class="box-body">
					{{ Form::open([
						'method' => 'POST',
						'route' => ['auth.register'],
					]) }}

					@include('partials.forms.auth-register')

					{{ Form::submit('Register', array('class' => 'btn btn-primary')) }}

					{{ Form::close() }}
				</div>
				<a href="/terms">Terms</a>
			</div>
		</div>
	</div>
@stop