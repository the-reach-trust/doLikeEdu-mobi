@extends('layouts.master')

@section('title', config('app.name').' - Home')

@section('content')
	@include( 'partials.progresspanel.max-md' )

	<div class="container page-container">
		<div class="row">

			@if( config( 'front.progressiveDesktop' ) ) @include( 'partials.progresspanel.lg' ) @endif
			<div class="{{ get_body_class( Request::route(), true ) }}">
				@if( $dailys_complete )
					<div class="text-center">
						<img src="images/icon-balloon.png" width="200"> <br/>
						<p class="h2">You finished all of today's featured quizzes. Nice work!</p>
						<a href="{{ route('quizzes.index') }}" class="theme-primary">Click here if you want to do a few more.</a>
					</div>
				@else
					<p class="text-center">Here's a list of things you can do today to earn points.</p>
					<span class="space-2"></span>
					<div class="list earn-points">
						<a href="{{ route('quizzes.index') }}">
							<figure>
								@if( true ) <i class="fa fa-check-circle" aria-hidden="true"></i>
								@else &nbsp; @endif
							</figure>
							<span class="h2">Finish 1 quiz</span>
						</a>
						<a href="{{ route('profile.index') }}">
							<figure>
								@if( false ) <i class="fa fa-check-circle" aria-hidden="true"></i>
								@else &nbsp; @endif
							</figure>
							<span class="h2">Finish your profile</span>
						</a>
						<a href="{{ route('quizzes.index') }}">
							<figure>
								@if( false ) <i class="fa fa-check-circle" aria-hidden="true"></i>
								@else &nbsp; @endif
							</figure>
							<span class="h2">Finish 2 more quizzes</span>
						</a>
					</div>
				@endif

				<span class="space-5"></span>

				<!-- hardcodded for testing now -->
				<div class="text-center">
					Need some help or advice ? <br/>
					<a href="{{ route('pages.page', 1) }}" class="theme-body-text">Click here for <b>TalkTo</b>Edu</a> <br/>
				</div>
				<!-- Content call -->
				<!--
				{{ print_r($content) }}
				-->
			</div>
		</div>
	</div>
@stop