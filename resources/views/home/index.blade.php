@extends('layouts.master')

@section('title', config('app.name').' - Home')

@section('content')

	<!-- Welcome Modal -->
	<div id="welcomeModal" class="modal fade" tabindex="-1" role="dialog" data-show="True">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Modal Header</h4>
				</div>
				<div class="modal-body">
					<p>
						Hi, I am EDU and I am a healthy, happy, fit and smart learner. I am here to show you how to ’do like EDU’ because if you ‘do like EDU’ you will do well at school.
					</p>
					<p>
						I did not always do well at school, but a friend taught me 10 things that will make me a better learner. So now, I want to share the secret to success with you, so remember to ‘do like EDU’.
					</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Lets Go!</button>
				</div>
			</div>
		</div>
	</div>

	@include( 'partials.progresspanel.max-md' )

	<div id="page" class="bg-pattern">
		<div class="inner">
			<div class="space"></div>
			<div class="container">
				<div class="row">

					@include( 'partials.progresspanel.lg' )

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
										@if( false ) <i class="fa fa-check-circle" aria-hidden="true"></i>
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
							<a href="{{ route('pages.index') }}" class="theme-body-text">Click here for <b>TalkTo</b>Edu</a> <br/>
						</div>
						<!-- Content call -->
						<!--
						{{ print_r($content) }}
						-->
					</div>
				</div>
			</div>
			<div class="space-10"></div>
		</div>
	</div>
@stop

@if(Session::has('flash_welcome_msg') || true)
	@section('js')
		<script type="text/javascript">
			$(window).on('load',function(){
			$('#welcomeModal').modal('show');
		});
		</script>
	@stop
@endif
