@extends('layouts.master')

@section('title', config('app.name').' - Page')

@section('content')

    <div id="page">
        <div class="inner">
            <div class="space"></div>
            <div class="container">
                <div class="row">
                    <div class="{{ get_body_class( Request::route(), true ) }}">
                         <a class="" title="" href="{{ route('home.index') }}">Back to DoLikeEdu</a> @if(!empty($page->parent)) | <a class="" title="" href="{{ route('pages.page',$page->parent) }}">Back</a> @endif
                        <h2> {{$page->heading}} </h2>

                        @include( 'partials.progresspanel.lg' )

                        @if(!empty($page->content))
                            <div>
                                {!! $page->content !!}
                            </div>
                        @endif
                        @if(!empty($page->child))
                            <div class="list earn-points">
                                @foreach ($page->child as $child)
                                    <a href="{{ route('pages.page', $child->id) }}">
                                        @if(!empty($child->logo)) <img src="{{ $child->logo }}"> @endif
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