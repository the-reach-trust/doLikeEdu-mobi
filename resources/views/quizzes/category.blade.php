@extends('layouts.master')

@section('title', config('app.name').' - Quiz')

@section('content')
	<h2> {{$category->name}} </h2>
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
		<a class="" title="" href="{{ route('quizzes.quiz', $challenge->id) }}">{{ $pages[$challenge->content_page]->heading }}</a> ({{ $challenge->remaining_attempts }})<br/>
	@endforeach
@stop