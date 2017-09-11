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
                                <img src="/images/crown.png" width="200"> <br/>
                                <h1 class="text-primary"> Congrats </h1>

                                <span class="space-3"></span>

                                <p class="text-primary">That is the right answer...<br />You get <b>{{ '50' }}</b> points!</p>

                                <span class="space"></span>

                                <a href="{{ route('quizzes.category', $challenge->category) }}" class="btn btn-lg btn-primary"> More {{ $challenge->category_name }} Quizzes </a>

                                <span class="space"></span>

                                <!-- Should normaly only be one page/solution !-->
                                @if(!empty($page->child) && $challenge->remaining_attempts != 0) <!-- TODO: == when using real user !-->
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
