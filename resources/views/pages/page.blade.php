@extends('layouts.master')

@section('title', config('app.name').' - Page')

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

                        <h1> {{$page->heading}} </h1>
						<span class="space-3"></span>

                        @include( 'partials.progresspanel.lg' )

                        @if(!empty($page->content))
                            <div>
                                {!! $page->content !!}
                            </div>
                        @endif
                        @if(!empty($page->child))
                            <div class="list earn-points earn-points-image">
                                @foreach ($page->child as $child)
                                    <a href="{{ route('pages.page', $child->id) }}">
                                        @if(!empty($child->logo)) <img src="{{ $child->logo }}" width="40"> @endif
                                        <span class="h2">{{ $child->heading }}</span>
                                    </a>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="space-12"></div>
        </div>
    </div>

    <!--
    {{ print_r($page) }}
    -->
@stop