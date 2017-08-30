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
                            <img src="/images/shooting_star.png" width="200"> <br/>
                            <h1> Good Job! </h1>

                            <span class="space-3"></span>

                            <div>
                                Here's <b>{{ '50' }} extra points</b> for you
                                updating your profile
                            </div>
                        </div>

                        <span class="space"></span>

                        <a href="{{ route('home.index') }}" class="btn btn-lg btn-danger btn-block">Got it</a>

                    </div>
                </div>
            </div>
            <span class="space"></span>
        </div>
    </div>
@stop
