@extends('layouts.master')

@section('title', config('app.name').' - Password')

@section('content')
	<div id="page">
		<div class="inner">
			<div class="space"></div>
			<div class="container">
				<div class="row">

					@include( 'partials.progresspanel.lg' )

					<div class="{{ get_body_class( Request::route(), true ) }}">
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

								<div class="space-3"></div>
								<div class="btn-group">
									{{ Form::submit('Save', array('class' => 'btn btn-default btn-xs-sm')) }}
								</div>

								{{ Form::close() }}
						</div>
						<div class="space-5"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="space"></div>

@stop