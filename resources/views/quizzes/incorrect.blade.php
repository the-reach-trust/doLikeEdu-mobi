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
                            <p class="h2">Keep Trying...</p>

                            @if( $challenge->remaining_attempts != 0)
                                No attempts left you get <b>{{ '50' }}</b> points!<br/>
                                <a href="{{ route('quizzes.category', $challenge->category) }}" class="btn btn-danger"> More {{ $challenge->category_name }} Quizzes </a><br/>
                            @else
                                <!-- TODO: TRY AGAIN GOES HERE -->
                            @endif
                            It's okay, it happens sometimes.<br/>
                            You have {{ '1' }} more try left. Good luck!<br/>
                            <a href="{{ route('quizzes.quiz', $challenge->id) }}"  class="btn btn-danger">Try Again</a><br/>
                            <a href="#" class="theme-primary">Learn more about this on Khan Academy</a>

                            <!-- Should normaly only be one page/solution !-->
                            @if(!empty($page->child) && $challenge->remaining_attempts != 0) <!-- TODO: == when using real user !-->
                                <div class="list">
                                    @foreach ($page->child as $child)
                                        <a href="{{ route('quizzes.page', $child->id) }}" class="theme-primary">
                                            {{ $child->heading }} / Click here to see the full solution
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
