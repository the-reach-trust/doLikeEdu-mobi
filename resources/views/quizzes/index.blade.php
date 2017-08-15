@extends('layouts.master')

@section('title', config('app.name').' - Quiz')

@section('content')

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
	<div class="container">
		<div class="row">
			<div class="{{ get_body_class() }}">				
				<h3>Featured quizzes</h3>
				@if ( !empty( $challenges_featured ) )
					<table class="list quiz-list">
						@foreach ($challenges_featured as $challenge)
							<tr>
								<td>
									<a class="" title="" href="{{ route('quizzes.quiz', $challenge->id) }}">
										<figure>
											<img src="{{ !empty($pages[$challenge->content_page]->logo) ? $pages[$challenge->content_page]->logo : $pages[$challenge->content_page]->coverimage }}" class="img-responsive">
										</figure>
									</a>
								</td>
								<td>
									<a class="" title="" href="{{ route('quizzes.quiz', $challenge->id) }}">
										<div>
											{{ $pages[$challenge->content_page]->heading }} ({{ $challenge->remaining_attempts }})
											{{ $challenge->points_max }} Points
										</div>
									</a>
								</td>
							</tr>
						@endforeach
					</table>
				@else
					<!-- No Quizzes available -->
				@endif
				
			</div>
		</div>
	</div>
@stop