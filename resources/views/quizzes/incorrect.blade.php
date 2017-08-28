@extends('layouts.master')

@section('title', config('app.name').' - Result')

@section('content')

    <div id="page">
        <div class="inner">
            <div class="space"></div>
            <div class="container">
                <div class="row">
                    <div class="{{ get_body_class( Request::route(), true ) }}">
                        <h1>{{ $page->heading }}: Incorrect </h1>
                        <span class="space-3"></span>

                        @include( 'partials.progresspanel.lg' )

                        <div>
                            That is the incorrect answer

                            @if( $challenge->remaining_attempts != 0)
                                No attempts left you get <b>{{ '50' }}</b> points!
                            @else
                                <!-- TODO: TRY AGAIN GOES HERE -->
                            @endif
                            <a href="{{ route('quizzes.page', $challenge->id) }}">try again ?</a>
                        </div>

                        <div>
                            <a href="{{ route('quizzes.category', $challenge->category) }}"> More {{ $challenge->category_name }} Quizzes </a>
                        </div>

                        <!-- Should normaly only be one page/solution !-->
                        @if(!empty($page->child) && $challenge->remaining_attempts != 0) <!-- TODO: == when using real user !-->
                            <div class="list">
                                @foreach ($page->child as $child)
                                    <a href="{{ route('quizzes.page', $child->id) }}">
                                        <span class="h2">{{ $child->heading }}</span>
                                    </a>
                                    @break
                                @endforeach
                            </div>
                        @endif
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
