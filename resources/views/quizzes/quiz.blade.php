@extends('layouts.master')

@section('title', config('app.name').' - Quiz')

@section('content')
	<!-- Challenge info -->
	<!--
	{{ print_r($challenge) }}
	-->

	<img src="{{ $page->logo }}"><br/>
	Subject: <a href="{{ route('quizzes.category',2) }}">TODO: backend to send category_id</a><br/>
	Topic: <a href="{{ route('quizzes.topic',[2,1]) }}">{{ $page->subject }} (TODO: Backend to send subject_id)</a><br/>
	<h3>{{ $page->heading }}</h3>

	{{ csrf_field() }}
	<!-- quiz content/form -->
	{!! $page->content !!}

	<!-- Page info -->
	<!--
	{{ print_r($page) }}
	-->
@stop