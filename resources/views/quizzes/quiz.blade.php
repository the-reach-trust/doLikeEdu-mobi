@extends('layouts.master')

@section('title', config('app.name').' - Quiz')

@section('content')
	<!-- Challenge info -->
	<!--
	{{ print_r($challenge) }}
	-->

	<img src="{{ $page->logo }}"><br/>
	Subject: <a href="{{ route('quizzes.category',$challenge->category) }}"> {{ $challenge->category_name }} </a><br/>
	Topic: <a href="{{ route('quizzes.topic',[$challenge->category,$challenge->topic]) }}">{{ $challenge->topic_name }}</a><br/>
	{{ $page->subject }}
	<h3>{{ $page->heading }}</h3>

	{{ csrf_field() }}
	<!-- quiz content/form -->
	{!! $page->content !!}

	<!-- Page info -->
	<!--
	{{ print_r($page) }}
	-->
@stop