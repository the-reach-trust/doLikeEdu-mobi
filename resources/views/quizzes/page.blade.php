@extends('layouts.master')

@section('title', config('app.name').' - Solution Page')

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

                            <li>
                                <a class="no-decorate" title="" href="{{ route('quizzes.index') }}">Back to Quizzes</a>
                            </li>
                        </ol>

                        <h1> {{$page->heading}} </h1>
                        <span class="space-3"></span>

                        @include( 'partials.progresspanel.lg' )

                        @if(!empty($page->content))
                            <div>
                                {!! $page->content !!}
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <span class="space"></span>
        </div>
    </div>

    <!--
    {{ print_r($page) }}
    -->
@stop