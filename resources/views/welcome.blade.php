@extends('layouts.master')

@section('title', config('app.name').' - Welcome')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-xs-12 text-center">
				<img src="">
				<h1>Welcome</h1>

				<span class="space-2"></span>

				<p>Pratice makes perfect.</p>

				<span class="space"></span>

				<a href="{{ route('auth.register') }}" class="btn btn-primary" role="button">Join DoLikeEdu</a>

				<span class="space-2"></span>

				<p class="mb-5">Have an account?</p>
				<a href="{{ route('auth.login') }}">Click here to login</a>
				<br>
			</div>
		</div>
	</div>	
@stop
