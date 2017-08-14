@extends('layouts.master')

@section('title', config('app.name').' - Welcome')

@section('content')
	<div class="container">
		<div class="row">
			<div class="{{ get_body_class() }} text-center">
				<figure>
					<span class="space-10"></span>
					<img src="https://via.placeholder.com/250x250">
					<span class="space-5"></span>
				</figure>

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
