@extends('layouts.master')

@section('title', config('app.name').' - Quiz')

@section('content')
	<!-- Challenge info -->
	<!--
	{{ print_r($challenge) }}
	-->

	<img src="{{ $page->logo }}"><br/>
	Subject: BACKEND NEEDS UPDATE<br/>
	Topic: {{ $page->subject }}<br/>
	<h3>{{ $page->heading }}</h3>

	<!-- quiz content/form -->
	{!! $page->content !!}
@stop