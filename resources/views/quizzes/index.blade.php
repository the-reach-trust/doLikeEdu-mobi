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
				<h3>Featured Challenges</h3>
				@foreach ($challenges_featured as $challenge)
					<img src="{{ !empty($pages[$challenge->content_page]->logo) ? $pages[$challenge->content_page]->logo : $pages[$challenge->content_page]->coverimage }}">
					<a class="" title="" href="{{ route('quizzes.quiz', $challenge->id) }}">{{ $pages[$challenge->content_page]->heading }}</a> ({{ $challenge->remaining_attempts }})<br/>
				@endforeach
			
			</div>
		</div>
	</div>
@stop