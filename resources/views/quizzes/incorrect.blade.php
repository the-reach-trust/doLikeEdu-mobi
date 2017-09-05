@extends('layouts.master')

@section('title', config('app.name').' - Result')

@section('content')

    <div id="page">
        <div class="inner">
            <div class="space"></div>
            <div class="container">
                <div class="row">
                    <div class="{{ get_body_class( Request::route(), true ) }}">
                        <span class="space-3"></span>

                        @include( 'partials.progresspanel.lg' )

                        <div class="text-center">
                            <img src="/images/cloud.png" width="200"> <br/>
                            <h1>Keep Trying...</h1>

                            <span class="space"></span>

                            @if( $challenge->remaining_attempts == 0 )
                                No attempts left you get <b>{{ $challenge->points }}</b> points!
                                <span class="space"></span>
                                <a href="{{ route('quizzes.category', $challenge->category) }}" class="btn btn-lg btn-danger btn-block"> More {{ $challenge->category_name }} Quizzes </a><br/>
                            @else
                                It's okay, it happens sometimes.<br/>
                                You have <b>{{ $challenge->remaining_attempts }}</b> more try left. Good luck!<br/>
                                <span class="space"></span>
                                <a href="{{ route('quizzes.quiz', $challenge->id) }}"  class="btn btn-lg btn-danger btn-block">Try Again</a>
                            @endif

                            <span class="space"></span>

                            <a href="#" class="theme-primary">Learn more about this on Khan Academy</a>
                            <!-- Should normaly only be one page/solution !-->
                            @if(!empty($page->child) && $challenge->remaining_attempts == 0 )
                                <div class="list">
                                    @foreach ($page->child as $child)
                                        <a href="{{ route('quizzes.page', $child->id) }}" class="theme-primary">
                                            Click here to see the full solution
                                        </a>
                                        @break
                                    @endforeach
                                </div>
                            @endif
                        </div>                        
                    </div>
                </div>
            </div>
            <span class="space"></span>
        </div>
    </div>

    <!--
        {{ print_r($challenge) }}
    !-->
    <!--
        {{ print_r($page) }}
    -->
@stop
