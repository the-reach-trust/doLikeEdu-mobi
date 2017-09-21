@extends('layouts.master')

@section('title', config('app.name').' - The Basics')

@section('content')

<div id="page">
	<div class="inner">
		<div class="space"></div>
		<div class="container">
			<div class="row">

				@include( 'partials.progresspanel.lg' )

				<div class="{{ get_body_class( Request::route(), true ) }}">
					<h2>
						The Basics
					</h2>
					<h4>
						What is DoLikeEdu?
					</h4>
					<p>
						Learning has never been more fun! DoLikeEdu helps you ace your schoolwork.
					</p>
					<p>
						DoLikeEdu is a mobile learning solution that helps Namibian learners
						improve their academic performance, strengthen their social skills and
						foster good learning behaviour.
					</p>
					<h4>How can DoLikeEdu help me?</h4>
					<p>
						DoLikeEdu is modelled on schools of excellence. Namibian learners have
						access to:
					</p>
					<ul>
						<li>
							<p>
								A library of FREE curriculum-aligned content aligned with the
								Namibian Senior Secondary Certificate that is structured around
								subjects and topics for Grade 11 and 12 Mathematics, Physical
								Science and English.
							</p>
						</li>
						<li>
							<p>
								Daily quizzes that help you with your schoolwork
							</p>
						</li>
						<li>
							<p>
								An Advice section called Talk to Edu that helps you deal with a
								wide variety of everyday issues such as cope with exam stress,
								improve your time management, gives you study tips and provide
								career guidance. In addition, it features a directory of national
								support services and online tools.
							</p>
						</li>
					</ul>
					<p>
						<h4>How do I use the app?</h4>
					</p>
					<p>
						DoLikeEdu is fun and easy to use. All you have to do to access the content
						and features is to sign up is submit your contact number and create a
						password. Once you are registered you can easily move between sections
						Daily Quizzes and Advice section.
					</p>
				</div>
			</div>
		</div>
		<div class="space-12"></div>
	</div>
</div>

@stop