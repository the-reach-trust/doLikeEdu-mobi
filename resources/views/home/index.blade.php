@extends('layouts.master')

@section('title', config('app.name').' - Home')

@section('content')
	<div id="idprogresspanel">
		<div class="container">
			<div class="row">
				<div class="{{ config( 'front.dfltBodyClass' ) }}">
					<div class="text-center">
						<h1>Hello {{ 'name_here' }}</h1>
						<p>You're flying through the list!</p>
						<div class="row">
							<div class="col-md-4"><h3>{{ '1' }}</h3></div>
							<div class="col-md-4"><h3>{{ '1' }}</h3></div>
							<div class="col-md-4"><h3>{{ '100' }}</h3></div>
						</div>
						<div class="row">
							<div class="col-md-4"><h5>QUIZ</h5></div>
							<div class="col-md-4"><h5>POINTS</h5></div>
							<div class="col-md-4"><h5>LEVEL</h5></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="{{ config( 'front.dfltBodyClass' ) }} ">				

				<p>Here's a list of things you can do today to earn points</p>

				<div>
					<a href="{{ route('quizzes.index') }}">Finish 1 quiz</a> <br/>
					<a href="{{ route('profile.index') }}">Finish your profile</a> <br/>
					<a href="{{ route('quizzes.index') }}">Finish 2 more quizzes</a> <br/>
				</div>

				<hr>

				<!-- hardcodded for testing now -->
				<div class="text-center">
					Need some help or advice ? <br/>
					<a href="{{ route('pages.page', 1) }}">Click here for <b>TalkTo</b>Edu</a> <br/>
				</div>
				<!-- Content call -->
				<!--
				{{ print_r($content) }}
				-->
			</div>
		</div>
	</div>
@stop