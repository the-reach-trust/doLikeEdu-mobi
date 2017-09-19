@extends('layouts.master')

@section('title', config('app.name').' - Page')

@section('meta_tags')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('content')

    <div id="page">
        <div class="inner">
            <div class="space"></div>
            <div class="container">
                <div class="row">
                    <div class="{{ get_body_class( Request::route(), true ) }}">
						<ol class="breadcrumb">
							<li>
								<a class="no-decorate" title="" href="{{ route('home.index') }}">Back to DoLikeEdu</a>
							</li>
							@if(!empty($page->parent))
								<li>
									<a class="no-decorate" title="" href="{{ route('pages.page',$page->parent) }}">Back</a>
								</li>
							@endif
						</ol>

						@php
							if ( !strcasecmp( $page->heading, 'Edu Shows You' ) ) $class = "edu";
							else $class = "";
						@endphp

                        <h1 class="{{$class}}"> {{$page->heading}} </h1>
						<span class="space-3"></span>

                        @include( 'partials.progresspanel.lg' )

                        @if(!empty($page->content))
                            <div>
                                {!! $page->content !!}
                            </div>
                        @endif
                        @if(!empty($page->child))
                            <div class="list earn-points earn-points-image">
                                @php $next_not_completed = true; @endphp
                                @foreach ($page->child as $child)
                                    @if($child->completed == false)
                                        @if($next_not_completed == true)
                                            <a href="{{ route('pages.page', $child->id) }}">
                                                @if(!empty($child->logo)) <img src="{{ $child->logo }}" width="40"> @endif
                                                <span class="h2">{{ $child->heading }}</span>
                                            </a>
                                            @php $next_not_completed = false; @endphp
                                        @else
                                            <a href="{{ route('pages.page', $child->id) }}" class="disable-link">
                                                @if(!empty($child->logo)) <img src="{{ $child->logo }}" width="40"> @endif
                                                <span class="h2">{{ $child->heading }}</span>
                                            </a>
                                        @endif
                                    @else
                                        <a href="{{ route('pages.page', $child->id) }}">
                                            @if(!empty($child->logo)) <img src="{{ $child->logo }}" width="40"> @endif
                                            <span class="h2">{{ $child->heading }}</span>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            @if(!empty($page_next) && empty($page->child) && $page->completed == true)
                <span class="space"></span>
                <div class="container">
                    <div class="row">
                        <div class="{{ get_body_class() }}">
                            <div class="btn-group">
                                <a href="{{ route('pages.page', $page_next->id) }}" class="btn btn-default next">Next</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <span class="space"></span>
        </div>
    </div>

    <script type="text/javascript">
    @if($page->completed == true && !empty($page->content) && $page->content->find('form') != null)
        $( "input[value='{{$page->answer}}']" ).addClass( "correct" ).closest( "label" ).addClass( "correct" );
        $( "input[type='submit']" ).attr('disabled',true);
        $( "input[type='submit']" ).hide();
    @endif
    </script>
@stop