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
				
						{{ csrf_field() }}
						<!-- quiz content/form -->
						{!! $page->content !!}

						<div class="attempts">
							@if($challenge->remaining_attempts != 0)
								You are on try <b>{{ $challenge->attempts + 1 }}</b> of <b>{{ $challenge->remaining_attempts + $challenge->attempts }}</b> for <span class="blocked-points">{{ $challenge->points_available }}</span> points
							@else
								{{ $challenge->points }} points
							@endif
						</div>
					</div>
				</div>
				@if(!empty($page->child) && $challenge->remaining_attempts == 0)
				<div class="row">
					<!-- Should normaly only be one page/solution !-->
                        <div class="list">
                            @foreach ($page->child as $child)
                                <a href="{{ route('quizzes.page', $child->id) }}">
                                    <span class="h2">{{ $child->heading }}</span>
                                </a>
                                @break
                            @endforeach
                        </div>
				</div>
				@endif
			</div>
		</div>
	</div>

	<script type="text/javascript">
	@foreach ($challenge->user_answers as $user_answer)
		@if($user_answer == $challenge->answer)
			$( "input[value='{{$user_answer}}']" ).addClass( "correct" );
		@else
			$( "input[value='{{$user_answer}}']" ).addClass( "incorrect" );
		@endif
	@endforeach

	@if($challenge->remaining_attempts == 0)
		$( "input[value='{{$challenge->answer}}']" ).addClass( "correct" ).closest( "label" ).addClass( "correct" );
		$( "input[type='submit']" ).attr('disabled',true);
		$( "input[type='submit']" ).hide();
	@endif
	</script>
@stop