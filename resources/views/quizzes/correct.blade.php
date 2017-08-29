@extends('layouts.master')

@section('title', config('app.name').' - Result')

@section('content')

    <div id="page">
        <div class="inner">
            <div class="space"></div>
            <div class="container">
                <div class="row text-center">
                    <div class="{{ get_body_class( Request::route(), true ) }}">
                        <h1>Congrats</h1>
                        <span class="space-3"></span>

                        @include( 'partials.progresspanel.lg' )

                        <div>
                            That is the right answer...<br/>
                            You get <b>{{ '50' }}</b> points!
                        </div>

                        <a href="{{ route('quizzes.category', $challenge->category) }}" class="btn btn-danger"> More {{ $challenge->category_name }} Quizzes </a>

                        <!-- Should normaly only be one page/solution !-->
                        @if(!empty($page->child) && $challenge->remaining_attempts != 0) <!-- TODO: == when using real user !-->
                            <div class="list">
                                @foreach ($page->child as $child)
                                    <a href="{{ route('quizzes.page', $child->id) }}">
                                        {{ $child->heading }} / Click here to see the full solution
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
