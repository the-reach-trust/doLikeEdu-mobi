@extends('layouts.master')

@section('title', config('app.name').' - Quiz')

@section('content')

@include( 'partials.progresspanel.lg' )

	<div id="page">
		<div class="inner">
			<div id="quizcategoriespanel">
				<div class="container">
					<div class="row">			
						<div class="{{ get_body_class() }}">
							
							<h1>Topics</h1>
							<span class="space-4"></span>
							<ul class="list quiz-categories">
								@foreach ($category->topics as $topic)
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
							<h1>Quizzes</h1>
						</div>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="{{ get_body_class() }}">
						@if ( !empty( $challenges ) )
							<table class="list quiz-list">
								@foreach ($challenges as $challenge)
									@include( 'quizzes.list-featured' )
								@endforeach
							</table>
						@else
							<!-- No Quizzes available -->
						@endif
						
					</div>
				</div>
			</div>	

			@if(sizeof($challenges) <= $challenge_count)
				<span class="space"></span>
				<div class="container">
					<div class="row">
						<div class="{{ get_body_class() }}">
							<div class="btn-group">
								@if($offset > 0)
									<a href="{{ route('quizzes.category', [$category_id,max($offset-$challenge_count,0) ]) }}" class="btn btn-default previous">Previous</a>
								@endif
								@if(sizeof($challenges) == $challenge_count)
									<a href="{{ route('quizzes.category', [$category_id,max($offset+$challenge_count,0) ]) }}" class="btn btn-default previous">Next</a>
								@endif
							</div>
						</div>
					</div>
				</div>
			@endif

			<span class="space"></span>

		</div>
	</div>
@stop