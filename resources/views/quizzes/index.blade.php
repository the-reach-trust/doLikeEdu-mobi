@extends('layouts.master')

@section('title', config('app.name').' - Quiz')

@section('content')

	<div class="container">
		<div class="row">
			<div class="{{ config( 'front.dfltBodyClass' ) }} ">
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

				<h3>Quiz categories</h3>
				@foreach ($categories as $category)
					<img src="https://via.placeholder.com/25x25" alt="{{ $category->name}}">
					<a class="" title="" href="{{ route('quizzes.category', $category->category) }}">{{ $category->name }}</a> ({{ $category->amount }})
					}
				@endforeach
			</div>
		</div>
	</div>
@stop