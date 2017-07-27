@extends('layouts.master')

@section('title', config('app.name').' - Quiz')

@section('content')
	{{ $category }}

	{{ print_r($challengescategories) }}

	@foreach ($challenges as $challenge)
		<div>
			<h2> {{ $pages[$challenge->content_page]->heading }} </h2>
			{{ print_r($challenge) }}
			{!! $pages[$challenge->content_page]->content !!}
			<img src="{{ !empty($pages[$challenge->content_page]->logo) ? $pages[$challenge->content_page]->logo : $pages[$challenge->content_page]->coverimage }}">
		</div>
	@endforeach
@stop