@extends('layouts.master')

@section('title', config('app.name').' - Profile')

@section('content')

	<div class="container">
		<div class="row">
			<div class="{{ get_body_class() }}">
				<h3>Userid: {{ $userid }}</h3>

				<div class="box-body">
					{{ Form::open([
						'method' => 'POST',
						'route' => ['profile.update']
					]) }}

					<div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
						{{ Form::label('name', 'What is your first and last name?', ['class' => 'control-label']) }}
						{{ Form::text('name',  old('name', (isset($name) ? $name : null)) , ['class' => 'form-control','required']) }}
						@include('partials.elems.formerrors', ['tag' => 'name'])
					</div>

					<div class="form-group has-feedback {{ $errors->has('gender') ? 'has-error' : '' }}">
						{{ Form::label('gender', 'Are you a boy or a girl?', ['class' => 'control-label']) }}
						{{ Form::select('gender', AppUser::GENDERS,  old('gender',(isset($gender) ? $gender : null)) , ['class' => 'form-control', 'placeholder' => 'Pick one ...']) }}
						@include('partials.elems.formerrors', ['tag' => 'gender'])
					</div>

					<div class="form-group has-feedback {{ $errors->has('grade') ? 'has-error' : '' }}">
						{{ Form::label('grade', 'What grade are you in?', ['class' => 'control-label']) }}
						{{ Form::select('grade', AppUser::GRADES,  old('grade',(isset($grade) ? $grade : null)) , ['class' => 'form-control', 'placeholder' => 'Pick one ...']) }}
						@include('partials.elems.formerrors', ['tag' => 'grade'])
					</div>

					<div class="form-group has-feedback {{ $errors->has('school') ? 'has-error' : '' }}">
						{{ Form::label('school', 'What school do you go to', ['class' => 'control-label']) }}
						{{ Form::select('school', $schools,  old('school',(isset($school) ? $school : null)) , ['class' => 'form-control', 'placeholder' => 'Pick one ...']) }}
						@include('partials.elems.formerrors', ['tag' => 'school'])
					</div>

					<div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
						{{ Form::label('password', 'Password', ['class' => 'control-label']) }}
						<a href="{{ route('profile.password') }}">Change</a>
						@include('partials.elems.formerrors', ['tag' => 'password'])
					</div>

					{{ Form::submit('Save', array('class' => 'btn btn-primary')) }}

					{{ Form::close() }}
				</div>
				
				<h3><a href="{{ route('auth.logout') }}" class="btn btn-lg btn-primary">Log Out</a></h3>
			</div>
		</div>
	</div>
    
@stop