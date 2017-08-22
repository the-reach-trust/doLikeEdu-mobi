@extends('layouts.master')

@section('title', config('app.name').' - Quiz')

@section('content')
	<!-- Challenge info -->
	<!--
	{{ print_r($challenge) }}
	-->

	@include( 'partials.progresspanel.lg' )

	<div id="page">
		<div class="inner">
			<div id="quizinfopanel">
				<div class="container">
					<div class="row">			
						<div class="{{ get_body_class() }}">
							<div class="clearfix">
								<figure class="pull-left">
									<img src="{{ $page->logo }}" width="62"><br/>
								
								</figure>
								<div class="pull-left">
									<strong>Subject:</strong>
									<a href="{{ route('quizzes.category',$challenge->category) }}"> {{ $challenge->category_name }} </a><br/>
									<strong>Topic:</strong>
									<a href="{{ route('quizzes.topic',[$challenge->category,$challenge->topic]) }}">{{ $challenge->topic_name }}</a><br/>
									{{ $page->subject }}	
								</div>				
							</div>		
						</div>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="{{ get_body_class() }}">

						<h3>{{ $page->heading }}</h3>
				
						{{ csrf_field() }}
						<!-- quiz content/form -->
						{!! $page->content !!}

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Page info -->
	<!--
	{{ print_r($page) }}
	-->
@stop