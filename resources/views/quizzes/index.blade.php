@extends('layouts.master')

@section('title', config('app.name').' - Quiz')

@section('content')

	<div class="container">
		<div class="row">
			<div class="{{ config( 'front.dfltBodyClass' ) }} ">

				@foreach ($categories as $category)
					<a class="" title="" href="{{ route('quizzes.category', $category->category) }}">{{ $category->name }}</a> ({{ $category->amount }})
				@endforeach

				<br/>
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