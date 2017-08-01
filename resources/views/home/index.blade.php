@extends('layouts.master')

@section('title', config('app.name').' - Home')

@section('content')
	<div class="container">
		<div class="row"></div>
			<div class="{{ config( 'front.dfltBodyClass' ) }} ">
				<div>
					Hello {{ 'name_here' }}
					<p>You're flying through the list!</p>
					<div class="row">
						<div class="col-md-4"> {{ '1' }} </div>
						<div class="col-md-4"> {{ '1' }} </div>
						<div class="col-md-4"> {{ '100' }} </div>
					</div>
					<div class="row">
						<div class="col-md-4">QUIZ</div>
						<div class="col-md-4">POINTS</div>
						<div class="col-md-4">LEVEL</div>
					</div>
				</div>

				<p>Here's a list of things you can do today to earn points</p>

				<div>
					<a href="{{ route('quizzes.index') }}">Finish 1 quiz</a> <br/>
					<a href="{{ route('profile.index') }}">Finish your profile</a> <br/>
					<a href="{{ route('quizzes.index') }}">Finish 2 more quizzes</a> <br/>
				</div>

				<hr>

				<!-- hardcodded for testing now -->
				<div>
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