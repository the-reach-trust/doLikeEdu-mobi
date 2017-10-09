@extends('layouts.master')

@section('title', config('app.name').' - Profile')

@section('content')

	<div id="page">
		<div class="inner">
			<div class="space"></div>
			<div class="container">
				<div class="row">

					@include( 'partials.progresspanel.lg' )

					<div class="{{ get_body_class( Request::route(), true ) }}">
					
						<h3>Userid: {{ $userid }}</h3>
						<h4>Phone number: {{ $mobile_number }}</h4>

						<div class="space-2"></div>

						<div class="box-body">
							{{ Form::open([
								'method' => 'POST',
								'route' => ['profile.update']
							]) }}

							<div class="form-group has-feedback {{ $errors->has('firstname') ? 'has-error' : '' }}">
								{{ Form::label('firstname', 'What is your first name?', ['class' => 'control-label']) }}
								{{ Form::text('firstname',  old('firstname', (isset($profile) ? $profile->firstname : null)) , ['class' => 'form-control','required']) }}
								@include('partials.elems.formerrors', ['tag' => 'firstname'])
							</div>

							<div class="form-group has-feedback {{ $errors->has('lastname') ? 'has-error' : '' }}">
								{{ Form::label('lastname', 'What is your last name?', ['class' => 'control-label']) }}
								{{ Form::text('lastname',  old('lastname', (isset($profile) ? $profile->lastname : null)) , ['class' => 'form-control','required']) }}
								@include('partials.elems.formerrors', ['tag' => 'lastname'])
							</div>

							<div class="form-group has-feedback {{ $errors->has('gender') ? 'has-error' : '' }}">
								{{ Form::label('gender', 'Are you a boy or a girl?', ['class' => 'control-label']) }}
								{{ Form::select('gender', AppUser::GENDERS,  old('gender',(isset($profile->gender) ? $profile->gender : null)) , ['class' => 'form-control', 'placeholder' => 'select your gender', 'data-width' => '100%']) }}
								@include('partials.elems.formerrors', ['tag' => 'gender'])
							</div>

							<div class="form-group has-feedback {{ $errors->has('grade') ? 'has-error' : '' }}">
								{{ Form::label('grade', 'What grade are you in?', ['class' => 'control-label']) }}
								{{ Form::select('grade', AppUser::GRADES,  old('grade',(isset($profile->grade) ? $profile->grade : null)) , ['class' => 'form-control', 'placeholder' => 'select your grade', 'data-width' => '100%']) }}
								@include('partials.elems.formerrors', ['tag' => 'grade'])
							</div>

							<div class="form-group has-feedback {{ $errors->has('schoolcode') ? 'has-error' : '' }}">
								{{ Form::label('schoolcode', 'What school do you go to', ['class' => 'control-label']) }}
								{{ Form::select('schoolcode', $schools,  old('schoolcode',(isset($profile) ? $profile->schoolcode : null)) , ['class' => 'form-control', 'placeholder' => 'select your school', 'data-width' => '100%']) }}
								@include('partials.elems.formerrors', ['tag' => 'schoolcode'])
							</div>

							@if( false )
								<div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
									{{ Form::label('password', 'Password', ['class' => 'control-label']) }}
									<a href="{{ route('profile.password') }}">Change</a>
									@include('partials.elems.formerrors', ['tag' => 'password'])
							@endif

							<div class="space-3"></div>

							<div class="btn-group">
								{{ Form::submit('Save Profile', array('class' => 'btn btn-default btn-xs-sm')) }}
								<a href="{{ route('profile.password') }}" class="btn btn-default btn-xs-sm">Change Password</a>						
								<a href="{{ route('auth.logout') }}" class="btn btn-default btn-xs-sm">Log Out</a>
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