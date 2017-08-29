@extends('layouts.master')

@section('title', config('app.name').' - Result')

@section('content')

    <div id="page">
        <div class="inner">
            <div class="space"></div>
            <div class="container">
                <div class="row text-center">
                    <div class="{{ get_body_class( Request::route(), true ) }}">
                        <span class="space-3"></span>

                        @include( 'partials.progresspanel.lg' )

                        <div class="text-center">
                            <img src="/images/shooting_star.png" width="200"> <br/>
                            <p class="h2">Good Job!</p>
                            Here's <b>{{ '50' }} extra points</b> for you
                            updating your profile
                        </div>

                        <a href="{{ route('home.index') }}" class="btn btn-danger">Got it</a>

                    </div>
                </div>
            </div>
            <span class="space"></span>
        </div>
    </div>
@stop
