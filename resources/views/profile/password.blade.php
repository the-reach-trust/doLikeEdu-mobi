@extends('layouts.master')

@section('title', config('app.name').' - Password')

@section('content')

	<div class="container">
		<div class="row">
			<div class="{{ get_body_class() }}">

				<div class="box-body">
					{{ Form::open([
						'method' => 'POST',
						'route' => ['profile.password']
					]) }}

					<div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
						{{ Form::label('password', 'Password', ['class' => 'control-label']) }}
						{{ Form::password('password', ['class' => 'form-control','required']) }}
						@include('partials.elems.formerrors', ['tag' => 'password'])
					</div>

					<div class="form-group has-feedback {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
						{{ Form::label('password_confirmation', 'Password Confirm', ['class' => 'control-label']) }}
						{{ Form::password('password_confirmation', ['class' => 'form-control','required']) }}
						@include('partials.elems.formerrors', ['tag' => 'password_confirmation'])
					</div>

					{{ Form::submit('Save', array('class' => 'btn btn-primary')) }}

					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
    
@stop