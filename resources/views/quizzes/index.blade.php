@extends('layouts.master')

@section('title', config('app.name').' - Quiz')

@section('content')

	@include( 'partials.progresspanel.lg' )
	
	<div id="page" class="wider">
		<div class="inner">
			<div id="quizcategoriespanel">
				<div class="container">
					<div class="row">			
						<div class="{{ get_body_class() }}">
							<h1>Quiz categories</h1>
							<span class="space-4"></span>
							<ul class="list quiz-categories">
								@foreach ($categories as $category)
									@include( 'quizzes.list-category' )
								@endforeach
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="pattern-title">
				<div class="container">
					<div class="row">
						<div class="{{ get_body_class() }}">				
							<h1>Featured quizzes</h1>
						</div>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="{{ get_body_class() }}">
						@if ( !empty( $challenges_featured ) )
							<table class="list quiz-list">
								@foreach ($challenges_featured as $challenge)
									@include( 'quizzes.list-featured' )
								@endforeach
							</table>
						@else
							<!-- No Quizzes available -->
						@endif
						
					</div>
				</div>
			</div>
			<div class="space"></div>
		</div>
	</div>
@stop