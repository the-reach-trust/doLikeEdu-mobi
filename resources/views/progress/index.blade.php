@extends('layouts.master')

@section('title', config('app.name').' - Progress')

@section('content')

	<div class="container">
		<div class="row">
			<div class="{{ get_body_class() }}">

				@foreach ($categories as $category)
					<a class="" title="" href="{{ route('quizzes.category', $category->category) }}">{{ $category->name }}</a> ({{ $category->amount }}) <br/>
				@endforeach

			</div>
		</div>
	</div>
	
@stop