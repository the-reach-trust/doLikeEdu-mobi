@extends('layouts.master')

@section('title', config('app.name').' - Quiz')

@section('meta_tags')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('content')
	<!-- Challenge info -->
	<!--
	{{ print_r($challenge) }}
	-->

	@include( 'partials.progresspanel.lg' )

	<div id="page" class="wider">
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
									<a href="{{ route('quizzes.category',$challenge->category) }}" class="no-decorate"> {{ $challenge->category_name }} </a><br/>
									<strong>Topic:</strong>
									<a href="{{ route('quizzes.topic',[$challenge->category,$challenge->topic]) }}" class="no-decorate">{{ $challenge->topic_name }}</a><br/>
									{{ $page->subject }}	
								</div>				
							</div>		
						</div>
					</div>
				</div>
			</div>
			<div id="quiz-single" class="container">
				<div class="row">
					<div class="{{ get_body_class() }}">

						<h3>{{ $page->heading }}</h3>

						<!-- quiz content/form -->
						{!! $page->content !!}

						<div class="attempts">
							<div class="space-1"></div>
							@if($challenge->remaining_attempts != 0)
								<p>You are on try <b>{{ $challenge->attempts + 1 }}</b> of <b>{{ $challenge->remaining_attempts + $challenge->attempts }}</b> for <span class="blocked-points">{{ $challenge->points_available }}</span> points</p>
							@else
								<p>{{ $challenge->points }} points</p>
							@endif
						</div>
					</div>
				</div>
				@if(!empty($page->child) && $challenge->remaining_attempts == 0)
				<div class="space"></div>
				<div class="row">
					<div class="{{ get_body_class( Request::route(), true ) }}">
					<!-- Should normaly only be one page/solution !-->
						<div class="list earn-points earn-points-image">
                            @foreach ($page->child as $child)
                                <a href="{{ route('quizzes.page', $child->id) }}">
                                    <div><span class="h2">{{ $child->heading }}</span></div>
                                </a>
                                @break
                            @endforeach
						</div>
					</div>
				</div>
				@endif
			</div>
		</div>
	</div>

	<script type="text/javascript">
	$('input[type="submit"]').addClass('btn btn-block btn-primary');
	@foreach ($challenge->user_answers as $user_answer)
		@if($user_answer == $challenge->answer)
			$( "input[value='{{$user_answer}}']" ).addClass( "correct" ).closest( "label" ).addClass( "correct" );
		@else
			$( "input[value='{{$user_answer}}']" ).addClass( "incorrect" ).closest( "label" ).addClass( "incorrect" );
		@endif
	@endforeach

	@if($challenge->remaining_attempts == 0)
		$( "input[value='{{$challenge->answer}}']" ).addClass( "correct" ).closest( "label" ).addClass( "correct" );
		$( "input[type='submit']" ).attr('disabled',true);
		$( "input[type='submit']" ).hide();
	@endif
	</script>
@stop