@extends('layouts.master')

@section('title', config('app.name').' - Welcome')

@section('content')
	<img src="">
	<h3>Welcome</h3>

	<p>Pratice makes perfect.</p>

	<a href="{{ route('auth.register') }}" class="btn btn-info" role="button">Join DoLikeEdu</a>

	<p>Have an account?</p>
	<a href="{{ route('auth.login') }}">Click here to login</a>
	<br>
@stop
