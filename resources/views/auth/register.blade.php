@extends('layouts.master')

@section('title', config('app.name').' - register')

@section('content')
    <div class="container">
		<div class="row">
			<div class="col-xs-12">
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