@extends('layouts.master')

@section('title', config('app.name').' - Home')

@section('content')
	@include( 'partials.progresspanel.max-md' )

	<div class="container">
		<div class="row">

			@if( config( 'front.progressiveDesktop' ) ) @include( 'partials.progresspanel.lg' ) @endif
			<div class="{{ get_body_class( Request::route(), true ) }}">
				@if($dailys_complete)
					<p class="text-center">
						<img src="https://via.placeholder.com/175x200"> <br/>
						<b>You finished all of today's featured quizzes. Nice work!</b> <br/>
						<a href="{{ route('quizzes.index') }}">Click here if you want to do a few more.</a>
					</p>
				@else
					<p>Here's a list of things you can do today to earn points</p>

					<div>
						<a href="{{ route('quizzes.index') }}">Finish 1 quiz</a> <br/>
						<a href="{{ route('profile.index') }}">Finish your profile</a> <br/>
						<a href="{{ route('quizzes.index') }}">Finish 2 more quizzes</a> <br/>
					</div>
				@endif

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