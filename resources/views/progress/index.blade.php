@extends('layouts.master')

@section('title', config('app.name').' - Progress')

@section('content')
	@foreach ($categories as $category)
		<a class="" title="" href="{{ route('quizzes.category', $category->category) }}">{{ $category->name }}</a> ({{ $category->amount }}) <br/>
	@endforeach
@stop