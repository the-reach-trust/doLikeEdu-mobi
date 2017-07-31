@extends('layouts.master')

@section('title', config('app.name').' - Home')

@section('content')
    <div class="box-body">
        {{ Form::open([
            'method' => 'POST',
            'route' => ['profile.update']
        ]) }}

		<div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
			{{ Form::label('name', 'name', ['class' => 'control-label']) }}
			{{ Form::text('name',  old('name', (isset($name) ? $name : null)) , ['class' => 'form-control','required']) }}
			@include('partials.elems.formerrors', ['tag' => 'name'])
		</div>

		<div class="form-group has-feedback {{ $errors->has('gender') ? 'has-error' : '' }}">
			{{ Form::label('gender', 'Gender', ['class' => 'control-label']) }}
			{{ Form::select('gender', AppUser::GENDERS, (isset($gender) ? $gender : null) , ['class' => 'form-control', 'placeholder' => 'Pick one ...']) }}
			@include('partials.elems.formerrors', ['tag' => 'gender'])
		</div>

		//drop down grade ?

		What school did you go to
		<a href="#">Link to location setup ?</a><br><br>

		<div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
			{{ Form::label('password', 'Password', ['class' => 'control-label']) }}
			{{ Form::password('password', ['class' => 'form-control','required']) }}
			@include('partials.elems.formerrors', ['tag' => 'password'])
		</div>

        {{ Form::submit('Save', array('class' => 'btn')) }}

        {{ Form::close() }}
    </div>
    <h3><a href="{{ route('auth.logout') }}">logout</a></h3>
@stop