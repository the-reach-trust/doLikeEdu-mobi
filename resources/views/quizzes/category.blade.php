@extends('layouts.master')

@section('title', config('app.name').' - Quiz')

@section('content')
	<div class="container">
		<div class="row">
			<h2> {{$category->name}} </h2>

			@foreach ($categories as $category)
				<a class="{{ $category->category == $category_id ? 'active' : '' }}" title="" href="{{ route('quizzes.category', $category->category) }}">{{ $category->name }}</a> ({{ $category->amount }}) 
			@endforeach

			<!-- Maybe this is not shown at all ? -->
			<!--
			<h3>Topics</h3>
			@foreach ($category->topics as $topic)
				<a class="" title="" href="{{ route('quizzes.topic', [$category_id,$topic->topic]) }}">{{ $topic->name }}</a> ({{ $topic->amount }})
			@endforeach
			-->

			<h3>Quizzes</h3>
			@foreach ($challenges as $challenge)
				<img src="{{ !empty($pages[$challenge->content_page]->logo) ? $pages[$challenge->content_page]->logo : $pages[$challenge->content_page]->coverimage }}">
				<a class="" title="" href="{{ route('quizzes.quiz', $challenge->id) }}">{{ $pages[$challenge->content_page]->heading }}</a> 
				{{ $challenge->points_max }} Points {!! ChallengeType::toMarkup($challenge->type) !!}<br/>
			@endforeach

			@if(sizeof($challenges) <= $challenge_count)
				<ul class="pager">
					@if($offset > 0)
						<li class="previous"><a href="{{ route('quizzes.category', [$category_id,max($offset-$challenge_count,0) ]) }}">Previous</a></li>
					@endif
					@if(sizeof($challenges) == $challenge_count)
						<li class="next"><a href="{{ route('quizzes.category', [$category_id,max($offset+$challenge_count,0) ]) }}">Next</a></li>
					@endif
				</ul>
			@endif
		</div>
	</div>
@stop